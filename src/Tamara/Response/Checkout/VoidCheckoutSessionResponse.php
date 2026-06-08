<?php

namespace Tamara\Response\Checkout;

use Tamara\Response\ClientResponse;

class VoidCheckoutSessionResponse extends ClientResponse
{

    /**
     * @var \Tamara\Model\Checkout\VoidCheckoutSessionResponse $voidCheckoutSessionResponse
     */
    private $voidCheckoutSessionResponse;

    /**
     * @return \Tamara\Model\Checkout\VoidCheckoutSessionResponse
     */
    public function getVoidCheckoutSessionResponse()
    {
        return $this->voidCheckoutSessionResponse;
    }

    protected function parse(array $responseData): void
    {
        $this->voidCheckoutSessionResponse = new \Tamara\Model\Checkout\VoidCheckoutSessionResponse($responseData);
    }
}
