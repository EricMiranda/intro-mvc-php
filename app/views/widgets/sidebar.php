<?php
	$otras = $data["otras"];

	foreach($otras as $pix)
	{
		?>
		<div class="lista_edecan">
			<span><h4><?=$pix->getNombre()?></h4></span>
			<ul class="s_nav">
				<li>
					<a href="<?=$pix->get_url()?>">
					<img class="grids_of_im" src="<?=App::get_img_url($pix->getThumb());?>" style="width:150px;">
					</a>
				</li>
			</ul>
		</div>
		<?php
	}
?>