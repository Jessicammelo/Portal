<?php
require "backend/classes/bancoDados.php";
$db = new BancoDados();
$conexao = $db->instancia();
$stmt = $conexao->query('SELECT * FROM instituicao ORDER BY nome ASC ');
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.cssv6">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="./assets/css/script.js"></script>
</head>

<body>
    <div class="submenu">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; color: white" src="assets/image/icones/FURB@6x-8.png">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; color: white" src="assets/image/icones/Focus@6x-8.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tipoazul bordasuperior"></div>
    <div style="width: 100%" class="breadcrumb">
        <div class="col-md-10 offset-1  ">
            <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone">
                <a href="index.php#"><i class="fas fa-chart-bar"> Índice de confiança
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
                <!--inicio menu
                <div class="topicos" onclick="atualizaDados(01)">
                    <img style="width: 30px" src="assets/image/icones/Bancos@6x-8.png">
                    <span>Bancos</span>
                </div>
                <div class="topicos" onclick="atualizaDados(02)">
                    <img style="width: 30px" src="assets/image/icones/Congresso nacional@6x-8.png">
                    <span> Congresso Nacional</span>
                </div>
                <div class="topicos" onclick="atualizaDados(03)">
                    <img style="width: 25px" src="assets/image/icones/Bombeiros@6x-8.png">
                    <span>Corpo de Bombeiros</span>
                </div>
                <div class="topicos" onclick="atualizaDados(04)">
                    <img style="width: 25px" src="assets/image/icones/eleições@6x-8.png">
                    <span>Eleições, Sistema Eleitoral</span>
                </div>
                <div class="topicos" onclick="atualizaDados(05)">
                    <img style="width: 30px" src="assets/image/icones/Empresas@6x-8.png">
                    <span>Empresas</span>
                </div>
                <div class="topicos" onclick="atualizaDados(06)">
                    <img style="width: 30px" src="assets/image/icones/Escolas publicas@6x-8.png">
                    <span>Escolas públicas</span>
                </div>
                <div class="topicos" onclick="atualizaDados(07)">
                    <img style="width: 30px" src="assets/image/icones/Forças armadas@6x-8.png">
                    <span>Forças Armadas</span>
                </div>
                <div class="topicos" onclick="atualizaDados(08)">
                    <img style="width: 30px" src="assets/image/icones/governo que reside@6x-8.png">
                    <span>Gov. da cidade onde mora</span>
                </div>
                <div class="topicos" onclick="atualizaDados(09)">
                    <img style="width: 30px" src="assets/image/icones/Federal@6x-8.png">
                    <span>Governo Federal</span>
                </div>
                <div class="topicos" onclick="atualizaDados(10)">
                    <img style="width: 30px" src="assets/image/icones/Igrejas@6x-8.png">
                    <span>Igrejas</span>
                </div>
                <div class="topicos" onclick="atualizaDados(11)">
                    <img style="width: 30px" src="assets/image/icones/Meios de comunicação@6x-8.png">
                    <span>Meios de Comunicação</span>
                </div>
                <div class="topicos" onclick="atualizaDados(12)">
                    <img style="width: 30px" src="assets/image/icones">
                    <span>Ministério público</span>
                </div>
                <div class="topicos" onclick="atualizaDados(13)">
                    <img style="width: 25px" src="assets/image/icones/ONGS@6x-8.png">
                    <span>Org. da Sociedade Civil</span>
                </div>
                <div class="topicos" onclick="atualizaDados(14)">
                    <img style="width: 30px" src="assets/image/icones/Politicos@6x-8.png">
                    <span>Partidos Políticos</span>
                </div>
                <div class="topicos" onclick="atualizaDados(15)">
                    <img style="width: 30px" src="assets/image/icones/Judiciário@6x-8.png">
                    <span>Poder Judiciário, justiça</span>
                </div>
                <div class="topicos" onclick="atualizaDados(16)">
                    <img style="width: 30px" src="assets/image/icones/Policia@6x-8.png">
                    <span>Polícia</span>
                </div>
                <div class="topicos" onclick="atualizaDados(17)">
                    <img style="width: 25px" src="assets/image/icones/policia federal@6x-8.png">
                    <span>Polícia Federal</span>
                </div>
                <div class="topicos" onclick="atualizaDados(18)">
                    <img style="width: 30px" src="assets/image/icones/Presidente @6x-8.png">
                    <span>Presidente da República</span>
                </div>
                <div class="topicos" onclick="atualizaDados(19)">
                    <img style="width: 30px" src="assets/image/icones/sindicatos@6x-8.png">
                    <span>Sindicatos</span>
                </div>
                <div class="topicos" onclick="atualizaDados(20)">
                    <img style="width: 30px" src="assets/image/icones/SUS@6x-8.png">
                    <span>Sistema público de Saúde</span>
                </div>-->
                <?php
                for ($i = 0; $i < count($data); $i++) {
                    ?>
                    <a href="grafico.php?id=<?php echo $data[$i]['id'] ?>">
                        <div class="topicos">
                            <img style="width: 30px" src="assets/image/icones/<?php echo $data[$i]['icone'] ?>">
                            <span><?php echo $data[$i]['nome'] ?></span>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
            <!--terminou menu esquerdo-->
            <div class="col-9 row titulo">
                <div class="col-12">
                    <div id="columnchart_material" style="width: 700px; height:400px;"></div>
                </div>
                <div class="col-10 offset-2 row">
                    <!-- inicio filtro-->
                    <div class="col-5">
                        <div class=" col-12">
                            <label>Selecione</label>
                            <select class="topicos form-control selecao" multiple="multiple" onclick="atualizaDados()">
                                <option selected>Escolaridade</option>
                                <option selected>Idade</option>
                                <option selected="selected">Gênero</option>
                                <option selected>Renda Média Familiar</option>
                                <option selected>Religião</option>
                                <option selected>Índice 2018</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="col-12 ">
                            <select class="topicos metodologia">
                                <option selected>Métodologia</option>
                                <!--Metodologia-->
                            </select>
                        </div>
                        <div class="col-12">
                            <select class="topicos metodologia">
                                <option selected>Equipe Técnica</option>
                                <!--Equipe tecnica-->
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-10 offset-1 row">
        <!--segundo grafico-->
        <div class="col-12">
            <div style="width: 100%">
                <div id="barchart_values" style="width: 500px; height:400px; margin: auto"></div>
                <div class=" row">
                    <div class="col-10 offset-2 row ">
                        <div class="col-3 ">
                            <div class="topicos" onclick="atualizaDadosGraficos(1)">
                                <img style="width: 30px" src="assets/image/icones/2 parentes@6x-8.png">
                                <span>Seus parentes</span>
                            </div>
                            <div class="topicos" onclick="atualizaDadosGraficos(2)">
                                <img style="width: 30px" src="assets/image/icones/2 amigos@6x-8.png">
                                <span>Seus amigos</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="topicos" onclick="atualizaDadosGraficos(3)">
                                <img style="width: 30px" src="assets/image/icones/2 pessoas da familia@6x-8.png">
                                <span>Pessoas da sua família</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="topicos" onclick="atualizaDadosGraficos(4)">
                                <img style="width: 30px" src="assets/image/icones/2 seus vizinhos@6x-8.png">
                                <span> Seus vizinhos</span>
                            </div>
                            <div class="topicos" onclick="atualizaDadosGraficos(5)">
                                <img style="width: 30px" src="assets/image/icones/2 brasileiros@6x-8.png">
                                <span>Brasileiros em Geral</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</body>

</html>