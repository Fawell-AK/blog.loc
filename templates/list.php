<?php require('header.php') ?>

<style type="text/css">

    .comments {
        font-size: 0.8em;
        margin-bottom: 20px;
    }

    .date, .author {
        margin-right: 10px;
    }

    .content {
        padding-top: 5px;
        padding-left: 15px;
    }

    .content {
        padding-left: 20px;
    }

    h1 {
        margin-bottom: 10px;
    }


</style>

<h1>Entries in my blog</h1>

<?php foreach ($records as $row): ?>

    <div class="entry">
        <h3><a href="?act=view-entry&id=<? $row['id'] ?>"><?= $row['header'] ?></a></h3>

        <p class="content"><?= $row['content'] ?></p>

        <div class="comments">

            <span class="date"><?= $row['date'] ?></span>

            <span class="author"><?= $row['author'] ?></span>

            <a href="?act=view-entry&id=<? $row['id'] ?>">comments</a>
        </div>

    </div>


<?php endforeach ?>

<?php require('footer.php') ?>
