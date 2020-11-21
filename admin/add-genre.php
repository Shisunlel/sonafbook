<?php
$genre_code = "";
$genre_full = "";
$ac = "i";
$submit_type = "Submit";
$message = "";
//updating data
if (isset($_GET['action']) && $_GET['action'] == "u") {
    $action = $_GET['action'];
    $genre_id = $_GET['genre_id'];
    $query = selectTable("*", "tbl_genre") . " where genre_id = $genre_id";
    $result = $mydb->query($query);
    $row = $result->fetch_array();
    $submit_type = "Update";
    $genre_code = $row['genre_code'];
    $genre_full = $row['genre_full'];
    if (isset($_POST['update'])) {
        $genre_code = $mydb->real_escape_string($_POST['genre_code']);
        $genre_full = $mydb->real_escape_string($_POST['genre_full']);
        $query = "update tbl_genre set genre_code='$book_title',genre_full='$genre_full' where genre_id = $genre_id";
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
    $genre_id = $_GET['genre_id'];
    $query = deleteData("tbl_genre", "genre_id = $genre_id");
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
    $genre_code = $_POST['genre_code'];
    $genre_full = $_POST['genre_full'];
    $query = insertData("genre_code,genre_full", "tbl_genre", "'$genre_code','$genre_full',");
    $result = $mydb->query($query);
    if ($result) {
        $message = "Insert successful";
    } else {
        $message = "Error inserting data";
    }
}
?>
<div class="container-fluid">
    <div class="row mt-5 pt-2">
        <div class="col-lg-3 ml-auto">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="ac" value="<?=$ac?>">
                <?php if (isset($_GET['action']) == "u") {?>
                    <input type="hidden" name="update" value="<?=$action?>">
                <?php }?>
                <div class="form-group">
                    <p><?=$message?></p>
                    <label for="genre_code">Genre Code</label>
                    <input class="form-control" type="text" name="genre_code" id="genre_code" value="<?=$genre_code?>">
                </div>
                <div class="form-group">
                    <label for="genre_full">Genre Full</label>
                    <input class="form-control" type="text" name="genre_full" value="<?=$genre_full?>"></input>
                </div>
                <div class="container">
                    <input type="submit" name="submit" value="<?=$submit_type?>" id="submit" class="form-control text-white p-2 bg-success">
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <?php
$query = selectTable("*", "tbl_genre");
$result = $mydb->query($query);
?>
            <table class="table table-dark table-striped table-bordered table-hover text-center">
                <thead class="light">
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Full</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_array()) {?>
                        <tr>
                            <td><?=$row['genre_id']?></td>
                            <td><?=$row['genre_code']?></td>
                            <td><?=$row['genre_full']?></td>
                            <td class="d-flex justify-content-around">
                                <a href="?content=add-genre&genre_id=<?=$row['genre_id'] . "&action=u"?>" class=" btn btn-default btn-success" name="update"><i class="fas fa-edit"></i></a>
                                <a href="?content=add-genre&genre_id=<?=$row['genre_id'] . "&action=d"?>" class="btn btn-default btn-danger" name="delete"><i>&times;</i></a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>