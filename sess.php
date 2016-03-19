<?php
if (isset($_POST["name"])) {
    session_start();
    $_SESSION['user_name'] = $_POST["name"];
} else {
    session_start();
    //unset($_SESSION['user_name']);
    echo $_SESSION['user_name'];
}
?>