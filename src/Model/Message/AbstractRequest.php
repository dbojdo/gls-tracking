<?php
/**
 * File: AbstractRequest.php
 * Created at: 2014-11-25 05:45
 */
 
namespace Webit\GlsTracking\Model\Message;

use Webit\GlsTracking\Model\Parameters;
use Webit\GlsTracking\Model\UserCredentials;
use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractRequest
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
abstract class AbstractRequest
{
    /**
     * @JMS\Type("Webit\GlsTracking\Model\UserCredentials")
     * @JMS\SerializedName("Credentials")
     *
     * @var UserCredentials
     */
    private $credentials;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("RefValue")
     *
     * @var string
     */
    private $refValue;

    /**
     * @JMS\Type("Webit\GlsTracking\Model\Parameters")
     * @JMS\SerializedName("Parameters")
     * @JMS\Groups({"input"})
     *
     * @var Parameters
     */
    private $parameters;

    /**
     * @param string $refValue
     * @param Parameters $parameters
     */
    public function __construct($refValue, Parameters $parameters = null)
    {
        $this->setRefValue($refValue);
        $this->setParameters($parameters);
    }

    /**
     * @return UserCredentials
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @param UserCredentials $credentials
     */
    public function setCredentials(UserCredentials $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * @return Parameters
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param Parameters $parameters
     */
    public function setParameters(Parameters $parameters = null)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getRefValue()
    {
        return $this->refValue;
    }

    /**
     * @param string $refValue
     */
    public function setRefValue($refValue)
    {
        $this->refValue = $refValue;
    }
}
