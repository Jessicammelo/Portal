<?php
require "backend/classes/bancoDados.php";
$instituicao = isset($_GET['instituicao']) ? $_GET['instituicao'] : null;
$grupo = isset($_GET['grupo']) ? $_GET['grupo'] : null;

$db = new BancoDados();
$conexao = $db->instancia();
$stmt = $conexao->query('SELECT * FROM instituicao WHERE ano = ' . $_GET['ano'] . ' ORDER BY nome ASC ');
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!empty($instituicao)) {
    $stmt = $conexao->query('SELECT * FROM instituicao WHERE id = ' . $instituicao . ' and ano = ' . $_GET['ano'] . ' ORDER BY nome ASC ');
    $instituicaoSelecionada =  $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $instituicaoSelecionada = $data[0];
    $instituicao = $data[0]['id'];
}
if (!empty($instituicao)) {
    $stmt = $conexao->query('SELECT * FROM sexo WHERE instituicao = ' . $instituicao);
    $sexo =  $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conexao->query('SELECT * FROM faixa_etaria WHERE instituicao = ' . $instituicao);
    $faixa_etaria = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conexao->query('SELECT * FROM renda_familiar WHERE instituicao = ' . $instituicao);
    $renda_familiar = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conexao->query('SELECT * FROM grupo_social WHERE ano = ' . $_GET['ano'] . ' ORDER BY nome ASC ');
    $data2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = $conexao->query('SELECT * FROM igreja_religiao WHERE instituicao = ' . $instituicao);
    $religiao = $stmt->fetch(PDO::FETCH_ASSOC);
}
if (!empty($grupo)) {
    $stmt = $conexao->query('SELECT * FROM grupo_social WHERE id = ' . $grupo . ' and ano =' . $_GET['ano'] . ' ORDER BY nome ASC ');
    $grupoSelecionado =  $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $grupoSelecionado = !empty($data2) ? $data2[0] : null;
    $grupo = !empty($data2) ? $data2[0]['id'] : null;
}
if (!empty($grupo)) {
    $stmt = $conexao->query('SELECT * FROM grupo_social WHERE id = ' . $grupo . ' ORDER BY nome ASC ');
    $grupoSelecionado =  $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conexao->query('SELECT * FROM sexo WHERE grupo_social = ' . $grupo);
    $sexo2 =  $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conexao->query('SELECT * FROM faixa_etaria WHERE grupo_social = ' . $grupo);
    $faixa_etaria2 = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conexao->query('SELECT * FROM renda_familiar WHERE grupo_social = ' . $grupo);
    $renda_familiar2 = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css?v5">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="assets/css/script.js"></script>
    <script>
        let dados = [
            ['Respostas', 'Percentual de Respostas', {
                role: 'annotation'
            }],
            [
                'Nenhuma \nconfiança',
                <?php echo $instituicaoSelecionada["nenhuma_confianca"] ?>,
                '<?php echo number_format($instituicaoSelecionada["nenhuma_confianca"], 1, ",", ".") ?>%'
            ],
            [
                'Quase nenhuma \nconfiança',
                <?php echo $instituicaoSelecionada["quase_nenhuma_confianca"] ?>,
                '<?php echo number_format($instituicaoSelecionada["quase_nenhuma_confianca"], 1, ",", ".") ?>%'
            ],
            [
                'Alguma \nconfiança',
                <?php echo $instituicaoSelecionada["alguma_confianca"] ?>,
                '<?php echo number_format($instituicaoSelecionada["alguma_confianca"], 1, ",", ".") ?>%'
            ],
            [
                'Muita \nconfiança',
                <?php echo $instituicaoSelecionada["muita_confianca"] ?>,
                '<?php echo number_format($instituicaoSelecionada["muita_confianca"], 1, ",", ".") ?>%'
            ],
            [
                'Não conheço, \nnão sei',
                <?php echo $instituicaoSelecionada["nao_conheco"] ?>,
                '<?php echo number_format($instituicaoSelecionada["nao_conheco"], 1, ",", ".") ?>%'
            ]
        ];
        setTimeout(() => {
            drawChart();
            drawChart2();
        }, 2000);
        google.charts.load('current', {
            'packages': ['corechart']
        })
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(dados);
            var view = new google.visualization.DataView(data);
            var options = {
                title: 'Índice de Confiança nas Instituições Brasileiras',
                subtitle: 'Universidade Regional de Blumenau-FURB, Blumenau, 2019',
                colors: ['#005fa4'],
                animation: {
                    startup: true,
                    duration: 3000,
                    easing: 'out',
                },


            };

            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));
            chart.draw(view, options);
        }

        //inicio segundo grafico //
        let dados2 = [
            [
                "Resposta",
                "Percentual de Respostas",
                {
                    role: "style"
                },
                {
                    role: "annotation"
                }
            ],
            [
                "Nenhuma \nConfiança",
                <?php echo $grupoSelecionado["nenhuma_confianca"] ?>,
                "#005fa4",
                '<?php echo number_format($grupoSelecionado["nenhuma_confianca"], 1, ',', '.') ?>%',
            ],
            [
                "Quase Nenhuma \nConfiança",
                <?php echo $grupoSelecionado["quase_nenhuma_confianca"] ?>,
                "#005fa4",
                '<?php echo number_format($grupoSelecionado["quase_nenhuma_confianca"], 1, ',', '.') ?>%',
            ],
            [
                "Alguma \nConfiança",
                <?php echo $grupoSelecionado["alguma_confianca"] ?>,
                "#005fa4",
                '<?php echo number_format($grupoSelecionado["alguma_confianca"], 1, ',', '.') ?>%',
            ],
            [
                "Muita \nConfiança",
                <?php echo $grupoSelecionado["muita_confianca"] ?>,
                "#005fa4",
                '<?php echo number_format($grupoSelecionado["muita_confianca"], 1, ',', '.') ?>%',
            ]

        ];

        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {
            var data = google.visualization.arrayToDataTable(dados2);

            var view = new google.visualization.DataView(data);

            var options = {

                title: "Índice de Confiança nesses grupos sociais",
               
                bar: {
                    groupWidth: "78%"

                },
                legend: {
                    position: "none"
                },
                animation: {
                    startup: true,
                    duration: 3000,
                    easing: 'out',
                },
            };
            var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
            chart.draw(view, options);
        }
    </script>
