<form method="get" target = "_blank" action="<?php echo $this->webroot; ?>tithes/report_yearly" class="form_report_yearly" >
        <div class="content-block-title">Opções do Relatório de Dízimo Anual</div>
        <div class="list-block">
            <ul>
                <li>
                    <div class="item-content">
                        <div class="item-inner">                    
                            <div class="item-title label">Escolha o ano: </div>
                            <div class="item-input">
                                    <select name="year" class="report_yearly_year">
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
$(".form_report_yearly").submit(function(){
	var url = "<?php echo $this->webroot; ?>tithes/report_yearly/"+$(".report_yearly_year").val();
	window.open(url);
    event.preventDefault();
	return false;
});
</script>