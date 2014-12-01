<head>
<style>
#header2 {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;
    font-size: 250%;
}
</style>
</head>

<body>

<div id="header2">
<style="text-align:center" >My Personal Library


</div>
<p> </p>
<p> </p>
<p><?php echo $this->Html->link('View Papers', array('action' => 'index', 'controller' => 'Papers')); ?></p>
<p><?php echo $this->Html->link('View Posts', array('action' => 'index', 'controller' => 'Posts')); ?></p>
