<?php

include_once("config.inc.php");
$course_id = "C001"; // Course id needs to be picked from moodle



 $tabcap = $_POST["tabcap"];
 $tablink = $_POST["tablink"];




 

 # Inherit database connection information from variables defined in config.inc.php
 global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {
  die("ERROR: " . mysql_error() . "\n");
 } 
/* 
 $floor = 1000;
 $ceiling = 9999;
 srand((double)microtime()*1000000);
 $random = rand($floor, $ceiling);

*/




 # Setup SQL statement and add the account into the system.
 $SQL = "INSERT INTO topmenu (
`caption` ,
`link` 
)VALUES ('$tabcap' ,'$tablink');";

 $result = mysql_db_query($db,$SQL,$cid);

 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysql_error() . "\n");

 } 
else

 {
echo "<center><h1>New top menu Tab created</h1><br><br><a href=mod_form.php><<<< Go back to control panel</a></center>";

 }

 mysql_close($cid);


?>
