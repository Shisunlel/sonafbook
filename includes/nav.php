    <!--Start of Nav-->
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">
        &times;
      </button>
      <strong>STAY AT HOME DO NOT GO ANYWHERE UNLESS IT'S NECCESSARY. DON'T FORGET TO
        TAKE CARE OF YOURSELF AND BE AWARE!! #StayHome</strong>
    </div>
    <nav class="navbar navbar-expand-md navbar-light bg-dark">
      <button class="navbar-toggler ml-auto bg-light mb-2" type="button" data-toggle="collapse" data-target="#mynavBar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavBar">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-md-2">
              <a href="<?=$_SERVER['PHP_SELF']?>" class="navbar-brand">
                <img src="img/sonafbook_text.png" alt="<?= $_SERVER['PHP_SELF'] ?>" width="100" class="mx-auto d-block" />
              </a>
            </div>
            <div class="col-md-6">
              <form method="post" action="./">
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search..." id="" />
                  <button type="submit" class="btn btn-white">
                    <i class="fas fa-search text-danger"></i>
                  </button>
                </div>
              </form>
            </div>
            <div class="col-md-4">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="#" class="nav-link text-white"><i class="far fa-heart fa-lg text-white mr-0 mr-md-2"></i>Wishlist</a>
                </li>
                <!--show if login hide if not log-->
                <li class="nav-item">
                  <a href="?content=cart" class="nav-link text-white"><i class="fas fa-shopping-cart text-white mr-0 mr-md-2"></i>Cart</a>
                </li>
                <li href="#" class="nav-item">
                  <a href="#" class="nav-link text-white" data-toggle="modal" data-target="#signup">
                    <i class="fas fa-user fa-lg text-white mr-2"></i>Sign in/Join
                  </a>
                </li>
                <!-- show if login hide if not log -->
                <li class="nav-item ml-md-auto">
                  <a href="#" class="nav-link" data-toggle="modal" data-target="#signout"><i class="fas fa-sign-out-alt fa-lg text-danger"></i></a>
                </li>
              </ul>
            </div>
            <!--Dropdown-->
            <div class="container-fluid d-none d-md-block">
              <div class="row">
                <div class="col-lg-12 d-flex justify-content-around">
                  <ul class="navbar-nav"><?php
                  $table = "tbl_genre";
                  $query = selectTable('*', $table);
                  $result = $mydb->query($query);
                  while ($row = $result->fetch_array()){ ?><li class="nav-item">
                        <a href="?content=product-category&genre=<?= $row['genre_code'] ?>" class="nav-link text-light"><?= $row['genre_code'] ?></a>
                    </li><?php }?></ul>
                </div>
              </div>
            </div>
            <!--End of dropdown-->
          </div>
        </div>
      </div>
      <!--End of Topnav-->
    </nav>
    <!--Modal-->
    <div class="modal fade" id="signout">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Why won't you stay here longer?</h4>
            <button class="close btn" data-dismiss="modal" type="button">
              &times;
            </button>
          </div>
          <div class="modal-body">
            <p>Press logout to leave...</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" data-dismiss="modal">
              Stay Here
            </button>
            <a href="admin/logout.php" class="btn btn-danger" type="button">
              Logout
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--End of Modal-->
    <!--Modal-->
    <div class="modal fade" id="signup">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Thanks for joining us!</h4>
            <button class="close btn" data-dismiss="modal" type="button">
              &times;
            </button>
          </div>
          <div class="modal-body">
            <input type="text" class="form-control" value="" placeholder="Name..." />
            <input type="text" class="form-control my-2" value="" placeholder="Your email address..." />
            <input type="text" class="form-control my-2" value="" placeholder="Create a password..." />
            <p>
              <i class="fas fa-info-circle mr-2"></i>Passwords must be at least 6
              characters.
            </p>
            <p><i class="fas fa-check-square fa-lg mr-2"></i>Show Password</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info" type="button" data-dismiss="modal">
              Create your account
            </button>
            <button class="btn btn-danger" type="button" data-dismiss="modal">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
    <!--End of Modal-->