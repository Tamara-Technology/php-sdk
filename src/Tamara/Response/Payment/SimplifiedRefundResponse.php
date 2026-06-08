<?php

declare(strict_types=1);

namespace Tamara\Response\Payment;

use Tamara\Model\Money;
use Tamara\Model\Payment\SimplifiedRefund;
use Tamara\Response\ClientResponse;

class SimplifiedRefundResponse extends ClientResponse
{
    /**
     * @var string
     */
    private $orderId;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $refundId;

    /**
     * @var string
     */
    private $captureId;

    /**
     * @var string
     */
    private $orderStatus;

    /**
     * @var Money
     */
    private $refundedAmount;

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
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return string|null
     */
    public function getRefundId(): ?string
    {
        return $this->refundId;
    }

    /**
     * @return string|null
     */
    public function getCaptureId(): ?string
    {
        return $this->captureId;
    }

    public function getOrderStatus(): ?string
    {
        return $this->orderStatus;
    }

    public function getRefundedAmount(): ?Money
    {
        return $this->refundedAmount;
    }

    /**
     * @param array $responseData
     */
    protected function parse(array $responseData): void
    {
        $this->orderId = $responseData[SimplifiedRefund::ORDER_ID];
        $this->comment = $responseData[SimplifiedRefund::COMMENT];
        $this->refundId = $responseData[SimplifiedRefund::REFUND_ID];
        $this->captureId = $responseData[SimplifiedRefund::CAPTURE_ID];
        $this->orderStatus = $responseData[SimplifiedRefund::ORDER_STATUS];
        $this->refundedAmount = Money::fromArray($responseData[SimplifiedRefund::REFUNDED_AMOUNT]);
    }
}
