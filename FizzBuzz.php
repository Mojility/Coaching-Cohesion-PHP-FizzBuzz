<?php

interface Matcher {
  function matches($input);
  function result();
}

class WordMatcher implements Matcher {
  private $modulus, $word;
  function __construct($modulus, $word) {
    $this->modulus = $modulus;
    $this->word = $word;
  }
  function matches($input) {
    return $input % $this->modulus == 0;
  }
  function result() {
    return $this->word;
  }
}

interface Formatter {
  function format($input, $result);
}

class LineFormatter implements Formatter {
  private $format;
  function __construct($width, $separator) {
    // ie. %5u -> %s\n for width 5, separator " -> "
    $this->format = "%" . $width . "u";
    $this->format .= $separator;
    $this->format .= "%s\n";
  }
  function format($input, $result) {
    return sprintf($this->format, $input, $result);
  }
}

class FizzBuzz {

  private $wordMatchers = array();
  private $formatter;

  function __construct($formatter) {
    $this->formatter = $formatter;
  }

  function addMatcher($matcher) {
    array_push($this->wordMatchers, $matcher);
  }

  function run($start = 1, $end = 25) {
    $this->loopOver($start, $end);
  }

  function loopOver($start, $end) {
    array_map(
        function ($input) { $this->displayOutput($input); },
        range($start, $end)
    );
  }

  function displayOutput($input) {
    echo $this->formatter->format($input, $this->calculateOutput($input));
  }

  function calculateOutput($input) {
    return $this->doAnyMatchersMatch($input) ? $this->joinAllWords($input) : $input;
  }

  function doAnyMatchersMatch($input) {
    return count($this->selectAppropriateMatchers($input)) > 0;
  }

  function selectAppropriateMatchers($input) {
    return array_filter($this->wordMatchers, function($matcher) use($input) { return $matcher->matches($input); });
  }

  function joinAllWords($input) {
    return implode($this->translateWordsForMatchers($input));
  }

  function translateWordsForMatchers($input) {
    return array_map(function($matcher) { return $matcher->result(); }, $this->selectAppropriateMatchers($input));
  }

}

class FizzBuzzFactory {
  static function standardFizzBuzz() {
    $fb = new FizzBuzz(new LineFormatter(3, " -> "));
    $fb->addMatcher(new WordMatcher(3, "Fizz"));
    $fb->addMatcher(new WordMatcher(5, "Buzz"));
    $fb->addMatcher(new WordMatcher(7, "Woof"));
    return $fb;
  }
}

FizzBuzzFactory::standardFizzBuzz()->run();
