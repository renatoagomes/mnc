<?php
require "t1.php";

//inicializando variaveis
$argumento = 3;
$precisao = 0.001;
$maxIteracoes = 50;
$numIteracoes = 1;
$codErro = 0;

?>

<html>
    <?php require "../head.html" ?>
    <body>
        <h1>Metodos numericos computacionais</h1>
            <div class="row">
            <div class="col-sm-8">
                <ul class="list list-group">
                    <li class="list-group-item">
                        <a href="../"> Voltar </a>
                    </li>
                </ul>
            </div>

                <div class="col-sm-8">
                    <h2>Calculando e^<?php echo $argumento ?></h2>
                    <table class="table">
                        <tr>
                            <th>K (&iacute;ndice)</th>
                            <th>Termo</th>
                            <th>Exponencial</th>
                            <th>Erro</th>
                        </tr>
                        <?php imprimeExpoIteracoes(0, 1, 1, "---", $precisao); ?>
                        <?php expo($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                    </table>
                </div>
            </div>

<?php
//inicializando variaveis
$argumento = 5;
$precisao = 0.01;
$maxIteracoes = 50;
$numIteracoes = 1;
$codErro = 0;
?>

            <div class="row">
                <div class="col-sm-8">
                    <table class="table">
                    <h2>Calculando ln <?php echo $argumento ?></h2>
                        <tr>
                            <th>K (&iacute;ndice)</th>
                            <th>Termo</th>
                            <th>Logaritmica</th>
                            <th>Erro</th>
                        </tr>
                        <?php loge($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                    </table>
                </div>
            </div>

<?php
//inicializando variaveis
$argumento = 57.59586;
$precisao = 0.01;
$maxIteracoes = 50;
$numIteracoes = 1;
$codErro = 0;
?>

            <div class="row">
                <div class="col-sm-8">
                    <table class="table">
                       <h2>Calculando sen <?php echo $argumento ?> = sen <?php echo number_format(getValorSemVoltasCompletas($argumento), arrumaPrecisao($precisao));
            ?></h2>
                        <tr>
                            <th>K (&iacute;ndice)</th>
                            <th>Termo</th>
                            <th>Seno</th>
                            <th>Erro</th>
                        </tr>
                        <?php seno($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                    </table>
                </div>
            </div>

<?php
//inicializando variaveis
$argumento = ((47*M_PI)/2);
$precisao = 0.01;
$maxIteracoes = 50;
$numIteracoes = 2;
$codErro = 0;
?>

            <div class="row">
                <div class="col-sm-8">
                    <table class="table">
                       <h2>Calculando cos <?php echo $argumento ?> = cos <?php echo number_format(getValorSemVoltasCompletas($argumento), arrumaPrecisao($precisao));
            ?></h2>
                        <tr>
                            <th>K (&iacute;ndice)</th>
                            <th>Termo</th>
                            <th>Cosseno</th>
                            <th>Erro</th>
                        </tr>
                        <?php cosseno($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                    </table>
                </div>
        </div>
    </body>
</html>

