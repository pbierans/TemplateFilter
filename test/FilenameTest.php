<?php /** @noinspection SpellCheckingInspection */

namespace PatrickBierans\TemplateFilter;

use PHPUnit\Framework\TestCase;

class FilenameTest extends TestCase {

    public function test(): void {
        $input = ' Döner\!Factory  ;..$';

        $this->assertEquals(
            'Doener_Factory',
            Filename::apply($input),
            'save on every filesystem and os'
        );
    }
}