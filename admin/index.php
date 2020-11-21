<?php
session_start();
require_once "dbconfig.php";
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
if ($_SESSION['username'] == "admin") {
// $query = 'select * from pages';
    // $result = $mydb->query($query);
    // while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    //     printf("%s", $row[1]);
    // }
    if (isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] > 900) {
        session_unset();
        session_destroy();
        header("location: login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time();
    require_once "function.php";
    require_once "../function.php";
    require_once "header.php";
    include "adminNav.php";
    $content = "dashboard.php";
    $table = "";
    $query = "";
    $result = "";

    if (isset($_GET['content'])) {
        $content = $_GET['content'];
        switch ($content) {
            case 'view-book':
                $content = "view-book.php";
                break;
            case 'add-book':
                $content = 'add-book.php';
                break;
            case 'add-genre':
                $content = "add-genre.php";
                break;
            case 'view-page':
                $content = "view-page.php";
                break;
            case 'add-page':
                $content = "add-page.php";
                break;
            case 'slideshow':
                $content = "slider.php";
                break;
            default:
                $content = "../error.php";
                break;
        }
    }

    include $content;
    include "footer.php";
    $mydb->close();
} else {
    header("location: ../index.php");
}
