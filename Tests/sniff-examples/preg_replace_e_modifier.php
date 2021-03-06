<?php

$Source = "anything";
$Replace = "anything";

///////////// No warning generated:

// Different quote styles.
preg_replace("/double-quoted/", $Replace, $Source);
preg_replace('/single-quoted/', $Replace, $Source);

// Different regex markers.
preg_replace('#hash-chars (common)#', $Replace, $Source);
preg_replace('!exclamations (why not?!', $Replace, $Source);

// Safe modifiers
preg_replace('/some text/mS', $Replace, $Source);
preg_replace('#some text#gi', $Replace, $Source);

// E modifier doesn't exist, but should not trigger error.
preg_replace('//E', $Replace, $Source);

///////////// Warning generated:

// Different quote styles.
preg_replace("/double-quoted/e", $Replace, $Source);
preg_replace('/single-quoted/e', $Replace, $Source);

// Different regex markers.
preg_replace('#hash-chars (common)#e', $Replace, $Source);
preg_replace('!exclamations (why not?!e', $Replace, $Source);

// Other modifiers with /e
preg_replace('/some text/emS', $Replace, $Source);
preg_replace('/some text/meS', $Replace, $Source);
preg_replace('/some text/mSe', $Replace, $Source);

///////////// Untestable - should not generate an error.

$Regex = "/anything/";
X_REGEX_Xe = "/anything/";
function GetRegex() {
    return "/anything/";
}

preg_replace($Regex, $Replace, $Source);
preg_replace(GetRegex(), $Replace, $Source);
preg_replace(X_REGEX_Xe, $Replace, $Source);
