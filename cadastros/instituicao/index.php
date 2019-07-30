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
    $stmt = $conexao->prepare('DELETE FROM instituicao WHERE id = ?');
    $stmt->bindValue(1, $id);
    $stmt->execute();
}
$stmt = $conexao->query('SELECT * FROM instituicao');
$instituicao = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        <a class="btn btn-primary" href="cadastro.php">Cadastrar
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
                <th width="50px">
                    #
                </th>
                <th width="50px">
                    #
                </th>
                <th width="50px">
                    #
                </th>
                <th>
                    Instituíção
                </th>
                <th>
                    Ano
                </th>
                <th>
                    Nota do Índice de confiança 2019
                </th>
                <th>
                    Nota do Índice de confiança do Ibope 2018
                </th>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($instituicao); $i++) {
                    ?>
                    <tr>
                        <td>
                            <a href="index.php?delete=<?php echo $instituicao[$i]['id'] ?>" class="btn btn-danger">Apagar
                            </a>
                        </td>
                        <td>
                            <a href="../sexo/index.php?instituicao=<?php echo $instituicao[$i]['id'] ?>" class="btn btn-primary">sexo
                            </a>
                        </td>
                        <td>
                            <a href="../faixaEtaria/index.php?instituicao=<?php echo $instituicao[$i]['id'] ?>" class="btn btn-primary">Faixa Etária
                            </a>
                        </td>
                        <td>
                            <a href="../renda/index.php?instituicao=<?php echo $instituicao[$i]['id'] ?>" class="btn btn-primary">Renda Familiar
                            </a>
                        </td>

                        <td>
                            <a href="../igreja_religiao/index.php?instituicao=<?php echo $instituicao[$i]['id'] ?>" class="btn btn-primary">Religião
                            </a>

                        </td>
                        <td>
                            <?php echo $instituicao[$i]['nome'];
                            ?>
                        </td>
                        <td>
                            <?php echo $instituicao[$i]['ano'];
                            ?>
                        </td>
                        <td>
                            <?php echo $instituicao[$i]['indice_confianca'];
                            ?>
                        </td>
                        <td>
                            <?php echo $instituicao[$i]['indice_confianca_ibope'];
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