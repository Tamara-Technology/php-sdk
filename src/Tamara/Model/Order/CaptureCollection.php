<?php

declare(strict_types=1);

namespace Tamara\Model\Order;

use ArrayIterator;

class CaptureCollection
{
    /**
     * @var CaptureItem[]
     */
    private $data = [];

    /**
     * @param array<int, array<string, mixed>> $data
     */
    public static function create(array $data): CaptureCollection
    {
        $self = new self();
        foreach ($data as $itemData) {
            $self->data[] = CaptureItem::fromArray($itemData);
        }

        return $self;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function toArray(): array
    {
        $ret = [];

        foreach ($this->data as $item) {
            $ret[] = $item->toArray();
        }

        return $ret;
    }

    /**
     * @return ArrayIterator<int, CaptureItem>
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
