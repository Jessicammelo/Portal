<?php
require "backend/classes/bancoDados.php";
$id = $_GET['id'];
if (empty($id)) {
    header("location: instituicao.php");
    exit;
}
$db = new BancoDados();
$conexao = $db->instancia();
$stmt = $conexao->query('SELECT * FROM instituicao ORDER BY nome ASC ');
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conexao->query('SELECT * FROM instituicao WHERE id = ' . $id . ' ORDER BY nome ASC ');
$instituicaoSelecionada =  $stmt->fetch(PDO::FETCH_ASSOC);
$stmt = $conexao->query('SELECT * FROM sexo WHERE instituicao = ' . $id);
$sexo =  $stmt->fetch(PDO::FETCH_ASSOC);
$stmt = $conexao->query('SELECT * FROM faixa_etaria WHERE instituicao = '.$id);
$faixa_etaria = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt = $conexao->query('SELECT * FROM renda_familiar WHERE instituicao = '.$id);
$renda_familiar = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<html>

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css?v3">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- <script src="./assets/css/script.js"></script> -->
    <script>
        let dados = [
            ['Resposta', 'Quant de Respostas'],
            ['Nenhuma \nconfiança', <?php echo $instituicaoSelecionada["nenhuma_confianca"] ?>],
            ['Quase nenhuma \nconfiança', <?php echo $instituicaoSelecionada["quase_nenhuma_confianca"] ?>],
            ['Alguma \nconfiança', <?php echo $instituicaoSelecionada["alguma_confianca"] ?>],
            ['Muita confiança', <?php echo $instituicaoSelecionada["muita_confianca"] ?>],
            ['Não conheço, \nnão sei', <?php echo $instituicaoSelecionada["nao_conheco"] ?>]
        ];
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(dados);
            var options = {
                title: 'Índice de confiança nas Instituíções Brasileiras',
                subtitle: 'Universidade Regional de Blumenau, Blumenau, 2018-2019',
                colors: ['#005fa4'],
                bar: [groupWidth = '40px']
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
</head>

<body>
    <div class="submenu">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; color: white" src="assets/image/Ícones_Focus/FURB@6x-8.png">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; float:right; color:  white" src="assets/image/Ícones_Focus/Focus@6x-8.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tipoazul bordasuperior"></div>
    <div style="width: 100%" class="breadcrumb">
        <div class="col-md-10 offset-1  ">
            <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone">
                <a href="index.html#"><i class="fas fa-chart-bar"> Índice de confiança
                        nas Intituíções Brasileiras </i></a>
            </button>
        </div>
    </div>
    <div class="container-fluid row">
        <div class="col-10 offset-1 row">
            <div class="col-3">
                <h5>
                    Instituíções
                </h5>
            </div>
        </div>
        <div class="col-10 offset-1 row">
            <div class="col-3">
                <?php
                for ($i = 0; $i < count($data); $i++) {
                    if ($data[$i]['id'] == $id) {
                        ?>
                        <div class="topicos selecionado">
                            <img style="width: 30px" src="assets/image/Ícones_Focus/<?php echo $data[$i]['icone'] ?>">
                            <span class="removerLinha"><?php echo $data[$i]['nome'] ?></span>
                        </div>
                    <?php
                    } else {
                        ?>
                        <a class="removerLinha" href="grafico.php?id=<?php echo $data[$i]['id'] ?>">
                            <div class="topicos">
                                <img style="width: 30px" src="assets/image/Ícones_Focus/<?php echo $data[$i]['icone'] ?>">
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
                    <div id="columnchart_material" style="width: 700px; height:400px;"></div>
                    <table class="table table-bordered">
                        <thead>
                            <th colspan="2">
                                Sexo
                            </th>
                            <th colspan="5">
                                Faixa etária
                            </th>
                            <th colspan="4">
                                Renda famíliar
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Masculino
                                </td>
                                <td>
                                    Feminino
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
                                <?php echo $faixa_etaria['50'] ?>
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
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--
    <div class="col-10 offset-1 row">
        
        <div class="col-12">
            <div style="width: 100%">
                <div id="barchart_values" style="width: 500px; height:400px; margin: auto"></div>
                <div class=" row">
                    <div class="col-10 offset-2 row ">
                        <div class="col-3 ">
                            <div class="topicos" onclick="atualizaDadosGraficos(1)">
                                <img style="width: 30px" src="assets/image/Ícones_Focus/2 parentes@6x-8.png">
                                <span>Seus parentes</span>
                            </div>
                            <div class="topicos" onclick="atualizaDadosGraficos(2)">
                                <img style="width: 30px" src="assets/image/Ícones_Focus/2 amigos@6x-8.png">
                                <span>Seus amigos</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="topicos" onclick="atualizaDadosGraficos(3)">
                                <img style="width: 30px" src="assets/image/Ícones_Focus/2 pessoas da familia@6x-8.png">
                                <span>Pessoas da sua família</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="topicos" onclick="atualizaDadosGraficos(4)">
                                <img style="width: 30px" src="assets/image/Ícones_Focus/2 seus vizinhos@6x-8.png">
                                <span"> Seus vizinhos</span>
                            </div>
                            <div class="topicos" onclick="atualizaDadosGraficos(5)">
                                <img style="width: 30px" src="assets/image/Ícones_Focus/2 brasileiros@6x-8.png">
                                <span>Brasileiros em Geral</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            -->
    <br>
    <br>
</body>

</html>