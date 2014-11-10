
<?php
// MUX File which takes the values form the MUX  applet and then write the SPICE code in a file and then run it and wrutes the output to a file .
// Wich is later read by the applet to show the graphs 
echo $_POST["comp"] ;

$token = strtok($_POST["comp"] , "_");
$i = 0;
while ($token != false)
{
	$comp_value[$i++] = $token;
	$token = strtok("_");
}

$file = "inv5_mux.sp";
$f = fopen($file , "w");
if ( $f == null )
{
echo "Can't Open the file :(";
}

//---------------------------------------------------
// Writing the spice code -----------------------------
//---------------------------------------------------
fwrite($f , "*MUX\n");
fwrite($f , ".include '45nm_HP.pm'\n");

fwrite($f , "M1 In1 clk  out Vdd PMOS l=50n w=450n\n");
fwrite($f , "M2 In1 clk1 out 0   NMOS l=50n w=100n\n");
fwrite($f , "M3 In2 clk1 out Vdd PMOS l=50n w=450n\n");
fwrite($f , "M4 In2 clk  out 0   NMOS l=50n w=100n\n");


fwrite($f , "Vdd Vdd 0 1.1\n");

fwrite($f , "VIn1  In1  0 pulse ($comp_value[0]   $comp_value[1]  0 $comp_value[2]  $comp_value[3]  $comp_value[4]  $comp_value[5]  )\n");
fwrite($f , "VIn2  In2  0 pulse ($comp_value[6]   $comp_value[7]  0 $comp_value[8]  $comp_value[9]  $comp_value[10] $comp_value[11]  )\n");
fwrite($f , "Vclk  clk  0 pulse ($comp_value[12]  $comp_value[13] 0 $comp_value[14] $comp_value[15] $comp_value[16] $comp_value[17]  )\n");
fwrite($f , "Vclk1 clk1 0 pulse ($comp_value[13]  $comp_value[12] 0 $comp_value[14] $comp_value[15] $comp_value[16] $comp_value[17]  )\n");

fwrite($f , ".tran 1n 100n\n");

fwrite($f , ".save V(out) V(In1) V(In2) V(clk) \n");
fwrite($f , ".end\n");
fclose($f);
echo "Done";
//-----------------------------------------------------

`ngspice -b  inv5_mux.sp -r rawfile_mux`;
`cat rawfile_mux |tr [:blank:] "\n" >  outfile_mux`;
`rm rawfile_mux`;

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


