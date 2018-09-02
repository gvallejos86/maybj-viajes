<?php

session_start();
setcookie('id', '', time() - 3600); //send browser command remove sid from cookie
/*unset($_COOKIE['id']);
unset($_SESSION['id']);*/
session_destroy(); //remove sid-login from server storage
//session_write_close();
header('location:login.php');

?>
