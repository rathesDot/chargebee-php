<?php

namespace Chargebee\Chargebee\Models;

use Chargebee\Chargebee\Model;
use Chargebee\Chargebee\Request;
use Chargebee\Chargebee\Util;

class ChargeBee_TimeMachine extends Model
{
    protected $allowed = ['name', 'timeTravelStatus', 'genesisTime', 'destinationTime', 'failureCode', 'failureReason',
        'errorJson', ];

    public function waitForTimeTravelCompletion($env = null)
    {
        $count = 0;
        $tm = $this;
        while ('in_progress' == $this->timeTravelStatus) {
            if ($count++ > 30) {
                throw new RuntimeException('The time travel is taking too much time');
            }
            sleep(ChargeBee_Environment::$timeMachineWaitInSecs);
            $this->_values = ChargeBee_TimeMachine::retrieve($this->name, $env)->timeMachine()->getValues();
            $this->_load();
        }
        if ('failed' == $this->timeTravelStatus) {
            $errorJSON = json_decode($this->errorJson, true);
            $httpCode = $errorJSON['http_code'];

            throw new ChargeBee_OperationFailedException($httpCode, $errorJSON);
        }
        if ('in_progress' != $this->timeTravelStatus
           && 'succeeded' != $this->timeTravelStatus
           && 'failed' != $this->timeTravelStatus) {
            throw new RuntimeException('Time travel status is in wrong state '.$this->timeTravelStatus);
        }

        return $this;
    }

    // OPERATIONS
    //-----------

    public static function retrieve($id, $env = null, $headers = [])
    {
        return Request::send(Request::GET, Util::encodeURIPath('time_machines', $id), [], $env, $headers);
    }

    public static function startAfresh($id, $params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('time_machines', $id, 'start_afresh'), $params, $env, $headers);
    }

    public static function travelForward($id, $params = [], $env = null, $headers = [])
    {
        return Request::send(Request::POST, Util::encodeURIPath('time_machines', $id, 'travel_forward'), $params, $env, $headers);
    }
}
