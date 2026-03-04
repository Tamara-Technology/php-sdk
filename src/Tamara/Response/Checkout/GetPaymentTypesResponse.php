<?php

namespace Tamara\Response\Checkout;

use Tamara\Model\Checkout\PaymentTypeCollection;
use Tamara\Response\ClientResponse;

class GetPaymentTypesResponse extends ClientResponse
{
    /**
     * @var PaymentTypeCollection|null
     */
    private $paymentTypes;

    /**
     * @return PaymentTypeCollection|null
     */
    public function getPaymentTypes(): ?PaymentTypeCollection
    {
        return $this->isSuccess() ? $this->paymentTypes : null;
    }

    /**
     * @param array<string, mixed>|array<int, array<string, mixed>> $responseData
     */
    protected function parse(array $responseData): void
    {
        /** @var array<int, array<string, mixed>> $paymentTypesData */
        $paymentTypesData = isset($responseData['payment_types']) ? $responseData['payment_types'] : $responseData;
        $this->paymentTypes = new PaymentTypeCollection($paymentTypesData);
    }
}
