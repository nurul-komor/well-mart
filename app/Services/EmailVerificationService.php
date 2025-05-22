<?php

namespace App\Services;

use GuzzleHttp\Client;

class EmailVerificationService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = '6d1c649a-d29d36e8'; // Replace with your actual API key
    }

    public function verifyEmail($email)
    {
        $response = $this->client->get('https://sandboxe293aa06c8694860a512e1fc06e57b72.mailgun.org/verify', [
            'query' => [
                'email' => $email,
                'api_key' => $this->apiKey,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return $data['valid'];
    }
}