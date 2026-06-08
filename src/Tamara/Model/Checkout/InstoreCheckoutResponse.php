<?php

declare(strict_types=1);

namespace Tamara\Model\Checkout;

class InstoreCheckoutResponse
{
    public const
        ORDER_ID = 'order_id',
        CHECKOUT_ID = 'checkout_id',
        CHECKOUT_DEEP_LINK = 'checkout_deeplink';

    private $orderId;
    private $checkoutId;
    private $checkoutDeepLink;

    public function __construct(array $response)
    {
        $this->orderId = $response[self::ORDER_ID];
        $this->checkoutId = $response[self::CHECKOUT_ID];
        $this->checkoutDeepLink = $response[self::CHECKOUT_DEEP_LINK];
    }

    public function toArray(): array
    {
        return [
            self::ORDER_ID           => $this->getOrderId(),
            self::CHECKOUT_ID        => $this->getCheckoutId(),
            self::CHECKOUT_DEEP_LINK => $this->getCheckoutDeepLink(),
        ];
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getCheckoutId()
    {
        return $this->checkoutId;
    }

    public function getCheckoutDeepLink()
    {
        return $this->checkoutDeepLink;
    }
}
