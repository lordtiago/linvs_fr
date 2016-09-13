<?php $meses = array(__('January'),__('February'),__('March'),__('April'),__('May'),__('June'),__('July'),__('August'),__('September'),
					__('October'),__('November'),__('December')); 

		//debug($this->params);			
		if(!empty($this->params['pass'])){
			$current_month = $this->params['pass'][0]-1;
		}else{
			$current_month = (int)date('m')-1;
		}
	   
	   //set a previous month and year
	   if($current_month == 0){
		   $prev_month = 12;
		   
	   		if(!empty($this->params['pass'])){
	   			$prev_year = $this->params['pass'][1]-1;
	   		}else{
	   			$prev_year = date('Y')-1;
	   		}
			
	   }else{
		   $prev_month = $current_month;
		   
	   		if(!empty($this->params['pass'])){
	   			$prev_year = $this->params['pass'][1];
	   		}else{
	   			$prev_year = date('Y');
	   		}
			
	   }
	   
	   //set a next month and year
	   if($current_month == 11){
		   $next_month = 1;
		   
	   		if(!empty($this->params['pass'])){
	   			$next_year = $this->params['pass'][1]+1;
	   		}else{
	   			$next_year = date('Y')+1;
	   		}
			
	   }else{
		   $next_month = $current_month + 2;
		   
	   		if(!empty($this->params['pass'])){
	   			$next_year = $this->params['pass'][1];
	   		}else{
	   			$next_year = date('Y');
	   		}
			
	   }	
	   
	   //Configs
	   echo $this->Html->script('modal');   
?>
<?php
	$this->Html->addCrumb(__("Tithes"), __("/tithes"));
?>
<div class="tithes index">
	<hgroup class="tt-g">
		<h2 class="tt item-tt-g"><?php echo __('Tithes'); ?></h2>
		<?php echo $this->Html->link(__('+'), array('action' => 'add'), array('class' => 'add glyphicon btn btn-primary item-tt-g')); ?>
        
        <!-- Botão de Relatório -->
		<button class="glyphicon btn btn-primary report item-tt-g" data-toggle="modal" data-target=".tithesReport">Relatórios</button>
        
		<div id="nav-date-tithes" class="btn-group">
			<?php echo $this->Html->link(
				$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-chevron-left')), 
				array('controller' => 'tithes', $prev_month, $prev_year), 
				array('class' => 'btn btn-default', 'escape' => false)
			); ?>
			<span class="btn btn-default the-date"><?php echo $meses[$current_month]; ?></span>
			<?php echo $this->Html->link(
				$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-chevron-right')), 
				array('controller' => 'tithes', $next_month, $next_year), 
				array('class' => 'btn btn-default', 'escape' => false)
			); ?>
		</div>
	</hgroup>
	<div class="table-responsive">
		<table cellpadding="0" cellspacing="0 id="table-tithes" class="table table-hover"">
		<tr>
				<th><?php echo $this->Paginator->sort('value'); ?></th>
				<th><?php echo $this->Paginator->sort('day'); ?></th>
				<th><?php echo $this->Paginator->sort('month'); ?></th>
				<th><?php echo $this->Paginator->sort('month_ref'); ?></th>
				<th><?php echo $this->Paginator->sort('year'); ?></th>
				<th><?php echo $this->Paginator->sort('Person.name',__('Name')); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($tithes as $tithe): ?>
		<tr>
			<td><?php echo "R$ ".h($tithe['Tithe']['value']); ?></td>
			<td><?php echo h($tithe['Tithe']['day']); ?></td>
			<td><?php echo h($tithe['Tithe']['month']); ?></td>
			<td><?php echo h($tithe['Tithe']['month_ref']); ?></td>
			<td><?php echo h($tithe['Tithe']['year']); ?></td>
			<td>
				<?php echo $this->Html->link($tithe['Person']['name'], array('controller' => 'people', 'action' => 'view', $tithe['Person']['id'])); ?>
			</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $tithe['Tithe']['id']), array('class' => 'act-view', 'title' => __('View'))); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tithe['Tithe']['id']), array('class' => 'act-edit', 'title' => __('Edit'))); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tithe['Tithe']['id']), array('class' => 'act-remove', 'title' => __('Delete')),  __('Are you sure you want to delete # %s?', $tithe['Tithe']['id'])); ?>
			</td>
		</tr>
<?php endforeach; ?>
		</table>
	</div>
	<p class="the-log">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
		<span class=" glyphicon glyphicon-chevron-left"></span>
		<?php echo $this->Paginator->first(__('First', true), array('class' => 'first'));?>
		<?php
			echo $this->Paginator->prev(__('previous'), array(), null, array('class' => 'prev disabled'));
		?>
		<?php
			echo $this->Paginator->numbers(array('separator' => ''));
		?>
		<?php
			echo $this->Paginator->next(__('next'), array(), null, array('class' => 'next disabled'));
		?>
		<?php echo $this->Paginator->last(__('Last', true), array('class' => 'end'));?>
		<span class=" glyphicon glyphicon-chevron-right"></span>
	</div>
</div>
	<h3>Total de Doações: <span class="alert-msg">R$ <?php echo $sum[0]['total'];?></span></h3>
	<ul id="smart-menu">
		<li><?php echo $this->Html->link(__('New Tithe'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List People'), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Person'), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
<?php echo $this->element('Tithes/report'); ?>