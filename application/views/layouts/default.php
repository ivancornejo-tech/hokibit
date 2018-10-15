<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hokibit</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap-4/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/theme.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
    <!-- development version, includes helpful console warnings -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/function.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container"> <a class="navbar-brand" href="#">
            <i class="fa d-inline fa-lg fa-github"></i>
            <b> HOKIBIT</b>
        </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar10">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar10">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item"> <a class="nav-link" href="#">Features</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Pricing</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Nosotros</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">FAQ</a> </li>
            </ul> <a class="btn navbar-btn ml-md-2 btn-light text-dark">Contact us</a>
        </div>
        </div>
    </nav>
  
    
	<?php
		echo $content_for_layout;
	?>

	<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <p class="lead">Suscríbase a nuestro boletín de noticias para las últimas noticias.</p>
          <form class="form-inline">
            <div class="form-group"> <input type="email" class="form-control" placeholder="Your e-mail here"> </div> <button type="submit" class="btn btn-primary ml-3">Subscribe</button>
          </form>
        </div>
        <div class="col-4 col-md-1 align-self-center"> <a href="#">
            <i class="fa fa-fw fa-facebook text-muted fa-2x"></i>
          </a> </div>
        <div class="col-4 col-md-1 align-self-center"> <a href="#">
            <i class="fa fa-fw fa-twitter text-muted fa-2x"></i>
          </a> </div>
        <div class="col-4 col-md-1 align-self-center"> <a href="#">
            <i class="fa fa-fw fa-gitlab text-muted fa-2x"></i>
          </a> </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 Hokibit - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html> 
