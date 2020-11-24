<?php
if (isset($_POST['log_in'])) {
    $log_name = $_POST['log_name'];
    $log_pass = $_POST['log_pass'];
    $query = selectTable('*', 'tbl_customers') . " where cus_name = '$log_name' or cus_email = '$log_name' and cus_pwd= md5('$log_pass')";
    $result = $mydb->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
        session_start();
        $_SESSION['log_name'] = $row->cus_name;
        $last_login = date('d-m-Y H:i:s', time());
        setcookie("login", $log_name, time() + 1 * 60 * 60 * 24 * 30, "/", "", 1);
        setcookie("last_login", $last_login, $last_login + (time() + 1 * 60 * 60 * 24 * 30), "/", "", 1);
        header('location: index.php');
    } else {
        header('location: index.php');
    }
}

if (isset($_POST['sign_up'])) {
    echo "sign_up";
    $sign_name = $mydb->real_escape_string(trim($_POST['sign_name']));
    $sign_email = $_POST['sign_email'];
    $sign_pass = $_POST['sign_pass'];
    $query = "INSERT INTO tbl_customers VALUES('','$sign_name',md5('$sign_pass'),'$sign_email')";
    $result = $mydb->query($query);
    if ($result) {
        header('location: login.php');
    } else {
        echo "Error signing up";
    }
}

// if (!isset($_POST['log_in'])) {
//     header('location: index.php');
// }

if (isset($_GET['log_out'])) {
    session_unset();
    session_destroy();
}
