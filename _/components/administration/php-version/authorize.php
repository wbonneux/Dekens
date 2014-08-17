<?php
session_start();
require_once('../../../../_/components/php/include_dao.php');

// Connect to server and select databse.


// username and password sent from form 
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
// $myusername = mysqli_real_escape_string($myusername);
// $mypassword = mysqli_real_escape_string($mypassword);

$result = DAOFactory::getUserDAO()->getUserByUsernamePassword($myusername, $mypassword);

// Mysql_num_row is counting table row


// If result matched $myusername and $mypassword, table row must be 1 row
if($result){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['myusername']=$myusername;
$_SESSION['mypassword']=$mypassword;

header("location:../../../../administration/index.php");
}
else {
echo "Wrong Username or Password";
}
?>