<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Model\Money;

class PreCheckoutEligibilityRequest
{
    public const ORDER = 'order';
    public const CUSTOMER = 'customer';
    public const PHONE_NUMBER = 'phone_number';
    public const EMAIL = 'email';

    private Money $order;

    private ?string $phoneNumber;

    private ?string $email;

    public function __construct(Money $order, ?string $phoneNumber = null, ?string $email = null)
    {
        $this->order = $order;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
    }

    public function getOrder(): Money
    {
        return $this->order;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $customer = [];

        if (null !== $this->getPhoneNumber()) {
            $customer[self::PHONE_NUMBER] = $this->getPhoneNumber();
        }

        if (null !== $this->getEmail()) {
            $customer[self::EMAIL] = $this->getEmail();
        }

        return [
            self::ORDER => $this->getOrder()->toArray(),
            self::CUSTOMER => $customer,
        ];
    }
}
