<?php
/**
 * AbstractApiTest.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on 2016-06-12 12:18
 * Copyright (C) 8x8, Inc.
 */

namespace Webit\GlsTracing\Tests;

use Webit\GlsTracking\Api\Exception\ExceptionFactory;
use Webit\GlsTracking\Api\Factory\TrackingApiFactory;
use Webit\GlsTracking\Model\UserCredentials;
use Webit\GlsTracking\Tests\AbstractGlsTrackingTest;
use Webit\SoapApi\Hydrator\HydratorSerializerBased;
use Webit\SoapApi\Input\InputNormalizerSerializerBased;
use Webit\SoapApi\SoapApiExecutorFactory;
use Webit\SoapApi\SoapClient\SoapClientFactory;
use Webit\SoapApi\Util\BinaryStringHelper;

abstract class AbstractApiTest extends AbstractGlsTrackingTest
{
    /**
     * @return TrackingApiFactory
     */
    protected function apiFactory()
    {
        $clientFactory = new SoapClientFactory();
        $executorFactory = new SoapApiExecutorFactory();
        $normalizer = new InputNormalizerSerializerBased($this->serialiser());
        $hydrator = new HydratorSerializerBased($this->serialiser(), new BinaryStringHelper());
        $exceptionFactory = new ExceptionFactory();

        return new TrackingApiFactory($clientFactory, $executorFactory, $normalizer, $hydrator, $exceptionFactory);
    }

    /**
     * @param UserCredentials $credentials
     * @return \Webit\GlsTracking\Api\TrackingApi
     */
    protected function api(UserCredentials $credentials)
    {
        return $this->apiFactory()->createTrackingApi($credentials);
    }

    /**
     * @return \Webit\GlsTracking\Api\TrackingApi
     */
    protected function defaultApi()
    {
        $credentials = new UserCredentials($_ENV['API_USERNAME'], $_ENV['API_PASSWORD']);

        return $this->api($credentials);
    }
}
