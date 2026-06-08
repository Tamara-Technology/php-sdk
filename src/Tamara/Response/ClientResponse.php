<?php

namespace Tamara\Response;

use Psr\Http\Message\ResponseInterface;

abstract class ClientResponse
{
    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var string|null the raw content
     */
    private $content;

    /**
     * @var string|null
     */
    private $message;

    /**
     * @var array<int, mixed>|null the error details
     */
    private $errors;

    public function __construct(ResponseInterface $response)
    {
        $this->statusCode = $response->getStatusCode();
        $this->content = $response->getBody()->getContents();

        $responseBody = json_decode($this->content, true);
        $this->message = $responseBody['message'] ?? null;
        $this->errors = $responseBody['errors'] ?? null;

        if ($this->isSuccess()) {
            $this->parse($responseBody ?? []);
        }
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function isSuccess(): bool
    {
        return $this->getStatusCode() > 199 && $this->getStatusCode() < 400;
    }

    /**
     * @return string the raw content
     */
    public function getContent(): string
    {
        return $this->content ?? '';
    }

    public function getMessage(): ?string
    {
        return $this->message ?? '';
    }

    /**
     * @return array<int, mixed>
     */
    public function getErrors(): array
    {
        return $this->errors ?? [];
    }

    /**
     * @param array<string, mixed> $responseData
     */
    abstract protected function parse(array $responseData): void;
}
