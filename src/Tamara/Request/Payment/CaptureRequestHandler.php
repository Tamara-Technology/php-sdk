<?php

declare(strict_types=1);

namespace Tamara\Request\Payment;

use Tamara\Request\AbstractRequestHandler;
use Tamara\Response\Payment\CaptureResponse;

class CaptureRequestHandler extends AbstractRequestHandler
{
    private const CAPTURE_ENDPOINT = '/payments/capture';

    public function __invoke(CaptureRequest $request)
    {
        $response = $this->httpClient->post(
            self::CAPTURE_ENDPOINT,
            $request->getCapture()->toArray()
        );

        return new CaptureResponse($response);
    }
}
