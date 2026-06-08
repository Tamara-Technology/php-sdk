<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Checkout\GetPaymentTypesResponse;

class GetPaymentTypesRequestHandler extends AbstractRequestHandler
{
    private const GET_PAYMENT_TYPES_ENDPOINT = '/checkout/payment-types';

    public function __invoke(GetPaymentTypesRequest $request)
    {
        $data = ['country' => $request->getCountryCode()];
        if (!empty($request->getCurrency())) {
            $data['currency'] = $request->getCurrency();
        }

        $response = $this->httpClient->get(
            self::GET_PAYMENT_TYPES_ENDPOINT,
            $data
        );

        return new GetPaymentTypesResponse($response);
    }
}
