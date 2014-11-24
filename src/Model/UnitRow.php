<?php
/**
 * UnitRow.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:02
 */

namespace Webit\GlsTracking\Model;

/**
 * Class UnitRow
 * @package Webit\GlsTracking\Model
 */
class UnitRow
{
    /**
     * @var string
     */
    private $referenceNo;

    /**
     * @var DateTime
     */
    private $initialDateTime;

    /**
     * @var string
     */
    private $eventCodeNo;

    /**
     * @var string
     */
    private $eventReasonNo;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $consigneeName;

    /**
     * @var string
     */
    private $referenceKey;

    /**
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
