<html>

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css?v7">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="assets/css/script.js"></script>
   
</head>

<body>
    <div class="submenu">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px; color: white" src="assets/image/icones/Focus@6x-8.png">
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12">
                        <img style="width: 150px;  float:right; color: white" src="assets/image/icones/FURB@6x-8.png">
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
                    <a href="../instituicao/index.php?"><i class="fas fa-step-backward">Voltar</i></a>
                </button>
            </div>
        </div>
    </div>
    <div class=" col-7 container">
    <div class="col-6 row" style="margin: 40px;">
            <div class="col-3">
                <a class="btn btn-primary" style=" font-family: verdana" href="cadastroNovaPesquisa.php">Cadastrar
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
                    Frase/Pergunta/Afirmação
                </th>
                <th>
                    Ano
                </th>
                <th>
                    Índice 
                </th>
                <th width="50px">
                    #
                </th>
            </thead>
            <!--
                <tbody>
                <tr>
                    <td>
                        <?php echo $i + 1;
                            ?>
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
                     -->
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" style="font-family: verdana" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Selecione
                            </a>
                            <div class="dropdown-menu " style="font-size: 17px; font-family: verdana" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item topicos" href="index.php?delete=<?php echo $instituicao[$i]['id'] ?>">Apagar</a>
                                <a class="dropdown-item topicos" href="cadastro.php?editar=<?php echo $instituicao[$i]['id'] ?>">Editar</a>
                                <a class="dropdown-item topicos" href="../sexo/index.php?instituicao=<?php echo $instituicao[$i]['id'] ?>">Sexo</a>
                                <a class="dropdown-item topicos" href="../faixaEtaria/index.php?instituicao=<?php echo $instituicao[$i]['id'] ?>">Faixa Etária</a>
                                <a class="dropdown-item topicos" href="../renda/index.php?instituicao=<?php echo $instituicao[$i]['id'] ?>">Renda Familiar</a>
                            </div>
                        </div>
                    </td>
                </tbody>
            </table>
          <br>
          <br>
    </div>
</body>

</html>