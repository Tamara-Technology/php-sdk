<?php

declare(strict_types=1);

namespace Tamara\Response\Webhook;

use Tamara\Response\ClientResponse;

class RemoveWebhookResponse extends ClientResponse
{
    /**
     * @param array<string, mixed> $responseData
     */
    protected function parse(array $responseData): void
    {
    }
}