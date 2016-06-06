<?php
require "t4.php";

$ordemMatriz = 4;
$matriz = [];
$matriz[] = [2,4,6,1];
$matriz[] = [1,-3,1,2];
$matriz[] = [2,1,3,-1];
$matriz[] = [4,-2,1,-4];

$arrayTermosInd = [-8, 4, -2, 6];
$arraySolucao = [];

$codErro = 0;


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
                       <button data-toggle="collapse" data-target="#gauss-compacto">Gauss Compacto</button>
                        </button>
                    </li>
                </ul>
            </div>

            <div id="gauss-compacto" class="col-sm-9 float-right collapse">
                <h2>Calculando resolucao de sistema por gauss-compacto<h2>
                <table class="table">
                    <?php gaussCompacto($ordemMatriz, $matriz, $arrayTermosInd, $arraySolucao, $codErro); ?>
                </table>
            </div>
        </div>
    </body>
</html>
