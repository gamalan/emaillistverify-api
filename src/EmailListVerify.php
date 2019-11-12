<?php

namespace Gamalan\EmailListVerify;

class EmailListVerify
{
    protected $api_key, $timeout;

    /**
     * Base endpoint
     * @var string
     */
    protected $base_url = "https://apps.emaillistverify.com/api/";

    /**
     * EmailListVerify constructor.
     * @param $api_key
     * @param int $timeout
     */
    public function __construct($api_key, $timeout = 15)
    {
        $this->api_key = $api_key;
        $this->timeout = $timeout;
    }

    public function verifyEmail($email)
    {
        $parameter = array(
            'secret' => $this->api_key,
            'email' => $email,
            'timeout' => $this->timeout
        );
        $http_code = null;
        $response = $this->curl_get($this->base_url . 'verifyEmail', $parameter, $httpcode);
        if ($response == false || $httpcode != 200) {
            throw new APIError(get_class() . ": request failed with HTTP code: {$httpcode}.");
        } else if ($response == SingleResult::VALIDATION_MISSING_PARAMETER) {
            throw new APIError('There are no validations remaining to complete this attempt.');
        } else {
            return new SingleResult($email, $response);
        }
    }

    /**
     * Perform a Curl GET request. Returns data event if errors occurs.
     * Pass $httpcode to read response's HTTP code.
     * @param string $URL
     * @param array $fields
     * @param int $httpcode
     * @return string|false
     */
    protected function curl_get($URL, $fields, & $httpcode = null)
    {
        $fields_string = http_build_query($fields);
        if (stripos($URL, '?') > - 1) {
            $fields_string = '&' . $fields_string;
        } else {
            $fields_string = '?' . $fields_string;
        }
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL . $fields_string);
        // common setup
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        $contents = curl_exec($c);
        $httpcode = curl_getinfo($c, CURLINFO_HTTP_CODE);
        curl_close($c);
        if ($contents) {
            return $contents;
        } else {
            return false;
        }
    }
}
