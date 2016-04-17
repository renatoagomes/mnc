<?php 
/**
 *Metodo para calcular o valor de uma funcao exponencial
 *
 * @param $argumento - valor de x
 * @param $precisao
 * @param $maxIteracoes - numero maximo de iteraÃ§Ãµes
 * @param $numIteraÃ§Ãµes - retorno com o numero de iteraÃ§Ãµes realizadas
 * @param $codErro - retorno representando sucesso ou nao
 *
 * @returnn $valor da funcao no ponto 
 */
function expo($argumento, $precisao, $maxIteracoes, &$numIteracoes, &$codErro)
{
    $condicaoParada = false;
    $valor = 1;
    $termo=1;
    $termoAnterior = 1;
    $erro = 1;


    while (!$condicaoParada) {
        $termoAnterior = $termo;
        $termo = ($termo*$argumento) / $numIteracoes;
        $valor = $valor + $termo;

        $erro = ($numIteracoes > 1) ? abs($termoAnterior - $termo) : 1;


        $numIteracoes++;
        
        $condicaoParada = ($erro < 0.001) ? true : false;
    
        echo " K -> " . $numIteracoes ." VALOR -> " . $valor . "  termoAnterior -> " . $termoAnterior ."  termo -> " . $termo .   " ERRO -> " . $erro. "\n <br>";
    }

    return $valor;
}





Route::get('/mnc', function() {

    $argumento = 2.000;
    $precisao = 0.001;
    $maxIteracoes = 10;
    $numIteracoes = 1;
    $codErro = 0;

    $retorno = expo($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro);

    dd($retorno, $numIteracoes, $codErro);

});


?>
