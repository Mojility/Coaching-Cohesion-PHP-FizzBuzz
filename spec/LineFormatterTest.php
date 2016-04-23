<?php

require_once('src/LineFormatter.php');

class LineFormatterTest extends FormatterCheckingTestCase {

    function testBasicFormatting() {
        $title = "Sample";
        $separator = " : ";
        $input = "3";
        $result = "Hello";

        $formatter = new LineFormatter($title, 3, $separator);

        $this->checkHeaderContainsTitle($formatter, $title);
        $this->checkFormattedEntryContainsInputAndResult($formatter, $input, $result);
        $this->assertContains($separator, $formatter->format($input, $result));
    }

}
