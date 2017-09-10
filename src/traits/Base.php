<?php

namespace Infotech\GetResponse\traits;

trait Base
{
    
    private $errors = [
        1 => 'Internal error',
        1000 => 'General error of validation process',
        1001 => 'Resource that is related to given resource cannot be found',
        1002 => 'Resource state forbids that kind of action',
        1003 => 'Parameter has wrong format',
        1004 => 'Wrong number of values for multivalues parameter (hash, table)',
        1005 => 'Parameter has empty value',
        1006 => 'Parameter has wrong type',
        1007 => 'Parameter value has incorrect length',
        1008 => 'There is another resource with the same value of unique property',
        1009 => 'Resource you tried to manipulate is used somewhere and this manipulation is forbidden',
        1010 => 'Error in external resources',
        1011 => 'Message is already in "sending" mode, you cannot change its properties',
        1012 => 'Error during parsing message content',
        1013 => 'Resource with given ID cannot be found',
        1014 => 'Problem during authentication process',
        1015 => 'Too many request to API, quota reached',
        1016 => 'Too many request to API or suspected behaviour, API was temporarily blocked, please wait',
        1017 => 'Suspected behaviour, API was permanently blocked, please contact with our support',
        1018 => 'Your IP was blocked',
        1021 => 'There is something wrong with your request headers',
    ];
    
    /**
     * We can modify internal settings
     * @param $key
     * @param $value
     */
    public function __set($key, $value)
    {
        $this->{$key} = $value;
    }
    
    /**
     * @param array $params
     *
     * @return string
     */
    private function setParams($params = [])
    {
        $result = [];
        if (is_array($params)) {
            foreach ($params as $key => $value) {
                $result[$key] = $value;
            }
        }
        return http_build_query($result);
    }
    
    public function getErrorByCode($code)
    {
        return $this->errors[$code]??'Unknown error';
    }
}