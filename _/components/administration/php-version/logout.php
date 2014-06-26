<?php 
header('cache-control: no-cache,no-store,must-revalidate'); // HTTP 1.1.
header('pragma: no-cache'); // HTTP 1.0.
header('expires: 0'); // Proxies.
session_start();
$_SESSION = array();
//you can remove a single variable in the session 
session_destroy();
header("location:../../../../administration/login.php");
?>