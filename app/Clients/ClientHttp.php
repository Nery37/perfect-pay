<?php

declare(strict_types=1);

namespace App\Clients;

use App\Clients\Interfaces\ClientHttpInterface;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException as GuzzleClientException;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;

class ClientHttp implements ClientHttpInterface
{
    private GuzzleClient $guzzleClient;

    public function __construct()
    {
        $this->guzzleClient = new GuzzleClient();
    }

    public function sendGet($path, $query = [], $headers = [], $cached = true): ResponseInterface
    {
        return $this->sendRequest('GET', $path, $query, [], $headers);
    }

    public function sendPost($path, $body = [], $headers = []): ResponseInterface
    {
        return $this->sendRequest('POST', $path, [], $body, $headers);
    }

    public function sendPut($path, $body = [], $headers = []): ResponseInterface
    {
        return $this->sendRequest('PUT', $path, [], $body, $headers);
    }

    public function sendPatch($path, $body = [], $headers = []): ResponseInterface
    {
        return $this->sendRequest('PATCH', $path, [], $body, $headers);
    }

    public function sendDelete($path, $headers = []): ResponseInterface
    {
        return $this->sendRequest('DELETE', $path, [], [], $headers);
    }

    protected function sendRequest(
        $method,
        $path,
        $query = [],
        $body = [],
        $headers = [],
    ): ResponseInterface {
        $config = $this->createRequestConfig($query, $body, $headers);

        try {
            return $this->guzzleClient->request($method, $path, $config);
        } catch (GuzzleClientException $e) {
            Log::error($e->getMessage());
            throw new \Exception($e->getMessage(), 500);
        }
    }

    private function createRequestConfig($query, $body, $headers): array
    {
        $config['headers'] = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ] + $headers;

        if (!empty($query) && is_array($query)) {
            $config['query'] = $query;
        }

        if (!empty($body) && is_array($body)) {
            $config['json'] = $body;
        }

        return $config;
    }

}
