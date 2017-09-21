<?php
/**
 * AbstractApiTest.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on 2016-06-12 12:18
 * Copyright (C) 8x8, Inc.
 */

namespace Webit\GlsTracking\Tests;

use Webit\GlsTracking\Api\Factory\TrackingApiFactory;
use Webit\GlsTracking\Model\UserCredentials;

abstract class AbstractApiTest extends AbstractGlsTrackingTest
{
    /**
     * @param UserCredentials $credentials
     * @return \Webit\GlsTracking\Api\TrackingApi
     */
    protected function api(UserCredentials $credentials)
    {
        return TrackingApiFactory::create()->createTrackingApi($credentials);
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
