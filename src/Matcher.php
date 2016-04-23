<?php

interface Matcher {
    function matches($input);

    function result();
}
