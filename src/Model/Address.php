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
     * Address constructor.
     * @param string $name1
     * @param string $name2
     * @param string $name3
     * @param string $contactName
     * @param string $street1
     * @param string $blockNo1
     * @param string $street2
     * @param string $blockNo2
     * @param string $zipCode
     * @param string $city
     * @param string $province
     * @param string $country
     */
    public function __construct(
        $name1 = null,
        $name2 = null,
        $name3 = null,
        $contactName = null,
        $street1 = null,
        $blockNo1 = null,
        $street2 = null,
        $blockNo2 = null,
        $zipCode = null,
        $city = null,
        $province = null,
        $country = null
    ) {
        $this->name1 = $name1;
        $this->name2 = $name2;
        $this->name3 = $name3;
        $this->contactName = $contactName;
        $this->street1 = $street1;
        $this->blockNo1 = $blockNo1;
        $this->street2 = $street2;
        $this->blockNo2 = $blockNo2;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->province = $province;
        $this->country = $country;
    }


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
