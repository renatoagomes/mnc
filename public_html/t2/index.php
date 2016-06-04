<?php
require "t2.php";

$limInf = -5;
$limSup = 5;

?>

<html>
    <?php //require "../head.html" ?>
    <body>
        <h1>Metodos numericos computacionais</h1>
        <div class="row">
            <div class="col-sm-2 float-left">
                <ul class="list list-group">
                    <li class="list-group-item">
                        <a href="../"> Voltar </a>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#bissecao">Funcao Bissecao</button>
                        </button>
                    </li>
                </ul>
            </div>

            <div id="bissecao" class="col-sm-9 float-right collapse">
                <h2>Calculando Zero de funcao pelo metodo da Bissecao<h2>
                <table class="table">
                    <tr>
                        <th>K (&iacute;ndice)</th>
                        <th>Termo</th>
                        <th>Exponencial</th>
                        <th>Erro</th>
                    </tr>
                    <?php
                    $t2obj= new T2();
                    $t2obj->bissecao($funcao, $limInf, $limSup, $precisao, $numIteracoes, $codErro);
                    //imprimindo iteracoes

                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
