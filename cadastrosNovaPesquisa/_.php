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

    <form class=" col-7 container" style="font-family: verdana; color: #005FA4;" method="POST" enctype="multipart/form-data">
        <input name="id" value="" type="hidden">
        <div class="form-group">
            <label>Digite o títilo da pesquisa</label>
            <input required name="nome" value="" class="form-control" placeholder="Digite nome">
        </div>
        <div class="form-group">
            <label>Digite a frase/pergunta/afirmação</label>
            <input required name="nome" value="" class="form-control" placeholder="Digite nome">
        </div>
        <h5>
            Digite o nome do índice ou resposta (que vai em baixo do gráfico, se não usar deixar em branco)
        </h5>
        <div class="col-8 row">
        <img style="width: 600px; margin-left: 50%" src="../assets/image/icones/2019-10-11.png">
        </div>
        <div class="form-group">
            <label>Resposta01</label>
            <input required name="nome" value="" class="form-control" placeholder="Digite nome">
        </div>
        <div class="form-group">
            <label>ValorResposta01</label>
            <input required name="nenhuma_confianca" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Resposta02</label>
            <input required name="quase_nenhuma_confianca" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>ValorResposta02</label>
            <input required name="alguma_confianca" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Resposta03</label>
            <input required name="muita_confianca" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>ValorResposta03</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Resposta04</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>ValorResposta04</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Resposta05</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>ValorResposta05</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Resposta06</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>ValorResposta06</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Resposta07</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>ValorResposta07</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Resposta08</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>ValorResposta08</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Resposta09</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>ValorResposta09</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Resposta10</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>ValorResposta10</label>
            <input required name="nao_conheco" value="" class="form-control" placeholder="Digite valor">
        </div>

        <div class="form-group">
            <label>Ano/Semestre</label>
            <input required name="ano" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Digite o nome do Indice/Nota/Média(ex: Índice de Concordância, se não tiver deixar em branco)</label>
            <input required name="indice_confianca" value="" class="form-control" placeholder="Digite valor">
        </div>
        <div class="form-group">
            <label>Digite o valor(se não tiver deixar em branco</label>
            <input required name="indice_confianca_ibope" value="" class="form-control" placeholder="Digite valor">
        </div>

        <!--<?php
            if (!isset($_GET['editar'])) {
                ?>       
        <?php
        }
        ?>
        -->
        <button type="submit" class="btn btn-primary">Salvar</button>

        <br>
        <br>
    </form>
</body>

</html>