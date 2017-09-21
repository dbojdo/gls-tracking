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
use Webit\SoapApi\Executor\SoapApiExecutor;
use Webit\SoapApi\Executor\SoapApiExecutorBuilder;
use Webit\SoapApi\Hydrator\ArrayHydrator;
use Webit\SoapApi\Hydrator\ChainHydrator;
use Webit\SoapApi\Hydrator\HydratorSerializerBased;
use Webit\SoapApi\Hydrator\Serializer\ResultTypeMap;
use Webit\SoapApi\Input\InputNormaliserSerializerBased;
use Webit\SoapApi\Input\Serializer\StaticSerializationContextFactory;
use Webit\SoapApi\Util\StdClassToArray;

/**
 * Class TrackingApiFactory
 * @package Webit\GlsTracking\Api\Factory
 */
class TrackingApiFactory
{
    const GLS_TRACKING_WSDL = 'http://www.gls-group.eu/276-I-PORTAL-WEBSERVICE/services/Tracking/wsdl/Tracking.wsdl';

    /**
     * @var SerializerFactory
     */
    private $serializerFactory;

    /**
     * @param SerializerFactory|null $serializerFactory
     * @return TrackingApiFactory
     */
    public static function create(SerializerFactory $serializerFactory = null)
    {
        return new self($serializerFactory);
    }

    /**
     * TrackingApiFactory constructor.
     * @param SerializerFactory $serializerFactory
     */
    public function __construct(SerializerFactory $serializerFactory = null)
    {
        $this->serializerFactory = $serializerFactory ?: new SerializerFactory();
    }

    /**
     * @param UserCredentials $credentials
     * @return TrackingApi
     */
    public function createTrackingApi(UserCredentials $credentials)
    {
        return new TrackingApi(
            $this->getExecutor(),
            $credentials
        );
    }

    /**
     * @return SoapApiExecutor
     */
    private function getExecutor()
    {
        $executorBuilder = SoapApiExecutorBuilder::create();


        $serializer = $this->serializerFactory->create();

        $executorBuilder->setInputNormaliser(
            new InputNormaliserSerializerBased($serializer, new StaticSerializationContextFactory())
        );

        $executorBuilder->setWsdl(self::GLS_TRACKING_WSDL);
        $executorBuilder->setHydrator(
            new ChainHydrator(
                array(
                    new ArrayHydrator(new StdClassToArray()),
                    new HydratorSerializerBased(
                        $serializer,
                        new ResultTypeMap(
                            array(
                                'GetTuDetail' => 'Webit\GlsTracking\Model\Message\TuDetailsResponse',
                                'GetTuList' => 'Webit\GlsTracking\Model\Message\TuListResponse',
                                'GetTuPOD' => 'Webit\GlsTracking\Model\Message\TuPODResponse'
                            )
                        )
                    )
                )
            )
        );
        return $executorBuilder->build();
    }
}
