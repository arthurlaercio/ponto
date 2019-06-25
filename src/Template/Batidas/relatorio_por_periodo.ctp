	<div class="row">
		<div class="col-xs-12 text-right">
			<h6><?php echo date('d/m/Y H:i:s'); ?></h6>
		</div>
	</div>
	<div class="row" style="">
		<div class="col-xs-11" style="margin-left: 4%;">
			</br>
			<div class="row">
				<div class="col-xs-12">
					<center><img src="<?php echo $dominio_sistema; ?>/img/logo.png" alt="" width="200px"></center>		
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">
					<h3>Relatório Por Período</h3>
				</div>
			</div>
			</br>
			<div class="row">
				<div class="col-xs-12">
					<?php $totalGeral = 0; ?>
					<?php foreach ($relatorio as $nome => $mes): ?>
						<h3> <?php echo $nome; ?> </h3>
						<table class="table table-relatorio">
							<thead style="page-break-inside: avoid;">
								<tr style="page-break-inside: avoid;">
									<th style="page-break-inside: avoid;" width="30%">Funcionario</th>
									<th style="page-break-inside: avoid;" width="20%">Batida</th>
									<th style="page-break-inside: avoid;" width="20%">Ajuste</th>
								</tr>
							</thead>
							<tbody style="page-break-inside: avoid;">
							<?php $totalEstado = 0; ?> 
								<?php foreach ($mes as $key => $batida) { 
									$totalEstado++;
								?>
									
									<tr style="page-break-inside: avoid;">
										<td style="page-break-inside: avoid;"><?php echo $batida->funcionario->nome; ?></td>
										<td style="page-break-inside: avoid;"><?php echo $batida->created->format('d/m/Y'); ?></td>
										<td style="page-break-inside: avoid;"><?php echo $batida->batidas_ajuste->motivo; ?></td>
									</tr>
								<?php } ?>

							</tbody>
						</table>
						<?php 
							echo "Total por Mês: ". $totalEstado;
							$totalGeral += $totalEstado; 
						?>
					<?php endforeach; ?>
					<br><br>
					<?php echo "Total de prospectivos: ".$totalGeral; ?>
				</div>
			</div>
		</div>
	</div>

