<?php

namespace CheckProxy\CheckProxy\models;

class UserAgentModel
{

    /**
     * get random user-agent
     *
     * @return string
     */
    public static function getUserAgent(): string
    {

        return self::_list()[rand(0, count(self::_list()))];

    }

    /**
     * Get list of the user-agent
     *
     * @return array
     */
    private static function _list(): array
    {
        return [
            'Mozilla/' . rand(1, 5) . '.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.' . rand(1000, 9000) . ')',
            'Mozilla/' . rand(1, 5) . '.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36\')'
        ];
    }

}