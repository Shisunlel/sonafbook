<?php
$table = "";
$page_id = "";
$page_title = "";
$page_content = "";
$date_created = "";
$date_modified = "";
$ac = "i";
$submit_type = "Submit";
$message = "";

//deleting data
if (isset($_GET['action']) && $_GET['action'] == "d") {
    $action = $_GET['action'];
    $page_id = $_GET['page_id'];
    $query = deleteData("tbl_pages", "page_id = $page_id");
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
    $page_title = trim($mydb->real_escape_string($_POST['page_title']));
    $page_content = trim($mydb->real_escape_string($_POST['page_content']));
    $query = insertData("page_title,page_content,date_created,date_modified", "tbl_pages", "'$page_title','$page_content',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP");
    $result = $mydb->query($query);
    if ($result) {
        $message = "Insert successful";
    } else {
        $message = "Error inserting data";
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9 ml-auto mt-5">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="ac" value="<?=$ac?>">
                <div class="form-group mt-5">
                    <p><?=$message?></p>
                    <label for="page_title">Title</label>
                    <input class="form-control" type="text" name="page_title" id="page_title" value="<?=$page_title?>">
                </div>
                <div class="form-group">
                    <label for="description">Content</label>
                    <textarea name="page_content" id="editor" class="form-control" value="<?=$page_content?>"><?=$page_content?></textarea>
                </div>
                <div class="container">
                        <input type="submit" name="submit" value="<?=$submit_type?>" id="submit" class="form-control text-white p-2 bg-success">
                    </div>
            </form>
        </div>
    </div>
</div>