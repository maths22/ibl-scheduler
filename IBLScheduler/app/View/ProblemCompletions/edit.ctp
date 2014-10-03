<div class="problemCompletions form">
<?php echo $this->Form->create('ProblemCompletion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Problem Completion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('problem_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('readiness');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProblemCompletion.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ProblemCompletion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Problem Completions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
