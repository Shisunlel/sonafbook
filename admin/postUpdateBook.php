<?php
$book_title = $mydb->real_escape_string($_POST['book_title']);
$unit_price = $_POST['unit_price'];
$original_price = $_POST['original_price'];
$sell_price = $_POST['sell_price'];
$book_author = $mydb->real_escape_string($_POST['book_author']);
$qty_inStock = $_POST['qty_inStock'];
$rating = $_POST['rating'];
$isDiscount = $_POST['discount'];
$name = $_FILES['img']['name'];
if (empty($name)) {
    $imgdir = $row['img'];
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_FILES['img'])) {
            $img = $_FILES['img'];
            move_uploaded_file($img['tmp_name'], "../img/" . $img['name']) or die("Fail to upload");
            $imgdir = "img/" . $img['name'];
            resize_image($imgdir, "400");
        }
    }
}
$description = $mydb->real_escape_string($_POST['description']);
$genre_id = $_POST['book_genre'];
