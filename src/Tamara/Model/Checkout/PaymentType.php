<?php

declare(strict_types=1);

namespace Tamara\Model\Checkout;

use Tamara\Model\Money;

class PaymentType
{
    public const
        NAME = 'name',
        DESCRIPTION = 'description',
        MIN_LIMIT = 'min_limit',
        MAX_LIMIT = 'max_limit',
        SUPPORTED_INSTALMENTS = 'supported_instalments';

    private string $name;

    private string $description;

    private Money $minLimit;

    private Money $maxLimit;

    /** @var array<int, Instalment> */
    private array $supportedInstalments;

    /**
     * @param array<int, Instalment> $supportedInstalments
     */
    public function __construct(
        string $name,
        string $description,
        Money $minLimit,
        Money $maxLimit,
        array $supportedInstalments = []
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->minLimit = $minLimit;
        $this->maxLimit = $maxLimit;
        $this->supportedInstalments = $supportedInstalments;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
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
     * @return array<int, Instalment>
     */
    public function getSupportedInstalments(): array
    {
        return $this->supportedInstalments;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $result = [
            self::NAME        => $this->getName(),
            self::DESCRIPTION => $this->getDescription(),
            self::MIN_LIMIT   => $this->getMinLimit()->toArray(),
            self::MAX_LIMIT   => $this->getMaxLimit()->toArray(),
        ];

        if (!empty($this->getSupportedInstalments())) {
            foreach ($this->getSupportedInstalments() as $instalment) {
                $result[self::SUPPORTED_INSTALMENTS][] = $instalment->toArray();
            }
        }

        return $result;
    }
}
