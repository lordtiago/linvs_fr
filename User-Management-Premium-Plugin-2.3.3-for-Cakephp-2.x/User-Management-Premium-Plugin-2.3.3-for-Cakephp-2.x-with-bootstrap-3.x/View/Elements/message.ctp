<?php if($this->Session->check('Message.flash')) {
	$msgClass = ($this->Session->check('Message.flash.params.class')) ? $this->Session->read('Message.flash.params.class') : 'success'; ?>
	<div class='messageHolder'>
		<div class="<?php echo $msgClass; ?>" id="flashMessage">
			<span style='float:left;width: 97%;'><?php echo $this->Session->read('Message.flash.message'); ?></span>
			<span style='float:right;'>
				<a href='javascript:void(0)' class='closeMsg'><img src="<?php echo SITE_URL?>usermgmt/img/closelabel.png" border="0" alt="Close"></a>
			</span>
			<div style='clear:both'></div>
		</div>
	</div>
<?php CakeSession::delete('Message.flash'); } ?>