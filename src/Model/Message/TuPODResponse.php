<?php
/**
 * File: TuPODResponse.php
 * Created at: 2014-11-25 06:23
 */
 
namespace Webit\GlsTracking\Model\Message;

use JMS\Serializer\Annotation as JMS;

/**
 * Class TuPODResponse
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */
class TuPODResponse extends AbstractResponse
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("PODFile")
     * @var string
     */
    private $file;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("PODFileName")
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
