<?php
require_once "admin/dbconfig.php";
// ob_start();
// $buffer=ob_get_contents();
// ob_end_clean();
require_once "function.php";

//db stuff
$table = "";
$query = "";
$result = "";
//
$content = "main.php";

if (isset($_GET['content'])) {
    $content = $_GET['content'];
    switch ($content) {
        case "product-detail":
            $content = "product-detail.php";
            break;
        case "product-category":
            $content = "product-category.php";
            break;
        case "page":
            $content = "page.php";
            break;
        default:
            $content = "error.php";
            break;
    }
}

$title = "SonafBook";
require_once "includes/header.php";
require_once "includes/nav.php";
include $content;
// $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
// echo $buffer;
include "includes/footer.php";
