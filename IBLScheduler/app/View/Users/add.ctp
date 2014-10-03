<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Register'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('section', array('type'=>'select','options'=>array(20=>20,30=>30,32=>32,50=>50)));
		echo $this->Form->input('name');
                echo $this->Form->input('type',array('type'=>'hidden','value'=>'student'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>