<?php
/**
 * File: TuPODResponse.php
 * Created at: 2014-11-25 06:23
 */
 
namespace Webit\GlsTracking\Model\Message;

/**
 * Class TuPODResponse
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class TuPODResponse extends AbstractResponse
{
    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $fileName;

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }
}
