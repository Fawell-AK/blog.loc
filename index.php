<?php
session_start();
header('Content-type: text/html; charset=UTF-8');// ДЛЯ ЧИТАЄМОСТІ КИРИЛЛИЦІ
$mysqli = new mysqli('localhost', 'my_db', 'admin123') or die ('Cannot connect to database');
$mysqli->select_db('my_db') or die('Cannot connect to database');
$mysqli->set_charset('UTF8');// ДЛЯ ЧИТАЄМОСТІ КИРИЛЛИЦІ
mb_internal_encoding('UTF8');
$act = isset($_GET['act']) ? $_GET['act'] : 'list';
define('IS_ADMIN', isset($_SESSION['IS_ADMIN']));

switch ($act) {
    case 'list':
        $records = array();
        $sel = $mysqli->query('SELECT * FROM posts ORDER BY id DESC ');
        while ($row = $sel->fetch_assoc()) {
            $row['date'] = $row['date'];
            if (mb_strlen($row['content']) > 100) {
                $row['content'] = mb_substr(strip_tags($row['content']), 0, 97) . '...'; //скорочення контента якщо більше чем 97 символів
            }
            $row['content'] = nl2br($row['content']); // АВТО ПЕРЕНОС РЯДКІВ
            $row['header'] = htmlspecialchars($row['header']);
            $records[] = $row;
        }
        require('templates/list.php');
        break;


    case 'view-entry':
        if (!isset($_GET['id'])) die("Missing id parameter");
        $id = intval($_GET['id']);
        $row = $mysqli->query("SELECT * FROM posts WHERE id = $id")->fetch_assoc();
        if (!$row) die("No such entry");
        $row['date'] = $row['date'];
        $row['content'] = nl2br($row['content']); // авто перенос строк
        $row['header'] = htmlspecialchars($row['header']);
        require('templates/entry.php');
        break;

    case 'login':
        require('templates/login.php');

    case 'logout':
        unset($_SESSION['IS_ADMIN']);
        header('Location .');
        break;

    case 'do-login':
        if ($_POST['login'] == 'login' && $_POST['password'] == 'password') {
            $_SESSION['IS_ADMIN'] = true;
            header('Location: .');
        } else {
            header('Location: ?act=login');
        }
        break;

    default:

        die('No such action');

}



