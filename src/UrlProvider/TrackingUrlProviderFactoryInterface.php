<?php
/**
 * File: TrackingUrlProviderFactoryInterface.php
 * Created at: 2014-11-25 06:59
 */
 
namespace Webit\GlsTracking\UrlProvider;

/**
 * Interface TrackingUrlProviderFactoryInterface
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
interface TrackingUrlProviderFactoryInterface
{
    /**
     * @param string $username
     * @param string $password
     * @return TrackingUrlProvider
     */
    public function createTrackingUrlProvider();
}
 