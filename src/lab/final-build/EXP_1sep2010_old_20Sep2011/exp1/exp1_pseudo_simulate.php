<?php

echo $_POST["comp"] ;

$token = strtok($_POST["comp"] , "_");
$i = 0;
while ($token != false)
{
	$comp_value[$i++] = $token;
	$token = strtok("_");
}

$file = "inv_pseudo.sp";
$f = fopen($file , "w");
//---------------------------------------------------
// Writing the spice code -----------------------------
//---------------------------------------------------
fwrite($f , "*inverter\n");
fwrite($f , ".include '45nm_HP.pm'\n");
fwrite($f , "M1 out 0 Vdd Vdd PMOS l=$comp_value[0] w=$comp_value[1]\n");
fwrite($f , "M2 out in 0 0 NMOS l=$comp_value[2] w=$comp_value[3]\n");
fwrite($f , "cl out 0 $comp_value[4]f\n");
fwrite($f , "Vdd Vdd 0 1.1\n");
fwrite($f , "Vin in 0 pulse (0  1.1  0 1n 1n 10n 22n )\n");
fwrite($f , ".tran 1n 100n\n");
fwrite($f , ".save V(out) V(in)\n");
fwrite($f , ".end\n");
fclose($f);
echo "Done";
//-----------------------------------------------------
`ngspice -b  inv_pseudo.sp -r rawfile`;
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


//<applet code="exp1_out.class" width="1000" height="600" Align="Middle" name= "exp1_out">
?>


