<?php

use FintechSystems\WhmcsApi\WhmcsApi;

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$server = [
    'url'            => $_ENV['WHMCS_URL'],
    'api_identifier' => $_ENV['WHMCS_API_IDENTIFIER'],
    'api_secret'     => $_ENV['WHMCS_API_SECRET'],
];

$api = new WhmcsApi($server);

$result = $api->getClients();
