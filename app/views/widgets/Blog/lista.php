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
#    date: 29/Mayo/2015                            #
#    code name: creasati.com.mx                    #
#==================================================#
$articulos = $data["articulos"];
#Util::debug($articulos);
?>
<div class="row">
	<div class="well">
		<h1 class="text-center">Algna que otra entrada!</h1>
		<h4 class="text-center">la de azul es la mas reciente ;)</h4>
		<?php
		if(empty($articulos))
		{
			echo "<h1 align='center'>Aun no hay articulos que mostrar, regrese pronto o no tan pronto :)<br>gracias</h1>";
		}
		else
		{
			$s=0;
			foreach($articulos as $articulo)
			{
				?>
				<div class="list-group">
					<a href="<?=$articulo->get_url();?>" class="list-group-item <?=$s==0?"active":""?>">
						<div class="media col-md-3">
							<figure class="pull-left">
								<img class="media-object img-rounded img-responsive"  src="<?=App::get_img_url($articulo->getPic())?>" >
							</figure>
						</div>
						<div class="col-md-6">
							<h4 class="list-group-item-heading"><?=$articulo->getTitulo()?></h4>
							<p class="list-group-item-text"><?=$articulo->getResumen()?></p>
						</div>
						<div class="col-md-3 text-center">
							<h2> <?=$articulo->getPrints()?> <small> impresiones </small></h2>
							<button type="button" class="btn btn-default btn-lg btn-block"> leer! </button>
							<div class="stars">
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star"></span>
								<span class="glyphicon glyphicon-star-empty"></span>
							</div>
							<p> Average 4.5 <small> / </small> 5 </p>
						</div>
					</a>
				</div>
				<div class="clearfix"></div>
				<?php $s++;
			}
		}
		?>
	</div>
</div>
