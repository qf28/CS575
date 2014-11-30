
<p><?php echo $this->Html->link('Return to Main Page', array('action' => 'main', 'controller' => 'Papers')); ?></p>
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
<!--             <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $paper['Paper']['id'])
                );
            ?> -->
        </td>
        <td>
            <?php echo $paper['Paper']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>