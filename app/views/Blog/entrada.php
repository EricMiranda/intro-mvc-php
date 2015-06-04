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
		$entrada = $data["entrada"];
		PageBuilder::header('Hablemos de tecnologia y otras hierbas!','','bootstrap/css/bootstrap_x.css','','');
?>
<script type="text/javascript">
	$(document).ready(function() {
	   var $btnSets = $('#responsive'),
	   $btnLinks = $btnSets.find('a');
	
	   $btnLinks.click(function(e) {
	       e.preventDefault();
	       $(this).siblings('a.active').removeClass("active");
	       $(this).addClass("active");
	       var index = $(this).index();
	       $("div.user-menu>div.user-menu-content").removeClass("active");
	       $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
	   });
	});
	
	$( document ).ready(function() {
	   $("[rel='tooltip']").tooltip();    
	
	   $('.view').hover(
	       function(){
	           $(this).find('.caption').slideDown(250); //.fadeIn(250)
	       },
	       function(){
	           $(this).find('.caption').slideUp(250); //.fadeOut(205)
	       }
	   ); 
	});
</script>
<style type="text/css">
	.square, .btn {
	border-radius: 0px!important;
	}
	/* -- color classes -- */
	.coralbg {
	background-color: #131C2E;
	} 
	.coral {
	color: #00396f;
	}
	.turqbg {
	background-color: #ff1c2e;
	}
	.turq {
	color: #ff1c2e;
	}
	.white {
	color: #fff!important;
	}
	/* -- The "User's Menu Container" specific elements. Custom container for the snippet -- */
	div.user-menu-container {
	z-index: 10;
	background-color: #fff;
	margin-top: 20px;
	background-clip: padding-box;
	opacity: 0.97;
	filter: alpha(opacity=97);
	-webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
	box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
	}
	div.user-menu-container .btn-lg {
	padding: 0px 12px;
	}
	div.user-menu-container h4 {
	font-weight: 300;
	color: #8b8b8b;
	}
	div.user-menu-container a, div.user-menu-container .btn  {
	transition: 1s ease;
	}
	div.user-menu-container .thumbnail {
	width:100%;
	min-height:200px;
	border: 0px!important;
	padding: 0px;
	border-radius: 0;
	border: 0px!important;
	}
	/* -- Vertical Button Group -- */
	div.user-menu-container .btn-group-vertical {
	display: block;
	}
	div.user-menu-container .btn-group-vertical>a {
	padding: 20px 25px;
	background-color: #ff1c2e;
	color: white;
	border-color: #fff;
	}
	div.btn-group-vertical>a:hover {
	color: white;
	border-color: white;
	}
	div.btn-group-vertical>a.active {
	background: #131C2E;
	box-shadow: none;
	color: white;
	}
	/* -- Individual button styles of vertical btn group -- */
	div.user-menu-btns {
	padding-right: 0;
	padding-left: 0;
	padding-bottom: 0;
	}
	div.user-menu-btns div.btn-group-vertical>a.active:after{
	content: '';
	position: absolute;
	left: 100%;
	top: 50%;
	margin-top: -13px;
	border-left: 0;
	border-bottom: 13px solid transparent;
	border-top: 13px solid transparent;
	border-left: 10px solid #ff1c2e;
	}
	/* -- The main tab & content styling of the vertical buttons info-- */
	div.user-menu-content {
	color: #323232;
	}
	ul.user-menu-list {
	list-style: none;
	margin-top: 20px;
	margin-bottom: 0;
	padding: 10px;
	border: 1px solid #eee;
	}
	ul.user-menu-list>li {
	padding-bottom: 8px;
	text-align: center;
	}
	div.user-menu div.user-menu-content:not(.active){
	display: none;
	}
	/* -- The btn stylings for the btn icons -- */
	.btn-label {position: relative;left: -12px;display: inline-block;padding: 6px 12px;background: rgba(0,0,0,0.15);border-radius: 3px 0 0 3px;}
	.btn-labeled {padding-top: 0;padding-bottom: 0;}
	/* -- Custom classes for the snippet, won't effect any existing bootstrap classes of your site, but can be reused. -- */
	.user-pad {
	padding: 20px 25px;
	}
	.no-pad {
	padding-right: 0;
	padding-left: 0;
	padding-bottom: 0;
	}
	.user-details {
	background: #eee;
	min-height: 333px;
	}
	.user-image {
	max-height:200px;
	overflow:hidden;
	}
	.overview h3 {
	font-weight: 300;
	margin-top: 15px;
	margin: 10px 0 0 0;
	}
	.overview h4 {
	font-weight: bold!important;
	font-size: 40px;
	margin-top: 0;
	}
	.view {
	position:relative;
	overflow:hidden;
	margin-top: 10px;
	}
	.view p {
	margin-top: 20px;
	margin-bottom: 0;
	}
	.caption {
	position:absolute;
	top:0;
	right:0;
	background: rgba(70, 216, 210, 0.44);
	width:100%;
	height:100%;
	padding:2%;
	display: none;
	text-align:center;
	color:#fff !important;
	z-index:2;
	}
	.caption a {
	padding-right: 10px;
	color: #fff;
	}
	.info {
	display: block;
	padding: 10px;
	background: #eee;
	text-transform: uppercase;
	font-weight: 300;
	text-align: right;
	}
	.info p, .stats p {
	margin-bottom: 0;
	}
	.stats {
	display: block;
	padding: 10px;
	color: white;
	}
	.share-links {
	border: 1px solid #eee;
	padding: 15px;
	margin-top: 15px;
	}
	.square, .btn {
	border-radius: 0px!important;
	}
	/* -- media query for user profile image -- */
	@media (max-width: 767px) {
	.user-image {
	max-height: 400px;
	}
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
	<!----//End-portfolio---->
	<!---testmonials---->
	<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
	<div class="container">
		<div class="row user-menu-container square">
			<div class="col-md-7 user-details">
				<div class="row coralbg white">
					<div class="col-md-6 no-pad">
						<div class="user-pad">
							<h3><?=$entrada->getTitulo()?></h3>
							<h4 class="white"><i class="fa fa-check-circle-o"></i> <?=$entrada->getCategoria($entrada->getCategoria_id())?></h4>
							<h4 class="white"><i class="fa fa-twitter"></i> Compartir</h4>
							<button type="button" class="btn btn-labeled btn-info" href="#">
							<span class="btn-label"><i class="fa fa-pencil"></i></span>Comentar</button>
						</div>
					</div>
					<div class="col-md-6 no-pad">
						<div class="user-image">
							<img src="<?=App::get_img_url($entrada->getPic());?>" class="img-responsive thumbnail">
						</div>
					</div>
				</div>
				<div class="row overview">
					<div class="col-md-4 user-pad text-center">
						<h3>Impresiones</h3>
						<h4><?=$entrada->getImpres()?></h4>
					</div>
					<div class="col-md-4 user-pad text-center">
						<h3>Referencias</h3>
						<h4><?=$entrada->getReferers()?></h4>
					</div>
					<div class="col-md-4 user-pad text-center">
						<h3>Compartido</h3>
						<h4><?=$entrada->getShared()?></h4>
					</div>
				</div>
			</div>
			<div class="col-md-1 user-menu-btns">
				<div class="btn-group-vertical square" id="responsive">
					<a href="#" class="btn btn-block btn-default active">
					<i class="fa fa-bell-o fa-3x"></i>
					</a>
					<a href="#" class="btn btn-default">
					<i class="fa fa-envelope-o fa-3x"></i>
					</a>
					<a href="#" class="btn btn-default">
					<i class="fa fa-laptop fa-3x"></i>
					</a>
					<a href="#" class="btn btn-default">
					<i class="fa fa-cloud-upload fa-3x"></i>
					</a>
				</div>
			</div>
			<div class="col-md-4 user-menu user-pad">
				<div class="user-menu-content active">
					<h3>
						Entradas similares
					</h3>
					<ul class="user-menu-list">
						<li>
							<h4><i class="fa fa-user coral"></i> Roselynn Smith followed you.</h4>
						</li>
						<li>
							<h4><i class="fa fa-heart-o coral"></i> Jonathan Hawkins followed you.</h4>
						</li>
						<li>
							<h4><i class="fa fa-paper-plane-o coral"></i> Gracie Jenkins followed you.</h4>
						</li>
						<li>
							<button type="button" class="btn btn-labeled btn-success" href="#">
							<span class="btn-label"><i class="fa fa-bell-o"></i></span>View all activity</button>
						</li>
					</ul>
				</div>
				<div class="user-menu-content">
					<h3>
						Contacto
					</h3>
					<ul class="user-menu-list">
						<li>
							<h4>From Roselyn Smith <small class="coral"><strong>NEW</strong> <i class="fa fa-clock-o"></i> 7:42 A.M.</small></h4>
						</li>
						<li>
							<h4>From Jonathan Hawkins <small class="coral"><i class="fa fa-clock-o"></i> 10:42 A.M.</small></h4>
						</li>
						<li>
							<h4>From Georgia Jennings <small class="coral"><i class="fa fa-clock-o"></i> 10:42 A.M.</small></h4>
						</li>
						<li>
							<button type="button" class="btn btn-labeled btn-danger" href="#">
							<span class="btn-label"><i class="fa fa-envelope-o"></i></span>View All Messages</button>
						</li>
					</ul>
				</div>
				<div class="user-menu-content">
					<h3>
						Categoria
					</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="view">
								<div class="caption">
									<p>47LabsDesign</p>
									<a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
									<a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
								</div>
								<img src="http://24.media.tumblr.com/273167b30c7af4437dcf14ed894b0768/tumblr_n5waxesawa1st5lhmo1_1280.jpg" class="img-responsive">
							</div>
							<div class="info">
								<p class="small" style="text-overflow: ellipsis">An Awesome Title</p>
								<p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted Today | 10:42 A.M.</small>
							</div>
							<div class="stats turqbg">
								<span class="fa fa-heart-o"> <strong>47</strong></span>
								<span class="fa fa-eye pull-right"> <strong>137</strong></span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="view">
								<div class="caption">
									<p>47LabsDesign</p>
									<a href="" rel="tooltip" title="Appreciate"><span class="fa fa-heart-o fa-2x"></span></a>
									<a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
								</div>
								<img src="http://24.media.tumblr.com/282fadab7d782edce9debf3872c00ef1/tumblr_n3tswomqPS1st5lhmo1_1280.jpg" class="img-responsive">
							</div>
							<div class="info">
								<p class="small" style="text-overflow: ellipsis">An Awesome Title</p>
								<p class="small coral text-right"><i class="fa fa-clock-o"></i> Posted Today | 10:42 A.M.</small>
							</div>
							<div class="stats turqbg">
								<span class="fa fa-heart-o"> <strong>47</strong></span>
								<span class="fa fa-eye pull-right"> <strong>137</strong></span>
							</div>
						</div>
					</div>
				</div>
				<div class="user-menu-content">
					<h2 class="text-center">
						Comparte
					</h2>
					<center><i class="fa fa-cloud-upload fa-4x"></i></center>
					<div class="share-links">
						<center><button type="button" class="btn btn-lg btn-labeled btn-success" href="#" style="margin-bottom: 15px;">
							<span class="btn-label"><i class="fa fa-bell-o"></i></span>A FINISHED PROJECT
							</button>
						</center>
						<center><button type="button" class="btn btn-lg btn-labeled btn-warning" href="#">
							<span class="btn-label"><i class="fa fa-bell-o"></i></span>A WORK IN PROGRESS
							</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>
	<div class="container">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<h1><?=$entrada->getTitulo()?></h1>
			<?=$entrada->getContenido()?>
		</div>
	</div>
	<!-- fin contenido -->
	<? PageBuilder::footer();  ?>
</body>
</html>