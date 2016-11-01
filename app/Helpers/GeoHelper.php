<?php

namespace App\Helpers;

class GeoHelper
{
    /**
     * Gets geo location info from 'ipinfo.io' and converts response to array
     *
     * @return array Array with geo location of current user
     */
    public static function getGeoData()
    {
        return json_decode(file_get_contents("http://ipinfo.io/geo"));
    }
}