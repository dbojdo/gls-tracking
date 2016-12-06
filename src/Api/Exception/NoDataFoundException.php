<?php
/**
 * File: NoDataFoundException.php
 * Created at: 2014-11-25 06:27
 */
 
namespace Webit\GlsTracking\Api\Exception;

use Webit\GlsTracking\Model\Message\AbstractResponse;

/**
 * Class NoDataFoundException
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class NoDataFoundException extends \OutOfRangeException implements GlsTrackingApiException
{
    /**
     * @var AbstractResponse
     */
    private $apiResponse;

    public function __construct($message, $code, AbstractResponse $apiResponse, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->apiResponse = $apiResponse;
    }

    /**
     * @return AbstractResponse
     */
    public function getApiResponse()
    {
        return $this->apiResponse;
    }
}
