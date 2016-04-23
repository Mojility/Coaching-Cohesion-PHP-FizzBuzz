<?php

include_once('src/Formatter.php');
include_once('src/Matcher.php');
include_once('src/FizzBuzzFactory.php');

class FizzBuzz {

    private $wordMatchers = array();
    private $formatter;
    private $writer;

    public function __construct(Formatter $formatter, OutputWriter $writer) {
        $this->formatter = $formatter;
        $this->writer = $writer;
    }

    public function addMatcher(Matcher $matcher) {
        array_push($this->wordMatchers, $matcher);
    }

    public function run($start = 1, $end = 25) {
        $this->displayHeader();
        $this->loopOver($start, $end);
        $this->displayFooter();
    }

    private function loopOver($start, $end) {
        array_map(
            function ($input) {
                $this->displayOutput($input);
            },
            range($start, $end)
        );
    }

    function displayHeader() {
        $this->writer->writeln($this->formatter->header());
    }

    function displayOutput($input) {
        $this->writer->writeln($this->formatter->format($input, $this->calculateOutput($input)));
    }

    function displayFooter() {
        $this->writer->writeln($this->formatter->footer());
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
