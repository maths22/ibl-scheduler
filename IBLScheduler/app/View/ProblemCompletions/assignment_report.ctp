<div class="problemCompletions index">
    <h2><?php echo __('Presentation readiness for <br/>' . $assignment['Assignment']['name']) . ' due ' . $this->Time->format($assignment['Assignment']['date'], '%B %e, %Y'); ?></h2>
    <h3>Section <?php echo AuthComponent::user('section'); ?>: <?php echo $total; ?> student<?= $total == 1 ? '' : 's' ?> responded</h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Yes</th>
                <th>Maybe</th>
                <th>No</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($counts as $count): ?>
                <tr>
                    <td><?php echo h($count['name']); ?>&nbsp;</td>
                    <td><?php echo h($count['yes']); ?>&nbsp;</td>
                    <td><?php echo h($count['maybe']); ?>&nbsp;</td>
                    <td><?php echo h($count['no']); ?>&nbsp;</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Printable Report'), array('action' => 'assignment_report', $id . ".pdf")); ?></li>
        <!--<li><?php //echo $this->Html->link(__('Edit Assignment'), array('controller' => 'assignments', 'action' => 'edit', $assignment['Assignment']['id'])); ?></li>-->
        <li><?php echo $this->Html->link(__('Return to Assignment List'), array('controller' => 'home', 'action' => 'select')); ?></li>
    </ul>
</div>
