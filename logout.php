<?php

session_start();
setcookie("email");
setcookie("pass");
unset($_COOKIE['email']);
unset($_COOKIE['pass']);
unset($_SESSION);
session_destroy();
header('location:https://www.esqap.com');

?>