<?php

echo $_POST["comp"] ;

$token = strtok($_POST["comp"] , "_");
$i = 0;
while ($token != false)
{
	$comp_value[$i++] = $token;
	$token = strtok("_");
}

$file = "inv33_xnor.sp";
$f = fopen($file , "w");
if ( $f == null )
{
	echo "shashank ";
}
//---------------------------------------------------
// Writing the spice code -----------------------------
//---------------------------------------------------
fwrite($f , "*XNOR\n");
fwrite($f , ".include '45nm_HP.pm'\n");

fwrite($f , "M1 n a Vdd Vdd PMOS l=$comp_value[0] w=$comp_value[1]\n");
fwrite($f , "M2 n b Vdd Vdd PMOS l=$comp_value[4] w=$comp_value[5]\n");
fwrite($f , "M3 out a1 n Vdd PMOS l=$comp_value[0] w=$comp_value[1]\n");
fwrite($f , "M4 out b1 n vdd PMOS l=$comp_value[4] w=$comp_value[5]\n");

fwrite($f , "M5 out a p 0 NMOS l=$comp_value[2] w=$comp_value[3]\n");
fwrite($f , "M6 out a1 q 0 NMOS l=$comp_value[6] w=$comp_value[7]\n");
fwrite($f , "M7 p b 0 0 NMOS l=$comp_value[2] w=$comp_value[3]\n");
fwrite($f , "M8 q b1 0 0 NMOS l=$comp_value[6] w=$comp_value[7]\n");

fwrite($f , "cl out 0 $comp_value[8]f\n");

fwrite($f , "Vdd Vdd 0 1.1\n");

fwrite($f , "Va a 0 pulse (0 1.1 0 1n 1n 5n 10n )\n");
fwrite($f , "Vb b 0 pulse (0 1.1 0 1n 1n 10n 20n )\n");
fwrite($f , "Va1 a1 0 pulse ( 1.1 0 0 1n 1n 5n 10n )\n");
fwrite($f , "Vb1 b1 0 pulse ( 1.1 0 0 1n 1n 10n 20n )\n");

fwrite($f , ".tran 1n 100n\n");

fwrite($f , ".save V(out) V(a) V(b) V(a1) V(b1)\n");
fwrite($f , ".end\n");
fclose($f);
echo "Done";
//-----------------------------------------------------

`ngspice -b  inv33_xnor.sp -r rawfile_xnor`;
`cat rawfile_xnor |tr [:blank:] "\n" >  outfile_xnor`;
//`rm rawfile_xnor`;

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


