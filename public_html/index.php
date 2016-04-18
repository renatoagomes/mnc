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
    <head>
        <title>MNC - PHP</title>
        <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    </head>
    <body>
        <h1>Metodos numericos computacionais</h1>

        <br>
        <div class="row">
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
