<?php
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['username'] == "admin") {
        session_unset();
        session_destroy();
        header("location: login.php");
    }
    if ($_SESSION['username'] == "darwin") {
        session_unset();
        session_destroy();
        header("location: ../index.php");
    }
} else {
    header("location: ../index.php");
}
