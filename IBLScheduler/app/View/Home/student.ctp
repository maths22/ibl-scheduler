<h3>Assignments:</h3>
<?php foreach ($assignments as $assignment): ?>
    <?php echo $this->Html->link($assignment['Assignment']['name'], array('controller' => 'problem_completions', 'action' => 'submit_assignment', $assignment['Assignment']['id'])); ?>
    due <?php echo $this->Time->format($assignment['Assignment']['date'], '%B %e, %Y'); ?>
    <br/>
<?php endforeach; ?>