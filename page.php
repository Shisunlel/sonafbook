<?php
$page_id = $_GET['page_id'];
$query = selectTable("*", "tbl_pages") . " where page_id=$page_id";
$result = $mydb->query($query);
if ($row = $result->fetch_array()) {
    $title = $row['page_title'] . " | SonafBook";
    ?>
    <div>
        <?=$row['page_content']?>
    </div>
<?php
}
?>