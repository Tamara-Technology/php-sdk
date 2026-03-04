<?php

declare(strict_types=1);

namespace Tamara\Model;

class Money
{
    public const
        AMOUNT = 'amount',
        CURRENCY = 'currency';

    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $currency;

    public function __construct(float $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            self::AMOUNT => $this->getAmount(),
            self::CURRENCY => $this->getCurrency(),
        ];
    }

    /**
     * @param array<string, mixed> $data
     * @return Money
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (float) $data[self::AMOUNT],
            $data[self::CURRENCY]
        );
    }
}
