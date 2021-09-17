<?php

namespace FintechSystems\WhmcsApi;

use FintechSystems\WhmcsApi\Contracts\BillingProvider;

class WhmcsApi implements BillingProvider
{
    private bool $debug;

    private string $mode;

    private string $url;
    private string $api_identifier;
    private string $api_secret;

    public function __construct($client, $mode = '')
    {
        ray($client);

        $this->mode = $mode;

        if ($this->mode == 'debug') {
            $this->debug = true;
        }

        $this->url = $client['url'];
        $this->api_identifier = $client['api_identifier'];
        $this->api_secret = $client['api_secret'];
    }

    public function changePackage()
    {
        // TODO: Implement changePackage() method.
    }

    public function getClients($limit = 100)
    {
        $action = 'GetClients';
        $data = ['limitnum' => $limit];

        return $this->call($action, $data);
    }

    private function call($action, $data = null)
    {
        $postfields = [
            'identifier'   => $this->api_identifier,
            'secret'       => $this->api_secret,
            'action'       => $action,
            'responsetype' => 'json',
        ];
        if ($data) {
            $postfields = array_merge($data, $postfields);
        }

        ray($postfields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url.'includes/api.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Avoid Unable to connect: 60 - SSL certificate problem: self signed certificate
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfields));
        $response = curl_exec($ch);
        if (curl_error($ch)) {
            $message = 'Unable to connect: '.curl_errno($ch).' - '.curl_error($ch);
            ray($message);
            exit($message);
        }
        curl_close($ch);

        $jsonData = json_decode($response, true);

        ray($jsonData);

        if ($jsonData['result'] == 'error') {
            throw new \Exception("A CURL request in call() WHMCS API failed with: {$jsonData['message']}");
        }

        return $jsonData;
    }
}
