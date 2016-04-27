<?php 

/**
 * Metodo para calcular o valor de uma funcao exponencial
 *
 * @param $argumento - valor de x
 * @param $precisao - valor da precisao desejada (ex: 0.0001 = 10^-4)
 * @param $maxIteracoes - numero maximo de iteraÃ§Ãµes
 * @param $numIteraÃ§Ãµes - retorno com o numero de iteraÃ§Ãµes realizadas
 * @param $codErro - retorno representando sucesso ou nao
 *
 * @return $codErro da funcao no ponto 
 */
function expo($argumento, $precisao, $maxIteracoes, &$numIteracoes, &$codErro)
{
    //inicializando variaveis para o loop
    $condicaoParada = false;
    $valor = 1;
    $termo=1;
    $termoAnterior = 1;
    $erro = 1;
    $casasDecimais = arrumaPrecisao($precisao);

    while (!$condicaoParada) {
        //calculando os novos valores para essa iteracao
        $termo = ($termo*$argumento) / $numIteracoes;
        $valor = $valor + $termo;
        $erro = ($numIteracoes > 1) ? ($termo / $valor) : 1;

        //formatando os valores de acordo com a precisao desejada
        $erro =  number_format($erro, $casasDecimais);
        $termo =  number_format($termo, $casasDecimais);
        $valor =  number_format($valor, $casasDecimais);

        imprimeExpoIteracoes($numIteracoes, $valor, $termo, $erro, $casasDecimais);

        $numIteracoes++;

        //se o erro for menor que a precisao entao convergiu e obtive sucesso
        if ($erro < $precisao) {
            $codErro = 0;
            $condicaoParada =  true;
        }

        if ($numIteracoes > $maxIteracoes) {
            $codErro = 1;
            $condicaoParada =  true;
        }
    }

    return $codErro;
}

/**
 * Metodo para imprimir uma iteracao do metodo expo em forma de tr
 *
 * @param $indiceIteracao - numero da iteracao
 * @param $valorExponencial - valor da funcao Exponencial para essa iteracao
 * @param $valorTermo - valor do termo para essa iteracao
 * @param $valorErro - valor do erro para essa iteracao
 * @param $precisao - numero de casas decimais depois da virgula
 */
function imprimeExpoIteracoes($indiceIteracao, $valorExponencial, $valorTermo, $valorErro, $precisao)
{
    echo "<tr>" .
            "<td>$indiceIteracao</td>" .
            "<td>".number_format($valorTermo, $precisao)."</td>" .
            "<td>".number_format($valorExponencial, $precisao)."</td>" .
            "<td>".((is_numeric($valorErro)) ? number_format($valorErro, $precisao+1) : $valorErro). "</td>" .
        "</tr>";
}

/**
 * Metodo para arrumar a precisao (0.001) --> (3)
 *
 * @param $precisao - numero para a precisao (0.0001)
 *
 * @return numero de casas decimais
 */
function arrumaPrecisao($precisao) {
    //se existir uma string depois do '.' entao pegue o numero de caracteres
    if (array_key_exists("1", explode('.', $precisao))) {
        $precisao =  strlen(explode('.', $precisao)[1]);
    } else {
        $precisao = 3;
    }

    return ($precisao+1);
}


/**
 * Metodo para calcular o valor de uma funcao logaritmica
 *
 * @param $argumento - valor de x
 * @param $precisao - valor da precisao desejada (ex: 0.0001 = 10^-4)
 * @param $maxIteracoes - numero maximo de iteraÃ§Ãµes
 * @param $numIteraÃ§Ãµes - retorno com o numero de iteraÃ§Ãµes realizadas
 * @param $codErro - retorno representando sucesso ou nao
 *
 * @return $codErro da funcao no ponto
 */
function loge($argumento, $precisao, $maxIteracoes, &$numIteracoes, &$codErro)
{
    //inicializando variaveis para o loop
    $condicaoParada = false;
    $valor = 0;
    $termo=1;
    $termoAnterior = 1;
    $erro = 1;
    $casasDecimais = arrumaPrecisao($precisao);

    while (!$condicaoParada) {
        //calculando os novos valores para essa iteracao
        $termo = (2/$numIteracoes) * pow((($argumento - 1) / ($argumento + 1)), $numIteracoes);
        $valor = $valor + $termo;
        $erro = ($numIteracoes > 1) ? ($termo / $valor) : 1;

        //formatando os valores de acordo com a precisao desejada
        $erro =  number_format($erro, $casasDecimais);
        $termo =  number_format($termo, $casasDecimais);
        $valor =  number_format($valor, $casasDecimais);

        imprimeExpoIteracoes($numIteracoes, $valor, $termo, $erro, $casasDecimais);

        $numIteracoes++;
        $numIteracoes++;

        //se o erro for menor que a precisao entao convergiu e obtive sucesso
        if ($erro < $precisao) {
            $codErro = 0;
            $condicaoParada =  true;
        }

        if ($numIteracoes > $maxIteracoes) {
            $codErro = 1;
            $condicaoParada =  true;
        }
    }

    return $codErro;
}

