<?php
/**
 * TrackingApi.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 15:47
 */

namespace Webit\GlsTracking\Api;

/**
 * Class TrackingApi
 * @package Webit\GlsTracking\Api
 */
class TrackingApi
{
    /**
     * @var \SoapClient
     */
    private $soapClient;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    function __construct(\SoapClient $soapClient, $username, $password)
    {
        $this->password = $password;
        $this->soapClient = $soapClient;
        $this->username = $username;
    }

    /**
     * @param $reference
     * @param string $language
     */
    public function getParcelDetails($reference, $language = 'EN')
    {
        //
    }

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     * @param null $reference
     * @param null $customerReference
     * @param string $language
     */
    public function getParcelList(\DateTime $from, \DateTime $to, $reference = null, $customerReference = null, $language = 'EN')
    {
        //
    }

    public function getProofOfDelivery($reference, $language = 'EN')
    {

    }
}
