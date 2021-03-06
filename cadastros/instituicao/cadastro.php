<?php
require "../../backend/classes/bancoDados.php";
$db = new BancoDados();
$conexao = $db->instancia();
if (
    !empty($_POST['nome']) && !empty($_POST['nenhuma_confianca']) &&
    !empty($_POST['quase_nenhuma_confianca']) && !empty($_POST['alguma_confianca']) && !empty($_POST['muita_confianca'])
    && !empty($_POST['nao_conheco']) && !empty($_POST['ano']) && !empty($_POST['indice_confianca'])
    && !empty($_POST['indice_confianca_ibope'])
) {

    $nome = $_POST['nome'];
    $nenhuma_confianca = $_POST['nenhuma_confianca'];
    $quase_nenhuma_confianca = $_POST['quase_nenhuma_confianca'];
    $alguma_confianca = $_POST['alguma_confianca'];
    $muita_confianca = $_POST['muita_confianca'];
    $nao_conheco = $_POST['nao_conheco'];
    $ano = $_POST['ano'];
    $indice_confianca = $_POST['indice_confianca'];
    $indice_confianca_ibope = $_POST['indice_confianca_ibope'];
    if(isset($_FILES['icone'])){
        move_uploaded_file($_FILES['icone']['tmp_name'],'../../assets/image/icones/'.$_FILES['icone']['name']);
    }
    

    if (!isset($_POST['id']) || empty($_POST['id'])) {
        $stmt = $conexao->prepare('INSERT INTO instituicao (nome,nenhuma_confianca,quase_nenhuma_confianca,alguma_confianca,muita_confianca,nao_conheco,ano,indice_confianca,indice_confianca_ibope,icone) VALUES ( ?,?, ?, ?, ?, ?, ?, ?, ?,?)');
        $stmt->bindValue(1, ($nome));
        $stmt->bindValue(2, str_replace(',', '.', $nenhuma_confianca));
        $stmt->bindValue(3, str_replace(',', '.', $quase_nenhuma_confianca));
        $stmt->bindValue(4, str_replace(',', '.', $alguma_confianca));
        $stmt->bindValue(5, str_replace(',', '.', $muita_confianca));
        $stmt->bindValue(6, str_replace(',', '.', $nao_conheco));
        $stmt->bindValue(7, ($ano));
        $stmt->bindValue(8, str_replace(',', '.', $indice_confianca));
        $stmt->bindValue(9, str_replace(',', '.', $indice_confianca_ibope));
        $stmt->bindValue(10, $_FILES['icone']['name']);
    } else {
        $id = $_POST['id'];
        $stmt = $conexao->prepare('UPDATE instituicao SET nome = ?, nenhuma_confianca = ?,quase_nenhuma_confianca = ?, alguma_confianca = ?, muita_confianca = ?, nao_conheco = ?, ano = ?, indice_confianca = ?, indice_confianca_ibope = ? WHERE id = ?');
        $stmt->bindValue(1, ($nome));
        $stmt->bindValue(2, str_replace(',', '.', $nenhuma_confianca));
        $stmt->bindValue(3, str_replace(',', '.', $quase_nenhuma_confianca));
        $stmt->bindValue(4, str_replace(',', '.', $alguma_confianca));
        $stmt->bindValue(5, str_replace(',', '.', $muita_confianca));
        $stmt->bindValue(6, str_replace(',', '.', $nao_conheco));
        $stmt->bindValue(7, ($ano));
        $stmt->bindValue(8, str_replace(',', '.', $indice_confianca));
        $stmt->bindValue(9, str_replace(',', '.', $indice_confianca_ibope));
        $stmt->bindValue(10, ($id));
    }
    $stmt->execute();
    header("location:index.php");
}
$instituicao = [
    'id' => '',
    'nome' => '',
    'nenhuma_confianca' => '',
    'quase_nenhuma_confianca' => '',
    'alguma_confianca' => '',
    'muita_confianca' => '',
    'nao_conheco' => '',
    'ano' => '',
    'indice_confianca' => '',
    'indice_confianca_ibope' => ''

];
if (!empty($_GET['editar'])) {
    $editar = $_GET['editar'];
    $stmt = $conexao->query('SELECT * From instituicao WHERE id =' . $editar);
    $instituicao = $stmt->fetch(PDO::FETCH_ASSOC);
}
// print_r($instituicao);
// exit;
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
    <div style="width: 100%;" class="breadcrumb navbar-botton__fixed">
        <div class="col-md-10 offset-1 row">
            <div class="col-4">
                <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone removerLinha">
                    <a href="../instituicao/index.php?"> Instituições Brasileiras</a>
                </button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone removerLinha">
                    <a href="../grupoSocial/index.php?">Grupo Social</a>
                </button>
            </div>
        </div>
    </div>

    <form class=" col-7 container" style="font-family: verdana; color: #005FA4;" method="POST" enctype="multipart/form-data">
        <input name="id" value="<?php echo $instituicao['id'] ?>" type="hidden">
        <div class="form-group">
            <label>Digite nome da instituicão</label>
            <input required name="nome" value="<?php echo $instituicao['nome'] ?>" class="form-control" placeholder="Digite nome">
        </div>
        <div class="form-group">
            <label>Nenhuma confiança</label>
            <input required name="nenhuma_confianca" value="<?php echo $instituicao['nenhuma_confianca'] ?>" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Quase nenhuma confiança</label>
            <input required name="quase_nenhuma_confianca" value="<?php echo $instituicao['quase_nenhuma_confianca'] ?>" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Alguma confiança</label>
            <input required name="alguma_confianca" value="<?php echo $instituicao['alguma_confianca'] ?>" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Muita confiança</label>
            <input required name="muita_confianca" value="<?php echo $instituicao['muita_confianca'] ?>" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Não conheço</label>
            <input required name="nao_conheco" value="<?php echo $instituicao['nao_conheco'] ?>" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Ano</label>
            <input required name="ano" value="<?php echo $instituicao['ano'] ?>" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Indice de confiança</label>
            <input required name="indice_confianca" value="<?php echo $instituicao['indice_confianca'] ?>" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Indice de confiança do Ibope</label>
            <input required name="indice_confianca_ibope" value="<?php echo $instituicao['indice_confianca_ibope'] ?>" class="form-control" placeholder="Digite valor">
        </div>
        <?php
        if(!isset($_GET['editar'])){
        ?>
        <div class="form-group">
            <label>Imagem</label>
            <input  type="file" required name="icone" class="form-control" placeholder="imagem">
        </div>
        <?php
        }
        ?>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <br>
        <br>
    </form>
</body>

</html>