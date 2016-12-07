<?php require('header.php') ?>

<?php foreach ($records as $row): ?>

    <h1><a href="?act=view-entry&id=<?$row['id']?>"><?=$row['header']?></a></h1>

        <p><?=$row['content']?></p>

    <div class="comments"><a href="?act=view-entry&id=<?$row['id']?>">comments</a></div>


<?php endforeach ?>

<?php require('footer.php') ?>
