<?php

require "funcoes_auxiliares.php";

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

        //imprimeIteracoes($numIteracoes, $valor, $termo, $erro, $casasDecimais);

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

    return $valor;
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

        //imprimeIteracoes($numIteracoes, $valor, $termo, $erro, $casasDecimais);

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

    return $valor;
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

       //imprimeIteracoes($numIteracoes, $valor, $termo, $erro, $casasDecimais);

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

    return $valor;
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
    $condicaoParada = false;
    $valor = 1;
    $termo = 1;
    $erro = 1;
    $casasDecimais = arrumaPrecisao($precisao);

    while (!$condicaoParada) {
        //calculando os novos valores para essa iteracao
        if ($numIteracoes > 1) {
            $termo = $termo * ( (-pow($argumento,2) ) / (($numIteracoes-1)*($numIteracoes)) );
        }
        $valor = $valor + $termo;
        $erro = abs(($numIteracoes > 1) ? ($termo / $valor) : 1);

        //formatando os valores de acordo com a precisao desejada

       //imprimeIteracoes($numIteracoes, $valor, $termo, $erro, $casasDecimais);

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

    return $valor;
}

/**
 * Metodo para calcular o valor de uma funcao tangente
 *
 * @param $argumento - valor de x
 * @param $precisao - valor da precisao desejada (ex: 0.0001 = 10^-4)
 * @param $maxIteracoes - numero maximo de iteraÃ§Ãµes
 * @param $numIteraÃ§Ãµes - retorno com o numero de iteraÃ§Ãµes realizadas
 * @param $codErro - retorno representando sucesso ou nao
 *
 * @return $codErro da funcao no ponto
 */
function tag($argumento, $precisao, $maxIteracoes, &$numIteracoes, &$codErro)
{
    //removendo as voltas completas do argumento para que os valores
    //estejam dentro do intervalo [0 - 2PI]
    $argumento = getValorSemVoltasCompletas($argumento);

    //arrumando parametro precisao
    $casasDecimais = arrumaPrecisao($precisao);

    //inicializando os indices de Seno e Cosseno, para que as iteracoes deles
    //nao comecem com indices errados
    $numIteracoesSeno = 1;
    $numIteracoesCosseno = 2;

    //variaveis para pegar o codErro das funcoes seno e cosseno
    $codErroSeno = 0;
    $codErroCosseno = 0;

    //Calculando tan x = sen x / cos x
    $senoNoPto = seno($argumento, $precisao, $maxIteracoes, $numIteracoesSeno, $codErroSeno);
    $cossenoNoPto = cosseno($argumento, $precisao, $maxIteracoes, $numIteracoesCosseno, $codErroCosseno);
    $valor = $senoNoPto / $cossenoNoPto;

    // no caso de tangente, tenho que checar os códigos de erro das funcoes seno e cosseno
    // ja que nao uso da formula de series de tangente e sim das series de seno e cosseno
    if (!$codErroSeno || !$codErroCosseno) {
        //como 0 é o codigo de sucesso, se ambos os códigos de erro forem 0 entao funcionou
        $codErro = 0;
    } else {
        $codErro = $codErroSeno ? $codErroSeno : $codErroCosseno;
    }

    return $valor;
}

/**
 * Metodo para calcular o valor de uma funcao secante
 *
 * @param $argumento - valor de x
 * @param $precisao - valor da precisao desejada (ex: 0.0001 = 10^-4)
 * @param $maxIteracoes - numero maximo de Iteracoes
 * @param $numIteracoes - retorno com o numero de Iteracoes realizadas
 * @param $codErro - retorno representando sucesso ou nao
 *
 * @return $valor - valor da funcao secante no ponto
 */
function sec($argumento, $precisao, $maxIteracoes, &$numIteracoes, &$codErro)
{
    //removendo as voltas completas do argumento para que os valores
    //estejam dentro do intervalo [0 - 2PI]
    $argumento = getValorSemVoltasCompletas($argumento);

    //arrumando parametro precisao
    $casasDecimais = arrumaPrecisao($precisao);

    //inicializando os indice de Cosseno, para que as iteracoes dele
    //nao comecem com indices errados
    $numIteracoesCosseno = 2;

    //variaveis para pegar o codErro da funcao cosseno
    $codErroCosseno = 0;

    //Calculando sec x =  1 / cos x
    $cossenoNoPto = cosseno($argumento, $precisao, $maxIteracoes, $numIteracoesCosseno, $codErroCosseno);
    $valor = 1 / $cossenoNoPto;

    // no caso de secante, tenho que checar o código de erro da funcao cosseno
    if (!$codErroCosseno) {
        //como 0 é o codigo de sucesso, se ambos os códigos de erro forem 0 entao funcionou
        $codErro = 0;
    } else {
        $codErro = $codErroCosseno;
    }

    return $valor;
}

