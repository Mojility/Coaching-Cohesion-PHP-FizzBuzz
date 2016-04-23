<?php

/**
 * Class FormatterCheckingTestCase
 *
 * This could be implemented as a Trait if your PHP version is compatible... it would make for an arguably
 * cleaner structure.
 */
class FormatterCheckingTestCase extends PHPUnit_Framework_TestCase {

    protected function checkHeaderContainsTitle(Formatter $formatter, $title) {
        $this->assertContains($title, $formatter->header());
    }

    protected function checkFormattedEntryContainsInputAndResult(Formatter $formatter, $input, $result) {
        $output = $formatter->format($input, $result);
        $this->assertContains($input, $output);
        $this->assertContains($result, $output);
    }

}