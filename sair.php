<?php 

unset($_SESSION['user_name']);
unset($_SESSION['user_last_name']);
unset($_SESSION['user_mail']);
unset($_SESSION['user_status']);
unset($_SESSION['user_type']);
session_start();
session_destroy();
header("Location: login");


 ?>