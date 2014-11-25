<?php
/**
 * UserCredentials.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:07
 */

namespace Webit\GlsTracking\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class UserCredentials
 * @package Webit\GlsTracking\Model
 */
class UserCredentials
{
    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("UserName")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $username;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("Password")
     * @JMS\Groups({"input"})
     *
     * @var string
     */
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
}
