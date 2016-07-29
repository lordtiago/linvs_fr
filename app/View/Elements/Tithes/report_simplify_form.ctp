<?php 
		$meses = array(__('January'),__('February'),__('March'),__('April'),__('May'),__('June'),__('July'),__('August'),__('September'),
					__('October'),__('November'),__('December')); 
?>
<form method="get" target = "_blank" action="<?php echo $this->webroot; ?>tithes/report_simplify" class="form_report_simplify" >
        <div class="content-block-title">Opções do Relatório de Dízimo Simples</div>
        <div class="list-block">
            <ul>
                <li>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-title label">Escolha o mes: </div>
                            <div class="item-input">
                                <select name="month" class="report_simplify_month">
                                    <?php foreach($meses as $chave=>$mes): ?>
                                        <option value="<?php echo $chave+1; ?>">
                                            <?php echo $mes;?>
                                        </option>
                                    <?php endforeach;?>								
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-content">
                        <div class="item-inner">                    
                            <div class="item-title label">Escolha o ano: </div>
                            <div class="item-input">
                                    <select name="year" class="report_simplify_year">
                                        <?php foreach($report_simplify_year as $year): ?>
                                            <option value="<?php echo $year; ?>">
                                                <?php echo $year;?>
                                            </option>
                                        <?php endforeach?>
                                    </select>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-content">
                        <div class="item-inner row">
                            <div class="item-title label col-50"></div>
                            <div class="control-group col-50">
                                <div class="controls">
                                     <input type="submit" value="Gerar Relatório" class="button button-big button-fill color-green">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
</form>   
<script>
$(".form_report_simplify").submit(function(){
	var url = "<?php echo $this->webroot; ?>tithes/report_simplify/"+$(".report_simplify_month").val()+"/"+$(".report_simplify_year").val();
	window.open(url);
    event.preventDefault();
	return false;
});
</script>