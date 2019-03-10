<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if (isset($articulos)) : ?>
                <div class="row">
                    <?php foreach ($articulos as $ver) {
						echo '
							<div class="col-md-6">
								<div class="card"> 
									<img class="card-img-top" src="https://static.pingendo.com/cover-moon.svg" alt="Card image cap">
									<div class="card-body">
										<h4 class="card-title">' . $ver['Titulo'] . '</h4>
										<p class="card-text">' . $ver['Resumen'] . '</p> 
										<a href="' . base_url() . 'blog/' . $ver['FechaPublicacion'] . '/' . $ver['Url'] . '" class="btn btn-primary">ver mas...</a>
									</div>
								</div>
							</div>';
					} ?>
                </div>
                <?php endif; ?>
                <?php if (isset($articulo)) :
					echo "
					<h2>" . $articulo['Titulo'] . "</h2>
					<h5>" . $articulo['FechaPublicacion'] . "</h5>
					<p>
						" . $articulo['Contenido'] . "
					</p>
					";
					foreach ($articulo['Autor'] as $autor) {
						echo '
						<div class="py-5">
						<div class="container">
						<div class="row">
							<div class="mx-auto col-md-12 text-center">
							<h3 class="mb-4">Sobré el autor</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
							<div class="row mb-4">
								<div class="col-3"> 
								<img class="img-fluid d-block mx-auto rounded-circle" src="https://static.pingendo.com/img-placeholder-1.svg" width="100" alt="Card image cap"> </div>
								<div class="col-9">
								<h4> <b>' . $autor['Nombre'] . '</b> - ' . $autor['Rol'] . '</h4>
								<p class="mb-0">' . $autor['Descripcion'] . '</p>
								<p><a href="mailto:' . $autor['Correo'] . '" target="_blank" >' . $autor['Correo'] . '</a></p>
								</div>
								<div class="col-md-12 text-center">
									<a href="https://www.facebook.com/' . $autor['UsuarioFacebook'] . '" target="_blank">
									<i class="fab fa-facebook-square" style="font-size:48px;"></i>
									</a>
									<a href="https://twitter.com/' . $autor['UsuarioTwitter'] . '" target="_blank">
									<i class="fab fa-twitter-square" style="font-size:48px;"></i>
									</a>
									<a href="https://www.youtube.com/' . $autor['UsuarioYoutube'] . '" target="_blank">
									<i class="fab fa-youtube" style="font-size:48px;"></i>
									</a>
									<a href="https://gitlab.com/' . $autor['UsuarioGitLab'] . '" target="_blank">
									<i class="fab fa-gitlab" style="font-size:48px;"></i>
									</a>
									<a href="https://github.com/' . $autor['UsuarioGitHub'] . '" target="_blank">
									<i class="fab fa-github" style="font-size:48px;"></i>
									</a>
								</div>
							</div>
							</div>
						</div>
						</div>
						</div>
						';
					}
				endif; ?>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div> 