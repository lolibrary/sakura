<?php

namespace App\Helpers;

use Alcohol\ISO4217;
use Brick\Math\BigNumber;
use Brick\Math\RoundingMode;
use NumberFormatter;

class Currency
{
    protected static ISO4217 $instance;
    protected static ?array $computed = null;

    protected const array Preferred = [
        'JPY' => 'Japanese Yen (JPY) - ¥',
        'CNY' => 'Chinese Yuan (CNY) - CN¥',
        'HKD' => 'Hong Kong Dollar (HKD) - HK$',
        'KRW' => 'South Korean Won (KRW) - ₩',
        'EUR' => 'Euro (EUR) - €',
        'USD' => 'US Dollars (USD) - $',
        'GBP' => 'Pound Sterling (GBP) - £',
        'CAD' => 'Canadian Dollar (CAD) - CA$',
        'AUD' => 'Australian Dollar (AUD) - AU$',
        'MXN' => 'Mexican Pesos (MXN) - MX$',
        'CHF' => 'Swiss Francs (CHF)',
        'RUB' => 'Russian Rubles (RUB) - ₽',
        'BRL' => 'Brazilian Real (BRL) - R$',
        'VND' => 'Vietnamese đồng (VND) - ₫',
        'NZD' => 'New Zealand Dollar (NZD) NZ$',
        'NOK' => 'Norwegian Krone (NOK) - kr',
        'SEK' => 'Swedish Krona (SEK) - kr',
        'DKK' => 'Danish Krone (DKK) - kr',
        'ISK' => 'Icelandic Króne (ISK) - kr',
        'SGD' => 'Singapore Dollar (SGD) - $',
        'INR' => 'Indian Rupees (INR) - ₹',
    ];

    public static function setInstance(ISO4217 $instance): void
    {
        static::$instance = $instance;
    }

    public static function options(): array
    {
        if (static::$computed !== null) {
            return static::$computed;
        }


        $filtered = collect(static::$instance->getAll())
            ->mapWithKeys(static function (array $data): array {
                $key = $data['alpha3'];

                if (array_key_exists($key, self::Preferred)) {
                    return [];
                }

                $formatter = NumberFormatter::create(
                    locale: app()->getLocale() . "@currency=$key", // force currency in a given locale
                    style: NumberFormatter::CURRENCY,
                );

                $symbol = $formatter->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
                $symbol = $symbol === $key ? '' : "- $symbol";

                return [
                    $data['alpha3'] => "{$data['name']} ({$key})$symbol",
                ];
            });

        return static::$computed = collect(self::Preferred)->merge($filtered)->all();
    }

    public static function format(?string $currency, ?string $price, ?string $locale = null): string
    {
        if ($currency === null || $price === null) {
            return '';
        }

        $locale ??= app()->getLocale();
        $formatter = NumberFormatter::create($locale, style: NumberFormatter::CURRENCY);

        return $formatter->formatCurrency((float)$price, $currency);
    }

    /**
     * Modify the price in a locale/currency-aware way.
     *
     * @param string|null $currency
     * @param string|null $price
     * @return string|null
     */
    public static function save(?string $currency, ?string $price): ?string
    {
        if ($currency === null || $price === null) {
            return null;
        }

        try {
            $info = static::$instance->getByAlpha3($currency);

            return BigNumber::of($price)->toScale($info['exp'], roundingMode: RoundingMode::Floor)->toString();
        } finally {
            return null;
        }
    }

    public static function info(?string $currency): ?array
    {
        if ($currency === null) {
            return null;
        }

        try {
            return static::$instance->getByAlpha3($currency);
        } finally {
            return null;
        }
    }
}
