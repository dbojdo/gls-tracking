<?php
/**
 * Address.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:06
 */

namespace Webit\GlsTracking\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Address
 * @package Webit\GlsTracking\Model
 */
class Address
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Name1")
     *
     * @var string
     */
    private $name1;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Name2")
     *
     * @var string
     */
    private $name2;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Name3")
     *
     * @var string
     */
    private $name3;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("ContactName")
     *
     * @var string
     */
    private $contactName;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Street1")
     *
     * @var string
     */
    private $street1;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("BlockNo1")
     *
     * @var string
     */
    private $blockNo1;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Street2")
     *
     * @var string
     */
    private $street2;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("BlockNo2")
     *
     * @var string
     */
    private $blockNo2;

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
     * @JMS\SerializedName("Province")
     *
     * @var string
     */
    private $province;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Country")
     *
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
