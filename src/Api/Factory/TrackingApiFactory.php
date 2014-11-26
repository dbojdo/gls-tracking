<?php
/**
 * TrackingApiFactory.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 15:47
 */

namespace Webit\GlsTracking\Api\Factory;

use Webit\GlsTracking\Api\TrackingApi;
use Webit\GlsTracking\Model\UserCredentials;
use Webit\SoapApi\Exception\ExceptionFactoryInterface;
use Webit\SoapApi\Hydrator\HydratorInterface;
use Webit\SoapApi\Input\InputNormalizerInterface;
use Webit\SoapApi\SoapApiExecutor;
use Webit\SoapApi\SoapApiExecutorInterface;
use Webit\SoapApi\SoapClient\SoapClientFactoryInterface;

/**
 * Class TrackingApiFactory
 * @package Webit\GlsTracking\Api\Factory
 */
class TrackingApiFactory
{
    const GLS_TRACKING_WSDL = 'http://www.gls-group.eu/276-I-PORTAL-WEBSERVICE/services/Tracking/wsdl/Tracking.wsdl';

    /**
     * @var SoapClientFactoryInterface
     */
    private $clientFactory;

    /**
     * @var InputNormalizerInterface
     */
    private $normalizer;

    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @var ExceptionFactoryInterface
     */
    private $exceptionFactory;

    /**
     * @param SoapClientFactoryInterface $clientFactory
     * @param InputNormalizerInterface $normalizer
     * @param HydratorInterface $hydrator
     * @param ExceptionFactoryInterface $exceptionFactory
     */
    public function __construct(
        SoapClientFactoryInterface $clientFactory,
        InputNormalizerInterface $normalizer,
        HydratorInterface $hydrator,
        ExceptionFactoryInterface $exceptionFactory
    ) {
        $this->clientFactory = $clientFactory;
        $this->normalizer = $normalizer;
        $this->hydrator = $hydrator;
        $this->exceptionFactory = $exceptionFactory;
    }

    /**
     * @param string $username
     * @param string $password
     * @return TrackingApi
     */
    public function createTrackingApi($username, $password)
    {
        $executor = $this->createExecutor();

        return new TrackingApi(
            $executor,
            new UserCredentials($username, $password)
        );
    }

    /**
     * @return SoapApiExecutor
     */
    private function createExecutor()
    {
        return new SoapApiExecutor(
            $this->clientFactory->createSoapClient(self::GLS_TRACKING_WSDL),
            $this->normalizer,
            $this->hydrator,
            null,
            $this->exceptionFactory
        );
    }
}
