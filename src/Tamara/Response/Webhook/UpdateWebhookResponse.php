<?php

declare(strict_types=1);

namespace Tamara\Response\Webhook;

use Tamara\Model\Webhook;
use Tamara\Response\ClientResponse;

class UpdateWebhookResponse extends ClientResponse
{
    /**
     * @var string
     */
    private $webhookId;

    /**
     * @var string
     */
    private $url;

    /**
     * @var array<int, string>
     */
    private $events;

    /**
     * @var array<string, string>
     */
    private $headers;

    public function getWebhookId(): ?string
    {
        return $this->webhookId;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array<int, string>
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @return array<string, string>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array<string, mixed> $responseData
     */
    protected function parse(array $responseData): void
    {
        $this->webhookId = $responseData[Webhook::WEBHOOK_ID];
        $this->url = $responseData[Webhook::URL];
        $this->events = $responseData[Webhook::EVENTS];
        $this->headers = $responseData[Webhook::HEADERS];
    }
}