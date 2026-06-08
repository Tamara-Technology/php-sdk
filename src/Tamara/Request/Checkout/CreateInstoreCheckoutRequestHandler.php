<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Checkout\CreateInstoreCheckoutResponse;

class CreateInstoreCheckoutRequestHandler extends AbstractRequestHandler
{
    private const INSTORE_CHECKOUT_ENDPOINT = '/checkout/in-store-session';

    public function __invoke(CreateInstoreCheckoutRequest $request)
    {
        $response = $this->httpClient->post(
            self::INSTORE_CHECKOUT_ENDPOINT,
            $request->getOrder()->toArray()
        );

        return new CreateInstoreCheckoutResponse($response);
    }
}
