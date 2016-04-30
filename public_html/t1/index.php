<?php
require "t1.php";

//inicializando variaveis
$argumento = 3;
$precisao = 0.0001;
$maxIteracoes = 50;
$numIteracoes = 1;
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
                       <button data-toggle="collapse" data-target="#expo">Funcao Expo</button>
                        </button>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#loge">Funcao Loge</button>
                        </button>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#seno">Funcao Seno</button>
                        </button>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#cosseno">Funcao Cosseno</button>
                        </button>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#tangente">Funcao Tangente</button>
                        </button>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#secante">Funcao Secante</button>
                        </button>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#cosecante">Funcao Cosecante</button>
                        </button>
                    </li>
                    <li class="list-group-item">
                       <button data-toggle="collapse" data-target="#cotangente">Funcao Cotangente</button>
                        </button>
                    </li>
                </ul>
            </div>

            <div id="expo" class="col-sm-9 float-right collapse">
                <h2>Calculando e^<?php echo $argumento ?></h2>
                <table class="table">
                    <tr>
                        <th>K (&iacute;ndice)</th>
                        <th>Termo</th>
                        <th>Exponencial</th>
                        <th>Erro</th>
                    </tr>
                    <?php $valorExpo = expo($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                    <?php imprimeIteracoes($numIteracoes, $valorExpo, "---", "---", arrumaPrecisao($precisao)); ?>
                </table>
            </div>

<?php
//inicializando variaveis
$argumento = 5;
$precisao = 0.0001;
$maxIteracoes = 50;
$numIteracoes = 1;
$codErro = 0;
?>

                <div id="loge" class="collapse float-right col-sm-8">
                    <table class="table">
                    <h2>Calculando ln <?php echo $argumento ?></h2>
                        <tr>
                            <th>K (&iacute;ndice)</th>
                            <th>Termo</th>
                            <th>Logaritmica</th>
                            <th>Erro</th>
                        </tr>
                        <?php $valorLoge = loge($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                        <?php imprimeIteracoes($numIteracoes, $valorLoge, "---", "---", arrumaPrecisao($precisao)); ?>
                    </table>
                </div>

<?php
//inicializando variaveis
$argumento = 1.0471975511966;
$precisao = 0.01;
$maxIteracoes = 50;
$numIteracoes = 1;
$codErro = 0;
?>

                <div id="seno" class="collapse float-right col-sm-8">
                    <table class="table">
                       <h2>Calculando sen <?php echo $argumento ?> = sen <?php echo number_format(getValorSemVoltasCompletas($argumento), arrumaPrecisao($precisao));
            ?></h2>
                        <tr>
                            <th>K (&iacute;ndice)</th>
                            <th>Termo</th>
                            <th>Seno</th>
                            <th>Erro</th>
                        </tr>
                        <?php $valorSeno =  seno($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                        <?php imprimeIteracoes($numIteracoes, $valorSeno, "---", "---", arrumaPrecisao($precisao)); ?>
                    </table>
                </div>

<?php
//inicializando variaveis
$argumento = 1.0471975511966;
$precisao = 0.0001;
$maxIteracoes = 50;
$numIteracoes = 2;
$codErro = 0;
?>

                <div id="cosseno" class="collapse float-right col-sm-8">
                    <table class="table">
                       <h2>Calculando cos <?php echo $argumento ?> = cos <?php echo number_format(getValorSemVoltasCompletas($argumento), arrumaPrecisao($precisao));
            ?></h2>
                        <tr>
                            <th>K (&iacute;ndice)</th>
                            <th>Termo</th>
                            <th>Cosseno</th>
                            <th>Erro</th>
                        </tr>
                        <?php $valorCosseno = cosseno($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                        <?php imprimeIteracoes($numIteracoes, $valorCosseno, "---", "---", arrumaPrecisao($precisao)); ?>
                    </table>
                </div>
<?php
//inicializando variaveis
$argumento = 1.0471975511966;
$precisao = 0.0001;
$maxIteracoes = 50;
$numIteracoes = 0;
$codErro = 0;
?>

                <div id="tangente" class="collapse float-right col-sm-8">
                    <table class="table">
                       <h2>Calculando tan <?php echo $argumento ?> = tan <?php echo number_format(getValorSemVoltasCompletas($argumento), arrumaPrecisao($precisao)); ?></h2>
                       <tr>
                            <th>K (&iacute;ndice)</th>
                            <th>Termo</th>
                            <th>Tangente</th>
                            <th>Erro</th>
                        </tr>
                        <?php $valorTangente =  tag($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                        <?php imprimeIteracoes($numIteracoes, $valorTangente, "---", "---", arrumaPrecisao($precisao)); ?>
                    </table>
                </div>

<?php
//inicializando variaveis
$argumento = ((34*M_PI)/2);
$precisao = 0.0001;
$maxIteracoes = 50;
$numIteracoes = 0;
$codErro = 0;
?>

                <div id="secante" class="collapse float-right col-sm-8">
                    <table class="table">
                       <h2>Calculando sec <?php echo $argumento ?> = sec <?php echo number_format(getValorSemVoltasCompletas($argumento), arrumaPrecisao($precisao)); ?></h2>
                       <tr>
                            <th>K (&iacute;ndice)</th>
                            <th>Termo</th>
                            <th>Secante</th>
                            <th>Erro</th>
                        </tr>
                        <?php $valorSecante =  sec($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                        <?php imprimeIteracoes($numIteracoes, $valorSecante, "---", "---", arrumaPrecisao($precisao)); ?>
                    </table>
                </div>


<?php
//inicializando variaveis
$argumento = M_PI/6;
$precisao = 0.0001;
$maxIteracoes = 50;
$numIteracoes = 0;
$codErro = 0;
?>

                <div id="cosecante" class="collapse float-right col-sm-8">
                    <table class="table">
                       <h2>Calculando cosec <?php echo $argumento ?> = cosec <?php echo number_format(getValorSemVoltasCompletas($argumento), arrumaPrecisao($precisao)); ?></h2>
                       <tr>
                            <th>K (&iacute;ndice)</th>
                            <th>Termo</th>
                            <th>Cosecante</th>
                            <th>Erro</th>
                        </tr>
                        <?php $valorCosecante =  cosec($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                        <?php imprimeIteracoes($numIteracoes, $valorCosecante, "---", "---", arrumaPrecisao($precisao)); ?>
                    </table>
                </div>

<?php
//inicializando variaveis
$argumento = M_PI/6;
$precisao = 0.0001;
$maxIteracoes = 50;
$numIteracoes = 0;
$codErro = 0;
?>

                <div id="cotangente" class="collapse float-right col-sm-8">
                    <table class="table">
                       <h2>Calculando cotag <?php echo $argumento ?> = cotag <?php echo number_format(getValorSemVoltasCompletas($argumento), arrumaPrecisao($precisao)); ?></h2>
                       <tr>
                            <th>K (&iacute;ndice)</th>
                            <th>Termo</th>
                            <th>Cotag</th>
                            <th>Erro</th>
                        </tr>
                        <?php $valorCotag =  cotag($argumento, $precisao, $maxIteracoes, $numIteracoes, $codErro); ?>
                        <?php imprimeIteracoes($numIteracoes, $valorCotag, "---", "---", arrumaPrecisao($precisao)); ?>
                    </table>
                </div>
            </div>

    </body>
</html>

