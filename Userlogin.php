<?php
// Inialize session
session_start();
// Include database connection settings
require_once 'db.php';
$db = new db();
$con = $db->getConnection();

// Retrieve user profile info from database according to user's input
$user = mysql_query("SELECT * FROM userdb WHERE (email  = '" . mysql_real_escape_string($_SESSION['Email']) . "')");

// Check username and password match
        if (mysql_num_rows($user) == 1) {
                $_SESSION['fname'] = mysql_result($user,0,1);  // Set username session variable
		if (mysql_result($user,0,5) == 'f') {
		    $promage = "logos/female.png";
		} else {
		    $promage = "logos/male.png";
		}

print '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script type=\'text/javascript\' src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<link rel="stylesheet" href="styles/mystyle.css"/>
		<!--<link rel="stylesheet" href="styles/Signup.css"/> -->
		<script type=\'text/javascript\' src="javascript/signup.js" ></script> 		
		<title>'.$_SESSION['fname'].' Logged In</title>
		<script type="text/javascript" >
	 	</script>
	</head>
	

<body>

	<div id="indexContainer">
	
		<div id="indexHeader">
			<div id ="Title">
				<h1>Social Diary</h1>
			</div>
			<div id="emailBox">
			Hi '.$_SESSION['fname'].'<img src='.$promage.'></img>
                        </div>
			<div id="passwordBox">
				<a href="logout.php">Logout</a>
			</div>
		</div>
      		
		<div id="indexBody">';
			
		//print_r ($_SESSION);
		//print '<h2>Welcome ' . mysql_result($user,0,1) . '! You have successfully logged In!!</h2>
		// Retrieve username and password from database according to user's input
	$entries = mysql_query("SELECT * FROM entrydb WHERE (email  = '" . mysql_real_escape_string($_SESSION['Email']) . "') ORDER BY entrydate DESC");

		print '<br><table align="center" width="800px" border="0" cellpadding="10px"><tr><td width=40% bgcolor=#7ADD1A>
		<form method="post" action="add_comment.php">
		<textarea name="Entry" rows="4" cols="40">Today I...</textarea>
		<p align=right><input type=submit value=POST size=30></input></p>
		</form>
		<br><img src=logos/female.png><tab><img src=logos/male.png><tab><img src=logos/female.png><tab><img src=logos/male.png>
		<br><img src=logos/bear.jpg><tab><img src=logos/female.png><tab><img src=logos/female.png>
		<p align=right><b>Pals</b> * <a href=friends.php>7</a></p>
		<br><b>Invite friends...</b><br>
		<form action=" " method=POST>
		<textarea name="palmail" rows="4" cols="40" placeholder="Enter emails, one per line, to send invite">
Enter emails (one per line) to invite
		</textarea><p align=right><input type=submit value=INVITE size=30></input></p>
		</form> 
		</td>

		<td style="border-left: 1px solid black;" width="60%" valign="top"><hr>';
                while ($Row = mysql_fetch_array ($entries)) {

			print ("<img src=\"logos/logo.gif\"><font color=black size=1 face=sans-serif>$Row[entrydate]</font><br>\n");
		        print ("<font color=green>$Row[entry]</font><hr>\n");
		}                
		print '<img src="logos/logo.gif"><font color=black size=1 face=sans-serif>Friday, May 09, 2014</font><br>
                <font color=green>Today I signed up for my very own social diary profile, I think I will thoroughly love this experience</font><hr>
		</td></tr></table>
		</div>
		<div id="indexFooter">
		
			<div id="navbar">
				
					<ul>
						<li><a href="#">ABOUT</a></li>
						<li><a href="#">SUPPORT</a></li>
						<li><a href="terms.html">TERMS</a></li>
						<li><a href="#">ADS</a></li>
						<li><a href="#">CAREER</a></li>
					</ul>
				
			</div>
				<p>Copyright@ Social Diary Inc.</p>

		</div>
		
	</div>
	 
</body>';
mysql_close($con);
        }
        else {
                echo "Incomplete User Details";
                header('Location: index.html');  // Jump to home page
        }
?>
