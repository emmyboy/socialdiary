<?php
// Inialize session
session_start();
// Include database connection settings
require_once 'db.php';
$db = new db();
$con = $db->getConnection();

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM social_diary_user WHERE (Email  = '" . mysql_real_escape_string($_POST['Email']) . "') and (User_Password = '" . mysql_real_escape_string($_POST['Password']) . "')");

// Check username and password match
	if (mysql_num_rows($login) == 1) {
		$_SESSION['Email'] = $_POST['Email'];  // Set username session variable
			header('Location: Userlogin.html');  // Jump to user login page
	}
	else {
		echo "Wrong Username or Password"; 
		header('Location: index.html');  // Jump to home page
	}

?>
