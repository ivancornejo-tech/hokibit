<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hokibit</title>
    <link rel="stylesheet" href="<?php echo base_url();?>web/css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>web/fontawesome-5.6.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>web/css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>web/css/style.css">
    <!-- development version, includes helpful console warnings -->
    <script src="<?php echo base_url();?>web/js/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>web/js/function.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container"> 
					<a class="navbar-brand" href="#">
          	<b>HOKIBIT</b>
					</a> 
					<button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbar10">
							<ul class="navbar-nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>">home</a></li>
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>blog">Blog</a></li>
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>nosotros">Nosotros</a></li>
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>templates">Plantillas</a></li>
							<li class="nav-item"><a class="nav-link" href="#">Contactos</a> </li>
					</div>
        </div>
    </nav>


	<?php
		echo $content_for_layout;
  ?>
  
  <script src="<?php echo base_url();?>web/css/bootstrap/js/bootstrap.js"></script>
  <script src="<?php echo base_url();?>web/css/bootstrap/js/bootstrap.bundle.min.js"></script>

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
					<a href="#">
						<i class="fab fa-facebook-square" style="font-size:48px;"></i>
					</a>
					<a href="#">
						<i class="fab fa-twitter-square" style="font-size:48px;"></i>	
					</a>
					<a href="#">
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
