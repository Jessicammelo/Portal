<?php
require "../../backend/classes/bancoDados.php";

if (!empty($_POST['nome']) && !empty($_POST['nenhuma_confianca']) &&
 !empty($_POST['quase_nenhuma_confianca']) && !empty($_POST['alguma_confianca']) &&!empty($_POST['muita_confianca'])
 &&!empty($_POST['nao_conheco'])&&!empty($_POST['ano'])&&!empty($_POST['indice_confianca'])
 &&!empty($_POST['indice_confianca_ibope'])) {
    $nome = $_POST['nome'];
    $nenhuma_confianca = $_POST['nenhuma_confianca'];
    $quase_nenhuma_confianca = $_POST['quase_nenhuma_confianca'];
    $alguma_confianca = $_POST['alguma_confianca'];
    $muita_confianca = $_POST['muita_confianca'];
    $nao_conheco = $_POST['nao_conheco'];
    $ano = $_POST['ano']; 
    $indice_confianca = $_POST['indice_confianca'];
    $indice_confianca_ibope = $_POST['indice_confianca_ibope'];

    $db = new BancoDados();
    $conexao = $db->instancia();
    $stmt = $conexao->prepare('INSERT INTO instituicao (nome,nenhuma_confianca,quase_nenhuma_confianca,alguma_confianca,muita_confianca,nao_conheco,ano,indice_confianca,indice_confianca_ibope) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bindValue(1, ($nome));
    $stmt->bindValue(2,($nenhuma_confianca));
    $stmt->bindValue(3,($quase_nenhuma_confianca));
    $stmt->bindValue(4,($alguma_confianca));
    $stmt->bindValue(5,($muita_confianca));
    $stmt->bindValue(6,($nao_conheco));
    $stmt->bindValue(7,($ano));
    $stmt->bindValue(8,($indice_confianca));
    $stmt->bindValue(9,($indice_confianca_ibope));

    $stmt->execute();
    header("location:index.php");
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
    <form class=" col-6 container" method="POST">
        <div class="form-group">
            <label>Digite nome da instituicão</label>
            <input name="nome" class="form-control" placeholder="Digite nome">
        </div>
        <div class="form-group">
            <label>Nenhuma confiança</label>
            <input name="nenhuma_confianca" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Quase nenhuma confiança</label>
            <input name="quase_nenhuma_confianca" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Alguma confiança</label>
            <input name="alguma_confianca" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Muita confiança</label>
            <input name="muita_confianca" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Nâo conheço</label>
            <input name="nao_conheco" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Ano</label>
            <input name="ano" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Nota do Indice de confiança</label>
            <input name="indice_confianca" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Nota do Indice de confiança do Ibope</label>
            <input name="indice_confianca_ibope" class="form-control" placeholder="Digite valor">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <br>
        <br>
    </form>
</body>

</html>