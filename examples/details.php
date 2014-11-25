<?php
/** @var \Webit\GlsTracking\Api\Factory\TrackingApiFactory $apiFactory */
$apiFactory = require 'bootstrap.php';

$username = 'username';
$password = 'password';
$reference = 'parcel-ref-no';

$api = $apiFactory->createTrackingApi($username, $password);
$api->getParcelDetails($reference);
