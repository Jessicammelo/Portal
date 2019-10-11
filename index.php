<?php
require "backend/classes/bancoDados.php";
$db = new BancoDados();
$conexao = $db->instancia();
$stmt = $conexao->query('SELECT distinct ano FROM instituicao ORDER BY ano ASC ');
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body class="backgroudImagem">
    <div class="submenu">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px;  color:  white" src="assets/image/icones/Focus@6x-8.png">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; float:right; color: white" src="assets/image/icones/FURB@6x-8.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tipoazul bordasuperior"></div>
    <div class="row" style="margin-left: 45px; margin-right: 25px">
        <div class="col-md-6 col-xs-12 textoIndex">
            <br>
            <h3>SOBRE O PROJETO</h3>
            Tem o objetivo de aprofundar a relação dialógica,
            incorporando a extensão as práticas de ensino e pesquisa dos
            cursos da FURB diretamente envolvidas na sua realização.
            <br>
            Após obter as informações, socializa-las de modo a permitir
            que a comunidade regional se conheça e reconheça na interpretação
            de seus resultados.
            <br>
            (PROJETO DE EXTENSÃO APROVADO NO EDITAL FURB PROPEX – 2018)
            <br>
            <br>
        </div>


        <div class="col-md-6 col-xs-12 ">
            <div style="margin-left: 200px" class="col-6">
                <h3>
                    Pesquisas realizadas
                </h3>
            </div>
            <?php
            for ($i = 0; $i < count($data); $i++) {
                ?>
                <div class="col-md-8 offset-md-2 col-xs-12">
                    <a href="../Portal/metodologia.php?ano=<?php echo $data[$i]['ano'] ?>" class="btn btn-primary botaoInicial">Confiança nas Instituicões Brasileiras
                        <?php echo $data[$i]['ano'] ?></a>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
    <div style="margin-left: 45px; margin-right: 25px" class="col-md-6 col-xs-12  textoIndex"> 
        <h3> Focus na mídia
        </h3>
        <div> 
            <a href="https://drive.google.com/file/d/1UKeyDSUoxFuQBrL82zmfqZiX-DJcX4nj/view">Matéria Santa 2018/1</a>
        </div>
        <div>
            <a href="https://drive.google.com/file/d/1oIVu9A1SclmVttCCZJ2mpOFBSvjAv_ie/view">FON</a>
        </div>

    </div>
 
</body>

</html>