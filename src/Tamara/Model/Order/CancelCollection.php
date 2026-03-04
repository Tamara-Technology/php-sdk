<?php

declare(strict_types=1);

namespace Tamara\Model\Order;
use ArrayIterator;

class CancelCollection
{
    /**
     * @var CancelItem[]
     */
    private $data = [];

    /**
     * @param array<int, array<string, mixed>> $data
     */
    public static function create(array $data): CancelCollection
    {
        $self = new self();
        foreach ($data as $itemData) {
            $self->data[] = CancelItem::fromArray($itemData);
        }

        return $self;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function toArray(): array
    {
        $ret = [];

        /** @var CancelItem $item */
        foreach ($this->data as $item) {
            $ret[] = $item->toArray();
        }

        return $ret;
    }

    /**
     * @return ArrayIterator<int, CancelItem>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->data);
    }

    public function count(): int
    {
        return count($this->data);
    }
}