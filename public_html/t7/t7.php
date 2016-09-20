<?php
require "../funcoes_auxiliares.php";


/**
 * Classe para representar o T7 (Interpolacao Numerica);
 */
Class T7
{
    /**
     * Metodo para calcular o valor de um polinomio interpolado em um determinado ponto
     * utilizando do polimio de lagrange
     */
    public function lagrange($tabela, $grau, $ptoX, &$codErro)
    {
        $Pn = 0;
        for ($i = 0; $i < $grau; $i++) {
            $P = 1;

            for ($j = 0; $j < $grau; $j++) {
                if ($i != $j) {
                    $P = $P * (($ptoX - $tabela[$i]->x) / ( $tabela[$j]->x - $tabela[$i]->x ));
                    $Pn = ($P * $tabela[$j]->y) + $Pn;
                }
            }
        }

        echo "O valor de f($ptoX) usando lagrange é: " . $Pn;

        return $Pn;

    }



}


Class Tabela
{

    public $x;
    public $y;

    /**
     * Construtor criando x e y
     */
    function __construct($valorX,$valorY)
    {
        $this->x = $valorX;
        $this->y = $valorY;
    }

}

?>
