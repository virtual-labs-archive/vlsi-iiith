<!DOCTYPE HTML>
<html>
<head>
<title>VLSI - Virtual Lab</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript"> 
function panel1()
{
	    $(".panel1").slideToggle("slow");
}
function panel2()
{
	    $(".panel2").slideToggle("slow");
}
function panel3()
{
	    $(".panel3").slideToggle("slow");
}
function panel4()
{
	    $(".panel4").slideToggle("slow");
}
function panel5()
{
	    $(".panel5").slideToggle("slow");
}
function panel6()
{
	    $(".panel6").slideToggle("slow");
}
function panel7()
{
	    $(".panel7").slideToggle("slow");
}
function panel8()
{
	    $(".panel8").slideToggle("slow");
}
function panel9()
{
	    $(".panel9").slideToggle("slow");
}
function panel10()
{
	    $(".panel10").slideToggle("slow");
}
</script>


<style type="text/css">

div.flip 
{
	
}
div.panel1
{
	display:none;
}
.tmp
{
}
div.panel2
{
	display:none;
}
div.panel3
{
	display:none;
}
div.panel4
{
	display:none;
}
div.panel5
{
	display:none;
}
div.panel6
{
	display:none;
}
div.panel7
{
	display:none;
}
div.panel8
{
	display:none;
}
div.panel9
{
	display:none;
}
div.panel10
{
	display:none;
}


<!--
-->
</style>
<style type="text/css">@import "css/flexnav.css";</style>
<script type="text/javascript" src="js/beethoven.js"></script>
<link href="css/default.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="css/my.css" rel="stylesheet" type="text/css">

<style type="text/css">
.top{
margin-top: 0px;
}
</style>

<script type="text/javascript" src="ddtabmenufiles/ddtabmenu.js">
</script>
<link rel="stylesheet" type="text/css" href="ddtabmenufiles/glowtabs.css" />



</head>
<body bgcolor="#FFFFFF">
<div id="header_main"><img src="header_01.jpg" align="right" style="padding-right:0px"></div>
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
<div style="background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px;font-size:25px;text-align:center">List of Experiments</div>
</div>
 <div id="no_print">

</div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px;">
        <div id="contentBox" style=" padding:0px; padding-left:50px; padding-right:50px;background-color:#e3f2fc">


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
$stuff = mysql_query("SELECT * FROM experiment ORDER BY Srno ASC" ) or die("MySQL Login Error: ".mysql_error()); 

if (mysql_num_rows($stuff) > 0) { 

$row=mysql_num_rows($stuff);

 


$i=1;
while($row = mysql_fetch_array($stuff))
  {
	$ptext = $row['text'];
	$title = $row['title'];
	$link = $row['link'];


			print("
<table>

	<tr>
	<td><img src=\"images/images/1245599423.png\" height=\"18\" width=\"18\"></td>
        <td><h2> $title </h2></td>
	</tr>
</table>
	<div onClick=\"panel$i()\"> see Description </div>
	<a href=\"$link\"> start the experiment</a>
			<h3><p>$ptext</p></h3>
			");
$i+=1;



  }	

}

?>
<br><br>
	</p>
     
  </div>
</div>
<div style="position: relative; margin:auto; width: 1024px; background-color:#0e8de0"><img src="images/footer-curve.jpg" width="1024" height="31" alt=""><div class="copyright">Copyright &copy; 2009-2010</div><br>
</div>


</body>
</html>
