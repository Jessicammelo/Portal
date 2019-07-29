<?php
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
}
?>
<!DOCTYPE html>
<html>

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
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</body>

</html>