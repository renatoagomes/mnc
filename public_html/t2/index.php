<?php
require "t2.php";

$limInf = -2;
$limSup = 2;
$precisao = 0.0001;

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
                       <button data-toggle="collapse" data-target="#bissecao">Funcao Bissecao</button>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#derivada">Derivada 1º</button>
                    </li>
                </ul>
            </div>

            <div id="bissecao" class="col-sm-9 float-right collapse">
                <h2>Calculando Zero de funcao pelo metodo da Bissecao </h2>
                <?php
                $t2obj= new T2();
                $t2obj->bissecao($funcao, $limInf, $limSup, $precisao, $numIteracoes, $codErro);
                ?>
            </div>
            <div id="derivada" class="col-sm-9 float-right collapse">
                <h2>Calculando derivada 1º: </h2>
                <?php
                $t2obj= new T2();
                echo $t2obj->dfdx($funcao, 2, $codErro);
                ?>
            </div>

        </div>
    </body>
</html>