/**
 * Metodo para calcular o valor de uma funcao seno
 *
 * @param $argumento - valor de x
 * @param $precisao - valor da precisao desejada (ex: 0.0001 = 10^-4)
 * @param $maxIteracoes - numero maximo de iteraÃ§Ãµes
 * @param $numIteraÃ§Ãµes - retorno com o numero de iteraÃ§Ãµes realizadas
 * @param $codErro - retorno representando sucesso ou nao
 *
 * @return $codErro da funcao no ponto
 */
function seno($argumento, $precisao, $maxIteracoes, &$numIteracoes, &$codErro)
{

    //removendo as voltas completas do argumento para que os valores
    //estejam dentro do intervalo [0 - 2PI]
    $argumento = getValorSemVoltasCompletas($argumento);

    //inicializando variaveis para o loop
    $condicaoParada = false;
    $valor = 0;
    $termo = $argumento;
    $erro = 1;
    $casasDecimais = arrumaPrecisao($precisao);

    while (!$condicaoParada) {
        //calculando os novos valores para essa iteracao
        if ($numIteracoes > 1) {
            $termo = $termo * ( (-pow($argumento,2) ) / (($numIteracoes-1)*($numIteracoes)) );
        }
        $valor = $valor + $termo;
        $erro = ($numIteracoes > 1) ? ($termo / $valor) : 1;

        //formatando os valores de acordo com a precisao desejada

        imprimeExpoIteracoes($numIteracoes, $valor, $termo, $erro, $casasDecimais);

        $numIteracoes++;
        $numIteracoes++;

        //se o erro for menor que a precisao entao convergiu e obtive sucesso
        if (abs($erro) < $precisao) {
            $codErro = 0;
            $condicaoParada =  true;
        }

        if ($numIteracoes > $maxIteracoes) {
            $codErro = 1;
            $condicaoParada =  true;
        }
    }

    return $codErro;
}

/**
 * Metodo para calcular o valor de uma funcao cosseno
 *
 * @param $argumento - valor de x
 * @param $precisao - valor da precisao desejada (ex: 0.0001 = 10^-4)
 * @param $maxIteracoes - numero maximo de iteraÃ§Ãµes
 * @param $numIteraÃ§Ãµes - retorno com o numero de iteraÃ§Ãµes realizadas
 * @param $codErro - retorno representando sucesso ou nao
 *
 * @return $codErro da funcao no ponto
 */
function cosseno($argumento, $precisao, $maxIteracoes, &$numIteracoes, &$codErro)
{

    //removendo as voltas completas do argumento para que os valores
    //estejam dentro do intervalo [0 - 2PI]
    $argumento = getValorSemVoltasCompletas($argumento);

    //inicializando variaveis para o loop
    $condicaoParada = true;
    $valor = 1;
    $termo = 1;
    $erro = 1;
    $casasDecimais = arrumaPrecisao($precisao);

    while (!$condicaoParada) {
        //calculando os novos valores para essa iteracao
        if ($numIteracoes > 1) {
           //TODO: qual razao para ser multiplicada? $termo = 
        }
        $valor = $valor + $termo;
        $erro = abs(($numIteracoes > 1) ? ($termo / $valor) : 1);

        //formatando os valores de acordo com a precisao desejada

        imprimeExpoIteracoes($numIteracoes, $valor, $termo, $erro, $casasDecimais);

        $numIteracoes++;
        $numIteracoes++;

        //se o erro for menor que a precisao entao convergiu e obtive sucesso
        if ($erro < $precisao) {
            $codErro = 0;
            $condicaoParada =  true;
        }

        if ($numIteracoes > $maxIteracoes) {
            $codErro = 1;
            $condicaoParada =  true;
        }
    }

    return $codErro;
}



/**
 * Metodo para ser usado em funcoes trigonometricas,
 * que coloca o valor recebido dentro de um valor equivalente dentro do circulo trigonometrico
 * (2,5PI  -->  0,5PI)
 *
 * return - $valorTransformado - valor dentro de um intervalo [0 - 2PI]
 */
function getValorSemVoltasCompletas($numRadianos)
{
    //valor recebido
    $fullValue = abs($numRadianos);

    if ($fullValue > (2*M_PI)) {
        $fullValue = getValorSemVoltasCompletas($fullValue-(2*M_PI));
    } else {
        return $fullValue;
    }

    return $fullValue;
}

?>
