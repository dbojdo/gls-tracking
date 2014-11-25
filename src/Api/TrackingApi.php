<?php
/**
 * TrackingApi.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 15:47
 */

namespace Webit\GlsTracking\Api;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Webit\GlsTracking\Api\Exception\AuthException;
use Webit\GlsTracking\Api\Exception\Exception;
use Webit\GlsTracking\Api\Exception\GlsApiCommunicationException;
use Webit\GlsTracking\Api\Exception\GlsTrackingApiException;
use Webit\GlsTracking\Api\Exception\NoDataFoundException;
use Webit\GlsTracking\Api\Exception\UnknownErrorCodeException;
use Webit\GlsTracking\Model\DateTime;
use Webit\GlsTracking\Model\ExitCode;
use Webit\GlsTracking\Model\Message\AbstractRequest;
use Webit\GlsTracking\Model\Message\TuDetailsRequest;
use Webit\GlsTracking\Model\Message\TuDetailsResponse;
use Webit\GlsTracking\Model\Message\TuListRequest;
use Webit\GlsTracking\Model\Message\TuListResponse;
use Webit\GlsTracking\Model\Message\TuPODRequest;
use Webit\GlsTracking\Model\Message\TuPODResponse;
use Webit\GlsTracking\Model\Parameters;
use Webit\GlsTracking\Model\UserCredentials;

/**
 * Class TrackingApi
 * @package Webit\GlsTracking\Api
 */
class TrackingApi
{
    /**
     * @var \SoapClient
     */
    private $soapClient;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var UserCredentials
     */
    private $credentials;

    /**
     * @param \SoapClient $soapClient
     * @param SerializerInterface $serializer
     * @param UserCredentials $credentials
     */
    public function __construct(\SoapClient $soapClient, SerializerInterface $serializer, UserCredentials $credentials)
    {
        $this->soapClient = $soapClient;
        $this->serializer = $serializer;
        $this->credentials = $credentials;
    }

    private function doRequest($soapFunction, AbstractRequest $request, $outputType = 'ArrayCollection')
    {
        $this->applyCredentials($request);
        try {
            $input = $this->normalizeInput($request);

            $response = $this->soapClient->__soapCall($soapFunction, $input);
            $response = json_encode($response);

            /** @var AbstractResponse $response */
            $response = $this->serializer->deserialize($response, $outputType, 'json');
        } catch (\SoapFault $e) {
            throw new GlsApiCommunicationException("SOAP Error: " . $e->faultcode, null, $e);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode(), $e);
        }

        if ($response->getExitCode()->isSuccessfully() == false) {
            throw $this->createException($response->getExitCode());
        }
    }

    /**
     * @param $reference
     * @param string $language
     * @return TuDetailsResponse
     */
    public function getParcelDetails($reference, $language = 'EN')
    {
        $response = $this->doRequest(
            'GetTuList',
            new TuDetailsRequest($reference, new Parameters('LangCode', $language)),
            'Webit\GlsTracking\Model\Message\TuDetailsResponse'
        );

        return $response;
    }

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     * @param null $reference
     * @param null $customerReference
     * @param string $language
     * @throws Exception
     * @throws GlsTrackingApiException
     * @return TuListResponse
     */
    public function getParcelList(\DateTime $from, \DateTime $to, $reference = null, $customerReference = null, $language = 'EN')
    {
        $response = $this->doRequest(
            'GetTuList',
            new TuListRequest(
                DateTime::fromDateTime($from),
                DateTime::fromDateTime($to),
                $reference,
                $customerReference,
                new Parameters('LangCode', $language)
            ),
            'Webit\GlsTracking\Model\Message\TuListResponse'
        );

        return $response;
    }

    /**
     * @param $reference
     * @param string $language
     * @throws Exception
     * @throws GlsTrackingApiException
     * @return TuPODResponse
     */
    public function getProofOfDelivery($reference, $language = 'EN')
    {
        /** @var TuPODResponse $response */
        $response = $this->doRequest(
            'GetTuPOD',
            new TuPODRequest($reference, new Parameters('LangCode', $language)),
            'Webit\GlsTracking\Model\Message\TuPODResponse'
        );

        return $response;
    }

    /**
     * @param AbstractRequest $request
     */
    private function applyCredentials(AbstractRequest $request)
    {
        $request->setCredentials($this->credentials);
    }

    /**
     * @param AbstractRequest $request
     * @return array
     */
    private function normalizeInput(AbstractRequest $request)
    {
        $context = SerializationContext::create()->setGroups(array('input'));
        $input = $this->serializer->serialize($request, 'json', $context);
        $input = $this->serializer->deserialize($input, 'array', 'json');

        $refClass = new \ReflectionClass($request);

        return array($refClass->getName() => $input);
    }

    /**
     * @param ExitCode $exitCode
     * @return GlsTrackingApiException
     */
    private function createException(ExitCode $exitCode)
    {
        switch ($exitCode->getCode()) {
            case ExitCode::CODE_AUTHENTICATION_ERROR:
                return new AuthException($exitCode->getDescription(), $exitCode->getCode());
            case ExitCode::CODE_NO_DATA_FOUND:
                return new NoDataFoundException($exitCode->getDescription(), $exitCode->getCode());
        }

        return new UnknownErrorCodeException(sprintf(
            'Unknown error given with code "%s" and message "%s"', $exitCode->getCode(), $exitCode->getDescription()
        ));
    }
}
