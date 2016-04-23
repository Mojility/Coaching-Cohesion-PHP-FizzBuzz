<?php

require_once('spec/FormatterCheckingTestCase.php');
require_once('src/HtmlFormatter.php');

class HtmlFormatterTest extends FormatterCheckingTestCase {

    function testBasicFormatting() {
        $title = "Sample";
        $formatter = new HtmlFormatter($title);

        $this->checkHeaderContainsTitle($formatter, $title);
        $this->checkFormattedEntryContainsInputAndResult($formatter, "3", "Hello");
    }

}
