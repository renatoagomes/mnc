<?php
require "../funcoes_auxiliares.php";

/**
 * Classe para representar o T3 (Diferenciacao Numerica);
 */
Class T3
{

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
     * Metodo para calcular a derivada segunda no ponto x
     */
    public function dfdx2(Closure $funcao, $x, &$codErro)
    {
        $erro = 0.000001;
        $h = sqrt($erro)*$x;
        $derivadaPrimeiraMaisH = $this->dfdx($funcao, $x+$h, $erroDerivada1);
        $derivadaPrimeiraMenosH = $this->dfdx($funcao, $x-$h, $erroDerivada2);

        $derivadaSegunda = ($derivadaPrimeiraMaisH - $derivadaPrimeiraMenosH) / (2*$h);

        return $derivadaSegunda;
    }

    /**
     * Metodo para calcular a derivada terceira no ponto x
     */
    public function dfdx3(Closure $funcao, $x, &$codErro)
    {
        $erro = 0.000001;
        $h = sqrt($erro)*$x;
        $derivadaSegundaMaisH = $this->dfdx2($funcao, $x+$h, $erroDerivada1);
        $derivadaSegundaMenosH = $this->dfdx2($funcao, $x-$h, $erroDerivada2);

        $derivadaTerceira = ($derivadaSegundaMaisH - $derivadaSegundaMenosH) / (4*$h);

        return $derivadaTerceira;
    }


}





?>
