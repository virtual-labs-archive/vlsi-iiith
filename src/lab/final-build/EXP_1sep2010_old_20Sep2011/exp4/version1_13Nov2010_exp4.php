<!DOCTYPE html>
<html>
<head>
<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
-->
<script src="./js/jquery.min.js"></script>
<script src="./js/jquery-ui.min.js"></script>
<link href="./css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="./css/my.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript">
function loadXMLDoc()
{
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("div3_1").innerHTML=xmlhttp.responseText;
			document.getElementById("div3_2").innerHTML=xmlhttp.responseText;
			document.getElementById("div3_3").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","exp4_graph.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("code="+document.getElementById("code").value);
}
</script>
<script>
$(document).ready(function() {
		$("#accordion").accordion();
		 event: "mouseover"
		});
</script>

</head>
<body style="font-size:62.5%;">
<?php/*
if ($_POST["simulate"])
{
	echo $_POST["simulate"];
	echo "\nSubmit Button is pressed :)";
	print ("  <meta HTTP-EQUIV=\"refresh\" content=\"0;URL = exp4.php\">  ");

	//	output = `ngspice -b  inv22.sp -r rawfile` ;
} */
?>


<div id="div1">
<font size="5" color="#E51A1A"><div align="center">CODES FOR REFERENCE </div></font>
<div id="accordion" >
<h3 ><a href="#"> <font size="5" color="#312020"><strong><em>Spice Code Example : 1</em></strong></font></a></h3>
<div>


<font size="3" color="#10D270">
*inverter <br>
 .include '45nm_HP.pm' <br>
 M1 out in Vdd Vdd PMOS l=50n w= 450n <br>
 M2 out in 0 0   NMOS l=50n w=100n <br>
 cl out 0 100f <br>
 Vdd Vdd 0 1.1 <br>
 Vin in 0 pulse (0 1.1 0 1n 1n 10n 22n) <br>
 .tran 1n 100n <br>
 .save V(out) V(in) <br>
 .end <br>
 <br>
</font>                                                                             

</div>

<h3 ><a href="#"> <font size="5" color="#312020"><strong><em>Spice Code Example : 2</em></strong></font></a></h3>
<div>


<font size="3" color="#10D270">
*inverter <br>
 .include '45nm_HP.pm' <br>
 M1 out in Vdd Vdd PMOS l=50n w= 450n <br>
 M2 out in 0 0   NMOS l=50n w=100n <br>
 cl out 0 100f <br>
 Vdd Vdd 0 1.1 <br>
 Vin in 0 pulse (0 1.1 0 1n 1n 10n 22n) <br>
 .tran 1n 100n <br>
 *.print tran V(in)<br>
 .save V(out) V(in) <br>
 .end <br>
 <br>
</font>                                                                             
</div>

<h3 ><a href="#"> <font size="5" color="#312020"><strong><em>Spice Code Example : 3</em></strong></font></a></h3>
<div>

<font size="3" color="#10D270">
*inverter <br>
 .include '45nm_HP.pm' <br>
 M1 out in Vdd Vdd PMOS l=50n w= 450n <br>
 M2 out in 0 0   NMOS l=50n w=100n <br>
 cl out 0 100f <br>
 Vdd Vdd 0 1.1 <br>
 Vin in 0 pulse (0 1.1 0 1n 1n 10n 22n) <br>
 .tran 1n 100n <br>
 *.print tran V(in)<br>
 .save V(out) V(in) <br>
 .end <br>
 <br>
</font>                                                                             
</div>

<h3 ><a href="#"> <font size="5" color="#312020"><strong><em>Spice Code Example : 4</em></strong></font></a></h3>
<div>

<font size="3" color="#10D270">
*inverter <br>
 .include '45nm_HP.pm' <br>
 M1 out in Vdd Vdd PMOS l=50n w= 450n <br>
 M2 out in 0 0   NMOS l=50n w=100n <br>
 cl out 0 100f <br>
 Vdd Vdd 0 1.1 <br>
 Vin in 0 pulse (0 1.1 0 1n 1n 10n 22n) <br>
 .tran 1n 100n <br>
 *.print tran V(in)<br>
 .save V(out) V(in) <br>
 .end <br>
 <br>
</font>                                                                             

</div>
</div>
</div>

<div id="div2">
<center> <font size="5" color="#E51A1A">  ENTER YOUR CODE HERE   </font>
<input type="button" name="submit" value="SIMULATE" onclick="loadXMLDoc()">
<textarea name="txt" id="code"  cols="65" rows="30"> Write Your Code </textarea>

</center>
 </div>

<div id="div3_1">
<font size="5" color="#E51A1A"><div align="center">OUTPUT</div></font>
</div>
<div id="div3_2">
<font size="5" color="#E51A1A"><div align="center">OUTPUT</div></font>
</div>
<div id="div3_3">
<font size="5" color="#E51A1A"><div align="center">OUTPUT</div></font>
</div>

<div id="top" align="center" >
<hr> 
<font size="6" color="#4D4D4D"><strong><i><b> EXPERIMENT  : SPICE CODE  </b></i></strong></font>
<hr>
</div>
</body>
</html>

