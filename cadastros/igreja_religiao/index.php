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
    $stmt = $conexao->prepare('DELETE FROM igreja_religiao WHERE id = ?');
    $stmt->bindValue(1, $id);
    $stmt->execute();
}
$instituicao = $_GET["instituicao"];
$stmt = $conexao->query('SELECT * FROM igreja_religiao WHERE instituicao =' . $instituicao);
$igreja_religiao = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/style.css?v5">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- <script src="./assets/css/script.js"></script> -->
</head>

<body>
    <div class="submenu">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; color: white" src="../../assets/image/Ícones_Focus/Focus@6x-8.png">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px;  float:right; color: white" src="../../assets/image/Ícones_Focus/FURB@6x-8.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tipoazul bordasuperior"></div>
    <div style="width: 100%" class="breadcrumb">
        <div class="col-md-10 offset-1 row">
            <div class="col-3">
                <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone">
                    <a href="../instituicao/index.php?"> Instituições Brasileiras</a>
                </button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone">
                    <a href="../grupoSocial/index.php?">Grupo Social</a>
                </button>
            </div>
        </div>
    </div>
    <div class="container">
        <br>
        <a class="btn btn-primary" href="cadastro.php?instituicao=<?php echo $_GET["instituicao"]; ?> ">Cadastrar
        </a>
        <br>
        <br>
        <table class="table" style="text-align:center">
            <thead>
                <th width="50px">
                    #
                </th>
                <th width="50px">
                    #
                </th>
                <th colspan="8">
                    Religião
                </th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        #
                    </td>
                    <td>
                        Católica
                    </td>
                    <td>
                        Evangélica
                    </td>
                    <td>
                        Luterana
                    </td>
                    <td>
                        Outra
                    </td>
                    <td>
                        Não tem religião
                    </td>
                    <td>
                        Muitas religiões, nunhuma específica
                    </td>

                </tr>
                <?php
                for ($i = 0; $i < count($igreja_religiao); $i++) {
                    ?>
                    <tr>
                        <td>
                            <a href="index.php?delete=<?php echo $igreja_religiao[$i]['id'] ?>&instituicao=<?php echo $instituicao; ?>" class="btn btn-danger">Apagar
                            </a>
                        </td>
                        <td>
                            <a href="index.php?delete=<?php echo $igreja_religiao[$i]['id'] ?>&instituicao=<?php echo $instituicao; ?>" class="btn btn-primary">Editar
                            </a>
                        </td>
                        <td>
                            <?php echo $igreja_religiao[$i]['catolica'];
                            ?>
                        </td>
                        <td>
                            <?php echo $igreja_religiao[$i]['evangelica'];
                            ?>
                        </td>
                        <td>
                            <?php echo $igreja_religiao[$i]['luterana'];
                            ?>
                        </td>
                        <td>
                            <?php echo $igreja_religiao[$i]['outra'];
                            ?>
                        </td>
                        <td>
                            <?php echo $igreja_religiao[$i]['nao_tenho_religiao'];
                            ?>
                        </td>
                        <td>
                            <?php echo $igreja_religiao[$i]['muitas_religioes_nenhuma_especifica'];
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