
<h1><?php echo h($paper['Paper']['title']); ?></h1>


<iframe width="100%" height="400" src='$paper['Paper']['body']'></iframe>
<p><small>Created: <?php echo $paper['Paper']['created']; ?></small></p>

<p>Category: <?php echo h($paper['Paper']['category']); ?></p>
<p>Author: <?php echo h($paper['Paper']['author']); ?></p>
<p>Publish Date: <?php echo h($paper['Paper']['publishdate']); ?></p>
<p>Content: <?php echo h($paper['Paper']['file']); ?></p>
<p><?php echo h($paper['Paper']['body']); ?></p>