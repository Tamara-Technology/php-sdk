<?php

declare(strict_types=1);

namespace Tamara\Model\Order;

use Tamara\Model\Money;

class InstoreOrder
{
    public const
        ORDER_ID = 'order_id',
        TOTAL_AMOUNT = 'total_amount',
        PHONE_NUMBER = 'phone_number',
        EMAIL = 'email',
        EXPIRY_TIME = 'expiry_time',
        ITEMS = 'items',
        PAYMENT_TYPE = 'payment_type',
        ORDER_REFERENCE_ID = 'order_reference_id',
        ORDER_NUMBER = 'order_number',
        LOCALE = 'locale',
        ADDITIONAL_DATA = 'additional_data';

    /**
     * @var Money
     */
    private $totalAmount;
    /**
     * @var string
     */
    private $phoneNumber;
    /**
     * @var string|null
     */
    private $email;
    /**
     * @var int|null
     */
    private $expiryTime;
    /**
     * @var OrderItemCollection
     */
    private $items;
    /**
     * @var string
     */
    private $orderReferenceId;
    /**
     * @var string|null
     */
    private $orderNumber;
    /**
     * @var array|null
     */
    private $additionalData;
    /**
     * @var string|null
     */
    private $locale;
    /**
     * @var string|null
     */
    private $paymentType;

    public function toArray(): array
    {
        $result = [
            self::TOTAL_AMOUNT       => $this->getTotalAmount()->toArray(),
            self::PHONE_NUMBER       => $this->getPhoneNumber(),
            self::ITEMS              => $this->getItems()->toArray(),
            self::ORDER_REFERENCE_ID => $this->getOrderReferenceId(),
        ];

        if ($this->getEmail() !== null) {
            $result[self::EMAIL] = $this->getEmail();
        }
        if ($this->getExpiryTime() > 0) {
            $result[self::EXPIRY_TIME] = $this->getExpiryTime();
        }
        if ($this->getOrderNumber() !== null) {
            $result[self::ORDER_NUMBER] = $this->getOrderNumber();
        }
        if ($this->getAdditionalData() !== null) {
            $result[self::ADDITIONAL_DATA] = $this->getAdditionalData();
        }
        if ($this->getLocale() !== null) {
            $result[self::LOCALE] = $this->getLocale();
        }
        if ($this->getPaymentType() !== null) {
            $result[self::PAYMENT_TYPE] = $this->getPaymentType();
        }

        return $result;
    }

    /**
     * @return Money
     */
    public function getTotalAmount(): Money
    {
        return $this->totalAmount;
    }

    /**
     * @param Money $totalAmount
     * @return InstoreOrder
     */
    public function setTotalAmount(Money $totalAmount): InstoreOrder
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return InstoreOrder
     */
    public function setPhoneNumber(string $phoneNumber): InstoreOrder
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return OrderItemCollection
     */
    public function getItems(): OrderItemCollection
    {
        return $this->items;
    }

    /**
     * @param OrderItemCollection $items
     * @return InstoreOrder
     */
    public function setItems(OrderItemCollection $items): InstoreOrder
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderReferenceId(): string
    {
        return $this->orderReferenceId;
    }

    /**
     * @param string $orderReferenceId
     * @return InstoreOrder
     */
    public function setOrderReferenceId(string $orderReferenceId): InstoreOrder
    {
        $this->orderReferenceId = $orderReferenceId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return InstoreOrder
     */
    public function setEmail(?string $email): InstoreOrder
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getExpiryTime(): ?int
    {
        return $this->expiryTime;
    }

    /**
     * @param int|null $expiryTime
     * @return InstoreOrder
     */
    public function setExpiryTime(?int $expiryTime): InstoreOrder
    {
        $this->expiryTime = $expiryTime;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    /**
     * @param string|null $orderNumber
     * @return InstoreOrder
     */
    public function setOrderNumber(?string $orderNumber): InstoreOrder
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getAdditionalData(): ?array
    {
        return $this->additionalData;
    }

    /**
     * @param array|null $additionalData
     * @return InstoreOrder
     */
    public function setAdditionalData(?array $additionalData): InstoreOrder
    {
        $this->additionalData = $additionalData;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param string|null $locale
     * @return InstoreOrder
     */
    public function setLocale(?string $locale): InstoreOrder
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    /**
     * @param string|null $paymentType
     * @return InstoreOrder
     */
    public function setPaymentType(?string $paymentType): InstoreOrder
    {
        $this->paymentType = $paymentType;
        return $this;
    }
}
