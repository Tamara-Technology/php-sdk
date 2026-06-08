<?php

declare(strict_types=1);

namespace Tamara\Request\Order;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Order\GetOrderResponse;

class GetOrderRequestHandler extends AbstractRequestHandler
{
    private const GET_ORDER_URL = '/merchants/orders/%s';

    public function __invoke(GetOrderRequest $request)
    {
        $response = $this->httpClient->get(
            sprintf(self::GET_ORDER_URL, $request->getOrderId())
        );

        return new GetOrderResponse($response);
    }
}
