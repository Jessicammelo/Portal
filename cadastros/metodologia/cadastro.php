<?php
require "../../backend/classes/bancoDados.php";

if (!empty($_POST['titulo']) && !empty($_POST['mensagem'])) {
    $titulo = $_POST['titulo'];
    $mensagem = $_POST['mensagem'];
    $db = new BancoDados();
    $conexao = $db->instancia();
    $stmt = $conexao->prepare('INSERT INTO metodologia (titulo,mensagem) VALUES (?, ?)');
    $stmt->bindValue(1, $titulo);
    $stmt->bindValue(2, nl2br($mensagem));
    $stmt->execute();
    header("location:index.php");
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- <script src="./assets/css/script.js"></script> -->
</head>

<body>
    <form class="container" method="POST">
        <div class="form-group">
            <label>Título</label>
            <input name="titulo" class="form-control" placeholder="Digite título">
        </div>
        <div class="form-group">
            <label>Mensagem</label>
            <textarea name="mensagem" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</body>

</html>