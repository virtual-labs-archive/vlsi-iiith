<?php

include_once("config.inc.php");
$course_id = "C001"; // Course id needs to be picked from moodle



 $tabcap = $_POST["tabcap"];
 $ptitle = $_POST["ptitle"];
$author = $_POST["author"];
$content = $_POST["elm1"];
$tabid = $_POST["tabid"];

// echo $tabcap;
// echo $ptitle;
// echo $author;
// echo $content;






global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 } 


 # Setup SQL statement and add the account into the system.
mysql_select_db($db);
$stuff = mysql_query("SELECT srno FROM content ORDER BY srno DESC LIMIT 1 ") or die("MySQL Login Error: ".mysql_error()); 




 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 

 $row=mysql_num_rows($stuff);


while($row = mysql_fetch_array($stuff))
  {
 $maxsrno=$row['srno'];
 // echo $maxsrno;	
  }

}




$today = date("F j, Y"); 
$cval = $maxsrno + 1;
$content_id = "CN00".$cval;






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
 // echo $maxpid;	
 // echo $maxpidsrno;
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


 # Setup SQL statement and add the account into the system.
 $SQL = "INSERT INTO content (
`cid` ,
`tid` ,
`cnid`,
`pid`,
`title`,
`author`,
`posttext`,
`date`
)VALUES ('$course_id' ,'$tabid' ,'$content_id','$post_id','$ptitle','$author','$content','$today');";

 $result = mysql_db_query($db,$SQL,$cid);

 # Check for errors.
 if (!$result) {

  die("ERROR: " . mysql_error() . "\n");

 } 

 {
echo "<center><h1>New Section created</h1><br><br><a href=mod_form.php><<<< Go back to control panel</a></center>";

 }

 mysql_close($cid);





?>
