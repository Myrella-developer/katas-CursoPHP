<?php

define('FRAME_CHAR', '#');
define('BORDER_PADDING', 4);

$texto = readline("Introduce el texto a imprimir: ");
printFrame($texto);

function printFrame(string $texto): void {
    $quotes = explode(" ", $texto);
    $maxLength = getLongestWordLength($quotes);
    printFrameRow($maxLength);
    printWordRows($quotes, $maxLength);
    printFrameRow($maxLength);
}

function getLongestWordLength(array $quotes): int {
    $size = 0;
    foreach ($quotes as $quote) {
        if (mb_strlen($quote) > $size) {
            $size = mb_strlen($quote);
        }
    }
    return $size;
}

function printFrameRow(int $n_columns): void {
    for ($i = 0; $i < $n_columns + BORDER_PADDING; $i++) {
        echo FRAME_CHAR;
    }
    echo PHP_EOL;
}

function printWordRows(array $quotes, int $maxLength): void {
    foreach ($quotes as $quote) {
        echo FRAME_CHAR . " " . $quote;
        printRemainingRow(mb_strlen($quote), $maxLength);
    }
}

function printRemainingRow(int $current_max_length, int $maxLength): void {
    $columns_diff = $maxLength - $current_max_length;
    echo str_repeat(" ", $columns_diff) . " " . FRAME_CHAR . PHP_EOL;
}

