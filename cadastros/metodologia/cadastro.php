<?php
require "../../backend/classes/bancoDados.php";
$db = new BancoDados();
$conexao = $db->instancia();

if (!empty($_POST['titulo']) && !empty($_POST['mensagem'])) {
    $titulo = $_POST['titulo'];
    $mensagem = $_POST['mensagem'];
    if (!isset($_POST['id'])) {
        $stmt = $conexao->prepare('INSERT INTO metodologia (titulo,mensagem) VALUES (?, ?)');
        $stmt->bindValue(1, $titulo);
        $stmt->bindValue(2, nl2br($mensagem));
    } else {
        $id = $_POST['id'];
        $stmt = $conexao->prepare('UPDATE metodologia SET titulo = ?, mensagem = ? WHERE id = ?');
        $stmt->bindValue(1, $titulo);
        $stmt->bindValue(2, nl2br($mensagem));
        $stmt->bindValue(3, $id);
    }

    $stmt->execute();
    header("location:index.php");
}
$metodologia = [
    'titulo' => '',
    'mensagem' => ''
];
if (!empty($_GET['editar'])) {
    $editar = $_GET['editar'];
    $stmt = $conexao->query('SELECT * From metodologia WHERE id =' . $editar);
    $metodologia = $stmt->fetch(PDO::FETCH_ASSOC);
    $metodologia['mensagem'] = str_replace('<br />', '', $metodologia['mensagem']);
}
?>
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
    <div style="width: 100%" class="breadcrumb navbar-botton__fixed">
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
    <form class=" col-7 container" style=" font-family: verdana; color: #005FA4;" method="POST">
        <input name="id" value="<?php echo $metodologia['id'] ?>" type="hidden">
        <div class="form-group">
            <label>Título</label>
            <input required name="titulo" value="<?php echo $metodologia['titulo'] ?>" class="form-control" placeholder="Digite título">
        </div>
        <div class="form-group">
            <label>Mensagem</label>
            <textarea required name="mensagem" class="form-control"><?php echo $metodologia['mensagem'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</body>

</html>