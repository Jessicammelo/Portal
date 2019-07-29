<?php
require "../../backend/classes/bancoDados.php";
//objeto com o bancos de dados
$db = new BancoDados;
//pegar e conecta com ao banco de dados
$conexao = $db->instancia();
if (!empty($_GET["delete"])) {
    $id = $_GET["delete"];
    $stmt = $conexao->prepare('DELETE FROM renda_familiar WHERE id = ?');
    $stmt->bindValue(1, $id);
    $stmt->execute();
}
if (!empty($_GET["instituicao"])) {
    $instituicao = $_GET["instituicao"];
    $stmt = $conexao->query('SELECT * FROM renda_familiar WHERE instituicao =' . $instituicao);
    $renda = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $grupoSocial = $_GET["grupo_social"];
    $stmt = $conexao->query('SELECT * FROM renda_familiar WHERE grupo_social =' . $grupoSocial);
    $renda = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<div class="submenu">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; color: white" src="assets/image/Ícones_Focus/Focus@6x-8.png">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px;  float:right; color: white" src="assets/image/Ícones_Focus/FURB@6x-8.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tipoazul bordasuperior"></div>
    <div style="width: 100%" class="breadcrumb">
    </div>
    <div class="container">
        <br>
        <?php
        if (!empty($_GET["instituicao"])) {
            ?>
            <a class="btn btn-primary" href="cadastro.php?instituicao=<?php echo $_GET["instituicao"]; ?> ">Cadastrar
            </a>
        <?php
        } else {
            ?>
            <a class="btn btn-primary" href="cadastro.php?grupo_social=<?php echo $_GET["grupo_social"]; ?> ">Cadastrar
            </a>
        <?php
        }
        ?>
        <br>
        <br>
        <table class="table" style="text-align:center">
            <thead>
                <th width="50px">
                    #
                </th>
                <th colspan="5">
                    Renda Familiar
                </th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        Até 2000 reais
                    </td>
                    <td>
                        De 2000 á 6000 reais
                    </td>
                    <td>
                        Mais de 6000 reais
                    </td>
                    <td>
                        Recusaram
                    </td>

                </tr>
                <?php
                for ($i = 0; $i < count($renda); $i++) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            if (!empty($_GET["instituicao"])) {
                                ?>
                                <a href="index.php?delete=<?php echo $renda[$i]['id'] ?>&instituicao=<?php echo $instituicao; ?>" class="btn btn-danger">Apagar
                                </a>
                            <?php
                            } else {
                                ?>
                                <a href="index.php?delete=<?php echo $renda[$i]['id'] ?>&grupo_social=<?php echo $grupoSocial; ?>" class="btn btn-danger">Apagar
                                </a>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php echo $renda[$i]['ate_2000'];
                            ?>
                        </td>
                        <td>
                            <?php echo $renda[$i]['2000_6000'];
                            ?>
                        </td>
                        <td>
                            <?php echo $renda[$i]['mais_6000'];
                            ?>
                        </td>
                        <td>
                            <?php echo $renda[$i]['recusou'];
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