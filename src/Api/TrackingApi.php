<?php
/**
 * TrackingApi.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 15:47
 */

namespace Webit\GlsTracking\Api;

use Webit\GlsTracking\Api\Exception\AuthException;
use Webit\GlsTracking\Api\Exception\Exception;
use Webit\GlsTracking\Api\Exception\GlsTrackingApiException;
use Webit\GlsTracking\Api\Exception\ImageNotFoundException;
use Webit\GlsTracking\Api\Exception\NoDataFoundException;
use Webit\GlsTracking\Api\Exception\UnknownErrorCodeException;
use Webit\GlsTracking\Model\DateTime;
use Webit\GlsTracking\Model\ExitCode;
use Webit\GlsTracking\Model\Message\AbstractRequest;
use Webit\GlsTracking\Model\Message\AbstractResponse;
use Webit\GlsTracking\Model\Message\TuDetailsRequest;
use Webit\GlsTracking\Model\Message\TuDetailsResponse;
use Webit\GlsTracking\Model\Message\TuListRequest;
use Webit\GlsTracking\Model\Message\TuListResponse;
use Webit\GlsTracking\Model\Message\TuPODRequest;
use Webit\GlsTracking\Model\Message\TuPODResponse;
use Webit\GlsTracking\Model\Parameters;
use Webit\GlsTracking\Model\UserCredentials;
use Webit\SoapApi\Executor\SoapApiExecutor;

/**
 * Class TrackingApi
 * @package Webit\GlsTracking\Api
 */
class TrackingApi
{

    /**
     * @var SoapApiExecutor
     */
    private $executor;

    /**
     * @var UserCredentials
     */
    private $credentials;

    /**
     * @param SoapApiExecutor $executor
     * @param UserCredentials $credentials
     */
    public function __construct(SoapApiExecutor $executor, UserCredentials $credentials)
    {
        $this->executor = $executor;
        $this->credentials = $credentials;
    }

    private function doRequest($soapFunction, AbstractRequest $request)
    {
        $this->applyCredentials($request);

        $request = array($soapFunction => $request);

        /** @var AbstractResponse $response */
        $response = $this->executor->executeSoapFunction($soapFunction, $request);
        if ($response->getExitCode()->isSuccessfully() == false) {
            throw $this->createException($response);
        }

        return $response;
    }

    /**
     * @param $reference
     * @param string $language
     * @return TuDetailsResponse
     */
    public function getParcelDetails($reference, $language = 'EN')
    {
        try {
            /** @var TuDetailsResponse $response */
            $response = $this->doRequest(
                'GetTuDetail',
                new TuDetailsRequest($this->filterReferenceNo($reference), new Parameters('LangCode', $language))
            );
        } catch (NoDataFoundException $e) {
            $response = $e->getApiResponse();
        }

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
        try {
            /** @var TuListResponse $response */
            $response = $this->doRequest(
                'GetTuList',
                new TuListRequest(
                    DateTime::fromDateTime($from),
                    DateTime::fromDateTime($to),
                    $reference ? $this->filterReferenceNo($reference) : null,
                    $customerReference,
                    new Parameters('LangCode', $language)
                )
            );

        } catch (NoDataFoundException $e) {
            $response = $e->getApiResponse();
        }

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
        try {
            /** @var TuPODResponse $response */
            $response = $this->doRequest(
                'GetTuPOD',
                new TuPODRequest($this->filterReferenceNo($reference), new Parameters('LangCode', $language)),
                'Webit\GlsTracking\Model\Message\TuPODResponse'
            );
        } catch (ImageNotFoundException $e) {
            $response = $e->getApiResponse();
        } catch (NoDataFoundException $e) {
            $response = $e->getApiResponse();
        }

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
     * @param AbstractResponse $response
     * @return GlsTrackingApiException
     */
    private function createException(AbstractResponse $response)
    {
        $exitCode = $response->getExitCode();
        switch ($exitCode->getCode()) {
            case ExitCode::CODE_AUTHENTICATION_ERROR:
                return new AuthException($exitCode->getDescription(), $exitCode->getCode(), $response);
            case ExitCode::CODE_NO_DATA_FOUND:
                return new NoDataFoundException($exitCode->getDescription(), $exitCode->getCode(), $response);
            case ExitCode::CODE_IMAGE_NOT_FOUND:
                return new ImageNotFoundException($exitCode->getDescription(), $exitCode->getCode(), $response);
        }

        return new UnknownErrorCodeException(
            sprintf('Unknown error given with code "%s" and message "%s"', $exitCode->getCode(), $exitCode->getDescription()),
            $exitCode->getCode(),
            $response
        );
    }

    /**
     * @param string $referenceNo
     * @return string
     */
    private function filterReferenceNo($referenceNo)
    {
        return substr($referenceNo, 0, 11);
    }
}
