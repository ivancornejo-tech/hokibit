<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hokibit</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css">

    <!-- my styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Syncopate:400,700" rel="stylesheet">

    <!-- development -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/function.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0 p-0" type="button" data-toggle="collapse" data-target="#navbar14">
              <p class="navbar-brand mb-0 text-white" id="logo">
                  HOKIBIT
              </p>
            </button>
            <div class="collapse navbar-collapse" id="navbar14">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('blog'); ?>">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('nosotros'); ?>">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('templates'); ?>">Plantillas</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Contactos</a> </li>
                </ul>
                <p class="d-none d-md-block lead mb-0  text-white"> <i class="fa d-inline fa-lg fa-stop-circle"></i> <b>HOKIBIT</b> </p>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-1">
                        <a href="#" class="nav-link" target="_blank">
                            <i class="fab fa-facebook-square" style="font-size:18px;"></i>
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="#" class="nav-link" target="_blank">
                            <i class="fab fa-twitter-square" style="font-size:18px;"></i>
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="#" class="nav-link" target="_blank">
                            <i class="fab fa-gitlab" style="font-size:18px;"></i>
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="#" class="nav-link" target="_blank">
                            <i class="fab fa-github" style="font-size:18px;"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <?php
    echo $content_for_layout;
    ?>

    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="lead">Suscríbase a nuestro boletín de noticias para las últimas noticias.</p>
                    <form class="form-inline">
                        <div class="form-group"> <input type="email" class="form-control" placeholder="Your e-mail here"> </div> <button type="submit" class="btn btn-primary ml-3">Subscribe</button>
                    </form>
                </div>
                <div class="col-md-4 text-center">
                    <h5></h5>
                    <a href="#" target="_blank">
                        <i class="fab fa-facebook-square" style="font-size:48px;"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="fab fa-twitter-square" style="font-size:48px;"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="fab fa-gitlab" style="font-size:48px;"></i>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3 text-center">
                    <p>© Copyright 2018 Hokibit - All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html> 