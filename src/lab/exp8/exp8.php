<!DOCTYPE html>
<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
-->
<script src="./js/jquery.min.js"></script>
<script src="./js/jquery-ui.min.js"></script>
<link href="./css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="./css/my.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript">
function loadOutputFile()
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
			document.getElementById("output").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","exp8_simulate.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

	var code1=document.getElementById("code1").value ;
	var code2=document.getElementById("code2").value;
	
	xmlhttp.send("code1="+code1.replace(/&/g,"@")  + "&code2="+code2.replace(/&/g,"@"));
//	xmlhttp.send("code1="+document.getElementById("code1").value + "&code2="+document.getElementById("code2").value);
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
		//	loadOutputFile();
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
				<h3 ><a href="#"> <font size="4" color="#312020"><strong><em>OR Gate Verilog Code :</em></strong></font></a></h3>
				<div>

					<font size="2" color="#10D270">
						module orgate (a, b, y);<br>
						input a, b;<br>
						output y;<br>
						assign y = a | b;<br>
						endmodule<br>
					</font>                                                                             
				</div>

				<h3 ><a href="#"> <font size="4" color="#312020"><strong><em>OR Gate Testbench Code:</em></strong></font></a></h3>
				<div>

					<font size="2" color="#10D270">
						module orgate_tb;
						wire t_y;
						reg t_a, t_b;
						orgate my_gate( .a(t_a), .b(t_b), .y(t_y) );	
						initial<br>
						begin<br>

						    $monitor(t_a, t_b, t_y);<br>

						    t_a = 1'b0;
						    t_b = 0'b0;<br>

						    #5
						    t_a = 1'b0;
						    t_b = 1'b1;<br>

						    #5
						    t_a = 1'b1;
						    t_b = 1'b0;<br>
		
						    #5
						    t_a = 1'b1;
						    t_b = 1'b1;<br>

						end<br>
						endmodule<br>
					</font>                                                                             
				</div>


			</div>
		</div>
<!-- ------------------------------------------------------------------------------------------------  --!>
		<div id="div1_2">
			<center> <font size="4" color="#E51A1A"><br>  DOWNLOAD OUTPUT FILE   </font>
				<!--<textarea name="txt" id="output"  cols=30 rows="10">   </textarea>--!>
				<div id="output"  >   </div>
			</center>
		 </div>
<!-- ------------------------------------------------------------------------------------------------  --!>
<!-- ------------------------------------------------------------------------------------------------  --!>
		<div id="div2">
			<center> <font size="4" color="#E51A1A"> VERILOG CODE  </font>
					<br><br>
					<textarea name="txt" id="code1"  cols=30 rows="30"></textarea>
			</center>
		 </div>
<!-- ------------------------------------------------------------------------------------------------  --!>
<!-- ------------------------------------------------------------------------------------------------  --!>

		<div id="div3">
			<center> <font size="4" color="#E51A1A">  TESTBENCH CODE  </font>
					<input type="button" name="submit" value="SIMULATE" onclick="loadOutputFile()">
					<br><br>
					<textarea name="txt" id="code2"  cols=30 rows="30"></textarea>
			</center>
		 </div>
<!-- ------------------------------------------------------------------------------------------------  --!>


<!-- ------------------------------------------------------------------------------------------------  --!>
<!-- ------------------------------------------------------------------------------------------------  --!>
		<div id="top" align="center" >
			<hr> 
				<font size="6" color="#4D4D4D"><strong><i><b> EXPERIMENT  : VERILOG CODE  </b></i></strong></font>
			<hr>
		</div>
	</body>
</html>

