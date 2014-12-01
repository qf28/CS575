
<?php
echo $this->Form->create('Paper');
echo $this->Form->input('title');
echo $this->Form->input('file');
echo $this->Form->input('category');
echo $this->Form->input('author');
echo $this->Form->input('publishdate');
echo $this->Form->submit('Submit', 
        array('after' => $this->Html->link('Cancel', array('action' => 'index')))
);
// echo $this->Form->end('Save Paper');
echo $this->Form->end();
?>