<?php

namespace Tamara\Request\Checkout;

use Tamara\Model\Money;
use Tamara\Model\Order\Address;
use Tamara\Model\Order\Consumer;
use Tamara\Model\Order\Order;
use Tamara\Model\Order\OrderItemCollection;
use Tamara\Model\Order\RiskAssessment;

class GetPaymentTypesV2Request
{
    /**
     * @var Money
     */
    private $totalAmount;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var OrderItemCollection|null
     */
    private $items;

    /**
     * @var Consumer|null
     */
    private $consumer;

    /**
     * @var null|Address
     */
    private $shippingAddress;

    /**
     * @var null|RiskAssessment
     */
    private $riskAssessment;

    /**
     * @var array
     */
    private $additionalData = [];

    public function __construct(
        Money $totalAmount,
        string $countryCode,
        ?OrderItemCollection $items = null,
        ?Consumer $consumer = null,
        ?Address $shippingAddress = null,
        ?RiskAssessment $riskAssessment = null,
        ?array $additionalData = []
    ) {
        $this->totalAmount = $totalAmount;
        $this->countryCode = $countryCode;
        $this->items = $items;
        $this->consumer = $consumer;
        $this->shippingAddress = $shippingAddress;
        $this->riskAssessment = $riskAssessment;
        $this->additionalData = $additionalData;
    }

    public function getTotalAmount(): Money
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(Money $totalAmount): GetPaymentTypesV2Request
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): GetPaymentTypesV2Request
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getItems(): ?OrderItemCollection
    {
        return $this->items ?? null;
    }

    public function setItems(?OrderItemCollection $items): GetPaymentTypesV2Request
    {
        $this->items = $items;

        return $this;
    }

    public function getConsumer(): ?Consumer
    {
        return $this->consumer ?? null;
    }

    public function setConsumer(?Consumer $consumer): GetPaymentTypesV2Request
    {
        $this->consumer = $consumer;

        return $this;
    }

    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress ?? null;
    }

    public function setShippingAddress(?Address $shippingAddress): GetPaymentTypesV2Request
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    public function getRiskAssessment(): ?RiskAssessment
    {
        return $this->riskAssessment ?? null;
    }

    public function setRiskAssessment(?RiskAssessment $riskAssessment): GetPaymentTypesV2Request
    {
        $this->riskAssessment = $riskAssessment;

        return $this;
    }

    public function getAdditionalData(): ?array
    {
        return $this->additionalData ?? [];
    }

    public function setAdditionalData(?array $additionalData): GetPaymentTypesV2Request
    {
        $this->additionalData = $additionalData;

        return $this;
    }

    public function toArray(): array
    {
        return [
            Order::TOTAL_AMOUNT     => $this->getTotalAmount()->toArray(),
            Order::COUNTRY_CODE     => $this->getCountryCode(),
            Order::ITEMS            => $this->getItems() ? $this->getItems()->toArray() : null,
            Order::CONSUMER         => $this->getConsumer() ? $this->getConsumer()->toArray() : null,
            Order::SHIPPING_ADDRESS => $this->getShippingAddress() ? $this->getShippingAddress()->toArray() : null,
            Order::RISK_ASSESSMENT  => $this->getRiskAssessment() ? $this->getRiskAssessment()->getData() : null,
            Order::ADDITIONAL_DATA  => $this->getAdditionalData(),
        ];
    }
}
