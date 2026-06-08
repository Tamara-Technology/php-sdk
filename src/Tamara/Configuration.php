<?php

namespace Tamara;

use Psr\Log\LoggerInterface;
use Tamara\HttpClient\AdapterFactory;
use Tamara\HttpClient\ClientInterface;
use Tamara\HttpClient\HttpClient;

class Configuration
{
    protected string $apiUrl;

    protected string $apiToken;

    /** @var int in seconds */
    protected int $apiRequestTimeout = 120;

    protected ?ClientInterface $transport = null;

    protected ?LoggerInterface $logger = null;

    /**
     * @return Configuration
     */
    public static function create(
        string $apiUrl,
        string $apiToken,
        ?int $apiRequestTimeout = null,
        ?LoggerInterface $logger = null,
        ?ClientInterface $transport = null
    ): Configuration {
        return new self($apiUrl, $apiToken, $apiRequestTimeout, $logger, $transport);
    }

    public function __construct(
        string $apiUrl,
        string $apiToken,
        ?int $apiRequestTimeout = null,
        ?LoggerInterface $logger = null,
        ?ClientInterface $transport = null
    ) {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;

        if (null !== $apiRequestTimeout) {
            $this->apiRequestTimeout = $apiRequestTimeout;
        }

        $this->logger = $logger;
        $this->transport = $transport;
    }

    public function createHttpClient(): HttpClient
    {
        $transport = $this->transport !== null ? $this->transport : $this->createDefaultTransport();

        return new HttpClient(
            $this->getApiUrl(),
            $this->getApiToken(),
            $transport
        );
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->apiToken;
    }

    /**
     * @return int
     */
    public function getApiRequestTimeout(): int
    {
        return $this->apiRequestTimeout;
    }

    public function getLogger(): ?LoggerInterface
    {
        return $this->logger;
    }

    protected function createDefaultTransport(): ClientInterface
    {
        return AdapterFactory::create($this->getApiRequestTimeout(), $this->getLogger());
    }
}
