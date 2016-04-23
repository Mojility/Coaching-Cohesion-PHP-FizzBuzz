<?php

include_once('src/Formatter.php');

class HtmlFormatter implements Formatter {
    private $title;

    function __construct($title) {
        $this->title = $title;
    }

    function header() {
        $header = "<h1>" . $this->title . "</h1>";
        $header .= "<table>";
        $header .= "<tr><th>Input</th><th>Output</th></tr>";
        return $header;
    }

    function format($input, $result) {
        return "<tr><td>$input</td><td>$result</td></tr>";
    }

    function footer() {
        return "</table>";
    }
}
