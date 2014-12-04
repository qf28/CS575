<head>
<style>
/*name header because the default header is taken*/
#header2 {
    background-color:black;
    color:white;
    text-align:center;
    padding:20px;
    font-size: 250%;
}
</style>
</head>



<div id="header2">
Personal PriceTracker
</div>
<p> </p>
<p> </p>


<!-- <input type="text" name="firstname"> -->


<!-- add buttion -->
<p text-align="right"><?php echo $this->Html->link('Add Watch Item', array('action' => 'add')); ?></p>


<?php $paginator = $this->Paginator; ?>


<table>
    <!-- table column name -->
    <tr>
        <!-- add paginator sort for some column -->
        <th><?php echo $paginator->sort('Product.title', 'Name'); ?></th>
        <th>Actions</th>
        <th><?php echo $paginator->sort('Product.initial', 'Initial Price'); ?></th>
        <th><?php echo $paginator->sort('Product.target', 'Target Price'); ?></th>
        <th>Email</th>
    </tr>


    <!-- iterate and display table -->
    <?php foreach ($products as $product): ?>
    <tr>
        <td>
            <!-- when click the title, link to View view with the product id -->
            <?php
                echo $this->Html->link(
                    $product['Product']['title'],
                    array('action' => 'view', $product['Product']['id'])
                );
            ?>
        </td>
        <td>
            <!-- when click "delete", confirm and delete -->
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $product['Product']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <!-- when click "edit", link to View edit with the product id -->
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $product['Product']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $product['Product']['initial']; ?>
        </td>
        <td>
            <?php echo $product['Product']['target']; ?>
        </td>
        <td>
             <?php echo $product['Product']['email'];  ?> </a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>