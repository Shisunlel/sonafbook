<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$table = "view_bookgenre";
$query = selectTable("*", $table) . " where book_id= $id";
$result = $mydb->query($query);
if ($row = $result->fetch_array()) {
    $title = $row['book_title'] . " : " . $row['book_author'];
    ?>
  <!--Content-->
  <!--BreadCrump-->
  <div class="container-fluid border">
    <ul class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#" class="text-muted"><?=$row['book_author']?></a>
      </li>
      <li class="breadcrumb-item">
        <a href="?content=product-category&genre=<?=$row['genre_code']?>" class="text-muted" target="_blank"><?=$row['genre_code']?></a>
      </li>
    </ul>
  </div>
  <div class="container-fluid detail border">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-9 ml-2 px-2 py-2">
            <div class="row">
              <div class="col-lg-4">
                <img src="<?=$row['img']?>" class="img-fluid" alt="" />
              </div>
              <div class="col-lg-8">
                <div class="title">
                  <h4>
                    <strong><?=$row['book_title']?></strong>
                  </h4>
                </div>
                <div class="author">
                  Author:
                  <a href="https://en.wikipedia.org/wiki/<?=str_replace(' ', '_', $row['book_author'])?>" target="_blank">
                    <?=$row['book_author']?></a>
                </div>
                <div class=" rating">
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
                </div>
                <div class="share d-flex d-none d-lg-block mt-4">
                  <ul class="d-lg-inline-flex list-unstyled">
                    <li class="mr-5">Share</li>
                    <li>
                      <a href="#" class="fab fa-facebook fa-lg mr-5"></a>
                    </li>
                    <li>
                      <a href="#" class="fab fa-twitter fa-lg mr-5"></a>
                    </li>
                    <li>
                      <a href="#" class="fab fa-reddit fa-lg" id="reddit"></a>
                    </li>
                  </ul>
                </div>
                <div class="book-info">
                  <p>
                    __________________________________________________________
                  </p>
                  <p>
                    <?=$row['description']?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row mx-auto my-auto">
            <div class="col-lg-12 py-2 px-2 mt-2 ml-3">
              <div class="price">
                <span class="sell-price text-primary display-4 mr-1">$<?=$row['sell_price']?></span>
                <span class="original-price"><del><?php if ($row['isDiscount'] == 'Y') {?><del><?=$row['original_price']?></del></del></span>
              </div>
              <div class="save mx-1">
                <span>You saved <em><?="$" . ($row['original_price'] - $row['sell_price'])?></em></span><?php }?>
              </div>
              <div class="cart">
                <button class="btn btn-primary btn-block mt-5" type="button">
                  Add to Cart
                </button>
                <button class="btn btn-muted btn-block mt-3" type="button">
                  Add to Wishlist
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Recommendation -->
  <h4 class="mt-2 text-center">People who bought this also bought</h4>
  <div class="container-fluid">
    <div class="row">
      <div class="card-deck">
        <?php
$genre = $_GET['genre'];
    $query = selectTable("*", $table) . " where genre_code = '$genre' and book_id!=$id order by rand() limit 4";
    $result = $mydb->query($query);
    while ($row = $result->fetch_array()) {
        ?>
          <!--Deck One-->
          <div class="col-md-3">
            <div class="card bg-light">
              <a href="?content=product-detail&genre=<?=$row['genre_code']?>&id=<?=$row['book_id']?>">
                <img src="<?=$row['img']?>" alt="" class="card-img-top img-thumbnail" /></a>
              <div class="card-body text-center">
                <h4 class="card-title"><?=$row['book_title']?></h4>
                <div>
                  <p class="card-text"><?=$row['book_author']?></p>
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
                <p class="card-text text-primary">$<?=$row['sell_price']?></p>
                <a href="#" class="btn btn-info">Add to Cart</a>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
  <!-- Review -->
  <div class="container-fluid mt-2">
    <div class="row">
      <div class="col-lg-12">
        <h4>Review</h4>
        <div class="input-group">
          <textarea name="review" id="" class="form-control" rows="5" placeholder="What would you tell others about your experience ?"></textarea>
          <div class="input-group-append">
            <input class="input-group-append bg-success text-light" type="submit" value="Submit" />
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>