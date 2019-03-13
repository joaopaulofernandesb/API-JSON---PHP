
<?php

require_once 'config.php';
require_once 'modulo.php';

$hg = new HG_API(HG_API_KEY);
$dolar = $hg->dolar_quotation();
$eur = $hg->eur_quotation();
$btc = $hg->btc_quotation();

//echo($eur ['buy']);
//echo($dolar ['buy']);

if($hg->is_error() == false){

	$variation = ( $dolar['variation'] < 0 )? 'danger' : 'info';
}


if($hg->is_error() == false){

	$arrow = ( $dolar['variation'] < 0 )? 'red' : 'green';

	$statusarrow = ( $dolar['variation'] < 0 )? 'down' : 'up';
}



if($hg->is_error() == false){

	$variationeur = ( $eur['variation'] < 0 )? 'danger' : 'info';

	$arroweur = ( $eur['variation'] < 0 )? 'red' : 'green';

	$statusarroweur = ( $eur['variation'] < 0 )? 'down' : 'up';
}



if($hg->is_error() == false){

	$variationbtc = ( $btc['variation'] < 0 )? 'danger' : 'info';

	$arrowbtc = ( $btc['variation'] < 0 )? 'red' : 'green';

	$statusarrowbtc = ( $btc['variation'] < 0 )? 'down' : 'up';
}


?>


<div class="container">

<br><br>


	<div class="card-deck">
		<div class="card" style="border-radius: 12px; box-shadow: 5px 5px 5px rgba(0,0,0,0.5);  background-color: #fff; color: #000;">
			<img src="img/dolar.png" class="card-img-top" style="width: 48px; " >
			<div class="card-body">
				<h5 class="card-title">Cotação do Dolar USD</h5>
				<p class="card-text">
					<?php if($hg->is_error() == false): ?>
						Valor:<span class="badge badge-<?php echo($variation); ?>"><?php echo(number_format($dolar ['buy'], 2, ',', '.')); ?></span> <font color="<?php echo($arrow)?>"><i class='fas fa-arrow-<?php echo($statusarrow) ?>'></i></font>
						<?php else: ?>
							Valor:<span class="badge badge-danger">Serviço Indisponivel</span>
						<?php endif; ?>
					</p>
				</div>
				
			</div>

			<div class="card" style="border-radius: 12px; box-shadow: 5px 5px 5px rgba(0,0,0,0.5);">
				<img src="img/euro.png" class="card-img-top" style="width: 48px; ">
				<div class="card-body">
					<h5 class="card-title">Cotação do Euro EUR</h5>
					<p class="card-text"><?php if($hg->is_error() == false): ?>
					EUR:<span class="badge badge-<?php echo($variationeur); ?>"><?php echo(number_format($eur ['buy'], 2, ',', '.')); ?></span> <font color="<?php echo($arroweur)?>"><i class='fas fa-arrow-<?php echo($statusarroweur) ?>'></i></font>
					<?php else: ?>
						EUR:<span class="badge badge-danger">Serviço Indisponivel</span>
						<?php endif; ?></p>
					</div>
					
				</div>

				<div class="card" style="border-radius: 12px; box-shadow: 5px 5px 5px rgba(0,0,0,0.5);">
					<img src="img/btc.png" class="card-img-top" style="width: 48px; ">
					<div class="card-body">
						<h5 class="card-title">Cotação do Bitcoin BTC</h5>
						<p class="card-text">
							<?php if($hg->is_error() == false): ?>
								BTC:<span class="badge badge-<?php echo($variationbtc); ?>"><?php echo(number_format($btc ['buy'], 2, ',', '.')); ?></span> <font color="<?php echo($arrowbtc)?>"><i class='fas fa-arrow-<?php echo($statusarrowbtc) ?>'></i></font>
								<?php else: ?>
									BTC:<span class="badge badge-danger">Serviço Indisponivel</span>
								<?php endif; ?>
							</p>
						</div>
						
					</div>
				</div>


			</div>

