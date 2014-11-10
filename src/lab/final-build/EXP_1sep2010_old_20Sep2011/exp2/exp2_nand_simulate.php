<?php

echo $_POST["comp"] ;

$token = strtok($_POST["comp"] , "_");
$i = 0;
while ($token != false)
{
	$comp_value[$i++] = $token;
	$token = strtok("_");
}

$file = "inv22_nand.sp";
$f = fopen($file , "w");
if ( $f == null )
{
	echo "shashank ";
}
//---------------------------------------------------
// Writing the spice code -----------------------------
//---------------------------------------------------
fwrite($f , "*NAND\n");
fwrite($f , ".include '45nm_HP.pm'\n");
fwrite($f , "M1 out b Vdd Vdd PMOS l=$comp_value[0] w=$comp_value[1]\n");
fwrite($f , "M2 out a vdd vdd PMOS l=$comp_value[4] w=$comp_value[5]\n");
fwrite($f , "M3 N b out 0 NMOS l=$comp_value[2] w=$comp_value[3]\n");
fwrite($f , "M4 0 a N 0 NMOS l=$comp_value[6] w=$comp_value[7]\n");
fwrite($f , "cl out 0 $comp_value[8]f\n");
fwrite($f , "Vdd Vdd 0 1.1\n");
fwrite($f , "Va a 0 pulse ( 0 1.1 0 1n 1n 5n 10n )\n");
fwrite($f , "Vb b 0 pulse (0 1.1 0 1n 1n 10n 20n )\n");
fwrite($f , ".tran 1n 100n\n");
fwrite($f , ".save V(out) V(a) V(b)\n");
fwrite($f , ".end\n");
fclose($f);
echo "Done";
//-----------------------------------------------------

`ngspice -b  inv22_nand.sp -r rawfile_nand`;
`cat rawfile_nand |tr [:blank:] "\n" >  outfile_nand`;
`rm rawfile_nand`;

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


