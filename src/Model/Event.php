<?php
/**
 * Event.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 15:56
 */

namespace Webit\GlsTracking\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Event
 * @package Webit\GlsTracking\Model
 */
class Event
{
    /**
     * @JMS\Type("Webit\GlsTracking\Model\DateTime")
     * @JMS\SerializedName("Date")
     *
     * @var DateTime
     */
    private $date;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("LocationCode")
     *
     * @var string
     */
    private $locationCode;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("LocationName")
     *
     * @var string
     */
    private $locationName;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("CountryName")
     *
     * @var string
     */
    private $countryName;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Code")
     *
     * @var string
     */
    private $code;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Desc")
     *
     * @var string
     */
    private $description;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("ReasonName")
     *
     * @var string
     */
    private $reasonName;

    /**
     * Event constructor.
     * @param DateTime $date
     * @param string $locationCode
     * @param string $locationName
     * @param string $countryName
     * @param string $code
     * @param string $description
     * @param string $reasonName
     */
    public function __construct(
        DateTime $date = null,
        $locationCode = null,
        $locationName = null,
        $countryName = null,
        $code = null,
        $description = null,
        $reasonName = null
    ) {
        $this->date = $date;
        $this->locationCode = $locationCode;
        $this->locationName = $locationName;
        $this->countryName = $countryName;
        $this->code = $code;
        $this->description = $description;
        $this->reasonName = $reasonName;
    }


    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getLocationCode()
    {
        return $this->locationCode;
    }

    /**
     * @return string
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * @return string
     */
    public function getReasonName()
    {
        return $this->reasonName;
    }
}
 