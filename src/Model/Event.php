<?php
/**
 * Event.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 15:56
 */

namespace Webit\GlsTracking\Model;

/**
 * Class Event
 * @package Webit\GlsTracking\Model
 */
class Event
{
    /**
     * @var DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $locationCode;

    /**
     * @var string
     */
    private $locationName;

    /**
     * @var string
     */
    private $countryName;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $reasonName;

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
 