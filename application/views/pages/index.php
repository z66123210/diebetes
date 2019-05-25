<?php foreach ($pages as $pages_item): ?>
 <h2><?php echo 'Title: '.$pages_item['Title'] ?></h2>
 <div class="main">
 <?php echo 'User ID: '.$pages_item['UserId'] ?>
 </div>
 <p><a href="view/<?php echo $pages_item['id'] ?>">View page</a></p>
<?php endforeach ?>