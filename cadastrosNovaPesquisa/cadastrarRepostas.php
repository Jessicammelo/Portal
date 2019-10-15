<?php
require "../backend/classes/bancoDados.php";

$db = new BancoDados();
$conexao = $db->instancia();

if (isset($_POST['pergunta'])) {

    $pergunta = $_POST['pergunta'];
    $stmt = $conexao->prepare('INSERT INTO pesquisa_perguntas (pergunta, pesquisaId) VALUES (?,?)');
    $stmt->bindValue(1, $pergunta);
    $stmt->bindValue(2, $_GET['pesquisaId']);
    $stmt->execute();
}
if (isset($_POST['resposta'])) {

    $resposta = $_POST['resposta'];
    $stmt = $conexao->prepare('INSERT INTO pesquisa_resposta (resposta, pesquisaId) VALUES (?,?)');
    $stmt->bindValue(1, $resposta);
    $stmt->bindValue(2, $_GET['pesquisaId']);
    $stmt->execute();
}

$stmt = $conexao->prepare('SELECT * FROM pesquisa_perguntas WHERE pesquisaId = ?');
$stmt->bindValue(1, $_GET['pesquisaId']);
$stmt->execute();
$perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conexao->prepare('SELECT * FROM pesquisa_colunas WHERE pesquisaId = ?');
$stmt->bindValue(1, $_GET['pesquisaId']);
$stmt->execute();
$colunas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conexao->prepare('SELECT * FROM pesquisa_resposta WHERE pesquisaId = ?');
$stmt->bindValue(1, $_GET['pesquisaId']);
$stmt->execute();
$resposta = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html>

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css?v7">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="../assets/css/script.js"></script>
</head>

<body>
    <div class="submenu">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; color: white" src="../assets/image/icones/Focus@6x-8.png">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px;  float:right; color: white" src="../assets/image/icones/FURB@6x-8.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tipoazul bordasuperior"></div>
    <div style="width: 100%;" class="breadcrumb navbar-botton__fixed">
        <div class="col-md-10 offset-1 row">
            <div class="col-2">
                <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone removerLinha">
                    <a href="novaPesquisa.php"><i class="fas fa-step-backward">Voltar</i></a>
                </button>
            </div>
        </div>
    </div>

    <form class="col-7 container" style="font-family: verdana; color: #005FA4;" method="POST" action="">
        <div class="form-group">
            <label>Selecione a pergunta</label>
            <select class="form-control">
                <option>Selecione...</option>
                <?php
                foreach ($perguntas as $pergunta) {
                    ?>
                    <option><?php echo $pergunta['pergunta']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Selecione a coluna</label>
            <select class="form-control">
                <option>Selecione...</option>
                <?php
                foreach ($colunas as $coluna) {
                    ?>
                    <option><?php echo $coluna['coluna']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Resposta</label>
            <input required name="resposta" value="" class="form-control" placeholder="Digite a resposta">
        </div>
        <div class="form-group">
            <label>Índice/Nota/Média</label>
            <input required name="indice" value="" class="form-control" placeholder="Digite o índice">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-warning" href="./cadastrarPerguntas.php?pesquisaId=<?php echo $_GET['pesquisaId'] ?>">Voltar para perguntas</a>
        <a class="btn btn-success" href="./cadastrarPerguntas.php?pesquisaId=<?php echo $_GET['pesquisaId'] ?>">Concluir</a>
        <?php
        print_r($perguntas);
        print_r($resposta);
        ?>
    </form>
    <div style="font-family: verdana; color: #005FA4;" class="col-10 container">
        <h4>
            Tabela para conferência
        </h4>
        <table style="font-family: verdana; color: #005FA4;" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">#</th>
                    <th scope="col">Índice</th> <!--se tiver indice-->
                    <?php
                    foreach ($colunas as $coluna) {
                        ?>
                        <th scope="col"><?php echo $coluna['coluna'] ?></th>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>                     
                        <?php           
                            for ($i = 0; $i < count($pergunta); $i++) {
                             ?>
                                <tr>
                                <th scope="row"><?php echo $i + 1 ?></th>
                                <td><?php echo $pergunta['pergunta'] ?></td>                                
                                <td><?php echo $_POST['indice']?></td>           
                                <td><?php echo $_POST['resposta']?></td>
                                </tr> 
                            <?php
                         }
                          ?>                                         
            </tbody>
        </table>
        
    </div>
          <br>
          <br>          
</body>

</html>