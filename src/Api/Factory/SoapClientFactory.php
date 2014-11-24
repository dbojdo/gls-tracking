<?php
/**
 * SoapClientFactory.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 15:46
 */

namespace Webit\GlsTracking\Api\Factory;

/**
 * Class SoapClientFactory
 * @package Webit\GlsTracking\Api\Factory
 */
class SoapClientFactory
{
    /**
     * @param string $wsdl
     * @param array $options
     * @return \SoapClient
     */
    public function createSoapClient($wsdl, array $options = array())
    {
        return new \SoapClient($wsdl, $options);
    }
}
 