<h1>Add Paper</h1>
<?php
echo $this->Form->create('Paper');
echo $this->Form->input('title');
// echo $this->Form->input('category');
// echo $this->Form->input('author');
// echo $this->Form->input('publishdate');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Paper');
?>