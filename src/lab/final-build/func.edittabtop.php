<?php

include_once("config.inc.php");
$course_id = "C001"; // Course id needs to be picked from moodle



 $tabcap = $_POST["tabcap"];
 $tablink = $_POST["tablink"];
 $srno = $_POST["srno"];


// echo $tabcap;
// echo $tabid;



 
 global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 } 
mysql_select_db($db);
$result = mysql_query("UPDATE topmenu SET caption = '".$tabcap."',link = '".$tablink."' WHERE Srno ='".$srno."'") or die("MySQL Login Error: ".mysql_error()); 






# Check for errors.

if (mysql_affected_rows() > 0)
{ 

 echo "<center><br><h1>Tab Successfully Updated to the Database</h1><br><br><br><a href=mod_form.php><<<< Go back to control panel</a></center><br><br><br><br><br><br><br><br>";

 } 
else 
{
echo "<center><br><h1>ERROR in Update</h1><br><br><br><br><br><br><br><br>";
  die("Invalid Entry " . mysql_error() . "\n");
 }

 mysql_close($cid);




?>
