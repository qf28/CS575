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
<a style="text-align:center" href="/CS575/personallibrary">My Personal Library</a>
</div>
<p> </p>
<p> </p>

<p><?php echo $this->Html->link('Upload new paper', array('action' => 'add', 'controller' => 'Papers')); ?></p>

<table>
    <tr>
        <!-- <th>Id</th> -->

        <th>Title</th>
        <th>Category</th>
        <th>Author</th>        
        <th>Actions</th>
        <th>Added</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($papers as $paper): ?>
    <tr>
        <!-- <td><?php echo $paper['Paper']['id']; ?></td> -->
        <td>
            <?php
                echo $this->Html->link(
                    $paper['Paper']['title'],
                    array('action' => 'view', $paper['Paper']['id'])
                );
            ?>
        </td>
        <td><?php echo $paper['Paper']['category']; ?></td>
        <td><?php echo $paper['Paper']['author']; ?></td> 
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $paper['Paper']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>

        </td>
        <td>
            <?php echo $paper['Paper']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>