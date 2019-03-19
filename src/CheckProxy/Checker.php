<?php

namespace CheckProxy;

use CheckProxy\models\UserAgentModel;

class Checker
{

    /**
     * check proxy
     *
     * @param string $proxy
     * @param string $url
     * @return bool
     */
    public static function validate(string $proxy, string $url): bool
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_USERAGENT, UserAgentModel::getUserAgent());

        curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com/');

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        curl_setopt($ch, CURLOPT_TIMEOUT, 3);

        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);

        curl_setopt($ch, CURLOPT_PROXY, $proxy);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_HEADER, 1);

        curl_exec($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return ($httpcode >= 200 && $httpcode < 300) ? true : false;
    }

}