<?php
session_start();
if (empty($_SESSION['loginEfetuado'])) {
    header('location: ../login');
    exit;
}
require "../../backend/classes/bancoDados.php";
$db = new BancoDados;
$conexao = $db->instancia();
if (!empty($_GET["delete"])) {
    $id = $_GET["delete"];
    try {
        $stmt = $conexao->prepare('DELETE FROM grupo_social WHERE id = ?');
        $stmt->bindValue(1, $id);
        $stmt->execute();
    } catch (Exception $e) {
        header('location: index.php?erro=1');
        exit;
    }
}
if (isset($_GET['ano'])) {
    $ano = $_GET['ano'];
    $stmt = $conexao->query('SELECT * from grupo_social WHERE ano = ' . $ano);
} else {
    $stmt = $conexao->query('SELECT * FROM grupo_social');
}
$grupoSocial = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conexao->query('SELECT distinct ano FROM grupo_social ORDER BY ano ASC ');
$ano = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
    <link rel="stylesheet" href="../../assets/css/style.css?v5">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="../../css/script.js"></script>
</head>

<body>
    <div class="submenu">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; color: white" src="../../assets/image/icones/Focus@6x-8.png">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px;  float:right; color: white" src="../../assets/image/icones/FURB@6x-8.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tipoazul bordasuperior"></div>
    <div style="width: 100%" class="breadcrumb navbar-botton__fixed ">
        <div class="col-md-10 offset-1 row">
            <div class="col-3">
                <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone removerLinha">
                    <a href="../metodologia/index.php?">Metodologia</a>
                </button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone removerLinha">
                    <a href="../instituicao/index.php?"> Instituições Brasileiras</a>
                </button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone removerLinha">
                    <a href="../grupoSocial/index.php?"> Grupo Social</a>
                </button>
            </div>
        </div>
    </div>
    <div class=" col-7 container">
        <?php
        if (isset($_GET['erro'])) {
            ?>
            <div class="alert alert-danger" role="alert">
                Não foi possível apagar devido aos dados de sexo, faixa etária ou renda, vínculados.
            </div>
        <?php } ?>
        <div class="col-7 row" style="margin: 40px;">
            <div class="col-3">
                <a class="btn btn-primary" style=" font-family: verdana" href="cadastro.php">Cadastrar
                </a>
            </div>
            <div class="col-3">
                <div class=" dropdown">
                    <a class="btn btn-primary dropdown-toggle" style="font-family: verdana" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ano
                    </a>
                    <div class="dropdown-menu " style="font-size: 17px; font-family: verdana" aria-labelledby="dropdownMenuLink">
                        <?php
                        for ($i = 0; $i < count($ano); $i++) {
                            ?>
                            <a class="dropdown-item topicos" href="index.php?ano=<?php echo $ano[$i]['ano'] ?>">
                                <?php echo $ano[$i]['ano'] ?>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <table class="table" style="text-align:center; font-family: verdana; color: #005FA4">
            <thead>
                <th>
                    #
                </th>
                <th>
                    Grupo Social
                </th>
                <th>
                    Ano
                </th>
                <th>
                    Índice de Confiança
                </th>
                <th>
                    Índice de Confiança Ibope do último ano
                </th>
                <th width="50px">
                    #
                </th>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($grupoSocial); $i++) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $i + 1;
                            ?>
                        </td>
                        <td>
                            <?php echo $grupoSocial[$i]['nome'];
                            ?>
                        </td>
                        <td>
                            <?php echo $grupoSocial[$i]['ano'];
                            ?>
                        </td>
                        <td>
                            <?php echo $grupoSocial[$i]['indice_confianca'];
                            ?>
                        </td>
                        <td>
                            <?php echo $grupoSocial[$i]['indice_confianca_ibope'];
                            ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" style="font-family: verdana" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Selecione
                                </a>
                                <div class="dropdown-menu " style="font-size: 17px; font-family: verdana" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item topicos" href="index.php?delete=<?php echo $grupoSocial[$i]['id'] ?>">Apagar</a>
                                    <a class="dropdown-item topicos" href="index.php?editar=<?php echo $grupoSocial[$i]['id'] ?>">Editar</a>
                                    <a class="dropdown-item topicos" href="../sexo/index.php?grupo_social=<?php echo $grupoSocial[$i]['id'] ?>">Sexo</a>
                                    <a class="dropdown-item topicos" href="../faixaEtaria/index.php?grupo_social=<?php echo $grupoSocial[$i]['id'] ?>">Faixa Etária</a>
                                    <a class="dropdown-item topicos" href="../renda/index.php?grupo_social=<?php echo $grupoSocial[$i]['id'] ?>">Renda Familiar</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                <?php
                }
                ?>
                <?php
                if (!empty($_GET['erro=1'])) {
                    ?>
                    <h4 style="color: red; text-align:center">Usuário ou senha inválidos!</h4>
                <?php
                }
                ?>
            </tbody>
        </table>
        <br>
        <br>
    </div>
</body>

</html>