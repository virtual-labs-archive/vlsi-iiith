<?php
include_once("config.inc.php");
$cid = mysql_connect($db_host,$db_user,$db_password);
if (!$cid) {

die("ERROR: " . mysql_error() . "\n");
}
mysql_select_db($db);
$drop_experiment_table = mysql_query("DROP TABLE IF EXISTS experiment");
$create_table_experiment = mysql_query("create table experiment( Srno varchar(100), title varchar(300), text varchar(3000), link varchar(3000));");

//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
$a = '
<br />
<div class="panel1">  
<table >
        <tr>
               
<td style="padding:10px;font-weight:lighter "valign="top"><font size="2.5">&nbsp; <div style="background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px"> <p style="font-size:15px;color:rgb(51,51,51)">

In this experiment we will learn the basic design of an inverter. Inverter is the most basic component which we can make out using one NMOS and one PMOS transistor. Here you will learn about the basics how inverter works internally, how the transistor are placed inside inverter and how we get the inverted output corresponding to the inputs we provide.
We will learn the layout designing and effects of capacitance and effects of width and length of transistor on the output of an inverter.<br />

</div></font>
<br/><br/><br/></td>
      </tr>
   </table>
</div>
';
$a =  mysql_real_escape_string($a);
#print "insert into experiment values(1,\"Coulomb's Law\",\"$a\",\"./Experiment.php?code='C001'\")";
print $a;
$stuff = mysql_query("insert into experiment values('C001',\"1. Schematic Design Of Transistor Level Inverter.\",\"$a\",\"./Experiment.php?code=C001\")");

//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
$a = '
<br />
<div class="panel2">   
   <table>
	<tr>
         <td style="padding:10px;font-weight:lighter "valign="top"><font size="2.5">&nbsp;&nbsp;<div style="background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px"><p style = "font-size:15px;color:rgb(51,51,51)">
In this experiment, we will learn about the series and parallel combination of n-switches and p-switches. Then we will proceed to the transistor level designing of NAND and NOR gate using NMOS and PMOS and also layout designing of the same. 
</div> </div></p>
 <br/><br/><br/></td>
	</tr>
	</table>
';
$a =  mysql_real_escape_string($a);
print $a;
$stuff = mysql_query("insert into experiment values('C002',\"2. Schematic Design Of Transistor Level NAND & NOR Gate.\",\"$a\",\"./Experiment.php?code=C002\")");

//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------


$a = '
<br />   
<div class="panel3">
   <table>
	<tr>
         <td style="padding:10px;font-weight:lighter "valign="top"><font size="2.5">&nbsp;&nbsp;<div style="background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px"><p style = "font-size:15px;color:rgb(51,51,51)">
In this experiment, we will first learn how to deduce parallel and series combination of n and p-switches given a combinational logic and hence design them, specifically XOR and XNOR.
</div></div></p>
 <br/><br/><br/></td>
	</tr>
	</table>
';
$a =  mysql_real_escape_string($a);
print $a;
$stuff = mysql_query("insert into experiment values('C003',\"3. Schematic Design Of Transistor Level XOR & XNOR Gate.\",\"$a\",\"./Experiment.php?code=C003\")");
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
$a = '
<br />   
<div class="panel4">
   <table>
	<tr>
         <td style="padding:10px;font-weight:lighter "valign="top"><font size="2.5">&nbsp;&nbsp;<div style="background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px"><p style = "font-size:15px;color:rgb(51,51,51)">

Transmission gates are used in digital circuits to pass or block particular signal from the components. In transmission gates, NMOS and PMOS are parallel connected to each other. Schematic representation of transmission gate and its circuit symbol are shown below.

 </div></p></div>
 <br/><br/><br/></td>
	</tr>
	</table>
';
$a =  mysql_real_escape_string($a);
print $a;
$stuff = mysql_query("insert into experiment values('C004',\"4. Schematic Design Of Pass Transistor Logic & Multiplexer.\",\"$a\",\"./Experiment.php?code=C004\")");
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
$a = '
<br />   
<div class="panel5">
   <table>
        <tr>
         <td style="padding:10px;font-weight:lighter "valign="top"><font size="2.5">&nbsp;&nbsp;<div style="background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px"><p style = "font-size:15px;color:rgb(51,51,51)">

The method of logical effort is one of the methods used to estimate delay in a CMOS circuit. The model describes delay caused by the capacitive load that the logic gate drives and by the topology of the logic gate. As the gate increases delay also increases, but delay depends on the logic function of the gate also.

 </div></p></div>
 <br/><br/><br/></td>
        </tr>
        </table>
';

$a =  mysql_real_escape_string($a);
print $a;
$stuff = mysql_query("insert into experiment values('C005',\"5. Delay Estimation In Chain Of Inverters.\",\"$a\",\"./Experiment.php?code=C005\")");
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
$a = '
<br />   
<div class="panel6">
   <table>
        <tr>
         <td style="padding:10px;font-weight:lighter "valign="top"><font size="2.5">&nbsp;&nbsp;<div style="background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px"><p style = "font-size:15px;color:rgb(51,51,51)">

