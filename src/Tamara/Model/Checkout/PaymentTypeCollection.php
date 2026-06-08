<?php
declare(strict_types=1);

namespace Tamara\Model\Checkout;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Tamara\Model\Money;
use Tamara\Model\Order\Order;

class PaymentTypeCollection implements IteratorAggregate, Countable
{
    private const
        NAME = 'name',
        DESCRIPTION = 'description',
        MIN_LIMIT = 'min_limit',
        MAX_LIMIT = 'max_limit';

    /**
     * @var array|PaymentType[]
     */
    private $data = [];

    public function __construct(array $paymentTypes)
    {
        $zeroDefault = [
            Money::AMOUNT   => 0.0,
            Money::CURRENCY => 'SAR',
        ];

        foreach ($paymentTypes as $paymentType) {
            $minLimit = $paymentType[self::MIN_LIMIT] ?? $zeroDefault;
            $maxLimit = $paymentType[self::MAX_LIMIT] ?? $zeroDefault;

            $this->data[] = new PaymentType(
                $paymentType[self::NAME],
                $paymentType[self::DESCRIPTION],
                new Money((float) $minLimit[Money::AMOUNT], $minLimit[Money::CURRENCY]),
                new Money((float) $maxLimit[Money::AMOUNT], $maxLimit[Money::CURRENCY]),
                $this->parseSupportedInstalments($paymentType)
            );
        }
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->data);
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->data);
    }

    private function parseSupportedInstalments(array $data): array
    {
        $zeroDefault = [
            Money::AMOUNT   => 0.0,
            Money::CURRENCY => 'SAR',
        ];

        $result = [];
        if (isset($data[PaymentType::SUPPORTED_INSTALMENTS]) && !empty($data[PaymentType::SUPPORTED_INSTALMENTS])) {
            foreach ($data[PaymentType::SUPPORTED_INSTALMENTS] as $item) {
                $minLimit = $item[self::MIN_LIMIT] ?? $zeroDefault;
                $maxLimit = $item[self::MAX_LIMIT] ?? $zeroDefault;
                $instalment = new Instalment(
                    (int) $item[Order::INSTALMENTS],
                    new Money((float) $minLimit[Money::AMOUNT], $minLimit[Money::CURRENCY]),
                    new Money((float) $maxLimit[Money::AMOUNT], $maxLimit[Money::CURRENCY])
                );

                $result[] = $instalment;
            }
        }

        return $result;
    }
}
