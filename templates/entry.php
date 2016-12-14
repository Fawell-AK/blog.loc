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
            padding-top: 20px;
            padding-left: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }


    </style>


    <h2><a href="?act=view-entry&id=<? $row['id'] ?>"><?= $row['header'] ?></a></h2>

    <p class="content"><?= $row['content'] ?></p>

    <div class="comments">

        <span class="date"><?= $row['date'] ?></span>

        <span class="author"><?= $row['author'] ?></span>

        <a href="?act=view-entry&id=<? $row['id'] ?>">comments</a>
    </div>

<?php require('footer.php') ?>