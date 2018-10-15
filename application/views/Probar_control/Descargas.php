<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="hero-body">
    <div class="container has-text-centered">
        <div class="columns is-vcentered">
            <div class="column is-5">
                <div class='carousel carousel-animated carousel-animate-slide' data-autoplay="true">
				  <div class='carousel-container'>
				    <div class='carousel-item has-background is-active'>
				      <img class="is-background" src="https://wikiki.github.io/images/merry-christmas.jpg" alt="" width="640" height="310" />
				      <div class="title">Merry Christmas</div>
				    </div>
				    <div class='carousel-item has-background'>
				      <img class="is-background" src="https://wikiki.github.io/images/singer.jpg" alt="" width="640" height="310" />
				      <div class="title">Original Gift: Offer a song with <a href="https://lasongbox.com" target="_blank">La Song Box</a></div>
				    </div>
				    <div class='carousel-item has-background'>
				      <img class="is-background" src="https://wikiki.github.io/images/sushi.jpg" alt="" width="640" height="310" />
				      <div class="title">Sushi time</div>
				    </div>
				    <div class='carousel-item has-background'>
				      <img class="is-background" src="https://wikiki.github.io/images/life.jpg" alt="" width="640" height="310" />
				      <div class="title">Life</div>
				    </div>
				  </div>
				  <div class="carousel-navigation is-centered">
				    <div class="carousel-nav-left">
				      <i class="fa fa-chevron-left" aria-hidden="true"></i>
				    </div>
				    <div class="carousel-nav-right">
				      <i class="fa fa-chevron-right" aria-hidden="true"></i>
				    </div>
				  </div>
				</div>
            </div>
            <div class="column is-6 is-offset-1">
            	<h1 class="title is-2">
                    Comprar SmartBusinessPOS
                </h1>

                <div class="field is-grouped">
					<p class="control">
					    Versión 
					</p>
				  	<div class="select">
				      <select name="Version">
				        <option value="SM1.5">SmartBusiness 1.5</option>
				      </select>
				    </div>
				  </div>

                <div class="field is-grouped">
					<p class="control">
					    licencia SmartBusiness 
					</p>
				  	<p class="control">
				    	<input class="" name="Tipo" id="Tipo" type="number" max="10" min="1" size="2" maxlength="2" value="1" >
				  	</p>
				  	<p class="control">
					   <span>x</span>
					   <span id=""> $</span>
					   <span id="CostoP">500</span>
					   <span id=""> MXN</span>
					</p>
					<p class="control">
						<a class="button is-medium is-info is-outlined">
	                		Comprar
	              		</a>
					</p>
				</div>
				<p class="has-text-centered">
				    <h4>Tota: <span id="CostoTotal" value=""></span></h4>
				</p>
				<p class="has-text-centered">
				    <a id="showModal">¡Prueba nuestro sistema por 30 días!</a>
				</p>
            </div>
        </div>
    </div>
</div>

<div class="container" id="app">
	<div class="modal">
	  <div class="modal-background"></div>
	  <div class="modal-card">
	    <header class="modal-card-head">
	      <p class="modal-card-title">Registro</p>
	      <button class="delete" aria-label="close"></button>
	    </header>
	    <section class="modal-card-body">
	      	<form id="RegistoPrueba">
	    		<div class="field">
				  <label class="label">Nombre</label>
				  <div class="control">
				    <input class="input" name="Nombre" id="Nombre" type="text" placeholder="" required>
				  </div>
				</div>
				<div class="field">
				  <label class="label">Email</label>
				  <div class="control has-icons-left has-icons-right">
				    <input class="input" name="Email" id="Email" type="email" placeholder="Email" value="" required>
				    <span class="icon is-small is-left">
				      <i class="fas fa-envelope"></i>
				    </span>
				    <span class="icon is-small is-right">
				      <i class="fas fa-exclamation-triangle"></i>
				    </span>
				  </div>
				</div>
				<div class="field">
				  <label class="label">Telefono</label>
				  <div class="control">
				    <input class="input" name="Telefono" id="Telefono" type="tel" placeholder="Numero de telefonico">
				  </div>
				</div>
				<div class="field">
					<label class="label">Empresa</label>
					<div class="control">
						<input class="input" name="Empresa" id="Empresa" type="text" placeholder="Nombre de tu empres">	
					</div>
				</div>
				<div class="field">
				  <label class="label">Cargo</label>
				  <div class="control">
				    <div class="select">
				      <select name="Cargo" id="Cargo">
				        <option value="Analyst / Press">Analyst / Press</option>
						<option value="Developer / Engineer">Developer / Engineer</option>
						<option value="Executive">Executive</option>
						<option value="IT or Technical Manager">IT or Technical Manager</option>
						<option value="Marketing / Sales">Marketing / Sales</option>
						<option value="Researcher / Academic">Researcher / Academic</option>
						<option value="Systems / Solution Architect">Systems / Solution Architect</option>
						<option value="System Administrator">System Administrator</option>
						<option value="Student">Student</option>
						<option value="Other">Otros</option>
				      </select>
				    </div>
				  </div>
				</div>
				<div class="field">
				  <div class="control">
				    <label class="checkbox">
				      <input type="checkbox" name="Normas" id="Normas" value="si" required>
				      Estoy de acuerdo con los <a href="#">términos y condiciones</a>
				    </label>
				  </div>
				</div>
				<div class="field">
				  <div class="control">
				    <label class="checkbox">
				      <input type="checkbox" name="Publicidad" id="Publicidad" value="si">
				      Deseo recibir ofertas y promociones de SmartBusinessPOS
				    </label>
				  </div>
				</div>

				<div class="field is-grouped">
				  <div class="control">
				  	<input type="button" class="button is-link" id="Regitro_Download" value="Registrar">
				  </div>
				</div>
	    	</form>
	    </section>
	    <footer class="modal-card-foot">
	      <button class="button" id="delete">Cancel</button>
	    </footer>
	  </div>
	</div>
</div>