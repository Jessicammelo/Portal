<?php
require "../../backend/classes/bancoDados.php";
$db = new BancoDados;
$conexao = $db->instancia();
if (!empty($_GET["delete"])) {
    $id = $_GET["delete"];
    $stmt = $conexao->prepare('DELETE FROM sexo WHERE id = ?');
    $stmt->bindValue(1, $id);
    $stmt->execute();
}
$instituicao = $_GET["instituicao"];
$stmt = $conexao->query('SELECT * FROM sexo WHERE instituicao ='. $instituicao );
$sexo = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <div class="container">
        <br>
        <a class="btn btn-primary" href="cadastro.php?instituicao=<?php echo $instituicao;?> ">Cadastrar
        </a>
        <br>
        <br>
        <table class="table" style="text-align:center">
            <thead>
                <th width="50px">
                    #
                </th>
                <th colspan="3">
                    Sexo
                </th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        Masculino
                    </td>
                    <td>
                        Feminino
                    </td>
                </tr>
                <?php
                for ($i = 0; $i < count($sexo); $i++) {
                    ?>
                    <tr>
                        <td>
                            <a href="index.php?delete=1&instituicao=1<?php echo $instituicao;?><?php echo $sexo[$i]['id'] ?>" class="btn btn-danger">Apagar
                            </a>
                        </td>
                        <td>
                            <?php echo $sexo[$i]['masculino'];
                            ?>
                        </td>
                        <td>
                            <?php echo $sexo[$i]['feminino'];
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