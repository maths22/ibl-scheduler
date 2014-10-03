<div class="assignments form">
    <?php echo $this->Form->create('Assignment'); ?>
    <fieldset>
        <legend><?php echo __('Add Assignment'); ?></legend>
        *Please check the assignment carefully.  Once you save it, you cannot easily edit it. (Contact me if you need it edited, and hopefully this will change soon.)*
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('date');
        echo $this->Form->input('problems', array('label'=>'Problems (Separate problem names/numbers with ;)', 'div'=>array('class'=>'required'), 'required'=>true,'type' => 'textarea'));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Return to Assignment List'), array('controller' => 'home', 'action' => 'select')); ?></li>
    </ul>
</div>
