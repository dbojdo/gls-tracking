<?php
/**
 * UnitRow.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:02
 */

namespace Webit\GlsTracking\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class UnitRow
 * @package Webit\GlsTracking\Model
 */
class UnitRow
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("RefNo")
     *
     * @var string
     */
    private $referenceNo;

    /**
     * @JMS\Type("Webit\GlsTracking\Model\DateTime")
     * @JMS\SerializedName("InitialDateTime")
     *
     * @var DateTime
     */
    private $initialDateTime;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("EvtCodeNo")
     *
     * @var string
     */
    private $eventCodeNo;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("EvtReasonNo")
     *
     * @var string
     */
    private $eventReasonNo;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("CountryCode")
     *
     * @var string
     */
    private $countryCode;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("ZipCode")
     *
     * @var string
     */
    private $zipCode;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("City")
     *
     * @var string
     */
    private $city;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("ConsigneeName")
     *
     * @var string
     */
    private $consigneeName;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("ReferenceKey")
     *
     * @var string
     */
    private $referenceKey;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("CurrentStatus")
     *
     * @var string
     */
    private $currentStatus;

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getConsigneeName()
    {
        return $this->consigneeName;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function getCurrentStatus()
    {
        return $this->currentStatus;
    }

    /**
     * @return string
     */
    public function getEventCodeNo()
    {
        return $this->eventCodeNo;
    }

    /**
     * @return string
     */
    public function getEventReasonNo()
    {
        return $this->eventReasonNo;
    }

    /**
     * @return DateTime
     */
    public function getInitialDateTime()
    {
        return $this->initialDateTime;
    }

    /**
     * @return string
     */
    public function getReferenceKey()
    {
        return $this->referenceKey;
    }

    /**
     * @return string
     */
    public function getReferenceNo()
    {
        return $this->referenceNo;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
}
