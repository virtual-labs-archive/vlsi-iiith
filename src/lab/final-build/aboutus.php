<!DOCTYPE HTML>
<html>
<head>
<title>Virtual Labs - IIIT Hyderabad</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
-->
</style>
<style type="text/css">@import "css/flexnav.css";</style>
<script type="text/javascript" src="js/beethoven.js"></script>
<link href="css/default.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet" type="text/css">


<script type="text/javascript" src="ddtabmenufiles/ddtabmenu.js">

</script>

<link rel="stylesheet" type="text/css" href="ddtabmenufiles/glowtabs.css" />



</head>
<body bgcolor="#FFFFFF">
<div id="header_main"><img src="" align="right" style="padding-right:20px"></div>
 <div id="no_print">
<!-- start header -->
<div id="header">
         <ul id="menuTop">

<?php
include_once("config.inc.php");
 global $db, $db_host, $db_user, $db_password;

$conn = mysql_connect($db_host,$db_user,$db_password);
 if (!$conn) {

  die("ERROR: " . mysql_error() . "\n");

 }
mysql_select_db($db);
$stuff = mysql_query("SELECT * FROM `topmenu`") or die("MySQL Login Error: ".mysql_error()); 

if (mysql_num_rows($stuff) > 0) { 

$row=mysql_num_rows($stuff);

 

while($row = mysql_fetch_array($stuff))
  {
  $caption=$row['caption'];	
  $link=$row['link'];
	
echo "<li><a href=\"$link\" target=\"_self\">$caption</a></li>";
  }	

}

?>

        </ul>

</div>
<div style="position: relative; margin:auto; width: 1024px; background-color:#e3f2fc"><br/>

  <span class="title">People</span>
</div>
 <div id="no_print">

</div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:400px;">
        <div id="contentBox" style=" padding:0px; padding-left:50px; padding-right:50px;">


<br>
<?php
include_once("config.inc.php");
 global $db, $db_host, $db_user, $db_password;

//$cid =$_POST['cid'];
$cid = mysql_connect($db_host,$db_user,$db_password);
echo "<br><br>";
 if (!$cid) {

  die("ERROR: " . mysql_error() . "\n");

 }
mysql_select_db($db);
$stuff = mysql_query("SELECT * FROM people WHERE type='faculty'" ) or die("MySQL Login Error: ".mysql_error()); 

if (mysql_num_rows($stuff) > 0) { 

$row=mysql_num_rows($stuff);

 

print("<h2>Faculty</h2><br />");
/*
while($row = mysql_fetch_array($stuff))
  {
  $pic=$row['pic'];
  $author=$row['author'];	
  $ptext=$row['posttext'];
  $link=$row['weblink'];	


			print("

		<table>
		<tr>
		<td>
		<a href=\"$link\"><img src='$pic' width=100 height=100></img></a>
		</td>
		<td style=\"padding:20px\">
		<h2><a href=\"$link\">$author</a></h1>
		 <p>$ptext</p>
		</td>
		</tr>
		</table>
			");
} */
}
$stuff = mysql_query("SELECT * FROM people WHERE type='student'" ) or die("MySQL Login Error: ".mysql_error()); 

if (mysql_num_rows($stuff) > 0) { 

$row=mysql_num_rows($stuff);

 

print("<br><hr><br><h2>Virtual Lab Developer</h2><br />");
/*
while($row = mysql_fetch_array($stuff))
  {
  $pic=$row['pic'];
  $author=$row['author'];	
  $ptext=$row['posttext'];
  $link=$row['weblink'];	


			print("

		<table>
		<tr>
		<td>
		<a href=\"$link\"><img src='$pic' width=100 height=100></img></a>
		</td>
		<td style=\"padding:20px\">
		<h2><a href=\"$link\">$author</a></h1>
		 <p>$ptext</p>
		</td>
		</tr>
		</table>
			");



  }	*/

} 

?><br><br>
	</p>
     
  </div>
</div>
<div style="position: relative; margin:auto; width: 1024px; background-color:#0e8de0"><img src="images/footer-curve.jpg" width="1024" height="31" alt=""><div class="copyright">Copyright &copy; 2009-2010</div><br>
</div>


</body>
</html>
