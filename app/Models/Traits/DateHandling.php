<?php

namespace App\Models\Traits;

use Illuminate\Support\Carbon;
use InvalidArgumentException;

trait DateHandling
{
    /**
     * Return a timestamp as DateTime object, edited to always be in UTC.
     *
     * @param  mixed  $value
     * @return \Illuminate\Support\Carbon
     * @throws \InvalidArgumentException
     */
    protected function asDateTime($value)
    {
        try {
            $date = parent::asDateTime($value);
        } catch (InvalidArgumentException $e) {
            $date = Carbon::parse($value);
        }

        return $date->setTimezone('UTC');
    }

    /**
     * Get the format for database stored dates.
     *
     * @return string
     */
    public function getDateFormat()
    {
        return \DateTimeInterface::RFC3339;
    }
}
