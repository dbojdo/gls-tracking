<?php
/**
 * Address.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:06
 */

namespace Webit\GlsTracking\Model;

/**
 * Class Address
 * @package Webit\GlsTracking\Model
 */
class Address
{
    /**
     * @var string
     */
    private $name1;

    /**
     * @var string
     */
    private $name2;

    /**
     * @var string
     */
    private $name3;

    /**
     * @var string
     */
    private $contactName;

    /**
     * @var string
     */
    private $street1;

    /**
     * @var string
     */
    private $blockNo1;

    /**
     * @var string
     */
    private $street2;

    /**
     * @var string
     */
    private $blockNo2;

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
    private $province;

    /**
     * @var string
     */
    private $country;

    /**
     * @return string
     */
    public function getBlockNo1()
    {
        return $this->blockNo1;
    }

    /**
     * @return string
     */
    public function getBlockNo2()
    {
        return $this->blockNo2;
    }

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
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getName1()
    {
        return $this->name1;
    }

    /**
     * @return string
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * @return string
     */
    public function getName3()
    {
        return $this->name3;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @return string
     */
    public function getStreet1()
    {
        return $this->street1;
    }

    /**
     * @return string
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
}
