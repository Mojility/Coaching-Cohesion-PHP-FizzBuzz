<?php

include_once('src/Formatter.php');
include_once('src/Matcher.php');
include_once('src/FizzBuzzFactory.php');

class FizzBuzz {

    private $wordMatchers = array();
    private $formatter;

    function __construct(Formatter $formatter) {
        $this->formatter = $formatter;
    }

    function addMatcher(Matcher $matcher) {
        array_push($this->wordMatchers, $matcher);
    }

    function run($start = 1, $end = 25) {
        $this->displayHeader();
        $this->loopOver($start, $end);
        $this->displayFooter();
    }

    function loopOver($start, $end) {
        array_map(
            function ($input) {
                $this->displayOutput($input);
            },
            range($start, $end)
        );
    }

    function displayHeader() {
        echo $this->formatter->header();
    }

    function displayOutput($input) {
        echo $this->formatter->format($input, $this->calculateOutput($input));
    }

    function displayFooter() {
        echo $this->formatter->footer();
    }

    function calculateOutput($input) {
        return $this->doAnyMatchersMatch($input) ? $this->joinAllWords($input) : $input;
    }

    function doAnyMatchersMatch($input) {
        return count($this->selectAppropriateMatchers($input)) > 0;
    }

    function selectAppropriateMatchers($input) {
        return array_filter($this->wordMatchers, function (Matcher $matcher) use ($input) {
            return $matcher->matches($input);
        });
    }

    function joinAllWords($input) {
        return implode($this->translateWordsForMatchers($input));
    }

    function translateWordsForMatchers($input) {
        return array_map(function (Matcher $matcher) {
            return $matcher->result();
        }, $this->selectAppropriateMatchers($input));
    }

}