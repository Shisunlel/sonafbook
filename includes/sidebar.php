<div class="container-fluid">
    <div class="row mt-1 mr-md-5">
        <!--Sidebar-->
        <div class="col-lg-3 bg-light text-center d-none d-lg-block mx-auto mb-auto">
            <div class="bg-white border py-2">
                <h5>Bored at home? Check this out.</h5>
                <a href="#" target="_blank"><img src="img/bored.jpg" alt="check dr stone out" class="img-fluid" /></a>
            </div>
            <div class="bg-white border mt-3 py-2">
                <h5>Learn at home</h5>
                <a href="#" target="_blank">
                    <img src="img/learn.jpg" alt="e-learning" class="img-fluid" />
                </a>
            </div>
            <div class="bg-white border mt-3 py-2">
                <h5><strong>Best of Dr. Stone</strong></h5>
                <ul class="list-unstyled">
                    <?php
                    $table = "view_bookgenre";
                    $query = selectTable("*", $table) . " where book_title like 'dr. stone%'";
                    $result = $mydb->query($query);
                    while ($row = $result->fetch_array()) {
                    ?>
                        <li class="nav-item">
                            <a href="?content=product-detail&genre=<?= $row['genre_code'] ?>&id=<?= $row['book_id'] ?>" class="nav-link text-info"><?= $row['book_title'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="bg-white border mt-3 py-2">
                <h5>For the weebs!</h5>
                <a href="#" target="_blank">
                    <img src="img/weebs.jpg" alt="weeb store" class="img-fluid" />
                </a>
            </div>
        </div>
        <!--End of Sidebar-->