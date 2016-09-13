<?php
	echo $this->Html->script('tab');
	echo $this->Html->script('people-tabs-config');

	$this->Html->addCrumb(__("People"), __("/people"));
	$this->Html->addCrumb(__("View"), __("/people/view"));	  
?>

<hgroup class="tt-g">
	<h2 class="tt"><?php echo __('Person'); ?></h2>
</hgroup>

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="people-tabs">
  	<li><a href="#person-content" data-toggle="tab"><?php echo __('Person'); ?></a></li>
	
  	<?php if($father || $father2):?>
  	  <li><a href="#parents-content" data-toggle="tab"><?php echo __('Parents'); ?></a></li>
	<?php endif;?>

  	<?php if($spouse):?>
  	  <li><a href="#spouse-content" data-toggle="tab"><?php echo __('Spouse'); ?></a></li>
	<?php endif;?>	
	
  	<?php if($childs):?>
  	  <li><a href="#child-content" data-toggle="tab"><?php echo __('Childs'); ?></a></li>
	<?php endif;?>	
</ul>
<!-- Tab panes -->
<div class="people view tab-content">
  <div class="person-content tab-pane active" id="person-content">
  	<ul class="view-list-group">
  		<li id="view-name" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Name'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['name']); ?></p>
  		</li>
  		<li id="view-id" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Id'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['id']); ?></p>
  		</li>
  		<li id="view-birth" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Birth'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['birth']); ?></p>
  		</li>
  		<li id="view-cpf" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Cpf'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['cpf']); ?></p>
  		</li>
  		<li id="view-rg" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Rg'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['rg']); ?></p>
  		</li>
  		<li id="view-street" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Street'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['street']); ?></p>
  		</li>
  		<li id="view-number" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Number'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['number']); ?></p>
  		</li>
  		<li id="view-district" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('District'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['district']); ?></p>
  		</li>
  		<li id="view-cep" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Cep'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['cep']); ?></p>
  		</li>
  		<li id="view-city" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('City'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['city']); ?></p>
  		</li>
  		<li id="view-uf" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Uf'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['uf']); ?></p>
  		</li>
  		<li id="view-country" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Country'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['country']); ?></p>
  		</li>
  		<li id="view-tel" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Tel'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['tel']); ?></p>
  		</li>
  		<li id="view-cel" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Cel'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['cel']); ?></p>
  		</li>
  		<li id="view-cel2" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Cel2'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['cel2']); ?></p>
  		</li>
  		<li id="view-email" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Email'); ?></h4>
	    	<p class="list-group-item-text"><?php echo h($person['Person']['email']); ?></p>
  		</li>
  		<li id="view-parish" class="list-group">
  			<h4 class="list-group-item-heading"><?php echo __('Parish'); ?></h4>
	    	<p class="list-group-item-text"><?php echo $person['Parish']['name']; ?></p>
  		</li>
  	</ul>


		<section id="related-tithes">
			<div class="related">
			<h3 class="tt"><?php echo __('Related Tithes'); ?></h3>
			<a class="add glyphicon btn btn-primary" href="<?php echo Router::url('/', true).'tithes/add/'.$person['Person']['id']; ?>"><?php echo __('+'); ?></a>
		<?php //echo $this->Html->link(__('+'), array('controller' => 'tithes', 'action' => 'add'), array('class' => 'add glyphicon btn btn-primary')); ?>
			</div>
			<?php if (!empty($person['Tithe'])): ?>
			<table cellpadding = "0" cellspacing = "0" class="table table-hover">
				<thead>
					<tr>
						<th><?php echo __('Id'); ?></th>
						<th><?php echo __('Value'); ?></th>
						<th><?php echo __('Month'); ?></th>
						<th><?php echo __('Year'); ?></th>
						<th><?php echo __('Created'); ?></th>
						<th><?php echo __('Modified'); ?></th>
						<th><?php echo __('Person Id'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
				</thead>
			<?php foreach ($person['Tithe'] as $tithe): ?>
				<tr>
					<td><?php echo $tithe['id']; ?></td>
					<td><?php echo $tithe['value']; ?></td>
					<td><?php echo $tithe['month']; ?></td>
					<td><?php echo $tithe['year']; ?></td>
					<td><?php echo $tithe['created']; ?></td>
					<td><?php echo $tithe['modified']; ?></td>
					<td><?php echo $tithe['person_id']; ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('controller' => 'tithes', 'action' => 'view', $tithe['id']), array('class' => 'act-view', 'title' => __('View'))); ?>
						<?php echo $this->Html->link(__('Edit'), array('controller' => 'tithes', 'action' => 'edit', $tithe['id']), array('class' => 'act-edit', 'title' => __('Edit'))); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tithes', 'action' => 'delete', $tithe['id']), array('class' => 'act-remove', 'title' => __('Delete')), null, __('Are you sure you want to delete # %s?', $tithe['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
		</section>

	</div> 
	<?php if($father || $father2):?>
		<div class="parents-content tab-pane" id="parents-content">
			<ul class="view-list-group">
				<h3 class="tt-g"><?php echo __('Father'); ?></h3>
			<?php if($father):?>
		  		<li id="view-name-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Name: ");?></h4>
		  			<p class="list-group-item-text"><?php echo $this->Html->link(($father['Person']['name']),array('controller' => 'people', 'action' => 'view', $father['Person']['id'])); ?></p>
		  		</li>
		  		<li id="view-birth-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Birth: ");?></h4>
		  			<p class="list-group-item-text"><?php echo $this->Time->format('d/m/Y',$father['Person']['birth']); ?></p>
		  		</li>
		  		<li id="view-tel-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Tel: ");?></h4>
		  			<p class="list-group-item-text"><?php echo h($father['Person']['tel']); ?></p>
		  		</li>
	  		<?php endif;?>
			<?php if($father2):?>
				<li id="view-name-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Name: ");?></h4>
		  			<p class="list-group-item-text"><?php echo $this->Html->link(($father2['Person']['name']),array('controller' => 'people', 'action' => 'view', $father2['Person']['id'])); ?></p>
		  		</li>
		  		<li id="view-birth-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Birth: ");?></h4>
		  			<p class="list-group-item-text"><?php echo $this->Time->format('d/m/Y',$father2['Person']['birth']); ?></p>
		  		</li>
		  		<li id="view-tel-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Tel: ");?></h4>
		  			<p class="list-group-item-text"><?php echo h($father2['Person']['tel']); ?></p>
		  		</li>
			<?php endif;?>
  			<ul>
		</div>
	<?php endif;?>
	<?php if($spouse):?>
		<div class="spouse-content tab-pane" id="spouse-content">
			<ul class="view-list-group">
				<h3 class="tt-g"><?php echo __('Spouse'); ?></h3>
		  		<li id="view-name-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Name: ");?></h4>
		  			<p class="list-group-item-text"><?php echo $this->Html->link(($spouse['Person']['name']),array('controller' => 'people', 'action' => 'view', $spouse['Person']['id'])); ?></p>
		  		</li>
		  		<li id="view-birth-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Birth: ");?></h4>
		  			<p class="list-group-item-text"><?php echo $this->Time->format('d/m/Y',$spouse['Person']['birth']); ?></p>
		  		</li>
		  		<li id="view-tel-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Tel: ");?></h4>
		  			<p class="list-group-item-text"><?php echo h($spouse['Person']['tel']); ?></p>
		  		</li>
		  		<li id="view-marriage-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Marriage");?>: </h4>
		  			<p class="list-group-item-text"><?php echo $this->Time->format('d/m/Y',$spouse['Person']['marriage']); ?></p>
		  		</li>
		  	</ul>
		</div>
	<?php endif;?>	
	<?php if($childs):?>
		<div class="child-content tab-pane" id="child-content">
			<ul class="view-list-group">
				<h3 class="tt-g"><?php echo __('Childs'); ?></h3>
			<?php foreach($childs as $child):?>
		  		<li id="view-name-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Name: ");?></h4>
		  			<p class="list-group-item-text"><?php echo $this->Html->link(($child['Person']['name']),array('controller' => 'people', 'action' => 'view', $child['Person']['id'])); ?></p>
		  		</li>
		  		<li id="view-birth-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Birth: ");?></h4>
		  			<p class="list-group-item-text"><?php echo $this->Time->format('d/m/Y',$child['Person']['birth']); ?></p>
		  		</li>
		  		<li id="view-tel-related" class="list-group">
		  			<h4 class="list-group-item-heading"><?php echo __("Tel: ");?></h4>
		  			<p class="list-group-item-text"><?php echo h($child['Person']['tel']); ?></p>
		  		</li>
		  	<?php endforeach;?>
		  	</ul>
		</div>
	<?php endif;?>		
</div>

	<ul id="smart-menu">
		<li><?php echo $this->Html->link(__('Edit Person'), array('action' => 'edit', $person['Person']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Person'), array('action' => 'delete', $person['Person']['id']), null, __('Are you sure you want to delete # %s?', $person['Person']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List People'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tithes'), array('controller' => 'tithes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tithe'), array('controller' => 'tithes', 'action' => 'add')); ?> </li>
	</ul>


<!-- <?php echo __('Father2'); ?>-->
