<?php
// LATCH File which takes the values form the LATCH  applet and then write the SPICE code in a file and then run it and wrutes the output to a file .
// Wich is later read by the applet to show the graphs 
echo $_POST["comp"] ;

$token = strtok($_POST["comp"] , "_");
$i = 0;
while ($token != false)
{
	$comp_value[$i++] = $token;
	$token = strtok("_");
}

$file = "inv7_size.sp";
$f = fopen($file , "w");
if ( $f == null )
{
echo "Can't Open the file :(";
}
//---------------------------------------------------
// Writing the spice code -----------------------------
//---------------------------------------------------
fwrite($f , "*Gate Sizing\n");
fwrite($f , ".include '45nm_HP.pm'\n");
fwrite($f , ".option post=2\n");


fwrite($f , " MPMOS_1 N_3 In N_2 N_1 PMOS l=$comp_value[7] w=$comp_value[8]\n");
fwrite($f , " MNMOS_1 N_3 In Gnd Gnd NMOS l=$comp_value[9] w=$comp_value[10]\n");
fwrite($f , " MPMOS_2 N_4 N_3 N_6 N_5 PMOS l=$comp_value[11] w=$comp_value[12]\n");
fwrite($f , " MNMOS_2 N_4 N_3 Gnd Gnd NMOS l=$comp_value[13] w=$comp_value[14]\n");
fwrite($f , " MPMOS_3 N_7 N_4 N_9 N_8 PMOS l=$comp_value[15] w=$comp_value[16]\n");
fwrite($f , " MNMOS_3 N_7 N_4 Gnd Gnd NMOS l=$comp_value[17] w=$comp_value[18]\n");
fwrite($f , " MPMOS_4 N_10 N_7 N_12 N_11 PMOS l=$comp_value[19] w=$comp_value[20]\n");
fwrite($f , " MNMOS_4 N_10 N_7 Gnd Gnd NMOS l=$comp_value[21] w=$comp_value[22]\n");
fwrite($f , " MPMOS_5 Out N_10 N_14 N_13 PMOS  l=$comp_value[23] w=$comp_value[24]\n");
fwrite($f , " MNMOS_5 Out N_10 Gnd Gnd NMOS l=$comp_value[25] w=$comp_value[26]\n");

fwrite($f , "VVoltageSource_10 N_13 Gnd  DC 1.1\n");
fwrite($f , "VVoltageSource_1 N_2 Gnd  DC 1.1\n");
fwrite($f , "VVoltageSource_2 N_6 Gnd  DC 1.1\n");
fwrite($f , "VVoltageSource_3 N_1 Gnd  DC 1.1\n");
fwrite($f , "VVoltageSource_4 N_5 Gnd  DC 1.1\n");
fwrite($f , "VVoltageSource_5 N_9 Gnd  DC 1.1\n");
fwrite($f , "VVoltageSource_6 N_8 Gnd  DC 1.1\n");
fwrite($f , "VVoltageSource_7 N_12 Gnd  DC 1.1\n");
fwrite($f , "VVoltageSource_8 N_11 Gnd  DC 1.1\n");
fwrite($f , "VVoltageSource_9 N_14 Gnd  DC 1.1\n");

fwrite($f , "CCapacitor_5 Out Gnd $comp_value[0]f\n");


fwrite($f , "VVdd Vdd Gnd  DC 1.1\n");
fwrite($f , "VIn In Gnd  PULSE($comp_value[1]   $comp_value[2]  0 $comp_value[3]  $comp_value[4]  $comp_value[5]  $comp_value[6] )\n");

fwrite($f , ".tran 1n 100n\n");
fwrite($f , ".print tran V(Out) V(In)\n");
fwrite($f , ".save V(Out) V(In)\n");
fwrite($f , ".end\n");

fclose($f);
echo "Done";
//-----------------------------------------------------


`ngspice -b  inv7_size.sp -r rawfile_size`;
`cat rawfile_size |tr [:blank:] "\n" >  outfile_size`;
`rm rawfile_size`;

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


