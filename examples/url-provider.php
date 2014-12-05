<?php
require __DIR__.'/bootstrap.php';

use Webit\GlsTracking\UrlProvider\TrackingUrlProviderFactory;
$factory = new TrackingUrlProviderFactory();

/** @var array $config */

$username = 'username';

$urlProvider = $factory->createTrackingUrlProvider();

$reference = $config['parcel-no'];
$url = $urlProvider->getTrackingUrl($reference);

printf("Url for tracking \"%s\": %s\n", $reference, $url);

$customerReference = 'customer-ref';
$customerNo = 'customer-no';
$url = $urlProvider->getCustomerReferenceTrackingUrl($customerReference, $customerNo);

printf("Url for tracking \"%s\" with customer \"%s\": %s\n", $customerReference, $customerNo, $url);
