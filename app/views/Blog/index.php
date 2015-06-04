<?php
#==================================================#
#     coded by: Moises Espindola         _    _    #
#     nick: zaer00t                     | |  (_)   #
#    ___  _ __   ___   __ _  ___   __ _ | |_  _    #
#   / __|| '__| / _ \ / _` |/ __| / _` || __|| |   #
#  | (__ | |   |  __/| (_| |\__ \| (_| || |_ | |   #
#   \___||_|    \___| \__,_||___/ \__,_| \__||_|   #
#                                                  #
#    e-mail: zaer00t@gmail.com                     #
#    www: http://creasati.com.mx                   #
#    date: 29/Mayo/2015                            #
#    code name: creasati.com.mx                    #
#==================================================#

	#PageBuilder::header('Hablemos de tecnologia y otras hierbas!','','','');
	PageBuilder::header('Hablemos de tecnologia y otras hierbas!','','bootstrap/css/bootstrap_x.css','','');
	$articulos = $data["articulos"];
?>
<style type="text/css">
a.list-group-item {
	height:auto;
	min-height:220px;
}
a.list-group-item.active small {
	color:#fff;
}
.stars {
	margin:20px auto 1px;    
}
.row {
    margin: 20px 0px 20px 0px;
    }

img {
    margin: 10px 10px 10px 10px;
    -webkit-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    transform: scale(1, 1);
    transition-duration: 0.3s;
    -webkit-transition-duration: 0.3s; /* Safari */
    }

img:hover {
	cursor: pointer;
	-webkit-transform: scale(2, 2);
    -ms-transform: scale(2, 2);
    transform: scale(2, 2);
    transition-duration: 0.3s;
    -webkit-transition-duration: 0.3s; /* Safari */
    box-shadow: 10px 10px 5px #888888;
    z-index: 1;
    }
</style>
<body onload="setTimeout(function() { window.scrollTo(0, 1) }, 100);">
	<nav class="ubMenu navbar-custom navbar-scroll-top" role="navigation">
		<div class="container">
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
					<img src="<?=App::get_img_url(nav-icon.png)?>" title="drop-down-menu" />
				</button>
			</div>
			<div class="collapse navbar-collapse navbar-left navbar-main-collapse">
				<ul class="nav navbar-nav">
					<li class="active">
						<a id="sTop" class="subNavBtn" href="#">El comienzo</a>
					</li>
				</ul>
			</div>
			<a  id="s4" class="right-msg subNavBtn msg-icon"href="#"><span> </span></a>
			<div class="clearfix"> </div>
		</div>
	</nav>
<!-- contenido -->
		<!----start-about---->
		<div class="about">
			<div class="container">
				<div class="col-md-6 divice">
					<img class="img-responsive" src="<?=App::get_img_url('programador.jpg')?>" title="Hacking this world!"/>
				</div>
				<div class="col-md-6 divice-info">
					<h3>Hablemos de tecnologia y otras hierbas!</h3>
					<p>
						Todo tiene una finalidad y lo que no, entonces carece de un proposito!<br>
						Asi como un foco tiene un unico proposito, este blog tiene un proposito, que es compartir mis experiencias
						dentro del mundo de la programación y la informatica aplicada<br><br>
						<strong>¿Que gano?</strong><br>
						En realidad no gano nada, no tengo ni banners basura que estorben, ni contenido tedioso como los adclick etc... simplemente es por gusto o por amor al arte!
					</p>
				</div>
			</div>
		</div>
		<!----//End-about---->
		
		<!----//End-portfolio---->
		<!---testmonials---->
		<div  class="blog">
			<div class="container">
				<?=App::load_widget("Blog/lista",array('articulos'=>$articulos));?>
			</div>
		</div>
		<div class="listas">
			<div class="container">
				<div class="container">
					<div class="row">
						<?php
							$paginas = $data["paginas"];
							for($i=0;$i<=$paginas;$i++)
							{
								echo "<a href='".APP_HOST_URL."/blog/p/".$i."'>".($i+1)."<img src='".App::get_img_url('close.png')."' alt='' class='img-rounded'></a>";
							}
						?>
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
