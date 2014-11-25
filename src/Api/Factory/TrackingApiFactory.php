<?php
/**
 * TrackingApiFactory.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 15:47
 */

namespace Webit\GlsTracking\Api\Factory;

use JMS\Serializer\SerializerInterface;
use Webit\GlsTracking\Api\TrackingApi;
use Webit\GlsTracking\Model\UserCredentials;

/**
 * Class TrackingApiFactory
 * @package Webit\GlsTracking\Api\Factory
 */
class TrackingApiFactory
{
    const GLS_TRACKING_WSDL = 'http://www.gls-group.eu/276-I-PORTAL-WEBSERVICE/services/Tracking/wsdl/Tracking.wsdl';

    /**
     * @var SoapClientFactory
     */
    private $clientFactory;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(SoapClientFactory $clientFactory, SerializerInterface $serializer)
    {
        $this->clientFactory = $clientFactory;
        $this->serializer = $serializer;
    }

    /**
     * @param string $username
     * @param string $password
     * @return TrackingApi
     */
    public function createTrackingApi($username, $password)
    {
        return new TrackingApi(
            $this->clientFactory->createSoapClient(self::GLS_TRACKING_WSDL),
            $this->serializer,
            new UserCredentials($username, $password)
        );
    }
}
