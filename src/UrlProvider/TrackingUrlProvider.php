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
     * @param $reference
     * @param $country
     * @param string $language
     * @return string
     */
    public function getStandardTrackingUrl($reference, $country, $language = 'EN')
    {
        $ownerCode = $this->getOwnerCode($country);
        if (! $ownerCode) {
            throw new \InvalidArgumentException(sprintf('Unsupported country "%s"', $country));
        }

        $url = sprintf(
            'http://www.gls-group.eu/276-I-PORTAL-WEB/content/GLS/%s/%s/5004.htm?txtRefNo=%s&txtAction=71000',
            $ownerCode,
            $language,
            $this->filterReferenceNo($reference)
        );

        return $url;
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $reference
     * @param string $language
     * @return string
     */
    public function getEncryptedTrackingUrl($username, $password, $reference, $language = 'EN')
    {
        $reference = $this->filterReferenceNo($reference);

        $params = array();
        $params[] = 'un=' . urlencode($username);
        $params[] = 'rf=' . urlencode($reference);
        $params[] = 'lc=' . urlencode($language);
        $params[] = 'key='. $this->calculateKey($username, $password, $reference, null, null);

        $queryString = implode('&', $params);

        return sprintf('%s%s', self::BASE_URL, $queryString);
    }

    /**
     * @param string $username
     * @param string $password
     * @param $customerReference
     * @param $customerNo
     * @param string $language
     * @return string
     */
    public function getEncryptedCustomerReferenceTrackingUrl($username, $password, $customerReference, $customerNo, $language = 'EN')
    {
        $params = array();
        $params[] = 'un=' . urlencode($username);
        $params[] = 'crf=' . urlencode($customerReference);
        $params[] = 'no=' . urlencode($customerNo);
        $params[] = 'lc=' . urlencode($language);
        $params[] = 'key='. $this->calculateKey($username, $password, null, $customerReference, $customerNo);

        $queryString = implode('&', $params);

        return sprintf('%s%s', self::BASE_URL, $queryString);
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $reference
     * @param string $customerReference
     * @param string $customerNo
     * @return string
     */
    private function calculateKey($username, $password, $reference, $customerReference, $customerNo)
    {
        $str = sprintf('%s%s%s%s%s', $username, $reference, $customerReference, $customerNo, $password);

        return md5($str);
    }

    /**
     * @param string $referenceNo
     * @return string
     */
    private function filterReferenceNo($referenceNo)
    {
        return substr($referenceNo, 0, 11);
    }

    /**
     * @param string $country
     * @return null|string
     */
    private function getOwnerCode($country)
    {
        switch ($country) {
            case 'DE':
                return 'DE03';
            case 'AT':
                return 'ATNU';
            case 'IE':
                return 'IE01';
            case 'BE':
                return 'BE01';
            case 'DK':
                return 'DK01';
            case 'ES':
                return 'ES01';
            case 'PT':
                return 'PT02';
            case 'FR':
                return 'FR01';
            case 'PL':
                return 'PL01';
        }

        return null;
    }
}
