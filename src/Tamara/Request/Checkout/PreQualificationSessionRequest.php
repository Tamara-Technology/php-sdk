<?php

declare(strict_types=1);

namespace Tamara\Request\Checkout;

use Tamara\Model\Money;

class PreQualificationSessionRequest
{
    public const COUNTRY_CODE = 'country_code';
    public const REDIRECT_URL = 'redirect_url';
    public const IS_WEBVIEW = 'is_webview';
    public const LOCALE = 'locale';
    public const PHONE_NUMBER = 'phone_number';
    public const PREQUAL_AMOUNT = 'prequal_amount';

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $redirectUrl;

    /**
     * @var bool
     */
    private $isWebview;

    /**
     * @var string|null
     */
    private $locale;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var Money|null
     */
    private $prequalAmount;

    public function __construct(
        string $countryCode,
        string $redirectUrl,
        bool $isWebview,
        ?string $locale = null,
        ?string $phoneNumber = null,
        ?Money $prequalAmount = null
    ) {
        $this->countryCode = $countryCode;
        $this->redirectUrl = $redirectUrl;
        $this->isWebview = $isWebview;
        $this->locale = $locale;
        $this->phoneNumber = $phoneNumber;
        $this->prequalAmount = $prequalAmount;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    public function isWebview(): bool
    {
        return $this->isWebview;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getPrequalAmount(): ?Money
    {
        return $this->prequalAmount;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            self::COUNTRY_CODE => $this->getCountryCode(),
            self::REDIRECT_URL => $this->getRedirectUrl(),
            self::IS_WEBVIEW => $this->isWebview(),
        ];

        if (null !== $this->getLocale()) {
            $data[self::LOCALE] = $this->getLocale();
        }

        if (null !== $this->getPhoneNumber()) {
            $data[self::PHONE_NUMBER] = $this->getPhoneNumber();
        }

        if (null !== $this->getPrequalAmount()) {
            $data[self::PREQUAL_AMOUNT] = $this->getPrequalAmount()->toArray();
        }

        return $data;
    }
}
