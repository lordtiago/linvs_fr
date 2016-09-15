 <?php
 //Configs
 echo $this->Html->script('jquery.maskedinput-1.3.1');
 echo $this->Html->script('jquery.zipcode');
 echo $this->Html->script('select2.min');
 echo $this->Html->script('intlTelInput.min.js');
 echo $this->Html->script('modal');
 echo $this->Html->script('people-configs');
 echo $this->Html->css('intlTelInput.css');

	$this->Html->addCrumb(__("People"), __("/people"));
	$this->Html->addCrumb(__("Edit"), __("/people/edit"));                  
 ?>
<div class="people form content-container">
<?php echo $this->Form->create('Person'); ?>
	<fieldset>
		<hgroup class="tt-g">
			<legend class="tt"><?php echo __('Edit Person'); ?></legend>
		</hgroup>
	<?php
		echo $this->Form->input('id');		
		echo $this->Form->input('name',array('autocomplete'=>"off"));
		echo $this->Form->input('birth',array('minYear' => 1900, 'maxYear'=>date('Y'),'orderYear'=>'asc','dateFormat' => 'DMY','empty' => '(escolha um)','separator' => '<span>/</span>'));	
	?>
	<div id="person-container">
	<?php	
		/*echo $this->Form->input('cpf', array('div' =>  array('class' => 'cpf input text')));*/
		echo $this->Form->input('rg', array('div' =>  array('class' => 'rg input text')));
		echo $this->Form->input('cep', array('div' =>  array('class' => 'cep input text')));
		echo $this->Form->input('street', array('div' =>  array('class' => 'street input text')));
		echo $this->Form->input('number', array('div' =>  array('class' => 'number input text')));
		echo $this->Form->input('district', array('div' =>  array('class' => 'district input text')));
		echo $this->Form->input('city', array('div' =>  array('class' => 'city input text')));
		echo $this->Form->input('uf', array('div' =>  array('class' => 'uf input text')));
		echo $this->Form->input('country', array('div' =>  array('class' => 'country input text')));		
	?>
	<fieldset class="kin">
	<?php
		/*echo $this->Form->input('father_id', array('options' => $fathers, "empty"=>__('(choose one)')));
		echo $this->Form->input('father2_id', array('options' => $fathers, "empty"=>__('(choose one)')));
		echo $this->Form->input('spouse_id', array("empty"=>__('(choose one)')));
		echo $this->Form->input('marriage',array('minYear' => 1900, 'maxYear'=>date('Y'),'orderYear'=>'asc','dateFormat' => 'DMY','empty' => '(escolha um)','separator' => '<span>/</span>'));*/
	?>
	</fieldset>
		<!--<button class="btn btn-primary btn-lg add" style="float: left;" data-toggle="modal" data-target=".createPerson">+</button>-->
	<?php
		echo $this->Form->input('tel', array('div' =>  array('class' => 'tel input text')));
		echo $this->Form->input('cel', array('div' =>  array('class' => 'cel input text')));
		echo $this->Form->input('cel2', array('div' =>  array('class' => 'cel2 input text')));
		echo $this->Form->input('email');
	?>
	</div>
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
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Person.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Person.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tithes'), array('controller' => 'tithes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tithe'), array('controller' => 'tithes', 'action' => 'add')); ?> </li>
	</ul>
<?php echo $this->element('People/modal'); ?>
