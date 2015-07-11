<?php

include_once('./Formatter.php');

class LineFormatter implements Formatter {
    private $title;
    private $format;

    function __construct($title, $width, $separator) {
        // ie. %5u -> %s\n for width 5, separator " -> "
        $this->title = $title;
        $this->format = "%" . $width . "u";
        $this->format .= $separator;
        $this->format .= "%s\n";
    }

    function header() {
        $header = "\n\n" . $this->title . "\n";
        $header .= "-----------------\n";
        return $header;
    }

    function footer() {
        return "\n";
    }

    function format($input, $result) {
        return sprintf($this->format, $input, $result);
    }
}
