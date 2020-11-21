<?php
$table = "";
$book_id = "";
$book_title = "";
$unit_price = "";
$original_price = "";
$sell_price = "";
$book_author = "";
$qty_inStock = "";
$rating = "";
$img = "";
$imgdir = "";
$isDiscount = "";
$description = "";
$genre_id = "";
$ac = "i";
$submit_type = "Submit";
$message = "";
//updating data
if (isset($_GET['action']) && $_GET['action'] == "u") {
    $action = $_GET['action'];
    $book_id = $_GET['book_id'];
    $query = selectTable("*", "tbl_book") . " where book_id = $book_id";
    $result = $mydb->query($query);
    $row = $result->fetch_array();
    $submit_type = "Update";
    include "fetchBook.php";
    if (isset($_POST['update'])) {
        include "postUpdateBook.php";
        $query = "update tbl_book set book_title='$book_title',unit_price=$unit_price,original_price=$original_price,sell_price=$sell_price,book_author='$book_author',qty_inStock=$qty_inStock,rating=$rating,img='$imgdir',isDiscount='$isDiscount',description='$description',genre_id=$genre_id where book_id = $book_id";
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
    $book_id = $_GET['book_id'];
    $query = deleteData("tbl_book", "book_id = $book_id");
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
    include "postInsertBook.php";
    $query = insertData("book_title,unit_price,original_price,sell_price,book_author,qty_inStock,rating,img,isDiscount,description,genre_id", "tbl_book", "'$book_title',$unit_price,$original_price,$sell_price,'$book_author',$qty_inStock,$rating,'$imgdir','$isDiscount','$description',$genre_id");
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
        <div class="col-lg-9 ml-auto">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="ac" value="<?=$ac?>">
                <?php if (isset($_GET['action']) == "u") {?>
                    <input type="hidden" name="update" value="<?=$action?>">
                <?php }?>
                <div class="form-group">
                    <p><?=$message?></p>
                    <label for="book_title">Title</label>
                    <input class="form-control" type="text" name="book_title" id="book_title" value="<?=$book_title?>">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" value="<?=$description?>"><?=$description?></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="unit_price">Unit Price</label>
                            <input type="text" class="form-control" name="unit_price" id="unit_price" value="<?=$unit_price?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="original_price">Original Price</label>
                            <input type="text" class="form-control" name="original_price" id="original_price" value="<?=$original_price?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="sell_price">Sell Price</label>
                            <input type="text" class="form-control" name="sell_price" id="sell_price" value="<?=$sell_price?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="book_author">Author</label>
                            <input type="text" class="form-control" name="book_author" id="book_author" value="<?=$book_author?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="qty_inStock">Qty</label>
                            <input type="number" class="form-control" name="qty_inStock" id="qty_inStock" value="<?=$qty_inStock?>" min="1" max="50"">
                        </div>
                    </div>
                        <div class=" col-lg-4">
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <input type="number" class="form-control" name="rating" id="rating" value="<?=$rating?>" min="0.5" max="5" step="0.5">
                            </div>
                        </div>
                        <div class=" col-lg-4">
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <select class="form-control" name="discount" id="discount">
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                        </div>
                        <div class=" col-lg-4">
                            <div class="form-group">
                                <label for="img">Img</label>
                                <input type="file" name="img" accept=".png,.jpg">
                            </div>
                        </div>
                        <div class=" col-lg-4">
                            <div class="form-group">
                                <label for="book_genre">Genre</label>
                                <select class="form-control" name="book_genre" id="book_genre">
                                    <?php
$table = "tbl_genre";
$query = selectTable("*", $table);
$result = $mydb->query($query);
while ($row = $result->fetch_array()) {
    ?>
                                        <option value="<?=$row['genre_id']?>" <?php if ($genre_id == $row['genre_id']) {
        echo "selected";
    }

    ?>> <?=$row['genre_code']?>
                                        </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <input type="submit" name="submit" value="<?=$submit_type?>" id="submit" class="form-control text-white p-2 bg-success">
                    </div>
            </form>
        </div>
    </div>
</div>