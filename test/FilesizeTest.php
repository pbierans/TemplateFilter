<?php

namespace PatrickBierans\TemplateFilter;

use PHPUnit\Framework\TestCase;

class FilesizeTest extends TestCase {

    /**
     * @dataProvider getDataset
     *
     * @param int $input
     * @param string $expected
     */
    public function test($input, $expected): void {
        $this->assertEquals($expected, Filesize::apply($input));
    }

    /**
     * @return array
     */
    public function getDataset(): array {
        return [
            [0, '0'],
            [1, '1 B'],
            [1 * 1024, '1 kB'],
            [1 * 1024 * 1024, '1 MB'],
            [1 * 1024 * 1024 * 1024, '1 GB'],
            [1 * 1024 * 1024 * 1024 * 1024, '1 TB'],
            [1 * 1024 * 1024 * 1024 * 1024 * 1024, '1 PB'],
            [22, '22 B'],
            [333, '333 B'],
            [4444, '4,34 kB'],
            [55555, '54,25 kB'],
            [666666, '651,04 kB'],
            [7777777, '7,42 MB'],
            [88888888, '84,77 MB'],
            [999999999, '953,67 MB'],
        ];
    }
}