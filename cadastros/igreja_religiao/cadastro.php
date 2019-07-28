<?php
require "../../backend/classes/bancoDados.php";

if (!empty($_POST['catolica']) && !empty($_POST['evangelica']) && !empty($_POST['luterana']) && 
!empty($_POST['outra']) && !empty($_POST['nao_tenho_religiao']) && !empty($_POST['muitas_religioes_nenhuma_especifica']) && !empty($_GET['instituicao'])) {
    $catolica = $_POST['catolica'];
    $evangelica = $_POST['evangelica'];
    $luterana = $_POST['luterana'];
    $outra = $_POST['outra'];
    $nao_tenho_religiao = $_POST['nao_tenho_religiao'];
    $muitas_religioes_nenhuma_especifica = $_POST['muitas_religioes_nenhuma_especifica'];
    $instituicao = $_GET['instituicao'];
    $db = new BancoDados();
    $conexao = $db->instancia();
    $stmt = $conexao->prepare('INSERT INTO igreja_religiao (catolica,evangelica,luterana,outra,nao_tenho_religiao,muitas_religioes_nenhuma_especifica,instituicao) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->bindValue(1, $catolica);
    $stmt->bindValue(2, $evangelica);
    $stmt->bindValue(3, $luterana);
    $stmt->bindValue(4, $outra);
    $stmt->bindValue(5, $nao_tenho_religiao);
    $stmt->bindValue(6, $muitas_religioes_nenhuma_especifica);
    $stmt->bindValue(7, $instituicao);
    $stmt->execute();
    header("location: index.php?instituicao=".$instituicao);
}
?>
<!DOCTYPE html>
<html >
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
<form class=" col-6 container" method="POST">
        <div class="form-group">
            <label>Católica</label>
            <input required name="ate_2000" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Evangélica</label>
            <input required name="2000_6000" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Luterana</label>
            <input required name="mais_6000" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Outra</label>
            <input required name="recusou" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Não tem religião</label>
            <input required name="recusou" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Muitas religiões, nunhuma específica</label>
            <input required name="recusou" class="form-control" placeholder="Digite valor">
        </div>
        
        <button type="submit" class="btn btn-primary">Salvar</button>
        <br>
        <br>
    </form> 
</body>
</html>