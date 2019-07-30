<?php
session_start();
require "../../backend/classes/bancoDados.php";
//objeto com o bancos de dados
$db = new BancoDados;
//pegar e conecta com ao banco de dados
$conexao = $db->instancia();
if (!empty($_POST["email"]) && (!empty($_POST["senha"]))) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $stmt = $conexao->prepare('SELECT * FROM usuario WHERE email = ? AND senha = ?');
    $stmt->bindValue(1, $email);
    $stmt->bindValue(2, $senha);
    $stmt->execute();
    $login = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($login)) {
        $_SESSION['loginEfetuado'] = true;
        header('location: ../instituicao');
        exit;
    } else {
        $_SESSION['loginEfetuado'] = false;
        header('location: index.php?erro=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>

</head>

<body>
    <form class=" col-6 container" method="POST">
        <div class="form-group">
            <label>Digite email</label>
            <input name="email" type="email" class="form-control" placeholder="Digite o email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <input name="senha" type="password" class="form-control" placeholder="Digite sua senha">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
    <?php
    if (!empty($_GET['erro'])) {
        ?>
        <h4 style="color: red; text-align:center">Usuário ou senha inválidos!</h4>
        <?php
    }

    ?>
</body>

</html>