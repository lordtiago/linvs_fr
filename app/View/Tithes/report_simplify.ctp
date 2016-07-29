<?php
$parish = "Paróquia Senhor Bom Jesus";
?>
<div class="report_header row">
    <div class="col-md-8">Uso exclusivo de: <?php echo $parish;?></div> <div class="col-md-3 date"><?php echo date("d/m/Y H:i");?></div>
    <div class="col-md-8">Linvs - Sistema de Gerenciamento Canônico 0.1.0</div>
    <div class="col-md-8"><b>Entrada de Dízimo referente ao mês de <?php echo $month; ?></b></div>
</div>
<div class="container_header row">
    <div class="column_header col-md-8"><?php echo __("Date"); ?></div>
    <div class="column_header col-md-4"><?php echo __("Value"); ?></div>
</div>
<div class="details row">
    <?php foreach ($tithes as $tithe): ?>

        <div class="column_details col-md-8"><?php echo h(date('d/m/Y',strtotime($tithe[0]['data']))); ?>&nbsp;</div>
		
        <div class="column_details col-md-4"><?php echo h($tithe[0]['value']); ?>&nbsp;</div>

    <?php  endforeach;?>
		<div class="column_summary col-md-7"></div>
        <div class="column_summary col-md-5">Total: R$ <?php echo $total; ?>&nbsp;</div>
</div>
