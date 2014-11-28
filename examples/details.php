<?php
/** @var \Webit\GlsTracking\Api\Factory\TrackingApiFactory $apiFactory */
$apiFactory = require 'bootstrap.php';

/** @var array $config */

$parcelNo = $config['parcel-no'];

$api = $apiFactory->createTrackingApi($config['username'], $config['password']);
$details = $api->getParcelDetails($parcelNo);

/** @var \Webit\GlsTracking\Model\Event $event */
printf("Details of parcel \"%s\"\n", $parcelNo);
foreach ($details->getHistory() as $event) {
    printf(
        "%s - Status: %s (%s), Location: %s, %s (%s)\n",
        $event->getDate(),
        $event->getCode(),
        $event->getDescription(),
        $event->getLocationName(),
        $event->getCountryName(),
        $event->getLocationCode()
    );
}
printf("Received by: %s\n", $details->getSignature());
