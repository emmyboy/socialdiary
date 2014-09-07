<?php
// Inialize session
session_start();
// Include database connection settings
require_once 'db.php';
$db = new db();
$con = $db->getConnection();

//Verify newly registered email has not been registered yet
//$reg = mysql_query("select * from userdb where email = '" . mysql_real_escape_string($_SESSION['Email']) . "'");
$add = mysql_query("insert into entrydb (email,entry) VALUES ('".mysql_real_escape_string($_SESSION['Email'])."', '".mysql_real_escape_string($_POST['Entry'])."')");
   if ($add) {
	echo "success";
	header('Location: Userlogin.php');	
   } else {
	echo "something went wrong";
	header('Location: error.html');
   }

// Retrieve username and password from database according to user's input
//$login = mysql_query("SELECT * FROM logindb WHERE (email  = '" . mysql_real_escape_string($_POST['Email']) . "') and (password = '" . mysql_real_escape_string($_POST['Password']) . "')");

mysql_close($con);
?>
