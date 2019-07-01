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
						<?php foreach ($mes as $key => $funcionario) { //pr($funcionario);exit;?>
							<table class="table table-relatorio">
								<thead style="page-break-inside: avoid;">
									<tr style="page-break-inside: avoid;">
										<th style="page-break-inside: avoid;" width="20%">Funcionario</th>
										<th style="page-break-inside: avoid;" width="20%">Dia da semana</th>
										<th style="page-break-inside: avoid;" width="20%">Batida</th>
										<th style="page-break-inside: avoid;" width="20%">Status</th>
										<th style="page-break-inside: avoid;" width="20%">Ajuste</th>
									</tr>
								</thead>
								<tbody style="page-break-inside: avoid;">
								<?php $totalEstado = 0; ?> 
									<?php foreach ($funcionario as $key => $data) { //pr($data);exit;
										foreach ($data as $key2 => $batida) {
										$totalEstado++;
									?>
											<?php if(!empty($batida)){ ?>
												<tr style="page-break-inside: avoid;">
													<td style="page-break-inside: avoid;"><?php echo $batida['funcionario_nome']; ?></td>
													<td style="page-break-inside: avoid;"><?php echo $batida['data'] .' '.$batida['dia_semana']; ?></td>
													<td style="page-break-inside: avoid;"><?php echo $batida['batida']; ?></td>
													<td style="page-break-inside: avoid;"><?php echo $batida['status']; ?></td>
													<td style="page-break-inside: avoid;"><?php echo $batida['motivo']; ?></td>
												</tr>
											<?php } ?>
										<?php } ?>
									<?php } ?>
								</tbody>
							</table>
							<?php 
								//echo "Total por Mês: ". $totalEstado;
								$totalGeral += $totalEstado; 
							?>
						<?php } ?>
					<?php endforeach; ?>
					<br><br>
					<?php //echo "Total de prospectivos: ".$totalGeral; ?>
				</div>
			</div>
		</div>
	</div>

