<?php


include_once('./Matcher.php');
include_once('./WordMatcher.php');

include_once('./Formatter.php');
include_once('./LineFormatter.php');
include_once('./HtmlFormatter.php');

include_once('./FizzBuzz.php');

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