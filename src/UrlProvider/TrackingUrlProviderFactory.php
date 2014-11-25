<?php
/**
 * File: TrackingUrlProviderFactory.php
 * Created at: 2014-11-25 06:58
 */
 
namespace Webit\GlsTracking\UrlProvider;

/**
 * Class TrackingUrlProviderFactory
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class TrackingUrlProviderFactory implements TrackingUrlProviderFactoryInterface
{
    /**
     * @param string $username
     * @param string $password
     * @return TrackingUrlProvider
     */
    public function createTrackingUrlProvider($username, $password)
    {
        return new TrackingUrlProvider($username, $password);
    }
}
