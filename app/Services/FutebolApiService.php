<?php
namespace App\Services;

use GuzzleHttp\Client;

class FutebolApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.api-futebol.com.br/v1/',
            'headers' => [
                'Authorization' => 'Bearer test_1467e3ff2cef1e8fba46100fa92f7e',
                'Accept' => 'application/json',
            ],
            'verify' => false, // Desabilita a verificação de SSL
        ]);
    }

    public function get($endpoint)
    {
        $response = $this->client->get($endpoint);
        return json_decode($response->getBody(), true);
    }
}
