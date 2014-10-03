<div class="problems view">
<h2><?php echo __('Problem'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assignment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($problem['Assignment']['name'], array('controller' => 'assignments', 'action' => 'view', $problem['Assignment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Problem'), array('action' => 'edit', $problem['Problem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Problem'), array('action' => 'delete', $problem['Problem']['id']), array(), __('Are you sure you want to delete # %s?', $problem['Problem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Assignments'), array('controller' => 'assignments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Assignment'), array('controller' => 'assignments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Problem Completions'), array('controller' => 'problem_completions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem Completion'), array('controller' => 'problem_completions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Problem Completions'); ?></h3>
	<?php if (!empty($problem['ProblemCompletion'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Problem Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Readiness'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($problem['ProblemCompletion'] as $problemCompletion): ?>
		<tr>
			<td><?php echo $problemCompletion['id']; ?></td>
			<td><?php echo $problemCompletion['problem_id']; ?></td>
			<td><?php echo $problemCompletion['user_id']; ?></td>
			<td><?php echo $problemCompletion['readiness']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'problem_completions', 'action' => 'view', $problemCompletion['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'problem_completions', 'action' => 'edit', $problemCompletion['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'problem_completions', 'action' => 'delete', $problemCompletion['id']), array(), __('Are you sure you want to delete # %s?', $problemCompletion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Problem Completion'), array('controller' => 'problem_completions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
