<?php
session_start();
$msg = "";
require_once "dbconfig.php";
if (isset($_POST['login'])) {
    $username = $mydb->real_escape_string(trim($_POST['username']));
    $password = $_POST['password'];
    $query = "select * from tbl_users where user_name = '$username' and user_password= md5('$password')";
    $result = $mydb->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
        $_SESSION['username'] = $row->user_name;
        if (!empty($_POST['checkbox'])) {
            setcookie("username", $username, time() + 60 * 60, "/", "", 1);
        } else {
            if (isset($_COOKIE['username'])) {
                setcookie("username", "", time() - 60 * 60, "/", "", 1);
            }
            if (isset($_COOKIE['password'])) {
                setcookie("password", "", time() - 60 * 60, "/", "", 1);
            }
        }
        if ($_SESSION['username'] == 'admin') {
            header("location: index.php");
        } else {
            header("location: ../index.php");
        }
    } else {
        $msg = "Invalid username or password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container" style="width:500px">

        <form action="login.php" method="post">
            <img src="../img/sonafbook.png" alt="icon" class="mx-auto d-block img-fluid">
            <div class=" form-group">
                <label for="username">Username</label>
                <input class="form-control <?php if ($msg != "") {
    echo "border-danger";
}
?> " type="text" name="username" id="username" value="<?php if (isset($_COOKIE['username'])) {
    echo $_COOKIE['username'];
}?>" require oninput="error();">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control <?php if ($msg != "") {
    echo "border-danger";
}
?>" type="password" name="password" id="password" value="<?php if (isset($_SESSION['password'])) {
    echo $_SESSION['password'];
}?>" autocomplete="off" require oninput="error();">
                <p id="error" class="lead text-danger"><?=$msg?></p>
            </div>
            <div class="custom-control custom-checkbox d-flex justify-content-between">
                <input class="custom-control-input" type="checkbox" <?php if (isset($_COOKIE['username'])) {?> checked <?php }?> name="checkbox" id="checkbox">
                <label for="checkbox" class="custom-control-label">Remember me</label>
                <button type="submit" name="login" class="col-5 form-control btn btn-primary">Login</button>
            </div>
    </div>
    </form>
    <script>
        function error() {
            document.querySelector("#error").style.display = "none";
            document.querySelector("#username").style.border = "none";
            document.querySelector("#password").style.border = "none";
        }
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>