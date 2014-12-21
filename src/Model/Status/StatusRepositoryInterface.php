<?php
/**
 * File StatusRepositoryInterface.php
 * Created at: 2014-12-21 21-46
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\GlsTracking\Model\Status;


interface StatusRepositoryInterface
{
    /**
     * @param string $code
     * @return Status
     */
    public function getStatus($code);
}