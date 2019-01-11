<?php

namespace Chargebee\Chargebee;

class ChargeBee_Environment
{
    const API_VERSION = 'v2';
    public static $scheme = 'https';
    public static $chargebeeDomain;

    public static $connectTimeout = 50;
    public static $timeout = 100;

    public static $timeMachineWaitInSecs = 3;
    public static $exportWaitInSecs = 3;
    private $apiKey;
    private $site;
    private $apiEndPoint;

    private static $default_env;

    public function __construct($site, $apiKey)
    {
        $this->site = $site;
        $this->apiKey = $apiKey;
        if (null == ChargeBee_Environment::$chargebeeDomain) {
            $this->apiEndPoint = "https://${site}.chargebee.com/api/".ChargeBee_Environment::API_VERSION;
        } else {
            $this->apiEndPoint = ChargeBee_Environment::$scheme."://${site}.".ChargeBee_Environment::$chargebeeDomain.'/api/'.ChargeBee_Environment::API_VERSION;
        }
    }

    public static function configure($site, $apiKey)
    {
        ChargeBee_Environment::$default_env = new ChargeBee_Environment($site, $apiKey);
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function getApiEndpoint()
    {
        return $this->apiEndPoint;
    }

    public static function defaultEnv()
    {
        return ChargeBee_Environment::$default_env;
    }

    public function apiUrl($url)
    {
        return $this->apiEndPoint.$url;
    }
}
