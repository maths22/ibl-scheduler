<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Section'); ?></dt>
		<dd>
			<?php echo h($user['User']['section']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($user['User']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Problem Completions'), array('controller' => 'problem_completions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem Completion'), array('controller' => 'problem_completions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Problem Completions'); ?></h3>
	<?php if (!empty($user['ProblemCompletion'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Problem Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Readiness'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['ProblemCompletion'] as $problemCompletion): ?>
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
