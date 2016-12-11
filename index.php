<?php

  $mysqli = new mysqli('localhost', 'my_db', 'admin123') or die ('Cannot connect to database');

    $mysqli->select_db('my_db') or die('Cannot connect to database');

    $act = isset($_GET['act']) ? $_GET['act'] : 'list';

    switch ($act) {

        case 'list':
            $records = array();
            $sel = $mysqli->query('SELECT * FROM posts');
            while ($row = $sel->fetch_assoc()) {
                $row['date'] = date('Y-m-d H:i:s', $row['date']);
                $records[] = $row;
            }
            require ('templates/list.php');
            break;

        case 'view-entry':
            require ('templates/entry.php');
            break;

    }


require ('templates/list.php');

?>