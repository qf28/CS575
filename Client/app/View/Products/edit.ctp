<header>Edit Product</header>
<?php
echo $this->Form->create('Product');
echo $this->Form->input('title');
echo $this->Form->input('link');
echo $this->Form->input('initial');
echo $this->Form->input('target');
echo $this->Form->input('email');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->submit('Submit', 
        array('after' => $this->Html->link('Cancel', array('action' => 'index')))
);
echo $this->Form->end();
?>