<?php

declare(strict_types=1);

namespace Tamara\Response\Checkout;

use Tamara\Response\ClientResponse;

class PreCheckoutEligibilityResponse extends ClientResponse
{
    public const IS_ELIGIBLE = 'is_eligible';

    private bool $isEligible = true;

    public function isEligible(): bool
    {
        return $this->isEligible;
    }

    /**
     * @param array<string, mixed> $responseData
     */
    protected function parse(array $responseData): void
    {
        $this->isEligible = (bool) ($responseData[self::IS_ELIGIBLE] ?? true);
    }
}