</head>

<body onload="hideLoad()">
    <div class="loader"></div>
    <div class="submenu">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; color: white" src="assets/image/icones/Focus@6x-8.png">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px;  float:right; color: white" src="assets/image/icones/FURB@6x-8.png">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tipoazul bordasuperior"></div>
    <div style="width: 100%" class="breadcrumb navbar-botton__fixed">
        <div class="col-md-10 offset-1 row ">
            <div class="col-8 row">
                <div class="col-4 ">
                    <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone">
                        <a href="index.php#"><i class="fas fa-step-backward"> Página inicial </i></a>
                    </button>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone">
                        <a href="../Portal/metodologia.php?ano=<?php echo $_GET['ano'] ?>"><i class="fas fa-chalkboard"> Metodologia </i></a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!empty($instituicao)) {
        ?>
        <div class="container-fluid row">
            <div class="col-10 offset-1 row">
                <div class="col-3" style="text-align:center">
                    <h4>
                        Instituições
                    </h4>
                </div>
            </div>
            <div class="col-10 offset-1 row">
                <div class="col-3">
                    <?php
                    for ($i = 0; $i < count($data); $i++) {
                        if ($data[$i]['id'] == $instituicao) {
                            ?>
                            <div class="topicos selecionado">
                                <img style="width: 35px; margin: 8px;" src="assets/image/icones/<?php echo $data[$i]['icone'] ?>">
                                <span class="removerLinha"><?php echo $data[$i]['nome'] ?></span>
                            </div>
                        <?php
                        } else {
                            ?>
                            <a class="removerLinha" href="grafico.php?instituicao=<?php echo $data[$i]['id'] ?>&grupo=<?php echo $grupo ?>&ano=<?php echo $_GET['ano'] ?>">
                                <div class="topicos">
                                    <img style="width: 35px; margin: 8px;" src="assets/image/icones/<?php echo $data[$i]['icone'] ?>">
                                    <span class="removerLinha"><?php echo $data[$i]['nome'] ?></span>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </div>
                <!--terminou menu esquerdo-->

                <div class="col-9 row titulo">
                    <div class="col-12">
                        <div class="col-5" style="margin:auto">
                            <table class="table table-bordered" style="text-align:center; font-size:14px; margin:center">
                                <thead>
                                    <th class="topicos" colspan="2" style=" border-bottom: 3px solid #FFCC00">
                                        Índice -
                                        <?php
                                        for ($i = 0; $i < count($data); $i++) {
                                            if ($data[$i]['id'] == $instituicao) {
                                                ?> <?php echo $data[$i]['nome'] ?>
                                                (0 à 100)
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </th>
                                </thead>
                                <tbody style="background-color: white;">
                                    <tr>
                                        <td>
                                            FOCUS <?php echo $instituicaoSelecionada['ano'] ?>
                                        </td>
                                        <td>
                                            IBOPE <?php echo $instituicaoSelecionada['ano'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $instituicaoSelecionada['indice_confianca'] ?>
                                        </td>
                                        <td>
                                            <?php echo $instituicaoSelecionada['indice_confianca_ibope'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-7">
                            <div id="columnchart_material" style="width: 110vh; height:500px"></div>
                        </div>
                    </div>
                    <div class="col-12" style="margin:auto">
                        <!-- tabela-->
                        <?php
                        if (!empty($religiao)) {
                            ?>
                            <table class="table table-bordered" style="text-align:center; font-size:12px">
                                <thead>
                                    <th class="topicos" style="border-bottom: 3px solid #FFCC00">
                                        Católica
                                    </th>
                                    <th class="topicos" style="border-bottom: 3px solid #FFCC00">
                                        Evangélica
                                    </th>
                                    <th class="topicos" style="border-bottom: 3px solid #FFCC00">
                                        Luterana
                                    </th>
                                    <th class="topicos" style="border-bottom: 3px solid #FFCC00">
                                        Outra
                                    </th>
                                    <th class="topicos" style="border-bottom: 3px solid #FFCC00">
                                        Não tenho religião
                                    </th>
                                    <th class="topicos" colspan="4" style="border-bottom: 3px solid #FFCC00">
                                        Muitas religiões / Não tenho religião específica
                                    </th>
                                </thead>
                                <tbody style="background-color: white">
                                    <tr>
                                        <td>
                                            <?php echo $religiao['catolica'] ?>
                                        </td>
                                        <td>
                                            <?php echo $religiao['evangelica'] ?>
                                        </td>
                                        <td>
                                            <?php echo $religiao['luterana'] ?>
                                        </td>
                                        <td>
                                            <?php echo $religiao['outra'] ?>
                                        </td>
                                        <td>
                                            <?php echo $religiao['nao_tenho_religiao'] ?>
                                        </td>
                                        <td>
                                            <?php echo $religiao['muitas_religioes_nenhuma_especifica'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php
                        } else {
                            ?>
                            <table class="table table-bordered" style="text-align:center; font-size:14px">
                                <thead>
                                    <th class="topicos" colspan="2" style="border-bottom: 3px solid #FFCC00">
                                        Sexo (%)
                                    </th>
                                    <th class="topicos" colspan="5" style="border-bottom: 3px solid #FFCC00">
                                        Faixa etária (%)
                                    </th>
                                    <th class="topicos" colspan="4" style="border-bottom: 3px solid #FFCC00">
                                        Renda famíliar (R$) (%)
                                    </th>
                                </thead>
                                <tbody style="background-color: white">
                                    <tr>
                                        <td>
                                            Masc.
                                        </td>
                                        <td>
                                            Fem.
                                        </td>
                                        <td>
                                            16-24
                                        </td>
                                        <td>
                                            25-29
                                        </td>
                                        <td>
                                            30-39
                                        </td>
                                        <td>
                                            40-49
                                        </td>
                                        <td>
                                            50+
                                        </td>
                                        <td>
                                            Até 2000
                                        </td>
                                        <td>
                                            2000-6000
                                        </td>
                                        <td>
                                            +6000
                                        </td>
                                        <td>
                                            Recusou
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $sexo['masculino'] ?>
                                        </td>
                                        <td>
                                            <?php echo $sexo['feminino'] ?>
                                        </td>
                                        <td>
                                            <?php echo $faixa_etaria['16_24'] ?>
                                        </td>
                                        <td>
                                            <?php echo $faixa_etaria['25_29'] ?>
                                        </td>
                                        <td>
                                            <?php echo $faixa_etaria['30_39'] ?>
                                        </td>
                                        <td>
                                            <?php echo $faixa_etaria['40_49'] ?>
                                        </td>
                                        <td>
                                            <?php echo $faixa_etaria['_50'] ?>
                                        </td>
                                        <td>
                                            <?php echo $renda_familiar['ate_2000'] ?>
                                        </td>
                                        <td>
                                            <?php echo $renda_familiar['2000_6000'] ?>
                                        </td>
                                        <td>
                                            <?php echo $renda_familiar['mais_6000'] ?>
                                        </td>
                                        <td>
                                            <?php echo $renda_familiar['recusou'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <br>
    <br>
    <br>
    <div class="loader"></div>
    <!-- inicio segundo grafico-->
    <?php
    if (!empty($grupo)) {
        ?>
        <div class="container-fluid row">
            <div class="col-10 offset-1 row">
                <div class="col-3" style="text-align:center">
                    <h4>
                        Grupos sociais
                    </h4>
                </div>
            </div>
            <div class="col-10 offset-1 row ">
                <div class="col-3 ">
                    <?php
                    for ($i = 0; $i < count($data2); $i++) {
                        if ($data2[$i]['id'] == $grupo) {
                            ?>
                            <div class="topicos selecionado">
                                <img style="width: 35px; margin: 8px;" src="assets/image/icones/<?php echo $data2[$i]['icone'] ?>">
                                <span class="removerLinha"><?php echo $data2[$i]['nome'] ?></span>
                            </div>
                        <?php
                        } else {
                            ?>
                            <a class="removerLinha" href="grafico.php?grupo=<?php echo $data2[$i]['id'] ?>&instituicao=<?php echo $instituicao ?>&ano=<?php echo $_GET['ano'] ?>">
                                <div class="topicos">
                                    <img style="width: 35px; margin: 8px;" src="assets/image/icones/<?php echo $data2[$i]['icone'] ?>">
                                    <span class="removerLinha"><?php echo $data2[$i]['nome'] ?></span>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-9 row titulo">
                    <div class="col-12">
                        <div class="col-5" style="margin: auto">
                            <table class="table table-bordered" style="text-align:center; font-size:14px">
                                <thead>
                                    <th class="topicos" colspan="2" style="border-bottom: 3px solid #FFCC00">
                                        Índice -
                                        <?php
                                        for ($i = 0; $i < count($data2); $i++) {
                                            if ($data2[$i]['id'] == $grupo) {
                                                ?> <?php echo $data2[$i]['nome'] ?>
                                                (0 à 100)
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </th>
                                </thead>
                                <tbody style="background-color: white">
                                    <tr>
                                        <td>
                                            FOCUS <?php echo $grupoSelecionado['ano'] ?>
                                        </td>
                                        <td>
                                            IBOPE <?php echo $grupoSelecionado['ano'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $grupoSelecionado['indice_confianca'] ?>
                                        </td>
                                        <td>
                                            <?php echo $grupoSelecionado['indice_confianca_ibope'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-7" style="margin: auto">
                            <div id="barchart_values" style="width: 650px; height:500px"></div>
                        </div>
                    </div>
                    <div class="col-12" style="margin: auto">
                    <br>                    
                        <table class=" table table-bordered" style="text-align:center; font-size:14px">
                            <thead>
                                <th class="topicos" colspan="2" style="border-bottom: 3px solid #FFCC00">
                                    Sexo (%)
                                </th>
                                <th class="topicos" colspan="5" style="border-bottom: 3px solid #FFCC00">
                                    Faixa etária (%)
                                </th>
                                <th class="topicos" colspan="4" style="border-bottom: 3px solid #FFCC00">
                                    Renda famíliar (R$) (%)
                                </th>
                            </thead>
                            <tbody style="background-color: white">
                                <tr>
                                    <td>
                                        Masc.
                                    </td>
                                    <td>
                                        Fem.
                                    </td>
                                    <td>
                                        16-24
                                    </td>
                                    <td>
                                        25-29
                                    </td>
                                    <td>
                                        30-39
                                    </td>
                                    <td>
                                        40-49
                                    </td>
                                    <td>
                                        50+
                                    </td>
                                    <td>
                                        Até 2000
                                    </td>
                                    <td>
                                        2000-6000
                                    </td>
                                    <td>
                                        +6000
                                    </td>
                                    <td>
                                        Recusou
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $sexo2['masculino'] ?>
                                    </td>
                                    <td>
                                        <?php echo $sexo2['feminino'] ?>
                                    </td>
                                    <td>
                                        <?php echo $faixa_etaria2['16_24'] ?>
                                    </td>
                                    <td>
                                        <?php echo $faixa_etaria2['25_29'] ?>
                                    </td>
                                    <td>
                                        <?php echo $faixa_etaria2['30_39'] ?>
                                    </td>
                                    <td>
                                        <?php echo $faixa_etaria2['40_49'] ?>
                                    </td>
                                    <td>
                                        <?php echo $faixa_etaria2['_50'] ?>
                                    </td>
                                    <td>
                                        <?php echo $renda_familiar2['ate_2000'] ?>
                                    </td>
                                    <td>
                                        <?php echo $renda_familiar2['2000_6000'] ?>
                                    </td>
                                    <td>
                                        <?php echo $renda_familiar2['mais_6000'] ?>
                                    </td>
                                    <td>
                                        <?php echo $renda_familiar2['recusou'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <br>
    <br>
</body>

</html>