<?php require('header.php') ?>

<style type="text/css" xmlns="http://www.w3.org/1999/html">

    .comments {
        margin-bottom: 20px;
    }

</style>

<h1>Entries in my blog</h1>

<?php foreach ($records as $row): ?>

    <h1><a href="?act=view-entry&id=<?$row['id']?>"><?=$row['header']?></a></h1>

        <p><?=$row['content']?></p>

    <div class="comments">
        <span class="date"><?=$row['date']?></span>
        <span class="author"><?=$row['author']?></span>
        <a href="?act=view-entry&id=<?$row['id']?>">comments</a>
    </div>


<?php endforeach ?>

<?php require('footer.php') ?>
