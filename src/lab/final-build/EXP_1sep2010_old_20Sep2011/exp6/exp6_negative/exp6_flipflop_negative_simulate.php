<?php
echo $_POST["comp"] ;

$token = strtok($_POST["comp"] , "_");
$i = 0;
while ($token != false)
{
	$comp_value[$i++] = $token;
	$token = strtok("_");
}

$file = "inv6_flipflop_n.sp";
$f = fopen($file , "w");
if ( $f == null )
{
	echo "File not opened  ";
}

//---------------------------------------------------
// Writing the spice code -----------------------------
//---------------------------------------------------
/*fwrite($f , "*Negative Edge Trigger Flip Flop \n");
fwrite($f , ".include '45nm_HP.pm'\n");
fwrite($f , ".option post=2\n"); // new 

fwrite($f , "M1  D   clk1 out  Vdd  PMOS l=50n w= 450n\n");
fwrite($f , "M2  D   clk  out  0    NMOS l=50n w=100n\n");
fwrite($f , "M3  In2 clk  out  Vdd  PMOS l=50n w= 450n\n");
fwrite($f , "M4  In2 clk1 out  0    NMOS l=50n w=100n\n");
fwrite($f , "M5  q   out  Vdd  Vdd  PMOS l=50n w= 450n\n");
fwrite($f , "M6  q   out  0    0    NMOS l=50n w=100n\n");
fwrite($f , "M7  In2 q   Vdd  Vdd  PMOS l=50n w= 450n\n");
fwrite($f , "M8  In2 q   0    0    NMOS l=50n w=100n\n");
fwrite($f , "M9  q   clk  out1 Vdd  PMOS l=50n w= 450n\n");
fwrite($f , "M10 q   clk1 out1 0    NMOS l=50n w=100n\n");
fwrite($f , "M11 In3 clk1 out1 Vdd  PMOS l=50n w= 450n\n");
fwrite($f , "M12 In3 clk  out1 0    NMOS l=50n w=100n\n");
fwrite($f , "M13 q1  out  Vdd  Vdd  PMOS l=50n w= 450n\n");
fwrite($f , "M14 q1  out1 0    0    NMOS l=50n w=100n\n");
fwrite($f , "M15 In3 q1   Vdd  Vdd  PMOS l=50n w= 450n\n");
fwrite($f , "M16 In3 q1   0    0    NMOS l=50n w=100n\n");

fwrite($f , "c1  q1  0 100f\n");
fwrite($f , "c2  In2 0 100f\n");
fwrite($f , "c3  q   0 100f\n");
fwrite($f , "c4  In3 0 100f\n");
fwrite($f , "Vdd Vdd 0 1.1\n");
*/
//================================
fwrite($f, "*NegativeEdgeDFFbyNandGate

.include '45nm_HP.pm'





.subckt Nand2 A B Out Gnd  



MNMOS_3 Out A N_2 Gnd NMOS l=50n w=100n  

MNMOS_4 N_2 B Gnd Gnd NMOS l=50n w=100n  

MPMOS_3 Out A N_1 N_3 PMOS l=50n w=450n  

MPMOS_4 Out B N_1 N_4 PMOS l=50n w=450n  

VVoltageSource_5 N_4 Gnd  DC 1.1 

VVoltageSource_6 N_1 Gnd  DC 1.1

VVoltageSource_2 N_3 Gnd  DC 1.1

.ends



.subckt nots In Out Gnd  



MNMOS_1 Out In Gnd Gnd NMOS l=50n w=100n  

MPMOS_1 Out In N_2 N_1 PMOS l=50n w=450n  

VVoltageSource_3 N_1 Gnd  DC 1.1 

VVoltageSource_1 N_2 Gnd  DC 1.1

.ends









Xnots_1 Clk N_5 Gnd nots  

XNand2_1 N_5 N_6 N_4 Gnd Nand2  

XNand2_2 N_5 N_4 N_3 Gnd Nand2  

XNand2_4 Q1 N_4 Q Gnd Nand2  

XNand2_5 N_3 Q Q1 Gnd Nand2  

XNand2_6 Clk D N_2 Gnd Nand2  

XNand2_7 Clk N_2 N_7 Gnd Nand2  

XNand2_8 N_8 N_2 N_6 Gnd Nand2  

XNand2_9 N_7 N_6 N_8 Gnd Nand2  \n");

fwrite($f , "VVoltageSource_3 D 0 pulse ($comp_value[0]  $comp_value[1] 0 $comp_value[2] $comp_value[3] $comp_value[4] $comp_value[5]  )\n");

fwrite($f , "VVoltageSource_7  Clk  0 pulse ($comp_value[6] $comp_value[7] 0 $comp_value[8] $comp_value[9] $comp_value[10] $comp_value[11]  )\n");
//fwrite($f , "Vclk1 clk1 0 pulse ($comp_value[7] $comp_value[6] 0 $comp_value[8] $comp_value[9] $comp_value[10] $comp_value[11]  )\n");

fwrite($f , ".tran 1n 100n\n");

fwrite($f , ".save V(Q) V(D) V(Clk)\n");
fwrite($f , ".end\n");


fclose($f);
echo "Done";
//-----------------------------------------------------

`ngspice -b  inv6_flipflop_n.sp -r rawfile_flipflop_n`;
`cat rawfile_flipflop_n |tr [:blank:] "\n" >  outfile_flipflop_n`;
`rm rawfile_flipflop_n`;

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


