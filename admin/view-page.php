<div class="container-fluid">
    <div class="row mt-5 p-5">
        <div class="col-lg-9 ml-auto">
            <div class="row">
                <div class="col-lg-3 border rounded">
                    <?php

$query = "select * from tbl_pages";
$result = $mydb->query($query);
$num_rows = $result->num_rows;
for ($i = 1; $i <= $num_rows; $i++) {
    $rows = $result->fetch_object();
    ?>
                    <h3><a href="?content=view-page&page_id=<?=$rows->page_id?>"><?=$rows->page_title?></a></h3>
                    <?php }?>
                </div>
                <div class="col-lg-9">
                    <?php
if (isset($_GET['page_id'])) {
    $page_id = $_GET['page_id'];
    $page_title = $page_content = "";
    if (!empty($page_id)) {
        $query = "select * from tbl_pages where page_id = $page_id";
        $result = $mydb->query($query);
        if ($result) {
            $row = $result->fetch_object();
            $page_title = $row->page_title;
            $page_content = $row->page_content;
        } else {
            die("error");
            exit;
        }
        ?>
                            <h3><?=$page_title?></h3>

                            <form action="" method="post">
                                <input type="hidden" name="page_id" value="<?=$page_id?>">
                                <div name="editor" id="editor" class="mb-2"><?=$page_content?></div>
                                <input class="form-control btn btn-success" type="submit" name="update" value="Update">
                            </form>
                            <a class="form-control btn btn-danger" href="?content=add-page&page_id=<?=$row->page_id . "&action=d"?>" class="btn btn-sm btn-danger" name="delete"><i>&times;</i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
}
if (isset($_POST['update'])) {
    $page_id = $_POST['page_id'];
    $page_content = $mydb->real_escape_string($_POST['editor']);
    $date = date("Y-m-d H:i:s");
    $query = "update tbl_pages set page_content='$page_content', date_modified='$date' where page_id=$page_id";
    $result = $mydb->query($query);
}?>