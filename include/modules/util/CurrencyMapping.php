<?php

namespace modules\util;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class CurrencyMapping{

    //defining county const
    const USD_COUNTRIES = "USD_COUNTRIES";
    const EURO_COUNTRIES = "EURO_COUNTRIES";
    const GBP_COUNTRIES = "GBP_COUNTRIES";
    const AUD_COUNTRIES = "AUD_COUNTRIES";
    const CAD_COUNTRIES = "CAD_COUNTRIES";

    //defining group array from the Booster plugin.
    const GROUP = "wcj_price_by_country_exchange_rate_countries_group_";

    const USD_GROUP = "1";
    const EURO_GROUP = "2";
    const AUD_GROUP = "3";
    const CAD_GROUP = "4";

    private $USDCountry = array("US", "AO", "BF", "BI", "BJ", "BW", "CD", "CF", "CG", "CI", "CM", "CV", "DJ", "DZ"
    , "EG", "EH", "ER", "ET", "GA", "GH", "GM", "GN",
        "GQ", "GW", "YT", "KE", "KM", "LY", "LR", "LS", "MA",
        "MG", "ML", "MR", "MU", "MW", "MZ", "NA", "NE", "NG",
        "RE", "RW", "SC", "SD", "SH", "SL", "SN", "SO", "ST",
        "SZ", "TD", "TG", "TN", "TZ", "UG", "ZA", "ZM", "ZW",
        "AE", "AF", "AM", "AP", "AZ", "BD", "BH", "BN", "BT",
        "CC", "CY", "CN", "CX", "GE", "HK", "ID", "IL", "IN",
        "IO", "IQ", "IR", "YE", "JO", "JP", "KG", "KH", "KP",
        "KR", "KW", "KZ", "LA", "LB", "LK", "MY", "MM", "MN",
        "MO", "MV", "NP", "OM", "PH", "PK", "PS", "QA", "SA",
        "SG", "SY", "TH", "TJ", "TL", "TM", "TW", "UZ", "VN",
        "AG", "AI", "AN", "AW", "BB", "BL", "BM", "BS", "BZ",
        "CR", "CU", "DM", "DO", "GD", "GL", "GP", "GT", "HN",
        "HT", "JM", "KY", "KN", "LC", "MF", "MQ", "MS", "NI",
        "PA", "PM", "PR", "SV", "TC", "TT", "VC", "VG", "VI",
        "AR", "BO", "BR", "CL", "CO", "EC", "FK", "GF", "GY",
        "GY", "PE", "PY", "SR", "UY", "VE", "RS", "RU", "NO");

    private $EUROCountry = array("AT", "BE", "BG", "HR", "CY", "CZ", "DK", "EE", "FI",
        "FR", "DE", "EL", "HU", "IE", "IT", "LV", "LT", "LU", "MT", "NL", "PL",
        "PT", "RO", "SK", "SI", "ES", "SE");

    private $GBPCountry = array("GB", "IM");

    private $AUDCountry = array("AU", "AU");

    private $CADCountry = array("CA", "CA");

    public function __construct(){

        if (!get_option($this::USD_COUNTRIES)) {

            add_option($this::USD_COUNTRIES, $this->USDCountry);
        }

        if (!get_option($this::EURO_COUNTRIES)) {

            add_option($this::EURO_COUNTRIES, $this->EUROCountry);
        }

        update_option($this::GBP_COUNTRIES, array("GB", "IM"));

        if (!get_option($this::GBP_COUNTRIES)) {

            add_option($this::GBP_COUNTRIES, $this->GBPCountry);
        }

        if (!get_option($this::AUD_COUNTRIES)) {

            add_option($this::AUD_COUNTRIES, $this->AUDCountry);
        }

        if (!get_option($this::CAD_COUNTRIES)) {

            add_option($this::CAD_COUNTRIES, $this->CADCountry);
        }
    }

    //getters and setters
    public function getUSDCountries(){
//        return get_option($this::USD_COUNTRIES);
        return explode(get_option($this::GROUP . $this::USD_GROUP), ",");

    }

    public function setUSDCountries($countries=array()){
        update_option($this::USD_COUNTRIES, $countries);
    }

    public function getEUROCountries(){
//        return get_option($this::EURO_COUNTRIES);
        return explode(get_option($this::GROUP . $this::EURO_GROUP), ",");
//        echo get_option($this::GROUP . $this::EURO_GROUP);
    }

    public function setEUROCountries($countries=array()){
        update_option($this::EURO_COUNTRIES, $countries);
    }

    public function getGBPCountries(){
        return get_option($this::GBP_COUNTRIES);
    }

    public function setGBPCountries($countries=array()){
        update_option($this::GBP_COUNTRIES, $countries);
    }

    public function getAUDCountries(){
//        return get_option($this::AUD_COUNTRIES);
        return explode(get_option($this::GROUP . $this::AUD_GROUP), ",");
//        echo get_option($this::GROUP . $this::EURO_GROUP);
    }

    public function setAUDCountries($countries=array()){
        update_option($this::AUD_COUNTRIES, $countries);
    }

    public function getCADCountries(){
//        return get_option($this::CAD_COUNTRIES);
        return explode(get_option($this::GROUP . $this::CAD_GROUP), ",");
//        echo get_option($this::GROUP . $this::CAD_GROUP);
    }

    public function setCADCountries($countries=array()){
        update_option($this::CAD_COUNTRIES, $countries);
    }
}