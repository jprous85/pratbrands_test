<?php

declare(strict_types=1);


namespace Src\AEMET\Infrastructure\API;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class HTTPClient
{
    private Client $client;
    private array $headers;

    public function __construct()
    {
        $this->client = new Client();
        $this->headers = ['headers' => ['api_key' => env('API_KEY')]];
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @throws GuzzleException
     */
    public function get($url, $json_response = false): string|array
    {
        $response = $this->client->get($url, $this->headers);
        return $this->getResponse($response, $json_response);
    }

    /**
     * @throws GuzzleException
     */
    public function getCustomUrl($url): ?array
    {
        $response = $this->client->get($url);
        return json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response->getBody()->getContents()), true);
    }

    /**
     * @throws GuzzleException
     */
    public function post($url, $body = [], $json_response = false): array
    {
        $response = $this->client->delete($url, array_merge($this->headers, $body));
        return $this->getResponse($response, $json_response);
    }

    /**
     * @throws GuzzleException
     */
    public function put($url, $body = [], $json_response = false): array
    {
        $response = $this->client->put($url, array_merge($this->headers, $body));
        return $this->getResponse($response, $json_response);
    }

    /**
     * @throws GuzzleException
     */
    public function delete($url, $json_response = false): array
    {
        $response = $this->client->get($url, $this->headers);
        return $this->getResponse($response, $json_response);
    }

    private function getResponse($response, $json_response): string|array
    {
        if ($json_response) {
            return json_decode($response->getBody()->getContents(), true);
        }

        return $response->getBody()->getContents();
    }
}
