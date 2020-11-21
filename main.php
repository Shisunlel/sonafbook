<!--Carousel-->
<div class="carousel slide" data-ride="carousel" data-interval="2000" id="sld">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <?php

$query = "SELECT * FROM tbl_slider WHERE slider_id = 1";
$result = $mydb->query($query);
$rows = $result->fetch_object();
?>
            <img class="img-thumbnail mx-auto d-block" src="<?=$rows->slider_path?>"/>
        </div>
        <?php

$query = "SELECT * FROM tbl_slider WHERE slider_id<>1";
$result = $mydb->query($query);
while ($rows = $result->fetch_object()) {
    ?>
        <div class="carousel-item">
            <img class="img-thumbnail mx-auto d-block" src="<?=$rows->slider_path?>"/>
        </div>
        <?php }?>
    </div>
    <a href="#sld" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a href="#sld" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
<!--Product Content-->

<!-- Sidebar -->
<?php
include "includes/sidebar.php";
?>
<!-- Main -->
<div class="col-md-12 col-lg-9 ml-auto">
    <div class="row py-2 align-items-center">
        <div class="container-fluid">
            <!--Deck One-->
            <div class="card-deck">
                <?php
$table = "view_bookgenre";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = searchQuery('*', $table, $search);
    $result = $mydb->query($query);
    $rows = $result->fetch_object();
    if (!empty($_POST['search']) && isset($rows)) {
        // $search = preg_replace("#[^0-9a-z]#i","",$search);
        $query = searchQuery('*', $table, $search);
    } else {
        echo "<div class='card-body text-center'>";
        echo "<div class='row'>";
        echo "<div class='col-lg-12'><p class='lead'>There was no output result</p><p>Please enter something below to start searching</p></div>";
        echo "</div><div class='row'><div class='col-lg-12'>";
        echo "<form method='post' action='index.php'>
                                <div class='input-group'>
                                    <input type='text' name='search' class='form-control' placeholder='Search...' id='' />
                                    <button type='submit' class='btn btn-white'>
                                    <i class='fas fa-search text-danger'></i>
                                    </button>
                            </form>
                          </div>";
        echo "</div></div></div>";
        $query = null;
    }
} else {
    $query = selectTable('*', $table);
}
if ($query != null) {
    $result = $mydb->query($query);
    // query total row from database and total pages
    $total_rows = $result->num_rows;
    $total_page = ceil($total_rows / 12);

    // Get current page number
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    $result_per_page = ($page - 1) * 12;
    if (empty($_POST['search'])) {
        $query = selectTable(('*'), $table) . ' LIMIT ' . $result_per_page . ',12';
    }

    $result = $mydb->query($query);
    while ($row = $result->fetch_array()) {?>
                            <div class="col-sm-6 col-xl-3 mt-3">
                            <?php include "includes/mainLayout.php";
    }
}
?>
                    </div>
            </div>
            <!-- Pagination Goes Here -->
            <?php
if (isset($page)) {
    for ($i = 1; $i <= $total_page; $i++) {?>
        <div class="pagination-wrapper ml-auto mt-2 text-center">
        <a style="display:inline-block;border-radius:50%; min-width:2em" class='<?php if ($i == $page) {
        echo "text-muted bg-light";
    } else {
        echo "text-white bg-primary";
    }
        ?>' href="?page=<?=$i?>"> <?=$i?> </a></div> <?php }
}
?>
        </div>
    </div>
</div>
</div>