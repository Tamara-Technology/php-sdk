<?php

declare(strict_types=1);

namespace Tamara\Notification;

use Tamara\Notification\Exception\NotificationException;

abstract class AbstractMessage
{
    public const
        ORDER_ID = 'order_id',
        ORDER_REFERENCE_ID = 'order_reference_id',
        DATA = 'data';

    /**
     * @var string the Tamara unique order id
     */
    private $orderId;

    /**
     * @var string the merchant unique order id
     */
    private $orderReferenceId;

    /**
     * @var array<string, mixed>
     */
    private $data;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(string $orderId, string $orderReferenceId, array $data)
    {
        $this->orderId = $orderId;
        $this->orderReferenceId = $orderReferenceId;
        $this->data = $data;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getOrderReferenceId(): string
    {
        return $this->orderReferenceId;
    }

    /**
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getDataByKey(string $key): mixed
    {
        if (!isset($this->data[$key])) {
            throw new NotificationException(sprintf('Invalid key %s', $key));
        }

        return $this->data[$key];
    }

    /**
     * @param array<string, mixed> $data
     */
    abstract public static function fromArray(array $data): AbstractMessage;
}
