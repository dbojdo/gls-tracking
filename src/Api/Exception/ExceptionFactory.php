<?php
/**
 * ExceptionFactory.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@dxi.eu>
 * Created on Nov 26, 2014, 09:38
 * Copyright (C) DXI Ltd
 */

namespace Webit\GlsTracking\Api\Exception;

use Webit\SoapApi\Exception\ExceptionFactoryInterface;

/**
 * Class ExceptionFactory
 * @package Webit\GlsTracking\Api\Exception
 */
class ExceptionFactory implements ExceptionFactoryInterface
{
    /**
     * Wraps exception to API's type
     *
     * @param \Exception $e
     * @param string $soapFunction
     * @param $input
     * @return \Exception
     */
    public function createException(\Exception $e, $soapFunction, $input)
    {
        switch (true) {
            case $e instanceof \SoapFault:
                return new GlsApiCommunicationException("SOAP Error: " . $e->faultcode, null, $e);
        }

        return new Exception($e->getMessage(), $e->getCode(), $e);
    }
}
 