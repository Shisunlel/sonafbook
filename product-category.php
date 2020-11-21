<?php
if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];
}
$table = "view_bookgenre";
$table2 = "tbl_genre";
$query = selectTable("*", $table) . " where genre_code='$genre'";
$query2 = selectTable("*", $table2) . " where genre_code='$genre'";
$result = $mydb->query($query);
$result2 = $mydb->query($query2);
$row2 = $result2->fetch_array();
$title = $row2['genre_full'] . " | SonafBook";
?>
<h3 class="text-center mt-2"><strong><u><?=$row2['genre_full']?></u></strong></h3>
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="card-deck">
            <?php
while ($row = $result->fetch_array()) {
    include "includes/card-content.php";
}
?>
        </div>
    </div>
</div>