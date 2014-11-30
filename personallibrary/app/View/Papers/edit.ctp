<h1>Edit Paper</h1>
<?php
echo $this->Form->create('Paper');
echo $this->Form->input('title');

echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Paper');
?>