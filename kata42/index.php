
<?php
define('FRAME_CHAR', '#');
define('BORDER_PADDING', 4);
$texto = readline("Ingrese el texto aqui");
printFrame($texto);

function printFrame(string $texto): void {
    $quotes = explode(" ", $texto);
    $maxLength = 0;

    foreach ($quotes as $quote) {
        if(strlen($quote) > $maxLength) {
            $maxLength = strlen($quote);
        }
    }
    $frame = str_repeat(FRAME_CHAR, $maxLength + BORDER_PADDING);
    echo $frame . PHP_EOL;

    foreach ($quotes as $quote) {
        $leftPadding = floor(($maxLength - strlen($quote)) / 2);
        $rightPadding = $maxLength - strlen($quote) - $leftPadding;
        $paddedWord = str_repeat(" ", $leftPadding) . $quote . str_repeat(" ", $rightPadding);
        echo FRAME_CHAR . $paddedWord . FRAME_CHAR . PHP_EOL;
    }

    echo $frame.PHP_EOL;
}


?>