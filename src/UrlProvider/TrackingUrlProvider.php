<?php
/**
 * TrackingUrlProvider.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created on Nov 24, 2014, 16:13
 */

namespace Webit\GlsTracking\UrlProvider;

/**
 * Class TrackingUrlProvider
 * @package Webit\GlsTracking\UrlProvider
 */
class TrackingUrlProvider
{
    const BASE_URL = 'http://www.gls-group.eu/276-I-PORTAL-WEB/dLink.jsp?';

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getTrackingUrl($reference, $language = 'EN')
    {
        // or just: https://gls-group.eu/EU/en/parcel-tracking?match=$reference

        $params = array();
        $params[] = 'un=' . urlencode($this->username);
        $params[] = 'rf=' . urlencode($reference);
        $params[] = 'lc=' . urlencode($language);
        $params[] = 'key='. $this->calculateKey($reference, null, null);

        $queryString = implode('&', $params);

        return sprintf('%s%s', self::BASE_URL, $queryString);
    }

    public function getCustomerReferenceTrackingUrl($customerReference, $customerNo, $languaue = 'EN')
    {
        $params = array();
        $params[] = 'un=' . urlencode($this->username);
        $params[] = 'crf=' . urlencode($customerReference);
        $params[] = 'no=' . urlencode($customerNo);
        $params[] = 'key='. $this->calculateKey(null, $customerReference, $customerNo);

        $queryString = implode('&', $params);

        return sprintf('%s%s', self::BASE_URL, $queryString);
    }

    /**
     * @param string $reference
     * @param string $customerReference
     * @param string $customerNo
     * @return string
     */
    private function calculateKey($reference, $customerReference, $customerNo)
    {
        $str = sprintf('%s%s%s%s%s', $this->username, $reference, $customerReference, $customerNo, $this->password);

        return md5($str);
    }
}
