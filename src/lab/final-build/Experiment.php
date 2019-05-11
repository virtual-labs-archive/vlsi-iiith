<?
$cid = $_GET["code"];
echo "CID".$cid;
if($_GET["tid"]=="")
{
	$tabid = "T001";
}
else
	$tabid = $_GET["tid"];
?>

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

<?
$row = mysql_query("select title from menu where id=\"C001\"");
$title = $row['title'];

?>
<div style="position: relative; margin:auto; width: 1024px; background-color:#e3f2fc"><br/>

  <span class="title"><?php print $title;?></span>
</div>
 <div id="no_print">
	
</div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px">
        <div id="contentBox" style=" padding:0px; padding-left:50px; padding-right:50px;">

		<br>
		<div id="ddtabs2" class="glowingtabs">
			<ul>
			<?php
			include_once("config.inc.php");
			 global $db, $db_host, $db_user, $db_password;

			//$cid =$_POST['cid'];
			$course_id = $cid;
			$cid = mysql_connect($db_host,$db_user,$db_password);
			 if (!$cid) {
			
  			die("ERROR: " . mysql_error() . "\n");
			
			 }
			mysql_select_db($db);
			$stuff = mysql_query("SELECT * FROM `menu`") or die("MySQL Login Error: ".mysql_error()); 
			
			if (mysql_num_rows($stuff) > 0) { 
			
			$row=mysql_num_rows($stuff);
			
			 
			
			while($row = mysql_fetch_array($stuff))
			  {
  				$cap=$row['caption'];
  				$tid=$row['tid'];	
  				$pic=$row['icon'];
	
				echo "<li><a href=\"Experiment.php?tid=".$tid."&code=".$course_id."\"><span><center><img src=\"images/".$pic."\" BORDER=0 width=58px height=48px><br>".$cap."</center></span></a></li>\n";
			  }	

			}

			?>
			</ul>
			
		</div>

		
		   
		
          	<?php
		include_once("config.inc.php");
 		global $db, $db_host, $db_user, $db_password;
		
		//$cid =$_POST['cid'];
		$tab_id = $tabid;
		$cid = mysql_connect($db_host,$db_user,$db_password);
		echo "<br><br>";
		 if (!$cid) {
		
		  die("ERROR: " . mysql_error() . "\n");
		
 		}
		mysql_select_db($db);
		$stuff = mysql_query("SELECT * FROM content WHERE cid='".$course_id."' AND tid='".$tab_id."' ORDER BY srno ASC" ) or die("MySQL Login Error: ".mysql_error()); 
		
		if (mysql_num_rows($stuff) > 0) { 
		
		$row=mysql_num_rows($stuff);
		
 		
		
		while($row = mysql_fetch_array($stuff))
		  {
  			$title=$row['title'];
  			$author=$row['author'];	
  			$ptext=$row['posttext'];
  			print("
				<p class = \"tag_title\"><div style=\"background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px;font-size:20px;text-align:center\"> $title </div></p>
				<br />
					 <p>$ptext</p>
			");

		
  		}	
		
		}

		?><br><br>
		</p>
     		
  	</div>
</div>
</div>
<div style="position: relative; margin:auto; width: 1024px; background-color:#0e8de0"><img src="images/footer-curve.jpg" width="1024" height="31" alt=""><div class="copyright">Copyright &copy; 2009-2010</div><br>
</div>


</body>
</html>
