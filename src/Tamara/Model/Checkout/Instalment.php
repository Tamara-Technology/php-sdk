<?php

namespace Tamara\Model\Checkout;

use Tamara\Model\Money;
use Tamara\Model\Order\Order;

class Instalment
{
    /**
     * @var int
     */
    private $instalments;

    /**
     * @var Money
     */
    private $minLimit;

    /**
     * @var Money
     */
    private $maxLimit;

    public function __construct(int $instalments, Money $minLimit, Money $maxLimit)
    {
        $this->instalments = $instalments;
        $this->minLimit = $minLimit;
        $this->maxLimit = $maxLimit;
    }

    public function getInstalments(): int
    {
        return $this->instalments;
    }

    public function getMinLimit(): Money
    {
        return $this->minLimit;
    }

    public function getMaxLimit(): Money
    {
        return $this->maxLimit;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            Order::INSTALMENTS     => $this->getInstalments(),
            PaymentType::MIN_LIMIT => $this->getMinLimit()->toArray(),
            PaymentType::MAX_LIMIT => $this->getMaxLimit()->toArray(),
        ];
    }
}