<?php

declare(strict_types=1);

namespace App\Clients\Interfaces;

use Psr\Http\Message\ResponseInterface;

interface ClientHttpInterface
{
    public function sendGet($path, $query = [], $headers = []): ResponseInterface;

    public function sendPost($path, $body = [], $headers = []): ResponseInterface;

    public function sendPut($path, $body = [], $headers = []): ResponseInterface;

    public function sendPatch($path, $body = [], $headers = []): ResponseInterface;

    public function sendDelete($path, $headers = []): ResponseInterface;
}
