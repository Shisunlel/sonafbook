<?php
require "dbconfig.php";
if (isset($_POST['update'])) {
    $page_id = $_POST['page_id'];
    $page_content = $_POST['editor'];
    $date = date("Y-m-d H:i:s");
    $query = "update tbl_pages set page_content='$page_content', date_modified='$date' where page_id=$page_id";
    $result = $mydb->query($query);
    if ($result) {
        header("location: index.php?page_id=$page_id");
    } else {
        $mydb->error;
    }
}
