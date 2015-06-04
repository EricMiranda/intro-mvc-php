<?php
	PageBuilder::header('Porque no solo de pan vive el hombre','','','');
?>
<body onload="setTimeout(function() { window.scrollTo(0, 1) }, 100);">
<? PageBuilder::topbar("inicio"); ?>
<!-- contenido -->
		<!----start-about---->
		<div class="about">
			<div class="container">
				<div class="col-md-6 divice">
					<img class="img-responsive" src="<?=App::get_img_url('divice.png')?>" title="divice" />
				</div>
				<div class="col-md-6 divice-info">
					<h3>¿Que es lo que hago?</h3>
					<p>
					Me dedico principalmente al desarrollo de sitios Web, sistemas web y cualquier otra coas que tenga que ver con las
					tecnologias sobre lo que hoy es internet, practicamente la limitante es la imaginacion.
					<br><br>
					Me considero un apasionado por la tecnologia y sus misterios, así del mismo modo soy un 99.99% usuario Linux, el resto se lo dedico a windows para ayudar a las personas a solucionar sus problemas con este sistema operativo.
					<br>
					Dentro de las principales labores que desarrollo son: Soporte tecnico, programacion de sistemas, programacion de sitios web, asesorias y busco de alguna manera realizar apoyo comunitario.
					<br><br>
					Entre las principales actividades el desarrollo WEB es una especialidad la cual se tiene que dominar constantemente
					debido al gran avance que ocurre dia a dia
					</p>
					<!--<a class="btn btn-primary btn-red" href="#">Read More <span> </span></a>-->
				</div>
			</div>
		</div>
		<!----//End-about---->
		<!---- start-top-grids---->
		<div class="container">
			<div class="row  section s1 top-grids">
				<div class="col-md-4 top-grid">
					<span class="icon1"></span>
					<h2>Diseños responsivos</h2>
					<p>
					El diseño responsivo es un diseño web adaptable o adaptativo, es una filosofía de diseño y desarrollo cuyo objetivo es adaptar la apariencia de las páginas web al dispositivo que se esté utilizando para visualizarla.
					</p>
				</div>
				<div class="col-md-4 top-grid">
					<span class="icon2"> </span>
					<h2>Desarrollo Web</h2>
					<p>El diseño web es un proceso que consiste en la planificación, diseño e implementación de sitios web ya que requiere tener en cuenta la navegabilidad, interactividad, usabilidad y la interacción de medios como el audio, texto, imagen, enlaces y video.
					</p>
				</div>
				<div class="col-md-4 top-grid">
					<span class="icon3"> </span>
					<h2>Internet Marketing</h2>
					<p>
					De nada sirve tener simplemente una página web si no es eficaz para los buscadores. Hoy día se utilizan las tecnicas de SEO para tener una página web estructurada y eficaz.
					</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!---- //End-top-grids---->
		<!----start-portfolio---->
		<div class="portfolio section s2">
			<div class="container portfolio-head">
				<h3>Blog</h3>
				<p>Si, asi es, un blog mas!</p>
			</div>
			<!---- start-portfolio-script----->
			<script src="<?=App::get_js_url('hover_pack.js')?>"></script>
			<script type="text/javascript" src="<?=App::get_js_url('jquery.mixitup.min.js')?>"></script>
			<script type="text/javascript">
				$(function () {
					var filterList = {
						init: function () {

							// MixItUp plugin
							// http://mixitup.io
							$('#portfoliolist').mixitup({
								targetSelector: '.portfolio',
								filterSelector: '.filter',
								effects: ['fade'],
								easing: 'snap',
								// call the hover effect
								onMixEnd: filterList.hoverEffect()
							});

						},
						hoverEffect: function () {
							// Simple parallax effect
							$('#portfoliolist .portfolio').hover(
								function () {
									$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
									$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
								},
								function () {
									$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
									$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
								}
							);

						}

					};
					// Run the show!
					filterList.init();
				});
			</script>
			<!----//End-portfolio-script----->
					<ul id="filters" class="clearfix">
						<li><span class="filter active" data-filter="app card icon logo web">Todo</span></li>
						<li><span class="filter" data-filter="app">Linux</span></li>
						<li><span class="filter" data-filter="card">Apache</span></li>
						<li><span class="filter" data-filter="icon">PHP</span></li>
						<li><span class="filter" data-filter="icosn">MySQL</span></li>
						<li><span class="filter" data-filter="icwon">Otros</span></li>
					</ul>
					<div id="portfoliolist">
					<div class="clearfix"> </div>
				</div>
		</div>
		<!----//End-portfolio---->
		<!---testmonials---->
		<div  class="testmonials section s3">
			<div class="container">
			<div class="bs-example">
			    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
			    	<!-- Carousel indicators -->
			        <ol class="carousel-indicators pagenate-icons">
			            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			            <li data-target="#myCarousel" data-slide-to="1"></li>
			            <li data-target="#myCarousel" data-slide-to="2"></li>
			        </ol>
			       <!-- Carousel items -->
			        <div class="carousel-inner">
			            <div class="active item">
			                <h2><img src="http://www.comunidadphppuebla.com/images/community/moises-espindola.jpg" title="name" /></h2>
			                <div class="carousel-caption caption">
			                  <h3 style="color:#ddd"></h3>
			                  <p>
			                  Un desarrollador web freelancer con más de 6 años de experiencia trabajando en la maquetación de sitios web HTML5, desarrollo de plantillas web y asesoría en temas como posicionamiento, campañas en Facebook y Twitter, programador en tecnologias Web como HTML, PHP4 y PHP5, JavaScript, CSS, AJAX, aplicando tecnicas de SEO, administracion de servidores Linux entre otras cosas.
			                  </p>
			                </div>
			            </div>
			        </div>
			        <!-- Carousel nav -->
			    </div>
		</div>
		</div>
		</div>
		<!---testmonials---->
		<!----start-model-box---->
						<a data-toggle="modal" data-target=".bs-example-modal-md" href="#"> </a>
						<div class="modal fade bs-example-modal-md light-box" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-md">
						    <div class="modal-content light-box-info">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?=App::get_img_url('close.png')?>" title="close" /></button>
						     <h3>CREASATI</h3>
						     <p>CREASATI surge de la necesidad que tiene la pequeña y grande empresa para satisfacer las necesidades en cuestion a tecnologias web.</p>
						    </div>
						  </div>
						</div>
						<!----start-model-box---->

<!-- fin contenido -->
<? PageBuilder::footer();  ?>
</body>
</html>