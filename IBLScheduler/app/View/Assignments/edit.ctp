<div class="assignments form">
<?php echo $this->Form->create('Assignment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Assignment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('section',array('type'=>'hidden'));
		echo $this->Form->input('date');
		echo $this->Form->input('name');        
        ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Assignment.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Assignment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Assignments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
	</ul>
</div>
