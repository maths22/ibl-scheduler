<div class="problemCompletions">
    <?php echo $this->Form->create('ProblemCompletion'); ?>
    <fieldset>
        <legend><?php echo __('Submit readiness for'); ?><br/>
        <?php echo __($assignment['Assignment']['name'] . ' due ' . $this->Time->format($assignment['Assignment']['date'],'%B %e, %Y') ); ?></legend>
        <?php
        foreach ($problems as $id => $name) {
            echo $this->Form->input('readiness_' . $id,array('value'=>isset($defaults['ProblemCompletion']['readiness_' . $id])?$defaults['ProblemCompletion']['readiness_' . $id]:'','div'=>array('class'=>'required'),'required' => true, 'label'=>$name, 'type'=>'select','options'=>array(''=>'','yes'=>'Yes','maybe'=>'Maybe','no'=>'No')));
        }
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>