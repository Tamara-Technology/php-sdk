<?php

declare(strict_types=1);


namespace Tamara\Model\Order;

use ArrayIterator;
use Countable;
use IteratorAggregate;

/**
 * @implements IteratorAggregate<int, OrderItem>
 */
class OrderItemCollection implements IteratorAggregate, Countable
{
    /**
     * @var array<int, OrderItem>
     */
    private $data = [];

    /**
     * @param array<int, array<string, mixed>> $data
     */
    public static function create(array $data): OrderItemCollection
    {
        $self = new self();
        foreach ($data as $itemData) {
            $self->data[] = OrderItem::fromArray($itemData);
        }

        return $self;
    }

    public function append(OrderItem $item): OrderItemCollection
    {
        $this->data[] = $item;

        return $this;
    }

    /**
     * @return array<int, OrderItem>
     */
    public function getItems(): array
    {
        return $this->data;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function toArray(): array
    {
        $ret = [];

        /** @var OrderItem $item */
        foreach ($this->data as $item) {
            $ret[] = $item->toArray();
        }

        return $ret;
    }

    /**
     * @return ArrayIterator<int, OrderItem>
     */
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
}
