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


<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<?php
$paginator = $this->Paginator;
?>
<table>
    <tr>
        <!-- <th>Id</th> -->
        <th><?php echo $paginator->sort('Post.title', 'Title'); ?></th>

        <th>Actions</th>
        <th><?php echo $paginator->sort('Paper.created', 'Created'); ?></th>
        <th><?php echo $paginator->sort('Paper.modified', 'Modified'); ?></th>

    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <!-- <td><?php echo $post['Post']['id']; ?></td> -->
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $post['Post']['created']; ?>
        </td>
        <td>
            <?php echo $post['Post']['modified']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>