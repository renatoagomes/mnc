<?php
require "../funcoes_auxiliares.php";


/**
 * Classe para representar o T2 (Calculo de zeros de Funcao);
 */
Class T2
{

    /**
     * Metodo para calcular zeros de funcao utilizado o metodo da bissecao
     *
     * @param $funcao - Closure - funcao que vamos encontrar a raiz
     * @param $limInf - Limite inferior do intervalo inicial
     * @param $limSup - Limite superior do intervalo inicial
     * @param $precisao - valor da precisao desejada (ex: 0.0001 = 10^-4)
     * @param $numIteracoes - retorno com o numero de iteracoes realizadas
     * @param $codErro - retorno representando sucesso ou nao
     *
     * @return $valor da raiz da funcao
     */
    public function bissecao(Closure $funcao, $limInf, $limSup, $precisao, &$numIteracoes, &$codErro)
    {
        //arrumando casas decimais
        $casasDecimais = arrumaPrecisao($precisao);

        //checando tamanho do intervalo
        $tamanhoIntervalo = $limSup - $limInf;
        while ($tamanhoIntervalo > $precisao)
        {
            //obtendo ponto medio do intervalo
            $ptoMedio = ($limSup + $limInf) / 2;

            //obtendo valores da funcao no ponto
            $valorFuncaoInf = $funcao($limInf);
            $valorFuncaoSup = $funcao($limSup);
            $valorFuncaoPtoMedio = $funcao($ptoMedio);

            //Testando pelo teorema de bolzano se existe raiz f(a)*f(b) < 0
            $existeRaiz =  ((($valorFuncaoInf * $valorFuncaoSup) < 0) ? true : false );

            if ($valorFuncaoInf == 0) {
                echo 'intervalo inferior é raiz da funcao';
                return $valorFuncaoInf;
            }

            if ($valorFuncaoSup == 0) {
                echo 'intervalo superior é raiz da funcao';
                return $valorFuncaoSup;
            }

            if ($valorFuncaoPtoMedio == 0) {
                echo 'Raiz: ' . $ptoMedio;
                return $valorFuncaoPtoMedio;
            }

            //se f(a) * f(x) < 0 (raiz estano intervalo da esquerda)
            if ($valorFuncaoInf * $valorFuncaoPtoMedio < 0) {
                //echo '1 if';
                $limSup = $ptoMedio;
            }

            //se f(b) * f(x) < 0 (raiz estano intervalo da direita)
            if ($valorFuncaoSup * $valorFuncaoPtoMedio < 0) {
                //echo '2 if';
                $limInf = $ptoMedio;
            }

            //recalculando o tamanho do intervalo
            $tamanhoIntervalo = $limSup - $limInf;

            if ($tamanhoIntervalo < $precisao) {
                $codErro = 0;
                echo "Raiz da funcao: $ptoMedio \n<br>";
                echo "Numero de iteracoes: $numIteracoes";
                break;
            }

            $numIteracoes++;
        }
   }


    /**
     * Metodo para calcular a derivada primeira no ponto x
     */
    public function dfdx(Closure $funcao, $x, &$codErro)
    {
        $erro = 0.000001;
        $h = sqrt($erro)*$x;
        $derivada = ($funcao($x+$h) - $funcao($x)) / $h;

        //echo "h = $h <br>";
        //echo "erro = $erro <br>";
        //echo "derivada = $derivada <br>";

        return $derivada;
    }


    /**
     * Metodo para encontrar uma raiz utilizando o meoto de newton
     */
    public function newton(Closure $funcao, $xzero, $epson, $maxIteracoes, &$numIteracoes, $codErro)
    {

        $erroDerivada = null;
        $valorFuncao = $funcao($xzero);
        $valorDerivada = $this->dfdx($funcao, $xzero, $erroDerivada);
        $xk  = $xzero - ( $valorFuncao / $valorDerivada);

        for ($i = 1; $i <= $maxIteracoes; $i++) {
            echo "xk: $xk <br>";

            if (abs($funcao($xk)) < $epson ) {
                echo "$xk é raiz";
                break;
            }

            $xk  = $xk - ( $funcao($xk) / $this->dfdx($funcao, $xk, $codErro));

        }
    }






}





?>
