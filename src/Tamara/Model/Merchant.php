<?php

declare (strict_types=1);

namespace Tamara\Model;

class Merchant
{
    public const SINGLE_CHECKOUT_ENABLED = 'single_checkout_enabled';
    public const PUBLIC_KEY = 'public_key';

    /**
     * @var bool
     */
    private $singleCheckoutEnabled;

    /**
     * @var string
     */
    private $publicKey;

    /**
     * @param bool $singleCheckoutEnabled
     * @param string $publicKey
     */
    public function __construct(bool $singleCheckoutEnabled, string $publicKey)
    {
        $this->singleCheckoutEnabled = $singleCheckoutEnabled;
        $this->publicKey = $publicKey;
    }

    /**
     * @param array $data
     * @return Merchant
     */
    public static function fromArray(array $data)
    {
        return new self($data[self::SINGLE_CHECKOUT_ENABLED], $data[self::PUBLIC_KEY]);
    }

    /**
     * @return bool
     */
    public function getSingleCheckoutEnabled()
    {
        return $this->singleCheckoutEnabled;
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }
}
