<?php
/**
 * File: TuDetailsResponse.php
 * Created at: 2014-11-25 05:04
 */
 
namespace Webit\GlsTracking\Model\Message;

use JMS\Serializer\Annotation as JMS;
use Doctrine\Common\Collections\ArrayCollection;
use Webit\GlsTracking\Model\Address;
use Webit\GlsTracking\Model\CustomerReference;
use Webit\GlsTracking\Model\DateTime;

/**
 * Class TuDetailsResponse
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class TuDetailsResponse extends AbstractResponse
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("TuNo")
     *
     * @var string
     */
    private $tuNo;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("NationalRef")
     *
     * @var string
     */
    private $nationalRef;

    /**
     * @JMS\Type("Webit\GlsTracking\Model\Address")
     * @JMS\SerializedName("ConsigneeAddress")
     *
     * @var Address
     */
    private $consigneeAddress;

    /**
     * @JMS\Type("Webit\GlsTracking\Model\Address")
     * @JMS\SerializedName("ShipperAddress")
     *
     * @var Address
     */
    private $shipperAddress;

    /**
     * @JMS\Type("Webit\GlsTracking\Model\Address")
     * @JMS\SerializedName("RequesterAddress")
     *
     * @var Address
     */
    private $requesterAddress;

    /**
     * @JMS\Type("Webit\GlsTracking\Model\DateTime")
     * @JMS\SerializedName("DeliveryDateTime")
     *
     * @var DateTime
     */
    private $deliveryDateTime;

    /**
     * @JMS\Type("Webit\GlsTracking\Model\DateTime")
     * @JMS\SerializedName("PickupDateTime")
     *
     * @var DateTime
     */
    private $pickupDateTime;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Product")
     *
     * @var string
     */
    private $product;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Services")
     *
     * @var ArrayCollection
     */
    private $services;

    /**
     * @JMS\Type("ArrayCollection<Webit\GlsTracking\Model\CustomerReference>")
     * @JMS\SerializedName("CustomerReference")
     *
     * @var ArrayCollection
     */
    private $customerReference;

    /**
     * @JMS\Type("double")
     * @JMS\SerializedName("TuWeight")
     *
     * @var float
     */
    private $tuWeight;

    /**
     * @JMS\Type("ArrayCollection<Webit\GlsTracking\Model\Event>")
     * @JMS\SerializedName("History")
     *
     * @var ArrayCollection
     */
    private $history;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Signature")
     *
     * @var string
     */
    private $signature;

    /**
     * @return Address
     */
    public function getConsigneeAddress()
    {
        return $this->consigneeAddress;
    }

    /**
     * @return ArrayCollection
     */
    public function getCustomerReference()
    {
        return $this->customerReference;
    }

    /**
     * @return DateTime
     */
    public function getDeliveryDateTime()
    {
        return $this->deliveryDateTime;
    }

    /**
     * @return ArrayCollection
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * @return mixed
     */
    public function getNationalRef()
    {
        return $this->nationalRef;
    }

    /**
     * @return DateTime
     */
    public function getPickupDateTime()
    {
        return $this->pickupDateTime;
    }

    /**
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @return Address
     */
    public function getRequesterAddress()
    {
        return $this->requesterAddress;
    }

    /**
     * @return ArrayCollection
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @return Address
     */
    public function getShipperAddress()
    {
        return $this->shipperAddress;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @return string
     */
    public function getTuNo()
    {
        return $this->tuNo;
    }

    /**
     * @return float
     */
    public function getTuWeight()
    {
        return $this->tuWeight;
    }
}
