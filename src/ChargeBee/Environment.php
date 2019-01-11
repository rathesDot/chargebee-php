<?php

namespace Chargebee\Chargebee;

class Environment
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
        if (null == Environment::$chargebeeDomain) {
            $this->apiEndPoint = "https://${site}.chargebee.com/api/".Environment::API_VERSION;
        } else {
            $this->apiEndPoint = Environment::$scheme."://${site}.".Environment::$chargebeeDomain.'/api/'.Environment::API_VERSION;
        }
    }

    public static function configure($site, $apiKey)
    {
        Environment::$default_env = new Environment($site, $apiKey);
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
        return Environment::$default_env;
    }

    public function apiUrl($url)
    {
        return $this->apiEndPoint.$url;
    }
}
