<?php
/**
 * TuDetailsResponseDeserialisationTest.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@8x8.com>
 * Created on 05/12/2016 14:16
 * Copyright (C) 8x8, Inc.
 */

namespace Webit\GlsTracking\Tests\Model\Message;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\EventDispatcher\EventDispatcherInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Webit\GlsTracking\Model\CustomerReference;
use Webit\GlsTracking\Model\DateTime;
use Webit\GlsTracking\Model\Event;
use Webit\GlsTracking\Model\ExitCode;
use Webit\GlsTracking\Model\Message\TuDetailsResponse;
use Webit\GlsTracking\Model\Serialiser\TuDetailsResponseDeserialisationListener;

class TuDetailsResponseDeserialisationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serialiser;

    protected function setUp()
    {
        $builder = SerializerBuilder::create();
        $builder->addDefaultListeners();
        $builder->configureListeners(function (EventDispatcherInterface $dispatcher) {
            $dispatcher->addSubscriber(new TuDetailsResponseDeserialisationListener());
        });

        $this->serialiser = $builder->build();
    }

    /**
     * @test
     * @dataProvider tuDetailsResponse
     * @param string $json
     * @param TuDetailsResponse $expectedResponse
     */
    public function shouldDeserialiseTheTuDetailsResponse($json, TuDetailsResponse $expectedResponse)
    {
        $response = $this->serialiser->deserialize($json, 'Webit\GlsTracking\Model\Message\TuDetailsResponse', 'json');

        $this->assertEquals($expectedResponse, $response);
    }

    /**
     * @return array
     */
    public function tuDetailsResponse()
    {

        return array(
            array(
                $this->multiplyCustomerReferenceAndHistory(),
                new TuDetailsResponse(
                    new ExitCode(0, "OK"),
                    "44570818306",
                    "NationalRef #111",
                    null,
                    null,
                    null,
                    new DateTime(2016, 11, 17, 8, 41),
                    new DateTime(2016, 11, 16, 19, 51),
                    "ExpressParcel",
                    "10:00Service",
                    new ArrayCollection(
                        array(
                            new CustomerReference("Customer Reference Type", "23254333"),
                            new CustomerReference("Customer Reference Type 2", "33323254333")
                        )
                    ),
                    20.0,
                    new ArrayCollection(
                        array(
                            new Event(
                                new DateTime(2016, 11, 16, 19, 51),
                                "PL3000",
                                "Skawina",
                                "Poland",
                                "0.0",
                                "The parcel was handed over to GLS.",
                                ""
                            ),
                            new Event(
                                new DateTime(2016, 11, 15, 5, 51),
                                "PL3000",
                                "Skawina",
                                "Poland",
                                "0.0",
                                "The parcel was handed over to GLS.",
                                ""
                            )
                        )
                    ),
                    "Surname"
                )
            ),
            array(
                $this->singleCustomerReferenceAndHistory(),
                new TuDetailsResponse(
                    new ExitCode(0, "OK"),
                    "44570818306",
                    "NationalRef #111",
                    null,
                    null,
                    null,
                    new DateTime(2016, 11, 17, 8, 41),
                    new DateTime(2016, 11, 16, 19, 51),
                    "ExpressParcel",
                    "10:00Service",
                    new ArrayCollection(
                        array(
                            new CustomerReference("Customer Reference Type", "23254333")
                        )
                    ),
                    20.0,
                    new ArrayCollection(
                        array(
                            new Event(
                                new DateTime(2016, 11, 16, 19, 51),
                                "PL3000",
                                "Skawina",
                                "Poland",
                                "0.0",
                                "The parcel was handed over to GLS.",
                                ""
                            )
                        )
                    ),
                    "Surname"
                )
            ),
        );
    }

    private function multiplyCustomerReferenceAndHistory()
    {
        $json = <<<JSON
{
  "ExitCode": {
    "ErrorCode": 0,
    "ErrorDscr": "OK"
  },
  "TuNo": "44570818306",
  "NationalRef": "NationalRef #111",
  "ConsigneeAddress": null,
  "ShipperAddress": null,
  "RequesterAddress": null,
  "CustomerReference": [{
    "ReferenceType": "Customer Reference Type",
    "ReferenceValue": "23254333"
  },{
    "ReferenceType": "Customer Reference Type 2",
    "ReferenceValue": "33323254333"
  }
  ],
  "DeliveryDateTime": {
    "Year": 2016,
    "Month": 11,
    "Day": 17,
    "Hour": 8,
    "Minut": 41
  },
  "PickupDateTime": {
    "Year": 2016,
    "Month": 11,
    "Day": 16,
    "Hour": 19,
    "Minut": 51
  },
  "Product": "ExpressParcel",
  "Services": "10:00Service",
  "TuWeight": 20,
  "History":
    [{
      "Date": {
        "Year": 2016,
        "Month": 11,
        "Day": 16,
        "Hour": 19,
        "Minut": 51
      },
      "LocationCode": "PL3000",
      "LocationName": "Skawina",
      "CountryName": "Poland",
      "Code": "0.0",
      "Desc": "The parcel was handed over to GLS.",
      "ReasonName": ""
    },
    {
      "Date": {
        "Year": 2016,
        "Month": 11,
        "Day": 15,
        "Hour": 5,
        "Minut": 51
      },
      "LocationCode": "PL3000",
      "LocationName": "Skawina",
      "CountryName": "Poland",
      "Code": "0.0",
      "Desc": "The parcel was handed over to GLS.",
      "ReasonName": ""
    }]
  ,
  "Signature": "Surname"
}
JSON;
        return $json;
    }

    private function singleCustomerReferenceAndHistory()
    {
        $json = <<<JSON
{
  "ExitCode": {
    "ErrorCode": 0,
    "ErrorDscr": "OK"
  },
  "TuNo": "44570818306",
  "NationalRef": "NationalRef #111",
  "ConsigneeAddress": null,
  "ShipperAddress": null,
  "RequesterAddress": null,
  "CustomerReference": {
    "ReferenceType": "Customer Reference Type",
    "ReferenceValue": "23254333"
  },
  "DeliveryDateTime": {
    "Year": 2016,
    "Month": 11,
    "Day": 17,
    "Hour": 8,
    "Minut": 41
  },
  "PickupDateTime": {
    "Year": 2016,
    "Month": 11,
    "Day": 16,
    "Hour": 19,
    "Minut": 51
  },
  "Product": "ExpressParcel",
  "Services": "10:00Service",
  "TuWeight": 20,
  "History":{
      "Date": {
        "Year": 2016,
        "Month": 11,
        "Day": 16,
        "Hour": 19,
        "Minut": 51
      },
      "LocationCode": "PL3000",
      "LocationName": "Skawina",
      "CountryName": "Poland",
      "Code": "0.0",
      "Desc": "The parcel was handed over to GLS.",
      "ReasonName": ""
    }
  ,
  "Signature": "Surname"
}
JSON;
        return $json;
    }
}