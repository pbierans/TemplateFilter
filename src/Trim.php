<?php

namespace PatrickBierans\TemplateFilter;

class Trim {
    /**
     * @param string $value
     *
     * @return string
     * no test sorry ;-P
     */
    public static function apply($value): string {
        return trim($value);
    }
}