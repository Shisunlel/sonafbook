<?php
$table = "view_bookgenre";
$query = selectTable("book_id,book_title,original_price,sell_price,book_author,qty_inStock,rating,description,genre_code", $table) . " order by book_id";
$result = $mydb->query($query);
?>
<div class="container-fluid mt-5 p-5">
    <div class="row">
        <div class="col-lg-9 ml-auto">
            <table class="table table-dark table-striped table-bordered table-hover text-center">
                <thead class="light">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Original Price</th>
                        <th>Sell Price</th>
                        <th>Author</th>
                        <th>Qty</th>
                        <th>Rating</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_array()) {?>
                        <tr>
                            <td><?=$row['book_id']?></td>
                            <td><?=$row['book_title']?></td>
                            <td>$<?=$row['original_price']?></td>
                            <td>$<?=$row['sell_price']?></td>
                            <td><?=$row['book_author']?></td>
                            <td><?=$row['qty_inStock']?></td>
                            <td><?=substr($row['description'], 0, 125)?></td>
                            <td><?=$row['genre_code']?></td>
                            <td class="d-flex flex-column">
                                <a href="?content=add-book&book_id=<?=$row['book_id'] . "&action=u"?>" class=" btn btn-sm btn-success mb-2" name="update"><i class="fas fa-edit"></i></a>
                                <a href="?content=add-book&book_id=<?=$row['book_id'] . "&action=d"?>" class="btn btn-sm btn-danger" name="delete"><i>&times;</i></a>
                            </td>
        </div>
        </tr>
    <?php }?>
    </tbody>
    </table>
    </div>
</div>
</div>