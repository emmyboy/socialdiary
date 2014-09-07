<HTML>
<HEAD>
<TITLE>Social Diary User Database</TITLE>
</HEAD>
<BODY>
<?php
// Set the variables for the database access:
$Host = "dbserver.engr.scu.edu:3306";
$User = "cegwuatu";
$Password = "00000756216";
$DBName = "sdb_cegwuatu";
$TableName = "userdb";

$Link = mysql_connect ($Host, $User, $Password);

$Query = "SELECT * from $TableName";
$Result = mysql_db_query ($DBName, $Query, $Link);


// Create a table.
print ("<TABLE BORDER=1 WIDTH=\"75%\" CELLSPACING=2 CELLPADDING=2 ALIGN=CENTER>\n");
print ("<TR ALIGN=CENTER VALIGN=TOP>\n");
print ("<TD ALIGN=CENTER VALIGN=TOP><b>Name</b></TD>\n");
print ("<TD ALIGN=CENTER VALIGN=TOP><b>Email Address</b></TD>\n");
print ("<TD ALIGN=CENTER VALIGN=TOP><b>DOB</b></TD>\n");
print ("<TD ALIGN=CENTER VALIGN=TOP><b>Gender</b></TD>\n");
print ("<TD ALIGN=CENTER VALIGN=TOP><b>Phone</b></TD>\n");
print ("<TD ALIGN=CENTER VALIGN=TOP><b>Registration Time</b></TD>\n");
print ("</TR>\n");

// Fetch the results from the database.
while ($Row = mysql_fetch_array ($Result)) {
        print ("<TR ALIGN=CENTER VALIGN=TOP>\n");
        print ("<TD ALIGN=CENTER VALIGN=TOP>$Row[firstname] $Row[lastname]</TD>\n");
        print ("<TD ALIGN=CENTER VALIGN=TOP>$Row[email]</TD>\n");
        print ("<TD ALIGN=CENTER VALIGN=TOP>$Row[birthdate]</TD>\n");
        print ("<TD ALIGN=CENTER VALIGN=TOP>$Row[gender]</TD>\n");
        print ("<TD ALIGN=CENTER VALIGN=TOP>$Row[phone]</TD>\n");
        print ("<TD ALIGN=CENTER VALIGN=TOP>$Row[regdate]</TD>\n");
        print ("</TR>\n");
}

mysql_close ($Link);
print ("</TABLE>\n");
?>
</BODY>
</HTML>
