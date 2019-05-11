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
function loadErrorReport()
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
			document.getElementById("report").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","exp4_errorReport.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("code="+document.getElementById("code").value);
}
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
			loadErrorReport();
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

		<div id="div1_1">
			<font size="4" color="#E51A1A"><div align="center">CODES FOR REFERENCE </div></font>
			<div id="accordion" >
				<h3 ><a href="#"> <font size="4" color="#312020"><strong><em>Inverter Spice Code :</em></strong></font></a></h3>
				<div>

					<font size="2" color="#10D270">
						 .include 45nm_HP.pm <br>
						 M1 out in Vdd Vdd PMOS l=50n w= 450n <br>
						 M2 out in 0 0   NMOS l=50n w=100n <br>
						 cl out 0 100f <br>
						 Vdd Vdd 0 1.1 <br>
						 Vin in 0 pulse (0 1.1 0 1n 1n 10n 22n) <br>
						 .tran 1n 100n <br>
						 .save V(out) V(in) <br>
						 .end <br>
					</font>                                                                             
				</div>

				<h3 ><a href="#"> <font size="4" color="#312020"><strong><em>Nand Spice Code :</em></strong></font></a></h3>
				<div>

					<font size="1" color="#10D270">
						.include 45nm_HP.pm <br>
						M1 out b Vdd Vdd PMOS l=50n w=100n <br>
						M2 out a vdd vdd PMOS l=50n w=100n<br>
						M3 N b out 0 NMOS l=50n w=100n<br>
						M4 0 a N 0 NMOS l=50n w=100n<br>
						cl out 0 7f<br>
						Vdd Vdd 0 1.1<br>
						Va a 0 pulse ( 0 1.1 0 1n 1n 5n 10n )<br>
						Vb b 0 pulse (0 1.1 0 1n 1n 10n 20n )<br>
						.tran 1n 100n<br>
						.save V(out) V(a) V(b)<br>
						.end<br>
					</font>                                                                             
				</div>
				<h3 ><a href="#"> <font size="4" color="#312020"><strong><em>NOR Spice Code :</em></strong></font></a></h3>
				<div>
					<font size="1" color="#10D270">
						.include 45nm_HP.pm<br>
						M1 out b N Vdd PMOS l=50n w=100n<br>
						M2 N a vdd vdd PMOS l=50n w=100n<br>
						M3 0 a out 0 NMOS l=50n w=100n<br>
						M4 0 b out 0 NMOS l=50n w=100n<br>
						cl out 0 100f<br>
						Vdd Vdd 0 1.1<br>
						Va a 0 pulse (0 1.1 0 1n 1n 5n 10n )<br>
						Vb b 0 pulse (0 1.1 0 1n 1n 10n 20n )<br>
						.tran 1n 100n<br>
						.save V(out) V(a) V(b)<br>
						.end<br>
					</font>                                                                             
				</div>

			</div>
		</div>
<!-- ------------------------------------------------------------------------------------------------  --!>
		<div id="div1_2">
			<center> <font size="4" color="#E51A1A">  SIMULATION REPORT   </font>
					<textarea name="txt" id="report"  cols="50" rows="7"> Scroll Down To See the Whole Report   </textarea>
			</center>
		 </div>
<!-- ------------------------------------------------------------------------------------------------  --!>
<!-- ------------------------------------------------------------------------------------------------  --!>
		<div id="div2">
			<center> <font size="4" color="#E51A1A">  ENTER YOUR CODE HERE   </font>
					<input type="button" name="submit" value="SIMULATE" onclick="loadXMLDoc()">
					<br><br>
					<textarea name="txt" id="code"  cols="65" rows="30"> Write Your Code Here and Delete this Line  </textarea>
			</center>
		 </div>
<!-- ------------------------------------------------------------------------------------------------  --!>
<!-- ------------------------------------------------------------------------------------------------  --!>

		<div id="div3_1">
			<font size="4" color="#E51A1A"><div align="center">OUTPUT</div></font>
		</div>
<!-- ------------------------------------------------------------------------------------------------  --!>

		<div id="div3_2">
			<font size="5" color="#E51A1A"><div align="center"></div></font>
		</div>
<!-- ------------------------------------------------------------------------------------------------  --!>
		<div id="div3_3">
			<font size="5" color="#E51A1A"><div align="center"></div></font>
		</div>

<!-- ------------------------------------------------------------------------------------------------  --!>
<!-- ------------------------------------------------------------------------------------------------  --!>
		<div id="top" align="center" >
			<hr> 
				<font size="6" color="#4D4D4D"><strong><i><b> EXPERIMENT  : SPICE CODE  </b></i></strong></font>
			<hr>
		</div>
	</body>
</html>

