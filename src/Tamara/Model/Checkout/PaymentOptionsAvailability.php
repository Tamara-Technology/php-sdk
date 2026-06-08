<?php

declare (strict_types=1);

namespace Tamara\Model\Checkout;

use Tamara\Model\Money;

class PaymentOptionsAvailability
{

    public const COUNTRY = 'country',
        ORDER_VALUE = 'order_value',
        PHONE_NUMBER = 'phone_number',
        IS_VIP = 'is_vip';

    /**
     * @var string
     */
    private $country;

    /**
     * @var Money
     */
    private $orderValue;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var bool
     */
    private $isVip;

    /**
     * @param string $country
     * @param Money $orderValue
     * @param string $phoneNumber
     * @param bool $isVip
     */
    public function __construct(string $country, Money $orderValue, string $phoneNumber, bool $isVip = true)
    {
        $this->country = $country;
        $this->orderValue = $orderValue;
        $this->phoneNumber = $phoneNumber;
        $this->isVip = $isVip;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::COUNTRY      => $this->getCountry(),
            self::ORDER_VALUE  => $this->getOrderValue()->toArray(),
            self::PHONE_NUMBER => $this->getPhoneNumber(),
            self::IS_VIP       => $this->isVip()
        ];
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return Money
     */
    public function getOrderValue()
    {
        return $this->orderValue;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return bool
     */
    public function isVip()
    {
        return $this->isVip;
    }
}
