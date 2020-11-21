<?php
$table = "";
$slider_id = "";
$slider_path = "";
$ac = "i";
$submit_type = "Submit";
$message = "";
//updating data
if (isset($_GET['action']) && $_GET['action'] == "u") {
    $action = $_GET['action'];
    $slider_id = $_GET['slider_id'];
    $query = selectTable("*", "tbl_slider") . " where slider_id = $slider_id";
    $result = $mydb->query($query);
    $row = $result->fetch_object();
    $submit_type = "Update";
    $slider_path = $row->slider_path;
    if (isset($_POST['update'])) {
        $name = $_FILES['img']['name'];
        if (empty($name)) {
            $slider_path = $row->slider_path;
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_FILES['img'])) {
                    $img = $_FILES['img'];
                    move_uploaded_file($img['tmp_name'], "../img/" . $img['name']) or die("Fail to upload");
                    $slider_path = "img/" . $img['name'];
                }
            }
        }
        $query = "update tbl_slider set slider_path='$slider_path' where slider_id = $slider_id";
        $result = $mydb->query($query);
        if ($result) {
            $message = "Update sucessfully";
        } else {
            $message = "Error updating data";
        }
    }
    $ac = "u";
}

//deleting data
if (isset($_GET['action']) && $_GET['action'] == "d") {
    $action = $_GET['action'];
    $slider_id = $_GET['slider_id'];
    $query = deleteData("tbl_slider", "slider_id = $slider_id");
    $result = $mydb->query($query);
    if ($result) {
        $message = "Successfully delete";
    } else {
        $message = "Failed to delete data";
    }
    // header("location:index.php?content=view-book");
}

//inserting data
if (isset($_POST['ac']) && $_POST['ac'] == 'i') {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_FILES['img'])) {
            $img = $_FILES['img'];
            move_uploaded_file($img['tmp_name'], "../slider/" . $img['name']) or die("Fail to upload");
            $slider_path = "slider/" . $img['name'];
        }
    }
    $query = insertData("slider_path", "tbl_slider", "'$slider_path'");
    $result = $mydb->query($query);
    if ($result) {
        $message = "Insert successful";
    } else {
        $message = "Error inserting data";
    }
}

?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-9 ml-auto mt-5">
            <div class="row">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ac" value="<?=$ac?>">
                        <?php if (isset($_GET['action']) == "u") {?>
                            <input type="hidden" name="update" value="<?=$action?>">
                        <?php }?>
                    <div class="col-lg-3">
                        <div class="form-group">
                                <label for="img">Img</label>
                                <input type="file" name="img" accept=".png,.jpg">
                        </div>
                        <div class="form-group">
                        <input type="submit" name="submit" value="<?=$submit_type?>" id="submit" class="form-control text-white p-2 bg-success">
                    </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                                <?php

$query = "SELECT * from tbl_slider";
$result = $mydb->query($query);
while ($rows = $result->fetch_object()) {

    ?>
                            <div class="col-lg-8">
                                <div style="max-width: 600px">
                                    <img class="img-thumbnail mx-auto d-block" src="../<?=$rows->slider_path?>">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="col-lg-12">
                                <a href="?content=slideshow&slider_id=<?=$rows->slider_id . "&action=u"?>" class=" btn btn-sm btn-success form-control mb-2" name="update"><i class="fas fa-edit"></i></a>
                                </div>
                                <div class="col-lg-12">
                                <a href="?content=slideshow&slider_id=<?=$rows->slider_id . "&action=d"?>" class="btn btn-sm btn-danger form-control" name="delete"><i>&times;</i></a>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>