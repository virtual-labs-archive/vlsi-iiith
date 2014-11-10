<?php

include_once("config.inc.php");
$course_id = "C001"; // Course id needs to be picked from moodle


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Virtual Labs - IIT Bombay</title>
<link href="style2.css" rel="stylesheet" type="text/css" media="screen" />




</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">Virtual Labs - IIT Bombay</a></h1>
			<p><a href="#"></a></p>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>

					
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">



<div class="post">
			<div class="post-bgtop">

			<div class="post-bgbtm">


		<h1 class="title"><a href="#">Edit Tab</a></h1>
				
				<div class="entry">

					 <p>

<form action=edit_tabtop.php method="post">			
						
  
<select name="tabs">              				<label><b> Select Tab :</b></label><br>
<?


global $db, $db_host, $db_user, $db_password;

 # Connect to the database and report any errors on connect.
 $cid = mysql_connect($db_host,$db_user,$db_password);

 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 } 


 # Setup SQL statement and add the account into the system.
mysql_select_db($db);
$stuff = mysql_query("SELECT Srno,caption FROM topmenu ") or die("MySQL Login Error: ".mysql_error()); 




 # Check for errors.
if (mysql_num_rows($stuff) > 0)
 { 

 $row=mysql_num_rows($stuff);


while($row = mysql_fetch_array($stuff))
  {
 $Srno=$row['Srno'];
 $cap=$row['caption'];
	
echo "<option value=$Srno>$cap</option>";
  }

}

?>
</select>
				
<br><br>
	<input type="submit" name="save" value="Submit" />
		<input type="reset" name="reset" value="Reset" />



</p>
				</div>
			</div>
			</div>
			</div>

			
		<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end #page -->
	<div id="footer">
		<p> Power Systems Lab <a href="#">Virtual Labs - IIT Bombay</a>.</p>
	</div>
	<!-- end #footer -->
</div>
</body>
</html>
