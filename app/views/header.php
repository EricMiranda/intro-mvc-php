<?php
#===================================================#
#     coded by: Moises Espindola         _    _    #
#     nick: zaer00t                     | |  (_)   #
#    ___  _ __   ___   __ _  ___   __ _ | |_  _    #
#   / __|| '__| / _ \ / _` |/ __| / _` || __|| |   #
#  | (__ | |   |  __/| (_| |\__ \| (_| || |_ | |   #
#   \___||_|    \___| \__,_||___/ \__,_| \__||_|   #
#                                                  #
#    e-mail: zaer00t@gmail.com                     #
#    www: http://creasati.com.mx                   #
#    date: 12/Septiembre/2012                      #
#    code name: creasati.com.mx                    #
#==================================================#

$titulo = $data['page_title'];
$contenido = strip_tags($data["page_description"]);
$contenido = html_entity_decode(Utilidades::cortaTexto($contenido,155))."...";
$imagen = $data["img_fb"];
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title><?=$titulo?> | CREASATI</title>
			<link rel="shortcut icon" type="image/x-icon" href="<?php App::get_img_url('fav-icon.png'); ?>" />
			<link href="<?php App::get_css_url('bootstrap.css'); ?>" rel='stylesheet' type='text/css' />
			<link href="<?=App::get_css_url('bootstrap.min.css')?>" rel='stylesheet' type='text/css' />
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="<?=App::get_js_url('jquery.min.js')?>"></script>
		 	<!-- Custom Theme files -->
			<link href="<?=App::get_css_url('theme-style.css')?>" rel='stylesheet' type='text/css' />
			<script src="<?=App::get_js_url('jquery.easing.min.js')?>"></script>
   		 	<!-- Custom Theme files -->
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="shortcut icon" type="image/x-icon" href="<?=App::get_img_url('fav-icon.png')?>" />
			<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
			</script>
			<!----webfonts---->
			<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,300,500,700,800,900,600,200' rel='stylesheet' type='text/css'>
			<!----//webfonts---->
			<!----requred-js-files---->
			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
			    <script src="js/html5shiv.js"></script>
		    	<script src="js/respond.min.js"></script>
			<![endif]-->
			<!----//requred-js-files---->
			<script type="text/javascript" 	src="<?=App::get_js_url('jquery.smint.js')?>"></script>
			<script type="text/javascript">
				$(document).ready( function() {
				    $('.subMenu').smint({
				    	'scrollSpeed' : 1000
				    });
				});
			</script>
			<?php
				if(isset($data['page_js']) and $data["page_js"]!='')
				{?>
					<script src="<?=App::get_js_url($data['page_js'])?>" type="text/javascript"></script>
					<?php
				}

				if(isset($data['page_css']))
				{?>
					<link href="<?=App::get_assets($data['page_css'])?>" rel="stylesheet" type="text/css" media="all" />
					<?php
				}

			?>
			<!-- Schema.org markup for Google+ -->
			<meta itemprop="name" content="<?=$titulo?>">
			<meta itemprop="description" content="<?=$contenido?>">
			<meta itemprop="image" content="<?=$imagen?>">
			<!-- Twitter Card data -->
			<meta name="twitter:card" content="<?=$imagen?>">
			<meta name="twitter:site" content="@publisher_handle">
			<meta name="twitter:title" content="<?=$titulo?>">
			<meta name="twitter:description" content="<?=$contenido?>">
			<meta name="twitter:creator" content="@author_handle">

			<!-- Twitter summary card with large image must be at least 280x150px -->
			<meta name="twitter:image:src" content="<?=$imagen?>">
			<!-- Open Graph data -->
			<meta property="og:title" content="<?=$titulo?>" />
			<meta property="og:type" content="article" />
			<meta property="og:image" content="<?=$imagen?>" />
			<meta property="og:description" content="<?=$contenido?>" />
			<meta property="og:site_name" content="Vende tu vehiculo y participa en la comunidad!" />
			<meta property="article:section" content="Autos y vehiculos" />
		</head>
