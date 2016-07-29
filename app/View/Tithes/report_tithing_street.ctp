<?php
$parish = "Paróquia Senhor Bom Jesus";
?>
<div class="report_header row">
    <div class="col-md-8">Uso exclusivo de: <?php echo $parish;?></div> <div class="col-md-3 date"><?php echo date("d/m/Y H:i");?></div>
    <div class="col-md-8">Linvs - Sistema de Gerenciamento Canônico 0.1.0</div>
    <div class="col-md-8"><b><?php echo $title; ?></b></div>
</div>
<table>
    <thead class="container_header row">
        <tr rowspan="15">
            <th class="column_header " colspan="5"><?php echo __("Name"); ?></th>    
            <th class="column_header " colspan="1"><?php echo __("Number"); ?></th>
            <th class="column_header " colspan="4"><?php echo __("Tel"); ?></th>
            <th class="column_header " colspan="4"><?php echo __("Cel"); ?></th>
            <th class="column_header " colspan="1"><?php echo __("Último Dízimo"); ?></th>
        </tr>
    </thead>
    <tbody class="details row">
        <?php $street =""; ?>
        <?php foreach ($people as $person): ?>
            <?php if($street != $person["Person"]['street']): $street = $person["Person"]['street']; ?>
                <tr rowspan="15">
                    <td class="column_details">
                        <b>
                            <?php echo h($person["Person"]['street']); ?>&nbsp;
                        </b>
                    </td>
                </tr>
            <?php endif; ?>
            <tr rowspan="15">
                <td class="column_details " colspan="5"><?php echo h($person["Person"]['name']); ?>&nbsp;</td>    

                <td class="column_details " colspan="1"><?php echo h($person["Person"]['number']); ?>&nbsp;</td>

                <td class="column_details " colspan="4"><?php echo h($person["Person"]['tel']); ?>&nbsp;</td>

                <td class="column_details " colspan="4"><?php echo h($person["Person"]['cel']); ?>&nbsp;</td>

                <td class="column_details " colspan="1"><?php echo h($person["Person"]['data']); ?>&nbsp;</td>
            </tr>    

        <?php  endforeach;?>
            
    </tbody>
    <tfoot>
        <tr>
            <td class="column_summary col-md-7"></td>
        </tr>
    </tfoot>
</table>