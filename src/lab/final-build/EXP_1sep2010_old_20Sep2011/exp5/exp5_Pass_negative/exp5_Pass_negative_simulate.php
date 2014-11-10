<?php
// Pass Transistor File which takes the values form the Pass Transistor applet and then write the SPICE code in a file and then run it and wrutes the output to a file .
 // Wich is later read by the applet to show the graphs
echo $_POST["comp"] ;

$token = strtok($_POST["comp"] , "_");
$i = 0;
while ($token != false)
{
	$comp_value[$i++] = $token;
	$token = strtok("_");
}

$file = "inv5_n_pass.sp";
$f = fopen($file , "w");
if ( $f == null )
{
	echo "shashank ";
}
//---------------------------------------------------
// Writing the spice code -----------------------------
//---------------------------------------------------
fwrite($f , "*Negative Edge Pass Transistor \n");
fwrite($f , ".include '45nm_HP.pm'\n");

fwrite($f , "M1 In clk out Vdd PMOS l=$comp_value[0] w=$comp_value[1]\n");
fwrite($f , "M2 In clk1 out 0 NMOS l=$comp_value[2] w=$comp_value[3]\n");

fwrite($f , "Vdd Vdd 0 1.1\n");
//fwrite($f , "cl out 0 1f\n");

fwrite($f , "VIn In 0 pulse ($comp_value[4]  $comp_value[5] 0 $comp_value[6] $comp_value[7] $comp_value[8] $comp_value[9]  )\n");

fwrite($f , "Vclk clk 0 pulse ($comp_value[10] $comp_value[11] 0 $comp_value[12] $comp_value[13] $comp_value[14] $comp_value[15]  )\n");

fwrite($f , "Vclk1 clk1 0 pulse ($comp_value[11]  $comp_value[10] 0 $comp_value[12] $comp_value[13] $comp_value[14] $comp_value[15]  )\n");

fwrite($f , ".tran 1n 100n\n");

fwrite($f , ".save V(out) V(In) V(clk) V(clk1) \n");
fwrite($f , ".end\n");
fclose($f);
echo "Done";
//-----------------------------------------------------

`ngspice -b  inv5_n_pass.sp -r rawfile_n_pass`;
`cat rawfile_n_pass |tr [:blank:] "\n" >  outfile_n_pass`;
`rm rawfile_n_pass`;

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


