<?php
// Inialize session
session_start();
// Include database connection settings
require_once 'db.php';
$db = new db();
$con = $db->getConnection();

//Verify newly registered email has not been registered yet
$latest = mysql_query("select email from logindb ORDER BY userid DESC LIMIT 1");
$email = mysql_result($latest,0);
$reg = mysql_query("select * from userdb where email = '$email'");
if (mysql_num_rows($reg) == 0) {
   	
   $firstName=$_POST['firstname'];
   $lastName=$_POST['lastname'];
   $bday=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
   $telep=$_POST['phone'];
   $gen=$_POST['gender'];
   $upd = mysql_query("INSERT INTO userdb(email,firstname,lastname,birthdate,phone,gender) VALUES ('$email','$firstName','$lastName','$bday','$telep','$gen')");
   if (!$upd) {
	echo "error";
	header('Location: register.html');	
   } else {
	echo "success";
	$_SESSION['Email']=$email;
	header('Location: terms.html');
   }
}
else {
   echo "This email is already registered";
   header('Location: index.html');
}
// Retrieve username and password from database according to user's input
//$login = mysql_query("SELECT * FROM logindb WHERE (email  = '" . mysql_real_escape_string($_POST['Email']) . "') and (password = '" . mysql_real_escape_string($_POST['Password']) . "')");

mysql_close($con);
?>
