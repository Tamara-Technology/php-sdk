<?php

declare(strict_types=1);

namespace Tamara\Response\Checkout;

use Tamara\Response\ClientResponse;

class PreQualificationSessionResponse extends ClientResponse
{
    public const PREQUAL_SESSION_ID = 'prequal_session_id';
    public const URL = 'url';

    /**
     * @var string
     */
    private $prequalSessionId = '';

    /**
     * @var string
     */
    private $url = '';

    public function getPrequalSessionId(): string
    {
        return $this->prequalSessionId;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param array $responseData
     */
    protected function parse(array $responseData): void
    {
        $this->prequalSessionId = (string) ($responseData[self::PREQUAL_SESSION_ID] ?? '');
        $this->url = (string) ($responseData[self::URL] ?? '');
    }
}
