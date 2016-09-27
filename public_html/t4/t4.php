<?php


/**
 * Funcao para calcular resolucao de sistema linear por gauss compacto
 */
function gaussCompacto($ordemMatriz, $matriz, $arrayTermosInd, &$arraySolucao, &$codErro)
{

    //juntando termos independentes na matriz
    for ($i = 0; $i < $ordemMatriz; $i++) {
        array_push($matriz[$i], $arrayTermosInd[$i]);
    }

    //temos a matriz pronta para fazrmos LU
    $matrizAux = $matriz;
    
    for ($i = 0; $i <= $ordemMatriz; $i++) {

        //1º linha de L
        if ($i == 0) {
            for ($cont = $i+1; $cont < $ordemMatriz; $cont++) {
                $matrizAux[0][$cont] /= $matrizAux[0][0];
            }

        } else {
            //função U, caminha do meio até o fim
            for ($ui = $i; $ui <= $ordemMatriz; $ui++) 
                $matrizAux[$ui][$i]= $matrizAux[$ui][$i]- fsomatoria($matrizAux,$i);
            //função L, caminha para baixo na matriz    
            for ($t = $i; $t < $ordemMatriz; $t++)
                $matrizAux[i][t]=($matrizAux[i][t]-fsomatoria($matrizAux,$i))/$matrizAux[i][i];
        }

    }


    echo "dentro de gauss";

}
//função somatoria caminha do incio da linha e da coluna até o elemento antes da diagonal principal
function fsomatoria($matrizAux,$i){
    for($j=0,$j<$i,$j++)
        $aux = $aux + $matrizAux[j][i] * $matrizAux[i][j];
    return ($aux);
}




?>
