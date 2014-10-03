<div class="problemCompletions view">
<h2><?php echo __('Problem Completion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($problemCompletion['ProblemCompletion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Problem'); ?></dt>
		<dd>
			<?php echo $this->Html->link($problemCompletion['Problem']['name'], array('controller' => 'problems', 'action' => 'view', $problemCompletion['Problem']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($problemCompletion['User']['id'], array('controller' => 'users', 'action' => 'view', $problemCompletion['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Readiness'); ?></dt>
		<dd>
			<?php echo h($problemCompletion['ProblemCompletion']['readiness']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Problem Completion'), array('action' => 'edit', $problemCompletion['ProblemCompletion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Problem Completion'), array('action' => 'delete', $problemCompletion['ProblemCompletion']['id']), array(), __('Are you sure you want to delete # %s?', $problemCompletion['ProblemCompletion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Problem Completions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem Completion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
