<?php


include_once('src/Matcher.php');
include_once('src/WordMatcher.php');

include_once('src/Formatter.php');
include_once('src/LineFormatter.php');
include_once('src/HtmlFormatter.php');

include_once('src/FizzBuzz.php');

class FizzBuzzFactory {
    static function addStandardMatchers($fb) {
        $fb->addMatcher(new WordMatcher(3, "Fizz"));
        $fb->addMatcher(new WordMatcher(5, "Buzz"));
        $fb->addMatcher(new WordMatcher(7, "Woof"));
    }

    static function commandLineFizzBuzz() {
        $fb = new FizzBuzz(new LineFormatter("FizzBuzz!", 3, " -> "));
        FizzBuzzFactory::addStandardMatchers($fb);
        return $fb;
    }

    static function webFizzBuzz() {
        $fb = new FizzBuzz(new HtmlFormatter("FizzBuzz!"));
        FizzBuzzFactory::addStandardMatchers($fb);
        return $fb;
    }
}