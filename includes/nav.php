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
                <img src="img/sonafbook_text.png" alt="<?=$_SERVER['PHP_SELF']?>" width="100" class="mx-auto d-block" />
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
                <?php if (isset($_SESSION['log_name']) && isset($_COOKIE['username'])) {?>
                <li class="nav-item">
                  <a href="?content=wishlist" class="nav-link text-white"><i class="far fa-heart fa-lg text-white mr-0 mr-md-2"></i>Wishlist</a>
                </li>
<?php }?>
                <!--show if login hide if not log-->
                <?php if (isset($_SESSION['log_name'])) {?>
                <li class="nav-item">
<<<<<<< Updated upstream
                  <a href="?content=cart" class="nav-link text-white"><i class="fas fa-shopping-cart text-white mr-0 mr-md-2"></i>Cart</a>
=======
                  <a href="?content=cart" class="nav-link text-white">
                    <i class="fas fa-shopping-cart text-white mr-0 mr-md-2"></i>Cart
                    <sub><span class="badge badge-pill badge-danger z-depth-1 mr-2">
                      <?php if (isset($_SESSION['cartcount'])) {
    echo $_SESSION["cartcount"];
}
    ?>
                    </span></sub>
                  </a>
>>>>>>> Stashed changes
                </li>
<?php }?>
<?php if (!isset($_SESSION['log_name'])) {?>
                <li class="nav-item">
                  <a href="" class="nav-link text-white" data-toggle="modal" data-target="#signup">
                    <i class="fas fa-user fa-lg text-white mr-2"></i>Sign in/Join
                  </a>
                </li>
<?php }?>
                <!-- show if login hide if not log -->
                <?php if (isset($_SESSION['log_name'])) {?>
                <li class="nav-item ml-md-auto">
                  <a href="" class="nav-link" data-toggle="modal" data-target="#signout"><i class="fas fa-sign-out-alt fa-lg text-danger"></i></a>
                </li>
                <?php }?>
              </ul>
            </div>
            <!--Dropdown-->
            <div class="container-fluid d-none d-md-block">
              <div class="row">
                <div class="col-lg-12 d-flex justify-content-around">
                  <ul class="navbar-nav">
                    <?php
$table = "tbl_genre";
$query = selectTable('*', $table);
$result = $mydb->query($query);
while ($row = $result->fetch_array()) {
    ?>
                      <li class="nav-item">
                        <a href="?content=product-category&genre=<?=$row['genre_code']?>" class="nav-link text-light"><?=$row['genre_code']?></a>
                      </li>
                    <?php }?>
                  </ul>
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
            <form action="?login.php">
            <input type="submit" class="btn btn-danger"  value="Logout" name="log_out">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--End of Modal-->
    <!--Sign in or Sign up modal-->
    <div class="modal fade" id="signup">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="row">
        <div class="col-lg-6">
      <form method="post" action="?login">
          <div class="modal-header">
            <h4 class="modal-title">Join our journey!</h4>
          </div>
          <div class="modal-body">
            <input type="text" name="sign_name"
            id="sign_name" class="form-control" value="" placeholder="Enter your username..." />
            <p id="valid_user" class="none">Username is available</p>
            <p id="invalid_user" class="none">Username is not available</p>
            <input type="email" name="sign_email"
            id="sign_email" class="form-control my-2" value="" placeholder="Enter your email address..." />
            <p id="valid_email" class="none">Email is valid</p>
            <p id="invalid_email" class="none">Invalid email address</p>
            <input type="password" name="sign_pass" class="form-control pwd_container my-2" id="sign_pass" value="" placeholder="Create a password..." />
            <input type="password" name="resign_pass" class="form-control pwd_container  my-2" id="resign_pass" value="" placeholder="Re-enter your password..." />
            <p id="invalid_pwd" class="none">Password requirement does not met or Password does not match</p>
            <p>
              <i class="fas fa-info-circle mr-2"></i>Passwords must be strong password and 8 characters long.
            </p>
            <span class="custom-control custom-checkbox">
            <input type="checkbox" class="mr-2 custom-control-input" name="chk_pwd" id="chk_pwd" autocomplete="off">
           <label class="custom-control-label" for="chk_pwd">Show Password</label>
          </span>
          </div>
          <div class="modal-footer">
            <input type="submit" id="sign_up" class="btn btn-info" name="sign_up" value="Create an account">
          </div>
</form>
        </div>
        <?php if (!isset($_SESSION['log_in'])) {?>
        <div style="min-height:100%;border-left:2px solid rgba(195,195,195,0.5);"></div>
        <div class="col-lg-5">
      <form method="post" action="?login">
          <div class="modal-header">
            <h4 class="modal-title">Sign In</h4>
            <button class="close btn" data-dismiss="modal" type="button">
              &times;
            </button>
          </div>
          <div class="modal-body">
            <input type="text" class="form-control"
            name="log_name" id="log_name" value="" placeholder="Enter your username or email address..." />
            <input type="password" id="log_pass"
            name="log_pass" class="form-control my-2" value="" placeholder="Enter your password..." />
            <span class="custom-control custom-checkbox">
            <input type="checkbox" class="mr-2 custom-control-input" name="chk_pwd2" id="chk_pwd2" autocomplete="off">
           <label class="custom-control-label" for="chk_pwd2">Show Password</label>
          </span>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-info" name="log_in" value="Log In">
            <button class="btn btn-danger" type="button" data-dismiss="modal">
              Cancel
            </button>
          </div>
</form>
        </div>
        <?php }?>
      </div>
</div>
</div>
    </div>
    <!--End of Modal-->