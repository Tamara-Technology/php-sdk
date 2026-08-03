<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Checkout\PreQualificationSessionResponse;

class PreQualificationSessionRequestHandler extends AbstractRequestHandler
{
    private const PRE_QUALIFICATION_SESSION_ENDPOINT = '/prequal/v1/session';

    public function __invoke(PreQualificationSessionRequest $request): PreQualificationSessionResponse
    {
        $response = $this->httpClient->post(
            self::PRE_QUALIFICATION_SESSION_ENDPOINT,
            $request->toArray()
        );

        return new PreQualificationSessionResponse($response);
    }
}
