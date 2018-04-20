<?php /** @noinspection PhpUnhandledExceptionInspection */

namespace PatrickBierans\TemplateFilter;

use PatrickBierans\TemplateFilter\FilenameHyperReference as HREF;
use PHPUnit\Framework\TestCase;

class FilenameHyperReferenceTest extends TestCase {

    public function testBasics(): void {
        HREF::setRoot('/var/www');
        $this->assertEquals('a.php', HREF::apply('/var/www/a.php'));
        HREF::setRoot('/var/www/');
        $this->assertEquals('a.php', HREF::apply('/var/www/a.php'));
        HREF::setRoot('/var/nothere/../www');
        $this->assertEquals('a.php', HREF::apply('/var/www/a.php'));
        $this->assertEquals('a.php', HREF::apply('/var/www/nothere/../a.php'));
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testExceptionRootNotAbsolute(): void {
        HREF::setRoot('hi there');
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testExceptionOutOfRootSimple(): void {
        HREF::setRoot('/var/www');
        HREF::apply('/usr/local/bin/pwd');
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testExceptionOutOfRootValue(): void {
        HREF::apply('relative_filename.txt');
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testExceptionOutOfRootClever(): void {
        HREF::setRoot('/var/www');
        HREF::apply('/var/www/../../usr/local/bin/pwd');
    }

}