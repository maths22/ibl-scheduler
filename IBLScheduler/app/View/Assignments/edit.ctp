<div class="assignments form">
    <?php echo $this->Form->create('Assignment'); ?>
    <fieldset>
        <legend><?php echo __('Edit Assignment'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('section', array('type' => 'hidden'));
        echo $this->Form->input('date');
        echo $this->Form->input('name');
        echo $this->Form->input('problems', array('value' => $problems, 'label' => 'Problems (Separate problem names/numbers with ;)', 'div' => array('class' => 'required'), 'required' => true, 'type' => 'textarea'));
        echo $this->Form->input('published', array('type' => 'checkbox'));
        ?>
        <em>*Once you publish an assignment, you cannot edit it or unpublish it*</em>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Return to Assignment List'), array('controller' => 'home', 'action' => 'select')); ?></li>
    </ul>
</div>
