<?php
require "t7.php";

$arrayPontos[] = new Tabela(0.1, 0.6);
$arrayPontos[] = new Tabela(1.221, 3.320);

?>

<html>
    <?php require "../head.html" ?>
    <body>
        <h1>Metodos numericos computacionais</h1>
        <div class="row">
            <div class="col-sm-2 float-left">
                <ul class="list list-group">
                    <li class="list-group-item">
                        <a href="../"> Voltar </a>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#lagrange">Lagrange</button>
                    </li>
                </ul>
            </div>

            <div id="lagrange" class="col-sm-9 float-right collapse">
                <h2>Valor do polinomio interpolado por lagrange: </h2>
                <?php
                $T7 = new T7();
                $T7->lagrange($arrayPontos, 1, 0.2, $codErro);
                ?>
            </div>

        </div>
    </body>
</html>
