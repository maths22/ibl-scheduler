<h3>Assignments:</h3>
<?php foreach ($assignments as $assignment): ?>
    <?php echo $this->Html->link($assignment['Assignment']['name'], array('controller' => 'problem_completions', 'action' => 'assignment_report', $assignment['Assignment']['id'])); ?>
    due <?php echo $this->Time->format($assignment['Assignment']['date'], '%B %e, %Y'); ?>
    <?php echo $assignment['Assignment']['published']?'':'[Draft]'; ?>
    <br/>
<?php endforeach; ?>
<br/>
<?php echo $this->Html->link("Add a new one", array('controller' => 'assignments', 'action' => 'add')); ?>