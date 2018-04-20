<?php

namespace PatrickBierans\TemplateFilter;

class Filename {
    /**
     * @param string $value
     *
     * @return string
     */
    public static function apply($value): string {
        $filename = trim($value);
        $filename = str_replace(
            ['ä', 'ö', 'ü', 'Ä', 'Ö', 'Ü', 'ß'],
            ['ae', 'oe', 'ue', 'AE', 'OE', 'UE', 'ss'],
            $filename
        );
        $filename = preg_replace("/[^a-zA-Z0-9.\-]+/", '_', $filename);
        $filename = trim($filename, '_.');
        return $filename;
    }
}