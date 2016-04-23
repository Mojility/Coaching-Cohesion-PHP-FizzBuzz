<?php

require_once('src/Formatter.php');
require_once('src/Matcher.php');
require_once('src/FizzBuzz.php');

class FizzBuzzTest extends PHPUnit_Framework_TestCase {

    function testSomething() {
        $formatter = $this->getMockBuilder('Formatter')->getMock();
        $matcher = $this->getMockBuilder('Matcher')->getMock();

        $writer = $this->getMock('OutputWriter', ['writeln']);

        $fb = new FizzBuzz($formatter, $writer);
        $fb->addMatcher($matcher);

        $fb->run(1, 10);
    }

}
