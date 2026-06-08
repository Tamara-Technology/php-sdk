<?php

declare(strict_types=1);

namespace Tamara\Request\Order;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Order\AuthoriseOrderResponse;

class AuthoriseOrderRequestHandler extends AbstractRequestHandler
{
    private const AUTHORISE_ORDER_ENDPOINT = '/orders/%s/authorise';

    public function __invoke(AuthoriseOrderRequest $request)
    {
        $response = $this->httpClient->post(
            sprintf(self::AUTHORISE_ORDER_ENDPOINT, $request->getOrderId()),
            [
                'order_id' => $request->getOrderId(),
            ]
        );

        return new AuthoriseOrderResponse($response);
    }
}
