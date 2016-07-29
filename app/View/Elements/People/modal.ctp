<!-- Modal -->
<div class="modal fade createPerson"tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	    <h4 class="modal-title" id="myModalLabel">Cadastro de Pessoa</h4>
	  </div>
	  <div class="modal-body">
 		<iframe src="<?php echo Router::url('/', true); ?>people/add/modal" height="285px" width="100%" frameborder="0" style="border:0;padding-top:5px;">
		</iframe>      
	  </div>
	</div>
  </div>
</div>
<!-- End Modal -->
