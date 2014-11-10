<?
$tabid = $_GET["link"];

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


<?php
include_once("config.inc.php");
 global $db, $db_host, $db_user, $db_password;

//$cid =$_POST['cid'];
$course_id = "C001";
$cid = mysql_connect($db_host,$db_user,$db_password);
 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 }
mysql_select_db($db);
$stuff = mysql_query("SELECT * FROM `menu` WHERE cid='".$course_id."'") or die("MySQL Login Error: ".mysql_error()); 

if (mysql_num_rows($stuff) > 0) { 

$row=mysql_num_rows($stuff);

 

while($row = mysql_fetch_array($stuff))
  {
  $cap=$row['caption'];
$tid=$row['tid'];	
  $clink=$row['clink'];	
echo "<li><a href=view.php?link=$tid>$cap</a></li>";
  }	

}

?>
					
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">


<?php
include_once("config.inc.php");
 global $db, $db_host, $db_user, $db_password;

//$cid =$_POST['cid'];
$course_id = "C001";
$tab_id = $tabid;
$content_id = "CN001";
$cid = mysql_connect($db_host,$db_user,$db_password);
 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 }
mysql_select_db($db);
$stuff = mysql_query("SELECT * FROM `content` WHERE cid='".$course_id."' AND tid='".$tab_id."' ORDER BY srno ASC" ) or die("MySQL Login Error: ".mysql_error()); 

if (mysql_num_rows($stuff) > 0) { 

$row=mysql_num_rows($stuff);

 

while($row = mysql_fetch_array($stuff))
  {
  $title=$row['title'];
  $author=$row['author'];	
  $ptext=$row['posttext'];


			print("<div class=\"post\">
			<div class=\"post-bgtop\">
			<div class=\"post-bgbtm\">


		<h1 class=\"title\"><a href=\"#\">$title</a></h1>
				<p class=\"meta\">Posted by <a href=\"#\">$author</a> on April 16, 2010
					&nbsp;&bull;&nbsp; <a href=\"#\" class=\"comments\">Comments</a>&nbsp; </p>
				<div class=\"entry\">
					 <p>$ptext</p>
				</div>
			</div>
			</div>
			</div>");



  }	

}

?>
			
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
