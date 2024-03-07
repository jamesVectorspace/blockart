<?php

namespace Modules\GeoLocale\Services;

use Modules\GeoLocale\Entities\{
    City, Continent, Country, Division
};

/**
 * GeoLocale
 */
class GeoLocale
{
    /**
     * Continents
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function Continents()
    {
        return Continent::orderBy('name', 'asc')->get();
    }

    /**
     * Continents
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function Countries()
    {
        return Country::orderBy('name', 'asc')->get();
    }

    /**
     * Get Continent By Code
     *
     * @param string $code
     * @return Model
     */
    public static function getContinentByCode($code)
    {
        return Continent::getByCode($code);
    }

    /**
     * Get Country By Code
     *
     * @param string $code
     * @return Model
     */
    public static function getCountryByCode($code)
    {
        return Country::getByCode($code);
    }

    /**
     * Get By Code
     *
     * @param string $code
     * @return Model
     */
    public static function getByCode($code)
    {
        $code = strtolower($code);
        if (strpos($code, '-')) {
            list($country_code, $code) = explode('-', $code);
            $country = self::getCountryByCode($country_code);
        } else {
            return self::getCountryByCode($code);
        }
        if ($country->has_division) {
            return Division::where([
                ['country_id', $country->id],
                ['code', $code],
            ])->first();
        }
        return City::where([
                ['country_id', $country->id],
                ['code', $code],
            ])->first();

        throw new \Modules\GeoLocale\Exceptions\InvalidCodeException("Code is invalid");
    }
}
