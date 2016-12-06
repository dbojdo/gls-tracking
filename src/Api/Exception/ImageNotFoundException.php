<?php
/**
 * ImageNotFoundException.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@8x8.com>
 * Created on 06/12/2016 14:46
 * Copyright (C) 8x8, Inc.
 */

namespace Webit\GlsTracking\Api\Exception;

use Exception;
use Webit\GlsTracking\Model\Message\AbstractResponse;

class ImageNotFoundException extends \OutOfRangeException implements GlsTrackingApiException, ApiResponseAwareException
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
