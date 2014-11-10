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

$file = "inv6_flipflop_p.sp";
$f = fopen($file , "w");
if ( $f == null )
{
	echo "File not opened  ";
}

//---------------------------------------------------
// Writing the spice code -----------------------------
//---------------------------------------------------
fwrite($f , "*Positive Edge Trigger Flip Flop \n");
fwrite($f , ".include '45nm_HP.pm'\n");

fwrite($f , "MNMOS_1 D Clk1 N_2 Gnd NMOS l=50n w=100n  

MNMOS_2 N_4 Clk N_2 Gnd NMOS l=50n w=100n  

MNMOS_3 N_1 N_2 Gnd Gnd NMOS l=50n w=100n 

MNMOS_4 N_4 N_1 Gnd Gnd NMOS l=50n w=100n  

cl N_4 0 100f

MNMOS_5 Q N_6 Gnd Gnd NMOS l=50n w=100n 

MNMOS_6 Q1 Q Gnd Gnd NMOS l=50n w=100n 

MNMOS_7 Q1 Clk1 N_6 Gnd NMOS l=50n w=100n  

MNMOS_8 N_1 Clk N_6 Gnd NMOS l=50n w=100n 

c2 N_1 0 100f 

MPMOS_1 D Clk N_2 Vdd PMOS l=50n w=450n  

MPMOS_2 N_4 Clk1 N_2 Vdd PMOS l=50n w=450n  

MPMOS_3 N_1 N_2 Vdd Vdd PMOS l=50n w=450n  

MPMOS_4 N_4 N_1 Vdd Vdd PMOS l=50n w=450n

c3 q 0 100f  

MPMOS_5 Q1 Q Vdd Vdd PMOS l=50n w=450n  

MPMOS_6 Q N_6 Vdd Vdd PMOS l=50n w=450n  

MPMOS_7 Q1 Clk N_6 Vdd PMOS l=50n w=450n  

MPMOS_8 N_1 Clk1 N_6 Vdd PMOS l=50n w=450n

c4 q1 0 100f  

VVdd Vdd Gnd  DC 1.1 \n");


fwrite($f , "VN_1 0 pulse ($comp_value[0]  $comp_value[1] 0 $comp_value[2] $comp_value[3] $comp_value[4] $comp_value[5]  )\n");
fwrite($f , "Vclk1 clk1 0 pulse ($comp_value[7] $comp_value[6] 0 $comp_value[8] $comp_value[9] $comp_value[10] $comp_value[11]  )\n");
fwrite($f , "Vclk  clk  0 pulse ($comp_value[6] $comp_value[7] 0 $comp_value[8] $comp_value[9] $comp_value[10] $comp_value[11]  )\n");

fwrite($f , ".tran 1n 100n\n");

fwrite($f , ".save V(Q) V(VN_1) V(clk)\n");
fwrite($f , ".end\n");


fclose($f);
echo "Done";
//-----------------------------------------------------

`ngspice -b  inv6_flipflop_p.sp -r rawfile_flipflop_p`;

`cat rawfile_flipflop_p |tr " "  "\n" | tr "\t" "\n" >  outfile_flipflop_p`;
//`rm rawfile_flipflop_p`;

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


