<?php

include_once("config.inc.php");
$course_id = "C001"; // Course id needs to be picked from moodle



 $tabcap = $_POST["tabcap"];


//echo $tabcap;







global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 } 


 # Setup SQL statement and add the account into the system.
mysql_select_db($db);
$stuff = mysql_query("SELECT srno FROM menu ORDER BY srno DESC LIMIT 1 ") or die("MySQL Login Error: ".mysql_error()); 




 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 

 $row=mysql_num_rows($stuff);


while($row = mysql_fetch_array($stuff))
  {
 $maxsrno=$row['srno'];
 //echo $maxsrno;	
  }

}




$today = date("F j, Y"); 
$cval = $maxsrno + 1;
$content_id = "CN00".$cval;
$tab_id = "T00".$cval;





global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 } 


 # Setup SQL statement and add the account into the system.
mysql_select_db($db);
$stuff = mysql_query("SELECT pid,srno FROM content ORDER BY srno DESC LIMIT 1 ") or die("MySQL Login Error: ".mysql_error()); 




 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 

 $row=mysql_num_rows($stuff);


while($row = mysql_fetch_array($stuff))
  {
 $maxpid=$row['pid'];
  $maxpidsrno=$row['srno'];	
 //echo $maxpid;	
 //echo $maxpidsrno;
  }

}
$pval = $maxpidsrno + 1;
$post_id = "P00".$pval;





 

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
 $SQL = "INSERT INTO menu (
`cid` ,
`tid` ,
`caption`,
`clink`,
`icon`
)VALUES ('$course_id' ,'$tab_id' ,'$tabcap','$content_id','theory.jpg');";

 $result = mysql_db_query($db,$SQL,$cid);

 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysql_error() . "\n");

 } 
else

 {
echo "<center><h1>New Tab created</h1><br><br><a href=mod_form.php><<<< Go back to control panel</a></center>";

 }

 mysql_close($cid);


?>
