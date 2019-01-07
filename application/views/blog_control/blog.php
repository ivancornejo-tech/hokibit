<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="py-5">
	<div class="container">
		<div class="row">
		<div class="col-md-8">
			<div class="row">
			<?php
			foreach ($articulos as $ver) {
				echo '
				<div class="col-md-6">
					<div class="card"> 
						<img class="card-img-top" src="https://static.pingendo.com/cover-moon.svg" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title">' . $ver['Titulo'] . '</h4>
							<p class="card-text">' . $ver['Resumen'] . '</p> 
							<a href="' . base_url() . 'blog/' . $ver['idArticulos'] . '" class="btn btn-primary">ver mas...</a>
						</div>
					</div>
				</div>';
			}
			?>
			</div>
		</div>
		<div class="col-md-4" ></div>
		</div>
	</div>
</div>
