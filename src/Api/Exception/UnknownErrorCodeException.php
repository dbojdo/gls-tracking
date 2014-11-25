<?php
/**
 * File: UnknownErrorCodeException.php
 * Created at: 2014-11-25 06:33
 */
 
namespace Webit\GlsTracking\Api\Exception;

/**
 * Class UnknownErrorCodeException
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class UnknownErrorCodeException extends \OutOfBoundsException implements GlsTrackingApiException
{
}
