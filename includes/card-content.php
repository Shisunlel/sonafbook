<div class="col-sm-6 col-lg-3 mt-md-1 mt-lg-3">
    <div class="card bg-light">
        <a href="?content=product-detail&genre=<?= $row['genre_code'] ?>&id=<?= $row['book_id'] ?>">
            <img src="<?= $row['img'] ?>" alt="" class="card-img-top img-thumbnail img-fluid" /></a>
        <div class="card-body text-center">
            <h4 class="card-title"><?= $row['book_title'] ?></h4>
            <div>
                <p class="card-text"><?= $row['book_author'] ?></p>
            </div>
            <span class="card-text">
                <?php
                $rating = $row['rating'];
                for ($i = 0; $i < 5; $i++) {
                    if (floor($rating) - $i >= 1) {
                        echo "<i class='fas fa-star text-warning fa-sm'></i>";
                    } else if ($rating - $i > 0) {
                        echo "<i class='fas fa-star-half-alt text-warning fa-sm'></i>";
                    } else {
                        echo "<i class='far fa-star text-warning fa-sm'></i>";
                    }
                }
                ?>
            </span>
            <p class="card-text text-primary">
                $<?= $row['sell_price'] ?>
                <span class="text-muted small"><?php if ($row['isDiscount'] == 'Y') { ?><del><?= $row['original_price'] ?></del><?php } ?></span>
            </p>
            <a href="#" class="btn btn-info">Add to Cart</a>
        </div>
    </div>
</div>