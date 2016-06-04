<?php 
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

/**
 * Metodo para imprimir uma iteracao do metodo expo em forma de tr
 *
 * @param $indiceIteracao - numero da iteracao
 * @param $valorExponencial - valor da funcao Exponencial para essa iteracao
 * @param $valorTermo - valor do termo para essa iteracao
 * @param $valorErro - valor do erro para essa iteracao
 * @param $precisao - numero de casas decimais depois da virgula
 */
function imprimeIteracoes($indiceIteracao, $valorExponencial, $valorTermo, $valorErro, $precisao)
{
    echo "<tr>" .
            "<td>$indiceIteracao</td>" .
            "<td>".number_format($valorTermo, $precisao)."</td>" .
            "<td>".number_format($valorExponencial, $precisao)."</td>" .
            "<td>".((is_numeric($valorErro)) ? number_format($valorErro, $precisao+1) : $valorErro). "</td>" .
        "</tr>";
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
function imprimeIteracoesArray($arrayValores)
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
function arrumaPrecisao($precisao)
{
    //se existir uma string depois do '.' entao pegue o numero de caracteres
    if (array_key_exists("1", explode('.', $precisao))) {
        $precisao =  strlen(explode('.', $precisao)[1]);
    } else {
        $precisao = 3;
    }

    return ($precisao+1);
}

?>
