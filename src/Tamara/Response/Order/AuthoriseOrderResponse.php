<?php

declare(strict_types=1);

namespace Tamara\Response\Order;

use DateTimeImmutable;
use Tamara\Model\Money;
use Tamara\Response\ClientResponse;

class AuthoriseOrderResponse extends ClientResponse
{
    private const
        ORDER_ID = 'order_id',
        STATUS = 'status',
        ORDER_EXPIRY_TIME = 'order_expiry_time',
        PAYMENT_TYPE = 'payment_type',
        AUTO_CAPTURED = 'auto_captured',
        AUTHORIZED_AMOUNT = 'authorized_amount',
        CAPTURE_ID = 'capture_id';

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var string|null
     */
    private $orderStatus;

    /**
     * @var DateTimeImmutable
     */
    private $orderExpiryTime;

    /**
     * @var string
     */
    private $paymentType;

    /**
     * @var bool
     */
    private $autoCaptured;

    /**
     * @var Money
     */
    private $authorizedAmount;

    /**
     * @var string
     */
    private $captureId;

    /**
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @return string|null
     */
    public function getOrderStatus(): ?string
    {
        return $this->orderStatus;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getOrderExpiryTime(): ?DateTimeImmutable
    {
        return $this->orderExpiryTime;
    }

    /**
     * @return string|null
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    /**
     * @return bool
     */
    public function getAutoCaptured(): bool
    {
        return $this->autoCaptured ?? false;
    }

    /**
     * @return Money|null
     */
    public function getAuthorizedAmount(): ?Money
    {
        return $this->authorizedAmount;
    }

    /**
     * @return string|null
     */
    public function getCaptureId(): ?string
    {
        return $this->captureId;
    }

    /**
     * @param array $responseData
     * @throws \Exception
     */
    protected function parse(array $responseData): void
    {
        $this->orderId = $responseData[self::ORDER_ID];
        $this->orderStatus = $responseData[self::STATUS];
        $this->orderExpiryTime = new DateTimeImmutable($responseData[self::ORDER_EXPIRY_TIME]);
        $this->paymentType = $responseData[self::PAYMENT_TYPE];
        $this->autoCaptured = $responseData[self::AUTO_CAPTURED];
        $this->authorizedAmount = Money::fromArray($responseData[self::AUTHORIZED_AMOUNT]);
        $this->captureId = $responseData[self::CAPTURE_ID];
    }
}
