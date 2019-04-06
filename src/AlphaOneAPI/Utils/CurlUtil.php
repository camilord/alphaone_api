<?php
/**
 * ----------------------------------------------------
 * Created by: PhpStorm.
 * Written by: Camilo Lozano III (Camilo3rd)
 *             www.camilord.com
 *             me@camilord.com
 * Date: 6/04/2019
 * Time: 6:03 PM
 * ----------------------------------------------------
 */

namespace camilord\AlphaOneAPI\Utils;

/**
 * Class CurlUtil
 * @package camilord\AlphaOneAPI\Utils
 */
class CurlUtil
{
    /**
     * @param $url
     * @param null|array $post_data
     * @param bool $str
     * @param int $headers
     * @return mixed
     */
    public static function post($url, $post_data = null, $str = false, $headers = null) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!is_null($headers)) {
            curl_setopt($curl, CURLOPT_HEADER, TRUE);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        } else {
            curl_setopt($curl, CURLOPT_HEADER, FALSE);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, $url); # this is where you are requesting POST-method form results (working with secure connection using cookies after auth)
        curl_setopt($curl, CURLOPT_POST, true);
        if (is_array($post_data) && count($post_data) > 0) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data); # form params that'll be used to get form results
        } else {
            curl_setopt($curl, CURLOPT_POSTFIELDS, array());
        }
        $serverResponse = curl_exec($curl);
        curl_close ($curl);

        if (!is_null($headers)) {
            $tmp = explode("Content-Type: application/json", $serverResponse);
            $headerResponse = trim(@$tmp[0] . "\nContent-Type: application/json");
            $serverResponse = trim(@$tmp[1]);
        }

        if ($str) {
            return $serverResponse;
        } else {
            return json_decode($serverResponse, true);
        }
    }

    /**
     * @param $url
     * @param bool $str
     * @param int|array $headers
     * @return mixed
     */
    public static function get($url, $str = false, $headers = null) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!is_null($headers)) {
            curl_setopt($curl, CURLOPT_HEADER, TRUE);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        } else {
            curl_setopt($curl, CURLOPT_HEADER, FALSE);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, $url); # this is where you are requesting POST-method form results (working with secure connection using cookies after auth)
        curl_setopt($curl, CURLOPT_POST, false);
        $serverResponse = curl_exec($curl);
        curl_close ($curl);

        if (!is_null($headers)) {
            $tmp = explode("Content-Type: application/json", $serverResponse);
            $headerResponse = trim(@$tmp[0] . "\nContent-Type: application/json");
            $serverResponse = trim(@$tmp[1]);
        }

        if ($str) {
            return $serverResponse;
        } else {
            return json_decode($serverResponse, true);
        }
    }
}