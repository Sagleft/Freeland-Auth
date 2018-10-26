<?php

namespace App;

use GuzzleHttp\Client as HttpClient;

class User
{
    protected $client = null;

    protected $config = [];

    public function __construct($config)
    {
        $this->config = array_merge($this->config, $config);
        $this->client = new HttpClient;
    }

    public function getToken($code) {
        $response = $this->client->post("{$this->config['oauth_url']}/oauth/token", [
            'body' => [
                'grant_type' => 'authorization_code',
                'client_id' => $this->config['client_id'],
                'client_secret' => $this->config['client_secret'],
                'redirect_uri' => $this->config['redirect_url'],
                'code' => $code
            ]
        ]);

        return $this->parseResponse($response);
    }

    public function getUserInfo($token)
    {
        $response = $this->client->get("{$this->config['oauth_url']}/api/user", [
            'headers' => [
                'Authorization' => "Bearer $token",
                'Accept' => "application/json"
            ]
        ]);

        return $this->parseResponse($response);
    }

    public function oauthRedirect()
    {
        $query = http_build_query([
            'client_id' => $this->config['client_id'],
            'redirect_url' => $this->config['redirect_url'],
            'response_type' => 'code',
            'scope' => ''
        ]);
        $this->redirect("{$this->config['oauth_url']}/oauth/authorize?$query");
    }

    protected function parseResponse($response)
    {
        return json_decode((string) $response->getBody(), true);
    }

    public function redirect($url)
    {
        header("Location: $url");
    }
}
