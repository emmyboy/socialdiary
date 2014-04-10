<?php


 require_once 'db.php';
	 $Firstname = $_POST['FirstName'];
	 $LastName = $_POST['LastName'];
	 $Email=$_POST['Email'];
	 $Password=$_POST['Password'];
	 $DOB=$_POST['DOB'];
	 $GenderChosen=$_POST['GenderChosen'];
	 $today=date("Y-m-d H:i:s"); 
	
	 $db = new db();
	 $con = $db->getConnection();
	 $query="INSERT INTO social_diary_user(FirstName,LastName,Email,User_Password,DOB,Gender,SignupDate)
	 VALUES ('$Firstname','$LastName','$Email','$Password','$DOB','$GenderChosen','$today')";

	 $result = mysql_query($query);
	 //error_log($result,1,"hello","hi");
	 
		if (!$result) {
			echo "error";
		} else {
			echo "success";
		}
	 mysql_close($con);
?>