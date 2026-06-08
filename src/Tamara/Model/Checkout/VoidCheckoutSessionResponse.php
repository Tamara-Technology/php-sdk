<?php

declare(strict_types=1);

namespace Tamara\Model\Checkout;

use Tamara\Model\Money;

class VoidCheckoutSessionResponse
{
    public const
        ORDER_WAS_VOIDED = 'order_was_voided',
        CAPTURED_AMOUNT = 'captured_amount',
        MESSAGE = 'message',
        STORE_CODE = 'store_code';

    /**
     * @var bool $orderWasVoided
     */
    private $orderWasVoided;

    /**
     * @var Money $capturedAmount
     */
    private $capturedAmount;

    /**
     * @var string $message
     */
    private $message;

    /**
     * @var string
     */
    private $storeCode;

    public function __construct(array $response)
    {
        $this->orderWasVoided = $response[self::ORDER_WAS_VOIDED];
        $this->capturedAmount = Money::fromArray($response[self::CAPTURED_AMOUNT]);
        $this->message = $response[self::MESSAGE];
        $this->storeCode = $response[self::STORE_CODE];
    }

    public function toArray(): array
    {
        return [
            self::ORDER_WAS_VOIDED => $this->isOrderWasVoided(),
            self::CAPTURED_AMOUNT  => $this->getCapturedAmount(),
            self::MESSAGE          => $this->getMessage(),
            self::STORE_CODE       => $this->getStoreCode()
        ];
    }

    /**
     * @return bool
     */
    public function isOrderWasVoided()
    {
        return $this->orderWasVoided;
    }

    /**
     * @return Money
     */
    public function getCapturedAmount(): Money
    {
        return $this->capturedAmount;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getStoreCode()
    {
        return $this->storeCode;
    }
}
