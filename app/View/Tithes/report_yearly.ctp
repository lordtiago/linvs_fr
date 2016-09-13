<?php
$parish = "Canção Nova - Frente de Missão França";
$meses = array(__('January'),__('February'),__('March'),__('April'),__('May'),__('June'),__('July'),__('August'),__('September'),
					__('October'),__('November'),__('December'));
?>
<div class="report_header row">
    <div class="col-md-10">Uso exclusivo de: <?php echo $parish;?></div> <div class="col-md-2 date"><?php echo date("d/m/Y H:i");?></div>
    <div class="col-md-8">Linvs - Sistema de Gerenciamento Canônico 0.1.0</div>
    <div class="col-md-8"><b>Entrada de Doações referente ao ano de <?php echo $year; ?></b></div>
</div>
<div class="container_header row">
    <?php foreach($meses as $mes): ?>
        <div class="column_header col-md-1"><?php echo $mes; ?></div>    
    <?php endforeach; ?>
</div>
<div class="details row">
    <?php foreach ($tithes as $tithe): ?>

        <div class="column_details col-md-1"><?php echo $tithe[0]['value']; ?>&nbsp;</div>

    <?php  endforeach;?>
		<div class="column_summary col-md-10"></div>
        <div class="column_summary col-md-2">Total: R$ <?php echo $total; ?>&nbsp;</div>
</div>
