<?php

    // The goal of this exercise is to convert a string to a new string 
    // where each character in the new string is
    // "(" if that character appears only once in the original string, or ")" 
    // if that character appears more than once in the original string. 
    // Ignore capitalization when determining if a character is a duplicate.

    function duplicate_encode($word) {
        $newString = '';

        return $word;
    }

    echo duplicate_encode(' ( ( )');
    echo duplicate_encode('din');
    echo duplicate_encode('recede');
    echo duplicate_encode('Success');
    echo duplicate_encode('iiiiii');