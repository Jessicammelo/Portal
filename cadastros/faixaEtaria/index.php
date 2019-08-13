<?php
session_start();
if (empty($_SESSION['loginEfetuado'])) {
    header('location: ../login');
    exit;
}
require "../../backend/classes/bancoDados.php";
//objeto com o bancos de dados
$db = new BancoDados;
//pegar e conecta com ao banco de dados
$conexao = $db->instancia();

if (!empty($_GET["delete"])) {
    $id = $_GET["delete"];
    $stmt = $conexao->prepare('DELETE FROM faixa_etaria WHERE id = ?');
    $stmt->bindValue(1, $id);
    $stmt->execute();
}

if (!empty($_GET['instituicao'])) {
    $instituicao = $_GET["instituicao"];
    $stmt = $conexao->query('SELECT * FROM faixa_etaria WHERE instituicao =' . $instituicao);
    $faixaEtaria = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $grupoSocial = $_GET["grupo_social"];
    $stmt = $conexao->query('SELECT * FROM faixa_etaria WHERE grupo_social =' . $grupoSocial);
    $faixaEtaria = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="../../assets/css/style.css?v5">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
     <script src="../../assets/css/script.js"></script> 
</head>

<body>

    <div class="submenu ">
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
    <div style="width: 100%" class="breadcrumb navbar-botton__fixed">
        <div class="col-md-10 offset-1 row">
            <div class="col-3">
                <button type="button" class="btn btn-light font-sizeBotao removerLinha">
                    <a href="../instituicao/index.php?"> Instituições Brasileiras</a>
                </button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-light font-sizeBotao removerLinha">
                    <a href="../grupoSocial/index.php?"> Grupo Social</a>
                </button>
            </div>
        </div>
    </div>

    <div class="col-7 container">
        <?php
        if (!empty($_GET['instituicao'])) {
            ?>
            <a class="btn btn-primary" style="margin: 40px; font-family: verdana" href="cadastro.php?instituicao=<?php echo $_GET["instituicao"]; ?> ">Cadastrar
            </a>

        <?php
        } else {
            ?>
            <a class="btn btn-primary" style="margin: 40px; font-family: verdana" href="cadastro.php?grupo_social=<?php echo $_GET["grupo_social"]; ?> ">Cadastrar
            </a>
        <?php
        }
        ?>
        <table class="table" style="text-align:center; font-family: verdana; color: #005FA4">
            <thead>
                <th colspan="6">
                    Faixa Etária
                </th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        16 á 24 anos
                    </td>
                    <td>
                        25 á 29 anos
                    </td>
                    <td>
                        30 á 39 anos
                    </td>
                    <td>
                        40 á 49 anos
                    </td>
                    <td>
                        50 anos
                    </td>
                    <td>
                        #
                    </td>
                </tr>
                <?php
                for ($i = 0; $i < count($faixaEtaria); $i++) {
                    ?>
                    <tr>

                        <td>
                            <?php echo $faixaEtaria[$i]['16_24'];
                            ?>
                        </td>
                        <td>
                            <?php echo $faixaEtaria[$i]['25_29'];
                            ?>
                        </td>
                        <td>
                            <?php echo $faixaEtaria[$i]['30_39'];
                            ?>
                        </td>
                        <td>
                            <?php echo $faixaEtaria[$i]['40_49'];
                            ?>
                        </td>
                        <td>
                            <?php echo $faixaEtaria[$i]['_50'];
                            ?>
                        </td>
                        <td>
                            <?php
                            if (!empty($_GET['instituicao'])) {
                                ?>
                                <a href="index.php?delete=<?php echo $faixaEtaria[$i]['id'] ?>&instituicao=<?php echo $instituicao; ?>" class="btn btn-danger">Apagar
                                </a>

                            <?php
                            } else {
                                ?>
                                <a href="index.php?delete=<?php echo $faixaEtaria[$i]['id'] ?>&grupo_social=<?php echo $grupoSocial; ?>" class="btn btn-danger">Apagar
                                </a>
                            <?php
                            }
                            ?>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>