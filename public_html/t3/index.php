<?php
require "t3.php";

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
                       <button data-toggle="collapse" data-target="#derivada-1">Derivada Primeira</button>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#derivada-2">Derivada Segunda</button>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#derivada-3">Derivada Terceira</button>
                    </li>
                </ul>
            </div>

            <div id="derivada-1" class="col-sm-9 float-right collapse">
                <h2>Calculando derivada 1º: </h2>
                <?php
                $t2obj= new T3();
                echo $t2obj->dfdx($funcao, 2, $codErro);
                ?>
            </div>
            <div id="derivada-2" class="col-sm-9 float-right collapse">
                <h2>Calculando derivada 2º: </h2>
                <?php
                $t2obj= new T3();
                echo $t2obj->dfdx2($funcao, 2, $codErro);
                ?>
            </div>
            <div id="derivada-3" class="col-sm-9 float-right collapse">
                <h2>Calculando derivada 3º: </h2>
                <?php
                $t2obj= new T3();
                echo $t2obj->dfdx3($funcao, 2, $codErro);
                ?>
            </div>

        </div>
    </body>
</html>
