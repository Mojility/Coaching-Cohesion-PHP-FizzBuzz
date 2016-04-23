<?php

require_once('src/WordMatcher.php');

class WordMatcherTest extends PHPUnit_Framework_TestCase {

    function testMatchesCorrectly() {
        $modulus = 3;
        $matcher = new WordMatcher($modulus, "Fizz");
        $this->assertTrue($matcher->matches($modulus));
        $this->assertTrue($matcher->matches(2 * $modulus));
        $this->assertFalse($matcher->matches($modulus-1));
        $this->assertFalse($matcher->matches($modulus+1));
    }

    function testWordResult() {
        $word = "Hello";
        $matcher = new WordMatcher(3, $word);
        $this->assertEquals($word, $matcher->result());
    }

}
