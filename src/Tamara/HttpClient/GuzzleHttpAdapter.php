<?php

namespace Tamara\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface as GuzzleHttpClient;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Tamara\Exception\RequestException;

class GuzzleHttpAdapter implements ClientInterface
{
    /**
     * @var GuzzleHttpClient
     */
    protected $client;

    /**
     * @var int
     */
    protected $requestTimeout;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(int $requestTimeout, ?LoggerInterface $logger = null)
    {
        $this->client = new Client();
        $this->requestTimeout = $requestTimeout;
        $this->logger = $logger;
    }

    /**
     * @param array<string, string|string[]> $headers
     */
    public function createRequest(
        string $method,
        $uri,
        array $headers = [],
        $body = null,
        $version = '1.1'
    ): RequestInterface {
        return new Request(
            $method,
            $uri,
            $headers,
            $body
        );
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws RequestException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        try {
            return $this->client->send(
                $request,
                [
                    'timeout' => $this->requestTimeout,
                ]
            );
        } catch (\Throwable $exception) {
            if (null !== $this->logger) {
                $this->logger->error($exception->getMessage(), $exception->getTrace());
            }

            $exceptionResponse = null;
            if (method_exists($exception, 'getResponse')) {
                $exceptionResponse = $exception->getResponse();
            }

            throw new RequestException(
                $exception->getMessage(),
                $exception->getCode(),
                $request,
                $exceptionResponse,
                $exception->getPrevious()
            );
        }
    }
}
