<form method="get" target = "_blank" action="<?php echo $this->webroot; ?>tithes/report_tithing" class="form_report_tithing" >
        <div class="content-block-title">Opções:</div>
        <div class="list-block">
            <ul>
                  <li>
                    <label class="label-radio item-content">
                      <input type="radio" name="filter" value="all" checked>
                      <div class="item-inner">
                        <div class="item-title">Todos</div>
                      </div>
                    </label>
                  </li>
                  <li>
                    <label class="label-radio item-content">
                      <input type="radio" name="filter" value="active">
                      <div class="item-inner">
                        <div class="item-title">Ativos (06 meses)</div>
                      </div>
                    </label>
                  </li>
                  <li>
                    <label class="label-radio item-content">
                      <input type="radio" name="filter" value="inactive_3">
                      <div class="item-inner">
                        <div class="item-title">Inativos (03 meses)</div>
                      </div>
                    </label>
                  </li>
                  <li>
                    <label class="label-radio item-content">
                      <input type="radio" name="filter" value="inactive_6">
                      <div class="item-inner">
                        <div class="item-title">Inativos (06 meses)</div>
                      </div>
                    </label>
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
$(".form_report_tithing").submit(function(){
    //var teste = $('input[name=filter]:checked').val();
    //console.log(teste);
	var url = "<?php echo $this->webroot; ?>tithes/report_tithing_street/"+$('input[name=filter]:checked').val();
	window.open(url);
    event.preventDefault();
	return false;
});
</script>