Latch is an electronic device that can be used to store one bit of information. The D latch is used to capture, or latch the logic level which is present on the Data line when the clock input is high. If the data on the D line changes state while the clock pulse is high, then the output, Q, follows the input, D. When the CLK input falls to logic 0, the last state of the D input is trapped and held in the latch.

 </div></p></div>
 <br/><br/><br/></td>
        </tr>
        </table>
';

$a =  mysql_real_escape_string($a);
print $a;
$stuff = mysql_query("insert into experiment values('C006',\"6. Schematic Design Of D-Latch and D-Flip Flop.\",\"$a\",\"./Experiment.php?code=C006\")");

//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------

$a = '
<br />   
<div class="panel7">
   <table>
        <tr>
 <td style="padding:10px;font-weight:lighter "valign="top"><font size="2.5">&nbsp;&nbsp;<div style="background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px"><p style = "font-size:15px;color:rgb(51,51,51)">
In the experiments we have done till now we have designed gates by arranging transistors in various fashions .The simulation of these designs gave graphs of output voltages and we analyzed how these graph changes with varying different parameters of the transistor. Now when you place a transistor on screen there is a back end code which tells a simulator what are the points to which the transistor\'s substrate,gate,drain,source are connected. The language in which this information is conveyed is spice.
 </div></p></div>
 <br/><br/><br/></td>
        </tr>
        </table>
';
$a =  mysql_real_escape_string($a);
print $a;
$stuff = mysql_query("insert into experiment values('C007',\"7. Spice Code Platform.\",\"$a\",\"./Experiment.php?code=C008\")");
//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
$a = '
<br />   
<div class="panel8">
   <table>
        <tr>
 <td style="padding:10px;font-weight:lighter "valign="top"><font size="2.5">&nbsp;&nbsp;<div style="background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px"><p style = "font-size:15px;color:rgb(51,51,51)">
Till now we have dealt with transistor level issues involved in designing a gate and studied the effects on the waveforms on changing various parameters of transistor(length and width) .The graphs we have seen till now will gives the corresponding analog output voltages. In the earlier experiments, when a transistor was placed and connections were made a spice code was written in the back end. We learned spice in the previous experiment . Now we proceed towards digital level designing of circuits for example lets take an or gate in the second experiment was we arranged pmos and nmos in a particular fashion and simulated to obtain a graph , changing the parameters we analyzed how the rise time ,fall time ,delay etc. changes. If you observe the graph you will find that the input changes from low value near 0 V to high value near 5V ,the rise is not steep one but gradual . In digital designing we will bother only about two levels 0 and 1(a threshold is determined i.e. voltages below threshold will be 0 and those above will be 1 )As we move towards digital designing we shift our concerns from how does the analog voltage changes to how to generate a desired output from a given sequence of inputs. For instance now we will visualize gate as an entity which will gives the desired truth table.
 </div></p></div>
 <br/><br/><br/></td>
        </tr>
        </table>
';
$a =  mysql_real_escape_string($a);
print $a;
$stuff = mysql_query("insert into experiment values('C008',\"8. Design Of D-Flip Flop Using Verilog.\",\"$a\",\"./Experiment.php?code=C009\")");


//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
$a = '
<br />   
<div class="panel9">
   <table>
        <tr>
 <td style="padding:10px;font-weight:lighter "valign="top"><font size="2.5">&nbsp;&nbsp;<div style="background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px"><p style = "font-size:15px;color:rgb(51,51,51)">
Verilog is language commonly used in designing digital systems. It is a hardware description language, which means that it is substantially different from any other language you might have encountered so far. Even though it does have control flow statements and variables, it relies primarily on logic functions.It is a textual format for describing electronic circuits and systems.
 </div></p></div>
 <br/><br/><br/></td>
        </tr>
        </table>
';
$a =  mysql_real_escape_string($a);
print $a;
$stuff = mysql_query("insert into experiment values('C009',\"9. Design Of Digital Circuits Using Verilog.\",\"$a\",\"./Experiment.php?code=C0091\")");
//------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------
$a = '
<br />   
<div class="panel10">
   <table>
        <tr>
 <td style="padding:10px;font-weight:lighter "valign="top"><font size="2.5">&nbsp;&nbsp;<div style="background-color:#e5eecc;border:solid 1px #c3c3c3;padding:5px"><p style = "font-size:15px;color:rgb(51,51,51)">

Under Construction.
 </div></p></div>
 <br/><br/><br/></td>
        </tr>
        </table>
';

$a =  mysql_real_escape_string($a);
print $a;
$stuff = mysql_query("insert into experiment values('C0091',\"10. Layout Design.\",\"$a\",\"./Experiment.php?code=C007\")");

//-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------
?>

