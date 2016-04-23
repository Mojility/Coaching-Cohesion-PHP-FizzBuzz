<?php

interface Formatter {
    function header();
    function format($input, $result);
    function footer();
}
