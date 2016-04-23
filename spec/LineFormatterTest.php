<?php

require_once('src/LineFormatter.php');

class LineFormatterTest extends PHPUnit_Framework_TestCase {

    function testBasicFormatting() {
        $title = "Sample";
        $input = "3";
        $separator = " : ";
        $result = "Hello";

        $formatter = new LineFormatter($title, $input, $separator);
        $line = $formatter->format($input, $result);

        $this->assertContains($title, $formatter->header());
        $this->assertContains($input, $line);
    }

}
