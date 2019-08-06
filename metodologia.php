<?php
require "backend/classes/bancoDados.php";
$db = new BancoDados;
$conexao = $db->instancia();
$stmt = $conexao->query('SELECT * FROM metodologia');
$metodologia = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

<body>
    <div class="submenu">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; color: white" src="assets/image/Ícones_Focus/Focus@6x-8.png">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px;  float:right; color: white" src="assets/image/Ícones_Focus/FURB@6x-8.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tipoazul bordasuperior"></div>
    <div style="width: 100%" class="breadcrumb">
        <div class="col-md-10 offset-1">
            <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone">
                <a href="../Portal/grafico.php?instituicao=1&grupo=2"><i class="fas fa-chart-bar"> Índice de Confiança
                        nas Intituíções Brasileiras </i></a>
            </button>
        </div>
    </div>
    <div class="col-8 offset-1 ">
        <?php
                for ($i = 0; $i < count($metodologia); $i++) {
            ?>

                <h3 class="tituloMetodologia"> <?php echo $metodologia[$i]['titulo'] ?><h3>
                    <p class="textoMetodologia">
                        <?php echo $metodologia[$i]['mensagem'] ?>
                    </p>
                <?php
                }
                ?>
        <br>
        <br>
    </div>
</body>

</html>