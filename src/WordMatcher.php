<?php

include_once('src/Matcher.php');

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
