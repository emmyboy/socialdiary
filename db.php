<?php

require_once 'dbconfig.php';

class db 
{

	public function getConnection()
	{
		$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		mysqli_connect_error();
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db(DB_NAME, $con);
		return $con;
		
	}

}
