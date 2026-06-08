<?php

declare(strict_types=1);

namespace Tamara\Response\Checkout;

use Tamara\Model\Checkout\InstoreCheckoutResponse;
use Tamara\Response\ClientResponse;

class CreateInstoreCheckoutResponse extends ClientResponse
{
    /**
     * @var InstoreCheckoutResponse|null
     */
    private $instoreCheckoutResponse;

    public function getCheckoutResponse(): ?InstoreCheckoutResponse
    {
        return $this->instoreCheckoutResponse;
    }

    /**
     * @param array<string, mixed> $responseData
     */
    protected function parse(array $responseData): void
    {
        $this->instoreCheckoutResponse = new InstoreCheckoutResponse($responseData);
    }
}
