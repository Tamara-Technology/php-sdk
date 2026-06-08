<?php

declare(strict_types=1);

namespace Tamara\Request\Webhook;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Webhook\UpdateWebhookResponse;

class UpdateWebhookRequestHandler extends AbstractRequestHandler
{
    private const UPDATE_WEBHOOK_ENDPOINT = '/webhooks/%s';

    public function __invoke(UpdateWebhookRequest $request)
    {
        $response = $this->httpClient->put(
            sprintf(self::UPDATE_WEBHOOK_ENDPOINT, $request->getWebhookId()),
            $request->toArray()
        );

        return new UpdateWebhookResponse($response);
    }
}