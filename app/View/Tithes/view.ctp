<?php
	$this->Html->addCrumb(__("Tithes"), __("/tithes"));
	$this->Html->addCrumb(__("View"), __("/tithes/view"));  
?>
<div class="tithes view">
	<hgroup class="tt-g">
		<h2 class="tt"><?php echo __('Tithe'); ?></h2>
	</hgroup>
	<ul class="view-list-group">
  		<li id="view-id" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Id'); ?></h4>
  			<p class="list-group-item-text"><?php echo h($tithe['Tithe']['id']); ?></p>
  		</li>
  		<li id="view-value" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Value'); ?></h4>
  			<p class="list-group-item-text"><?php echo "R$ ".h($tithe['Tithe']['value']); ?></p>
  		</li>
  		<li id="view-month" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Month'); ?></h4>
  			<p class="list-group-item-text"><?php echo h($tithe['Tithe']['month']); ?></p>
  		</li>
  		<li id="view-month-ref" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Month Reference'); ?></h4>
  			<p class="list-group-item-text"><?php echo h($tithe['Tithe']['month_ref']); ?></p>
  		</li>
  		<li id="view-year" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Year'); ?></h4>
  			<p class="list-group-item-text"><?php echo h($tithe['Tithe']['year']); ?></p>
  		</li>
  		<li id="view-name-tithe" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Person'); ?></h4>
  			<p class="list-group-item-text"><?php echo $this->Html->link($tithe['Person']['name'], array('controller' => 'people', 'action' => 'view', $tithe['Person']['id'])); ?></p>
  		</li>
  		<li id="view-created" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Created'); ?></h4>
  			<p class="list-group-item-text"><?php echo h($tithe['Tithe']['created']); ?></p>
  		</li>
  		<li id="view-modified" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Modified'); ?></h4>
  			<p class="list-group-item-text"><?php echo h($tithe['Tithe']['modified']); ?></p>
  		</li>
  	</ul>
</div>
	<ul id="smart-menu">
		<li><?php echo $this->Html->link(__('Edit Tithe'), array('action' => 'edit', $tithe['Tithe']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tithe'), array('action' => 'delete', $tithe['Tithe']['id']), null, __('Are you sure you want to delete # %s?', $tithe['Tithe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tithes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tithe'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
