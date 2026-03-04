<?php

declare(strict_types=1);

namespace Tamara\Request\Webhook;

use Tamara\Model\Webhook;

class UpdateWebhookRequest
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
     * @var array<string, string>|null
     */
    private $headers;

    /**
     * @param array<int, string> $events
     */
    public function __construct(string $webhookId, string $url, array $events)
    {
        $this->webhookId = $webhookId;
        $this->url = $url;
        $this->events = $events;
    }

    public function getWebhookId(): string
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
        return $this->headers ?? [];
    }

    public function addHeaders(string $key, string $value): void
    {
        if ($this->headers === null) {
            $this->headers = [];
        }
        $this->headers[$key] = $value;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            Webhook::WEBHOOK_ID => $this->getWebhookId(),
            Webhook::URL        => $this->getUrl(),
            Webhook::EVENTS     => $this->getEvents(),
            Webhook::HEADERS    => $this->getHeaders(),
        ];
    }
}