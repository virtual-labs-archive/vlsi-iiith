<html>
<body>
<?php

`ngspice -b  inv2.sp -r rawfile`;
`cat rawfile |tr [:blank:] "\n" >  outfile`;
`rm rawfile`;

//$array = file("outfile");

//$i = 0 ;
//while ( $array[$i] != "Values:\n" && $i < 50 )
//{
//	echo $_REQUEST["name"]; 
//	$i++ ;
//}

//$i++;
//	echo  $array[$i];


?>
<applet code="exp1_out.class" width="1000" height="600" Align="Middle" name= "exp1_out">

<body>
</html>

