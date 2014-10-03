<h2><?php echo __('Presentation readiness for <br/>' . $assignment['Assignment']['name']) . ' due ' . $this->Time->format($assignment['Assignment']['date'], '%B %e, %Y'); ?></h2>
<h3>Section <?php echo AuthComponent::user('section'); ?>: <?php echo $total; ?> student<?= $total==1?'':'s' ?> responded</h3>
<table cellpadding="3" cellspacing="0" border="1">
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