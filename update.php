<?php
// Inialize session
session_start();
// Include database connection settings
require_once 'db.php';
$db = new db();
$con = $db->getConnection();

// Retrieve username and password from database according to user's input
$user = mysql_query("SELECT * FROM userdb WHERE (email  = '" . mysql_real_escape_string($_SESSION['Email']) . "')");

// Check username and password match
        if (mysql_num_rows($user) == 1) {
		$Row = mysql_fetch_array ($user); //Fetch result

print '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script type=\'text/javascript\' src="http://code.jquery.com/jquery-latest.min.js"></script>
		
		<link rel="stylesheet" href="styles/mystyle.css"/>
		<!--<link rel="stylesheet" href="styles/Signup.css"/> -->
		<script type=\'text/javascript\' src="javascript/signup.js" ></script> 		
		<title>Social Diary - Update Profile</title>
		<script type="text/javascript" ></script>
	</head>
	

<body>

	<div id="indexContainer">
	
		<div id="indexHeader">
			<div id ="Title">
				<h1>Social Diary</h1>
			</div>
			<div id="emailBox">
			Hi '.$Row['firstname'];
			if ($Row['gender'] == 'f') {
				print '<img src="logos/female.png"></img>';
			} else {
				print '<img src="logos/male.png"></img>';
			}	
		print	'</div>
			<div id="passwordBox">
				<a href="logout.php">Logout</a>
			</div>
		</div>
      
		<div id="indexBody">

		   <p>Social Diary</p>
		      <div id="registerblock">
		      <p>Hi, so glad you could join us. Just a few more details needed</p>
			<form  method="post" action="updater.php">
			<input type="text" id="firstname" size="40px" name="firstname" placeholder="'.$Row['firstname'].'" value="'.$Row['firstname'].'" /> <br></br>
			<input type="text" size="40px" id="lastname" name="lastname" placeholder="'.$Row['lastname'].'" value="'.$Row['lastname'].'" /> <br></br>
			<input type="text" name="phone" size="40px" id="phone" placeholder="'.$Row['phone'].'" value="'.$Row['phone'].'" /> <br></br>
			<p>Birthday</p>';
			
			$yr = strtok($Row['birthdate'],'-');
			$mon = strtok('-');
			$day = strtok('');
		print	'<select name="month">
			   <option value="">Month</option>
			   <option value="1">January</option>
			   <option value="2">February</option>
			   <option value="3">March</option>
			   <option value="4">April</option>
			   <option value="5">May</option>
			   <option value="6">June</option>
			   <option value="7">July</option>
			   <option value="8">August</option>
			   <option value="9">September</option>
			   <option value="10">October</option>
			   <option value="11">November</option>
			   <option value="12">December</option>
			</select>
			<select name="day">
			  <option value='.$day.'>'.$day.'</option>
			    <option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option><option value=6>6</option><option value=7>7</option><option value=8>8</option><option value=9>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option>
			 </select>
			<select name="year">
			  <option value='.$yr.'>'.$yr.'</option>
			  <option value=1960>1960</option><option value=1961>1961</option><option value=1962>1962</option><option value=1963>1963</option><option value=1964>1964</option><option value=1965>1965</option><option value=1966>1966</option><option value=1967>1967</option><option value=1968>1968</option><option value=1969>1969</option><option value=1970>1970</option><option value=1971>1971</option><option value=1972>1972</option><option value=1973>1973</option><option value=1974>1974</option><option value=1975>1975</option><option value=1976>1976</option><option value=1977>1977</option><option value=1978>1978</option><option value=1979>1979</option><option value=1980>1980</option><option value=1981>1981</option><option value=1982>1982</option><option value=1983>1983</option><option value=1984>1984</option><option value=1985>1985</option><option value=1986>1986</option><option value=1987>1987</option><option value=1988>1988</option><option value=1989>1989</option><option value=1990>1990</option><option value=1991>1991</option><option value=1992>1992</option><option value=1993>1993</option><option value=1994>1994</option><option value=1995>1995</option><option value=1996>1996</option><option value=1997>1997</option><option value=1998>1998</option><option value=1999>1999</option>
			</select>
			<br></br>';
			if ($Row['gender'] == 'm') {
			print '<input type=radio value=m name=gender checked>Male</input>
			<input type=radio value=f name=gender>Female</input>
			<input type=radio value=r name=gender>I\'d rather not say</input><br></br>';
			} else if ($Row['gender'] == 'f') {
                        print '<input type=radio value=m name=gender>Male</input>
                        <input type=radio value=f name=gender checked>Female</input>
                        <input type=radio value=r name=gender>I\'d rather not say</input><br></br>';
                        } else if ($Row['gender'] == 'r') {
                        print '<input type=radio value=m name=gender>Male</input>
                        <input type=radio value=f name=gender>Female</input>
                        <input type=radio value=r name=gender checked>I\'d rather not say</input><br></br>';
                        } else {
                        print '<input type=radio value=m name=gender>Male</input>
                        <input type=radio value=f name=gender>Female</input>
                        <input type=radio value=r name=gender>I\'d rather not say</input><br></br>';
                        }
			print	  '<br></br><input type="submit" value="UPDATE">
				</form>					
			</div>
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
				<p>Copyright&copy; Social Diary Inc.</p>

		</div>
		
	</div>
	 
</body>
</html>';

        }
        else {
                echo "Incomplete User Details";
                header('Location: index.html');  // Jump to home page
        }
?>
