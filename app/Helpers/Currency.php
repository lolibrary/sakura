<?php

namespace App\Helpers;

use Alcohol\ISO4217;
use Brick\Math\BigNumber;
use Brick\Math\RoundingMode;
use NumberFormatter;

class Currency
{
    protected ?array $computed = null;

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

    /**
     * These are currencies that should always have the currency code appended for clarity.
     */
    protected const array Trailer = [
        'JPY',
        'USD',
        'SGD',
    ];

    /**
     * All scandinavian `kr` (krone, etc) currencies should differentiate.
     */
    protected const array Overrides = [
        'ISK',
        'NOK',
        'SEK',
        'DKK',
    ];

    public function __construct(protected ISO4217 $instance) {}

    public function options(): array
    {
        if ($this->computed !== null) {
            return $this->computed;
        }


        $filtered = collect($this->instance->getAll())
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

        return $this->computed = collect(self::Preferred)->merge($filtered)->all();
    }

    public function format(?string $currency, ?string $price, ?string $locale = null): string
    {
        if ($currency === null || $price === null) {
            return '';
        }

        $locale ??= app()->getLocale();
        $formatter = NumberFormatter::create($locale, style: NumberFormatter::CURRENCY);
        $price = (float)$price;

        // remove any fractional part if we're not actually a fraction.
        if (fmod($price, 1) === 0.0) {
            $formatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 0);
        }

        // remove all grouping (thousands, etc)
        $formatter->setAttribute(NumberFormatter::GROUPING_USED, 0);

        $formatted = str($formatter->formatCurrency($price, $currency));

        if ($this->hasOverride($currency)) {
            $formatted = $formatted->replace(
                search: $formatter->getSymbol(NumberFormatter::CURRENCY_SYMBOL),
                replace: $currency,
            );
        }

        if ($this->hasTrailer($currency) && ! $formatted->contains($currency)) {
            $formatted = $formatted->append(" $currency");
        }

        return $formatted->toString();
    }

    public function hasOverride(string $currency): bool
    {
        return in_array($currency, haystack: static::Overrides, strict: true);
    }

    public function hasTrailer(string $currency): bool
    {
        return in_array($currency, haystack: static::Trailer, strict: true);
    }

    /**
     * Modify the price in a locale/currency-aware way.
     *
     * @param string|null $currency
     * @param string|null $price
     * @return string|null
     */
    public function save(?string $currency, ?string $price): ?string
    {
        if ($currency === null || $price === null) {
            return null;
        }

        try {
            $info = $this->instance->getByAlpha3($currency);

            return BigNumber::of($price)->toScale($info['exp'], roundingMode: RoundingMode::Floor)->toString();
        } finally {
            return null;
        }
    }

    public function info(?string $currency): ?array
    {
        if ($currency === null) {
            return null;
        }

        try {
            return $this->instance->getByAlpha3($currency);
        } finally {
            return null;
        }
    }

    public function option(string $currency): ?string
    {
        return $this->options()[$currency] ?? null;
    }
}
