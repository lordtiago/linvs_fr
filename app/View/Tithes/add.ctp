<?php

	echo $this->Html->script('select2.min');
	echo $this->Html->script('jquery.price_format.1.0');
	echo $this->Html->script('jquery.formata_moeda.1.0');
	echo $this->Html->script('tithe-configs');
	
	$this->Html->addCrumb(__("Tithes"), __("/tithes"));
	$this->Html->addCrumb(__("Add"), __("/tithes/add"));  
?>

<div class="tithes form content-container">
<?php echo $this->Form->create('Tithe'); ?>
	<fieldset>
		<hgroup class="tt-g">
			<legend class="tt"><?php echo __('Add Tithe'); ?></legend>
		</hgroup>
	<?php
		echo $this->Form->input('value', array('type' => 'text','autocomplete'=>"off"));
		echo $this->Form->input('day');
		echo $this->Form->input('month');
		echo $this->Form->input('month_ref');
		echo $this->Form->input('year');
		echo $this->Form->input('person_id',array('default'=>$person_id));
	?>
	</fieldset>

<?php // adicionando marcação requerida pelo bootstrap ?>
<?php echo $this->Form->end(array(
    'label' => __('Submit'),
    'class' => 'btn btn-primary',
    'div' => array(
        'class' => 'control-group',
        ),
    'before' => '<div class="controls">',
    'after' => '</div>'
));?>
</div>
	<ul id="smart-menu">

		<li><?php echo $this->Html->link(__('List Tithes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
