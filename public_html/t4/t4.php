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

            for ($ui = $i; $ui <= $ordemMatriz; $ui++) {
                $soma = 0;
                for ($somai = 0; $somai < count; $somai++) {
                    $soma;
                }


            }



        }

    }


    echo "dentro de gauss";

}


?>
