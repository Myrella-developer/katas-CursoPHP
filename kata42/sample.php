<?php

define('FRAME_CHAR','#');
define('BORDER_PADDING',4);

//TODO: Remember, we should validate EVERY input entry. Not the main purpose of the exercise.
$text_to_print = readline();
printFrame($text_to_print);

function printFrame(string $text_to_print): void {
    $words = explode(" ",$text_to_print);
    $longest_word_length = getLongestWordLength($words);
    printFrameRow($longest_word_length);
    printWordRows($words,$longest_word_length);
    printFrameRow($longest_word_length);
 }

function getLongestWordLength(array $words): int {
    $size = 0;
    foreach($words as $word) {
        if(strlen($word) > $size) $size = strlen($word);
    }
    return $size;
}

function printFrameRow(int $n_columns): void {
    $range = range(1,$n_columns+BORDER_PADDING);
    foreach($range as $row) {
        echo FRAME_CHAR;
    }
    echo PHP_EOL;
}

function printWordRows(array $words,int $longest_word_length): void {
    foreach($words as $word){
        echo "# ".$word;
        printRemainingRow(strlen($word),$longest_word_length);
    }
}

function printRemainingRow(int $current_word_length, int $longest_word_length): void {
    $columns_diff = $longest_word_length-$current_word_length;
    $con = 0;
    while($con < $columns_diff) {
        echo " ";
        ++$con;
    }
    echo " ".FRAME_CHAR.PHP_EOL;
}



?>