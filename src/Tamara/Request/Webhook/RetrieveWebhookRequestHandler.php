<?php

declare(strict_types=1);

namespace Tamara\Request\Webhook;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Webhook\RetrieveWebhookResponse;

class RetrieveWebhookRequestHandler extends AbstractRequestHandler
{
    private const RETRIEVE_WEBHOOK_ENDPOINT = '/webhooks/%s';

    public function __invoke(RetrieveWebhookRequest $request)
    {
        $response = $this->httpClient->get(
            sprintf(self::RETRIEVE_WEBHOOK_ENDPOINT, $request->getWebhookId())
        );

        return new RetrieveWebhookResponse($response);
    }
}