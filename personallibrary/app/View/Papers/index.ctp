<h1>Your Papers</h1>

<p><?php echo $this->Html->link('Add Paper', array('action' => 'add')); ?></p>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add', 'controller' => 'Posts')); ?></p>
<p><?php echo $this->Html->link('List Posts', array('action' => 'index', 'controller' => 'Posts')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($papers as $paper): ?>
    <tr>
        <td><?php echo $paper['Paper']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $paper['Paper']['title'],
                    array('action' => 'view', $paper['Paper']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $paper['Paper']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $paper['Paper']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $paper['Paper']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>