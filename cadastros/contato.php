<?php
$enviado = isset($_GET['msg']) ? $_GET['msg'] : null;
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
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="backgroudImagem" style="min-height: 130%; background-repeat: no-repeat; background-size: 100% 100%;">
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
    <div class="breadcrumb navbar-botton__fixed">
        <div style="margin-left: 40px" class="col-md-12 row ">
            <div class="col-lg-12 col-md-10 col-12 row" style="padding: 2px; margin-left: 200px;">
                <div class="col-3 ">
                    <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone">
                        <a href="../index.php"><i class="fas fa-step-backward"> Página inicial </i></a>
                    </button>
                </div>
                <div style="margin-right: 30px" class="col-3">
                    <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone">
                        <a href="../metodologia.php?ano=<?php echo $_GET['ano'] ?>"><i class="fas fa-chalkboard"> Metodologia </i></a>
                    </button>
                </div>
                <div class="col-6 row">
                    <button type="button" class="btn btn-light font-sizeBotao font-sizeIcone">
                        <a href="../grafico.php?ano=<?php echo $_GET['ano'] ?>"><i class="fas fa-chart-bar"> Índice
                            </i></a>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-7 col-xs-8 offset-xs-2 container" style="position: relative; min-height: 100vh;">
        <form method="POST" action="enviarEmail.php" class="col-md-6 textoIndex" style="position: absolute;top: 50%;left: 50%;transform: translateY(-50%) translateX(-50%)" method="POST">
            <div class="col-12">
                <h4 style=" text-align:center;">Se interessou pela pesquisa?</h4>
                <h5 style=" text-align:center;">Entre em contato conosco:</h5>
                <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Nome</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div style="background: #005FA4; color: white" class="input-group-text"><i class="fas fa-user-alt"></i></div>
                        </div>
                        <input type="text" require name="nome" class="form-control" id="inlineFormInputGroupUsername" placeholder="Nome">
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div style="background: #005FA4; color: white" class="input-group-text"><i class="fas fa-envelope"></i></div>
                        </div>
                        <input type="email" name="email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="inlineFormInputGroupUsername">mensagem</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div style="background: #005FA4; color: white" class="input-group-text "><i class="fas fa-comment"></i></div>
                        </div>
                        <textarea type="textarea" name="mensagem" class="form-control" placeholder="Mensagem"></textarea>
                        <!-- <input style=" width:300px; height:100px;" type="textarea"  id=" inlineFormInputGroupUsername" > -->
                    </div>

                </div>
                <div style="margin-left: 80%;">
                    <button style="background: #005FA4; color: white" type="submit" class="btn btn">Enviar</button>
                </div>
                <div class="col-12" style="margin-top: 15px">
                    <?php
                    if (empty($enviado)) {
                        echo '';
                    } else if ($enviado == 1) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            Email enviado!
                        </div>
                    <?php
                    } else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Email não enviado!
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </form>
    </div>



</body>

</html>