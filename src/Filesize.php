<?php

namespace PatrickBierans\TemplateFilter;

class Filesize {
    /**
     * @param mixed $value
     * @param int $decimals
     *
     * @return mixed
     */
    public static function apply($value, $decimals = 2) {
        $bytes = (int)trim($value);
        $sz = ' kMGTP';
        $factor = (int)floor((\strlen($bytes) - 1) / 3);
        if ($value < 100 && $decimals > 1) {
            $decimals = 1;
        }
        if ($value < 10 && $decimals > 0) {
            $decimals = 0;
        }
        $number = $bytes / (1024 ** $factor);
        /** @noinspection TypeUnsafeComparisonInspection */
        if ($number == (int)$number) {
            $decimals = 0;
        }
        $display = number_format($number, $decimals, ',', '.');
        $unit = $sz[$factor] . 'B';
        if ($value === 0) {
            $unit = '';
            $display = 0;
        } else {
            $unit = ' ' . trim($unit);
        }
        return $display . $unit;
    }
}