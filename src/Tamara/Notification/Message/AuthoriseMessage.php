<?php

declare(strict_types=1);

namespace Tamara\Notification\Message;

use Tamara\Notification\AbstractMessage;

class AuthoriseMessage extends AbstractMessage
{
    private const ORDER_STATUS = 'order_status';
    /**
     * @var string
     */
    private $orderStatus;

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(string $orderId, string $orderReferenceId, array $data, string $orderStatus)
    {
        parent::__construct($orderId, $orderReferenceId, $data);
        $this->orderStatus = $orderStatus;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): AbstractMessage
    {
        return new self(
            $data[self::ORDER_ID],
            $data[self::ORDER_REFERENCE_ID],
            $data[self::DATA],
            $data[self::ORDER_STATUS]
        );
    }

    public function getOrderStatus(): string
    {
        return $this->orderStatus;
    }
}
