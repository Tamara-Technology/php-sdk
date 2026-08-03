<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Checkout\PreCheckoutEligibilityResponse;

class PreCheckoutEligibilityRequestHandler extends AbstractRequestHandler
{
    private const PRE_CHECKOUT_ELIGIBILITY_ENDPOINT = '/pre-checkout/v1/eligibility';

    public function __invoke(PreCheckoutEligibilityRequest $request): PreCheckoutEligibilityResponse
    {
        $response = $this->httpClient->post(
            self::PRE_CHECKOUT_ELIGIBILITY_ENDPOINT,
            $request->toArray()
        );

        return new PreCheckoutEligibilityResponse($response);
    }
}
