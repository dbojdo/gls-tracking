<?php
/**
 * TrackingApiTest.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@8x8.com>
 * Created on 06/12/2016 13:08
 * Copyright (C) 8x8, Inc.
 */

namespace Webit\GlsTracing\Tests\Api;

use Webit\GlsTracing\Tests\AbstractApiTest;
use Webit\GlsTracking\Api\TrackingApi;

class TrackingApiTest extends AbstractApiTest
{
    /**
     * @var TrackingApi
     */
    private $api;

    protected function setUp()
    {
        $this->api = $this->defaultApi();
    }

    /**
     * @test
     * @dataProvider references
     * @param $reference
     * @group parcelDetails
     */
    public function shouldGetTheParcelsDetails($reference)
    {
        $details = $this->api->getParcelDetails($reference);
        $this->assertInstanceOf('Webit\GlsTracking\Model\Message\TuDetailsResponse', $details);
    }

    public function references()
    {
        $parcels = $_ENV['API_PARCELS'];
        $arParcels = explode(',', $parcels);

        $data = array();
        foreach ($arParcels as $parcel) {
            $data[] = array(trim($parcel));
        }

        return $data;
    }

    /**
     * @test
     * @group parcelsList
     */
    public function shouldListParcelsByDate()
    {
        $dateFrom = date_create('now-2days');
        $dateTo = date_create('now-1days');

        $list = $this->api->getParcelList(
            $dateFrom,
            $dateTo
        );

        $this->assertInstanceOf('Webit\GlsTracking\Model\Message\TuListResponse', $list);
    }

    /**
     * @param string $reference
     * @test
     * @dataProvider references
     * @group proofOfDelivery
     */
    public function shouldGetProofOfDelivery($reference)
    {
        $pod = $this->api->getProofOfDelivery($reference);
        $this->assertInstanceOf('Webit\GlsTracking\Model\Message\TuPODResponse', $pod);
    }
}
