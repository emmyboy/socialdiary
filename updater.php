<?php
// Inialize session
session_start();
// Include database connection settings
require_once 'db.php';
$db = new db();
$con = $db->getConnection();

//Verify newly registered email has not been registered yet
//$reg = mysql_query("select * from userdb where email = '" . mysql_real_escape_string($_SESSION['Email']) . "'");
$reg = mysql_query("SELECT * FROM userdb WHERE (email  = '" . mysql_real_escape_string($_SESSION['Email']) . "')");
if (mysql_num_rows($reg) == 1) {
   	
   $firstName=$_POST['firstname'];
   $lastName=$_POST['lastname'];
   $bday=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
   $telep=$_POST['phone'];
   $gen=$_POST['gender'];
   $upd = mysql_query("UPDATE userdb SET firstname='".$firstName."',lastname='".$lastName."',birthdate='".$bday."',phone='".$telep."',gender='".$gen."' WHERE email = '".mysql_real_escape_string($_SESSION['Email'])."'");
   if ($upd) {
	echo "success";
	header('Location: Userlogin.php');	
   } else {
	echo "error";
	header('Location: register.html');
   }
}
else {
   echo "This user does not exist";
   header('Location: index.html');
}
// Retrieve username and password from database according to user's input
//$login = mysql_query("SELECT * FROM logindb WHERE (email  = '" . mysql_real_escape_string($_POST['Email']) . "') and (password = '" . mysql_real_escape_string($_POST['Password']) . "')");

mysql_close($con);
?>
