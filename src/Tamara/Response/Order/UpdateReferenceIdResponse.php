<?php

declare(strict_types=1);

namespace Tamara\Response\Order;

use Tamara\Response\ClientResponse;

class UpdateReferenceIdResponse extends ClientResponse
{
    private const MESSAGE = 'message';

    /**
     * @var string|null
     */
    private $message;

    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param array<string, mixed> $responseData
     */
    protected function parse(array $responseData): void
    {
        $this->message = $responseData[self::MESSAGE] ?? '';
    }
}
