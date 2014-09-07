<?php

require_once 'db.php';
$db = new db();
$con = $db->getConnection();

	 $userName = $_POST['UserName'];
	 $eMail=$_POST['Email'];
	 $passWord=$_POST['Password'];
	
	 $query="INSERT INTO logindb(username,email,password) VALUES ('$userName','$eMail','$passWord')";

	//print "Welcome username!";

	 $result = mysql_query($query);
	 //error_log($result,1,"hello","hi");
	 
		if (!$result) {
			echo "error";
		} else {
			echo "success";
		}
	 mysql_close($con);
?>
