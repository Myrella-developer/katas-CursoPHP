<?php


    $xCount = 0;
    $oCount = 0;

// Solicitar entradas
echo "Ingresa los caracteres (X y O). Escribe 'fin' para terminar:\n";

while (true) {
    $entrada = trim(fgets(STDIN));

    // Terminar el ingreso si se escribe 'fin'
    if (strtolower($entrada) === 'fin') {
        break;
    }

    // Contar los caracteres
    if ($entrada === 'X') {
        $xCount++;
    } elseif ($entrada === 'O') {
        $oCount++;
    } else {
        echo "Por favor, ingresa solo 'X' o 'O'.\n";
    }
}

// Mostrar resultados
echo "Total de X: $xCount\n";
echo "Total de O: $oCount\n";

if ($xCount > $oCount) {
    echo "¡Gana X!\n";
} elseif ($oCount > $xCount) {
    echo "¡Gana O!\n";
} else {
    echo "¡Es un empate!\n";
}
?>



<!-- //Tenemos que crear un programa que *avalui el 
resultado de una partida de "Tic Taco *Toe". 
En concreto, nos tiene que decir, dada una partida, quien ha ganado.

Input

XOO
OXO
-OX

OX-
OX-
O--

OXO
XOX
XXO

Output

Ganan las "X"!

Ganan las "O"!

Empate!

*Bonus *Track: Podemos dar por hecho que las 
*jugadades tendrán valores válido, pero sabrías programar 
también un *validador de partidas? De tal manera que si 
la partida noes fuera válida el resultado a mostrar fuera "Partida *nula"? -->