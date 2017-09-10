<?php

namespace Infotech\GetResponse;

use Infotech\GetResponse\traits;

/**
 * GetResponse API v3 client library
 *
 * @author Pawel Maslak <pawel.maslak@getresponse.com>
 * @author Grzegorz Struczynski <grzegorz.struczynski@implix.com>
 * @author Vsevolod Trufanov <vtrufanov90@gmail.com>
 *
 * @see http://apidocs.getresponse.com/en/v3/resources
 * @see https://github.com/GetResponse/getresponse-api-php
 */
class GetResponse
{
    use traits\Base, 
        traits\Campaign, 
        traits\Newsletter, 
        traits\Contact, 
        traits\Account,
        traits\SearchContact,
        traits\CustomField, 
        traits\Webform, 
        traits\Form;

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_DELETE = 'DELETE';
    
    private $api_key;
    private $api_url = 'https://api.getresponse.com/v3';
    private $timeout = 8;
    
    public $http_status;

    /**
     * X-Domain header value if empty header will be not provided
     * @var string|null
     */
    private $enterprise_domain = null;

    /**
     * X-APP-ID header value if empty header will be not provided
     * @var string|null
     */
    private $app_id = null;

    /**
     * Set api key and optionally API endpoint
     * @param      $api_key
     * @param null $api_url
     */
    public function __construct($api_key, $api_url = null)
    {
        $this->api_key = $api_key;

        if (!empty($api_url)) {
            $this->api_url = $api_url;
        }
    }

    /**
     * Curl run request
     *
     * @param null $api_method
     * @param string $http_method
     * @param array $params
     * @return mixed
     * @throws Exception
     */
    private function call($api_method = null, $http_method = self::METHOD_GET, $params = [])
    {
        if (empty($api_method)) {
            return (object) [
                'httpStatus'    => '400',
                'code'          => '1010',
                'codeDescription'   => 'Error in external resources',
                'message'       => 'Invalid api method',
            ];
        }

        $params = json_encode($params);
        $url = $this->api_url . '/' . $api_method;

        $options = [
            CURLOPT_URL         => $url,
            CURLOPT_ENCODING    => 'gzip,deflate',
            CURLOPT_FRESH_CONNECT   => 1,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_TIMEOUT     => $this->timeout,
            CURLOPT_HEADER      => false,
            CURLOPT_USERAGENT   => 'PHP GetResponse client 0.0.5',
            CURLOPT_HTTPHEADER  => ['X-Auth-Token: api-key ' . $this->api_key, 'Content-Type: application/json']
        ];

        if (!empty($this->enterprise_domain)) {
            $options[CURLOPT_HTTPHEADER][] = 'X-Domain: ' . $this->enterprise_domain;
        }

        if (!empty($this->app_id)) {
            $options[CURLOPT_HTTPHEADER][] = 'X-APP-ID: ' . $this->app_id;
        }

        if ($http_method == self::METHOD_POST) {
            $options[CURLOPT_POST] = 1;
            $options[CURLOPT_POSTFIELDS] = $params;
        } else if ($http_method == self::METHOD_DELETE) {
            $options[CURLOPT_CUSTOMREQUEST] = self::METHOD_DELETE;
        }

        $curl = curl_init();
        curl_setopt_array($curl, $options);

        $response = json_decode(curl_exec($curl));

        $this->http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);
        return (object) $response;
    }

}
