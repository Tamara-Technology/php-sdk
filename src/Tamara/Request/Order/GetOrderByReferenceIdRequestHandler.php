<?php

declare(strict_types=1);

namespace Tamara\Request\Order;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Order\GetOrderByReferenceIdResponse;

class GetOrderByReferenceIdRequestHandler extends AbstractRequestHandler
{
    private const GET_ORDER_BY_REFERENCE_ID_URL = '/merchants/orders/reference-id/%s';

    public function __invoke(GetOrderByReferenceIdRequest $request)
    {
        $response = $this->httpClient->get(
            sprintf(self::GET_ORDER_BY_REFERENCE_ID_URL, $request->getReferenceId())
        );

        return new GetOrderByReferenceIdResponse($response);
    }
}