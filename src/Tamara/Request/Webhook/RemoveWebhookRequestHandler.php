<?php

declare(strict_types=1);

namespace Tamara\Request\Webhook;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\ClientResponse;
use Tamara\Response\Webhook\RemoveWebhookResponse;

class RemoveWebhookRequestHandler extends AbstractRequestHandler
{
    private const DELETE_WEBHOOK_ENDPOINT = '/webhooks/%s';

    public function __invoke(RemoveWebhookRequest $request)
    {
        $response = $this->httpClient->delete(
            sprintf(self::DELETE_WEBHOOK_ENDPOINT, $request->getWebhookId())
        );

        return new RemoveWebhookResponse($response);
    }
}