/**
 * Metodo para calcular o valor de uma funcao cosecante
 *
 * @param $argumento - valor de x
 * @param $precisao - valor da precisao desejada (ex: 0.0001 = 10^-4)
 * @param $maxIteracoes - numero maximo de Iteracoes
 * @param $numIteracoes - retorno com o numero de Iteracoes realizadas
 * @param $codErro - retorno representando sucesso ou nao
 *
 * @return $valor - valor da funcao cosecante no ponto
 */
function cosec($argumento, $precisao, $maxIteracoes, &$numIteracoes, &$codErro)
{
    //removendo as voltas completas do argumento para que os valores
    //estejam dentro do intervalo [0 - 2PI]
    $argumento = getValorSemVoltasCompletas($argumento);

    //arrumando parametro precisao
    $casasDecimais = arrumaPrecisao($precisao);

    //inicializando os indice de Seno, para que as iteracoes dele
    //nao comecem com indices errados
    $numIteracoesSeno = 1;

    //variaveis para pegar o codErro das funcoes seno
    $codErroSeno = 0;

    //Calculando cosec x =  1 / sen x
    $senoNoPto = seno($argumento, $precisao, $maxIteracoes, $numIteracoesSeno, $codErroSeno);
    $valor = 1 / $senoNoPto;

    // no caso de cosecante, tenho que checar o código de erro da funcao seno
    if (!$codErroSeno) {
        //como 0 é o codigo de sucesso, se ambos os códigos de erro forem 0 entao funcionou
        $codErro = 0;
    } else {
        $codErro = $codErroSeno;
    }

    return $valor;
}


/**
 * Metodo para calcular o valor de uma funcao cotangente
 *
 * @param $argumento - valor de x
 * @param $precisao - valor da precisao desejada (ex: 0.0001 = 10^-4)
 * @param $maxIteracoes - numero maximo de Iteracoes
 * @param $numIteracoes - retorno com o numero de Iteracoes realizadas
 * @param $codErro - retorno representando sucesso ou nao
 *
 * @return $codErro da funcao no ponto
 */
function cotag($argumento, $precisao, $maxIteracoes, &$numIteracoes, &$codErro)
{
    //removendo as voltas completas do argumento para que os valores
    //estejam dentro do intervalo [0 - 2PI]
    $argumento = getValorSemVoltasCompletas($argumento);

    //arrumando parametro precisao
    $casasDecimais = arrumaPrecisao($precisao);

    //inicializando os indices de Seno e Cosseno, para que as iteracoes deles
    //nao comecem com indices errados
    $numIteracoesSeno = 1;
    $numIteracoesCosseno = 2;

    //variaveis para pegar o codErro das funcoes seno e cosseno
    $codErroSeno = 0;
    $codErroCosseno = 0;

    //Calculando cotan x = cos x / sen x;
    $senoNoPto = seno($argumento, $precisao, $maxIteracoes, $numIteracoesSeno, $codErroSeno);
    $cossenoNoPto = cosseno($argumento, $precisao, $maxIteracoes, $numIteracoesCosseno, $codErroCosseno);
    $valor = $cossenoNoPto / $senoNoPto;

    // no caso de cotangente, tenho que checar os códigos de erro das funcoes seno e cosseno
    // ja que nao uso da formula de series de tangente e sim das series de seno e cosseno
    if (!$codErroSeno || !$codErroCosseno) {
        //como 0 é o codigo de sucesso, se ambos os códigos de erro forem 0 entao funcionou
        $codErro = 0;
    } else {
        $codErro = $codErroSeno ? $codErroSeno : $codErroCosseno;
    }

    return $valor;
}

/**
 * Metodo para calcular o valor de uma funcao arcsen
 *
 * @param $argumento - valor de x
 * @param $precisao - valor da precisao desejada (ex: 0.0001 = 10^-4)
 * @param $maxIteracoes - numero maximo de Iteracoes
 * @param $numIteracoes - retorno com o numero de Iteracoes realizadas
 * @param $codErro - retorno representando sucesso ou nao
 *
 * @return $valor  - $valor da funcao no ponto
 */
function arcsen($argumento, $precisao, $maxIteracoes, &$numIteracoes, &$codErro)
{
    //inicializando variaveis para o loop
    $condicaoParada = false;
    $valor = 0;
    $termo = $argumento;
    $erro = 1;
    $casasDecimais = arrumaPrecisao($precisao);

    while (!$condicaoParada) {
        //calculando os novos valores para essa iteracao
        if ($numIteracoes > 1 ) {
            $termo = $termo * (  ( ($argumento*$argumento)/$numIteracoes) * (($numIteracoes-2) / ($numIteracoes-1)) );
        }

        $valor = $valor + $termo;
        $erro = ($numIteracoes > 1) ? ($termo / $valor) : 1;

        //formatando os valores de acordo com a precisao desejada
        $erro =  number_format($erro, $casasDecimais);
        $termo =  number_format($termo, $casasDecimais);
        $valor =  number_format($valor, $casasDecimais);

        imprimeIteracoes($numIteracoes, $valor, $termo, $erro, $casasDecimais);

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

    return $valor;
}




?>
