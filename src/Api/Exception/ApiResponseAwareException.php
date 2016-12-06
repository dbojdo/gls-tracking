<?php
/**
 * ApiResponseAwareException.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@8x8.com>
 * Created on 06/12/2016 14:55
 * Copyright (C) 8x8, Inc.
 */

namespace Webit\GlsTracking\Api\Exception;

use Webit\GlsTracking\Model\Message\AbstractResponse;

interface ApiResponseAwareException
{
    /**
     * @return AbstractResponse
     */
    public function getApiResponse();
}
