<?php 

session_start();  
unset($_SESSION['active_user']);
session_destroy();
header("Location:../../visitors/views/authorize.php");
exit; 