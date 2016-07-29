<?php
$parish = "Paróquia Senhor Bom Jesus";
?>
<div class="report_header row">
    <div class="col-md-10">Uso exclusivo de: <?php echo $parish;?></div> <div class="col-md-2 date"><?php echo date("d/m/Y H:i");?></div>
    <div class="col-md-8">Linvs - Sistema de Gerenciamento Canônico 0.1.0</div>
    <div class="col-md-8"><b>Aniversariantes do mês de <?php echo $month; ?></b></div>
</div>
<div class="container_header row">
    <div class="column_header col-md-9"><?php echo __("Name"); ?></div>
    <div class="column_header col-md-3"><?php echo __("Birth"); ?></div>
</div>
<div class="details row">
    <?php foreach ($people as $person): ?>

        <div class="column_details col-md-9"><?php echo $person['Person']['name']; ?>&nbsp;</div>
		
        <div class="column_details col-md-3"><?php echo h(date('d/m/Y',strtotime($person['Person']['birth']))); ?>&nbsp;</div>

    <?php  endforeach;?>
</div>
