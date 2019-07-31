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

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<body class="backgroudImagem" style="min-height: 100vh">
    <div class="submenu">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px;  color:  white" src="../../assets/image/Ícones_Focus/Focus@6x-8.png">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; float:right; color: white" src="../../assets/image/Ícones_Focus/FURB@6x-8.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tipoazul bordasuperior"></div>
    
    <div class="col-7 container" style="position: relative; min-height: 100vh">
        <form class=" col-6 textoIndex" style="position: absolute;top: 50%;left: 50%;transform: translateY(-50%) translateX(-50%)" method="POST">
            <h4 class="" style=" text-align:center">Construa o Índice de Confiança Social</h4>
            <div class="form-group">
                <label>Digite email</label>
                <input name="email" type="email" class="form-control" placeholder="Digite o email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input name="senha" type="password" class="form-control" placeholder="Digite sua senha">
            </div>
            <div class="col text-center">
                <button type="submit" class="btn btn-primary mx-auto">Entrar</button>
            </div>
            <?php
            if (!empty($_GET['erro'])) {
                ?>
                <h4 style="color: red; text-align:center">Usuário ou senha inválidos!</h4>
            <?php
            }
            ?>
        </form>
    </div>

</body>

</html>