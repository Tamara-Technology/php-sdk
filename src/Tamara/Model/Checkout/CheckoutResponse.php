<?php

declare(strict_types=1);

namespace Tamara\Model\Checkout;

class CheckoutResponse
{
    public const
        ORDER_ID = 'order_id',
        CHECKOUT_ID = 'checkout_id',
        CHECKOUT_URL = 'checkout_url';

    private string $orderId;

    private string $checkoutUrl;

    private string $checkoutId;

    /**
     * @param array<string, mixed> $response
     */
    public function __construct(array $response)
    {
        $this->orderId = $response[self::ORDER_ID];
        $this->checkoutUrl = $response[self::CHECKOUT_URL];
        $this->checkoutId = $response[self::CHECKOUT_ID];
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getCheckoutUrl(): string
    {
        return $this->checkoutUrl;
    }

    public function getCheckoutId(): string
    {
        return $this->checkoutId;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            self::ORDER_ID     => $this->getOrderId(),
            self::CHECKOUT_URL => $this->getCheckoutUrl(),
            self::CHECKOUT_ID  => $this->getCheckoutId(),
        ];
    }
}
