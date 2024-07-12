

<?php

function printFrame(string $texto): void {

    //divide el texto en palabras

    $quotes = explode(" ", $texto);

    //encuentra la longitud de la palabra más larga

    $maxLength = 0;
    foreach ($quotes as $quote) {
        if(strlen($quote) > $maxLength) {
            $maxLength = strlen($quote);
        }
    }

    //imprime la parte superior del marco 
    $frame = str_repeat("#", $maxLength + 4);
    echo $frame . "<br>";

    //imprimie cada palabra en una linea con almohadillas
    foreach ($quotes as $quote) {
    // primero calculams los espacios a la izquierda y a la derecha 
        $leftPadding = floor(($maxLength - strlen($quote)) / 2); //lo dividimos por 2 para que los espacios sean equitativos en ambos lados
        $rightPadding = $maxLength - strlen($quote) - $leftPadding;
        $paddedWord = str_repeat(" ", $leftPadding) . $quote . str_repeat(" ", $rightPadding);
        echo "#".$paddedWord. "#<br>";
    }

    //imprimi la parte inferior del marco
    echo $frame;
}

$texto = "¿Has Debugado hoy?";
printFrame($texto);


?>