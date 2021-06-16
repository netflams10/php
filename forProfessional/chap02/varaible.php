<?php
    $variableName = 'foo';
    $foo = 'bar';

    // The following are all quivalent...
    echo $foo;
    echo "\n";
    echo ${$variableName};
    echo "\n";
    echo $$variableName;