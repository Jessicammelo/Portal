<?php
require "../../backend/classes/bancoDados.php";

if (
    !empty($_POST['16_24']) && !empty($_POST['25_29']) && !empty($_POST['30_39']) &&
    !empty($_POST['40_49']) && !empty($_POST['_50']) && !empty($_GET['instituicao'])
) {
    $dezeseis = $_POST['16_24'];
    $vinteCinco = $_POST['25_29'];
    $trita = $_POST['30_39'];
    $quarenta = $_POST['40_49'];
    $cinquenta = $_POST['_50'];
    $instituicao = $_GET['instituicao'];
    $db = new BancoDados();
    $conexao = $db->instancia();
    $stmt = $conexao->prepare('INSERT INTO faixa_etaria (16_24,25_29,30_39,40_49,_50,instituicao) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bindValue(1, $dezeseis);
    $stmt->bindValue(2, $vinteCinco);
    $stmt->bindValue(3, $trita);
    $stmt->bindValue(4, $quarenta);
    $stmt->bindValue(5, $cinquenta);
    $stmt->bindValue(6, $instituicao);
    $stmt->execute();
    header("location: index.php?instituicao=" . $instituicao);
} else {
    if (
        !empty($_POST['16_24']) && !empty($_POST['25_29']) && !empty($_POST['30_39']) &&
        !empty($_POST['40_49']) && !empty($_POST['_50']) && !empty($_GET['grupo_social'])
    ) {
        $dezeseis = $_POST['16_24'];
        $vinteCinco = $_POST['25_29'];
        $trita = $_POST['30_39'];
        $quarenta = $_POST['40_49'];
        $cinquenta = $_POST['_50'];
        $grupoSocial = $_GET['grupo_social'];
        $db = new BancoDados();
        $conexao = $db->instancia();
        $stmt = $conexao->prepare('INSERT INTO faixa_etaria (16_24,25_29,30_39,40_49,_50,grupo_social) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bindValue(1, $dezeseis);
        $stmt->bindValue(2, $vinteCinco);
        $stmt->bindValue(3, $trita);
        $stmt->bindValue(4, $quarenta);
        $stmt->bindValue(5, $cinquenta);
        $stmt->bindValue(6, $grupoSocial);
        $stmt->execute();
        header("location: index.php?grupo_social=" . $grupoSocial);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css?v5">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- <script src="./assets/css/script.js"></script> -->
</head>

<body>
    <br>
    <br>
    <form class=" col-6 container" method="POST">
        <div class="form-group">
            <label>16 á 24 anos</label>
            <input required name="16_24" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>25 á 29 anos</label>
            <input required name="25_29" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>30 á 39 anos</label>
            <input required name="30_39" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>40 á 49 anos</label>
            <input required name="40_49" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>50 anos</label>
            <input required name="_50" class="form-control" placeholder="Digite valor">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <br>
        <br>
    </form>
</body>

</html>