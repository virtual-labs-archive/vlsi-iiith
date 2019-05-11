<?php
mysql_connect("db.virtual-labs.ac.in","cse14","changethis") or die(mysql_error());
mysql_select_db("cse14") or die(mysql_error());
$result = mysql_query("delete from content");

// storing values for inverter's experiment
$intro1 = '<p>
<body>
<font size="3">
                                        <p>Inverter is a logic gate, with one input and one output. Its symbol is shown below:-</p>
                                        <p><center><img src="./vlsi_images/not.jpg"/></center></p>
                                        <p>The output of inverter is complement of the input i.e. if the input is <b>0</b>, the output will be <b>1</b> and vice-versa . The truth table for inverter is shown below:-</p>
                                        <center>
                                        <table border="1" color="#000000">
                                        <tr>
                                        <td align="center"><b>Input</b></td>
                                        <td align="center"><b>Output</b></td>
                                        </tr>
                                        <tr>
                                        <td align="center">0</td>
                                        <td align="center">1</td>
                                        </tr>
                                        <tr>
                                        <td align="center">1</td>
                                        <td align="center">0</td>
                                        </tr>
                                        </table></center>
				<p>The transistor level schematic of inverter can be designed in many logics,following two logics will be used for designing in the experiment<br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>*</b> Complementary CMOS logic<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>*</b> Pseudo NMOS logic<br><br></p>
</font>
';

$obj1 = '
<font size="3"><p>
(a) To design transistor level schematic of an Inverter using <br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>*</b> Complementary CMOS logic<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>*</b> Pseudo NMOS logic<br> </p><br>
                                        <p>(b)To find the effect of load capacitance on the rise time and fall time and hence delay of output waveform.</p><br>
                                        <p>(c)To find the effect of W/L of transistors on the output waveform.</p><br>

</font>
';

$manual1 = '<font size="3"> 
<a href="EXP_1sep2010/Manual_exp1/exp1.swf" target="_blank">Click Here For Experiment Manual</a>
</font> ';
/*$manual1 = '
<br /><br><i><p align="center" style="font-family:serif;font-size:17px;color:green">The following video shows you more details on how to do experiment by changing various parameters</p></i>
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="1200" height="630" id="../../FIRST_3_EXP_26sep2010/Manual/exp1.swf" ALIGN="top-right">
<PARAM NAME=movie VALUE="../../FIRST_3_EXP_26sep2010/Manual/exp1.swf"> <PARAM NAME=quality VALUE=high> <EMBED src="EXP_1sep2010/Manual_exp1/exp1.swf" quality=high width="900" height="530" NAME=" Manual.swf" ALIGN="top" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED> </OBJECT>
';*/

$procedure1 = '<html>
<br>
<br>
<br>
<img src="inverter_procedure.jpg">
';

$virExp1 = '<font size="3"> 
<a href="./EXP_1sep2010/exp1/exp1.html" target="_blank">Experiment</a>
</font> ';
$theory1 = ' 
<body>
<font size="3">
<h3>CMOS INVERTER</h3><br>
<p>In the <a href="#transistor"><font color="red">transistor</font></a> level design of CMOS inverter consists of nmos and pmos transistor in series.The PMOS transistor is connected between V<sub>dd</sub> and output node,whereas the NMOS is connected betweeen the output node and gnd.</p><br>
<h3>WORKING OF CMOS INVERTER</h3><br>
<p>Before knowing the working of CMOS inverter we will see the regions of operation of transistor so that we can understand what is actually happening inside the inverter. MOS transistors have three regions of operations : <br>
&nbsp;&nbsp;&nbsp;&nbsp;<b>1)</b> cut-off region<br> 
&nbsp;&nbsp;&nbsp;&nbsp;<b>2)</b> linear region<br> 
&nbsp;&nbsp;&nbsp;&nbsp;<b>3)</b> saturation region<br><br>
<p>The transistor is said to be in <b>cut-off region</b> when V<sub>gs</sub> < V<sub>t</sub>. V<sub>gs</sub> is the voltage applied at gate with respect to source and V<sub>t</sub> is the threshhold voltage below which the transistor does not work. So for transistor to work V<sub>gs</sub> - V<sub>t</sub> should be greater than zero always.</p><br>
<p>The transistor is in <b>linear region</b> when V<sub>gs</sub> - V<sub>t</sub> > V<sub>ds</sub> where V<sub>ds</sub> is the voltage at drain with respect to source.</p><br>
<p>The transistor is said to be in <b>saturation region</b> when v<sub>gs</sub> - V<sub>t</sub> < V<sub>ds</sub></p><br>

<p>The transfer characteristic(i.e. the output voltage vs input voltage) is shown in the figure below. The operation is divided into 5 region depending on the range of input voltage(Move your mouse over the region to know about the region).The output voltage in every region is obtained by equating drain to source current of pmos and nmos.</p><br>
<script type="text/javascript">
function writeText(txt)
{
document.getElementById("desc").innerHTML=txt;
}
</script>
</head>
<body>
<center><img src="./vlsi_images/DC_CHARC.jpg" width="300" height="300" usemap="#region">

<map name="region">
<area shape="rect" coords="50,30,80,100" onMouseOver="writeText(\'<b>Region I: NMOS is off,PMOS is in linear region.<p>V<sub>out</sub> = V<sub>dd</sub></p></b>\')"/>
<area shape="rect" coords="80,30,100,120" onMouseOver="writeText(\'Region II: PMOS is in linear region,NMOS is in saturation region.\')"/>
<area shape="rect" coords="100,40,145,270" onMouseOver="writeText(\'Region III: PMOS and NMOS both are in saturation region.<p>V<sub>in</sub> - V<sub>tn</sub>&lt V<sub>0</sub> &lt <V<sub>in</sub> - <sub>tp</sub></p>\')"/>
<area shape="rect" coords="145,220,185,280" onMouseOver="writeText(\'Region IV: PMOS is in saturation region and NMOS is in linear region\')"/>
<area shape="rect" coords="185,240,225,290" onMouseOver="writeText(\'Region V: PMOS is off and NMOS is in linear region.<p>V<sub>out</sub> = 0</p>\')"/>
</map>
<p id="desc"></p></center>
</body>
<br>
<br>
<h3>EFFECT OF W/L RATIO ON OUTPUT WAVEFORM</h3><br>
<p>Before proceeding to the study of effect please read the definition of <a href="#beta"><font color="red">&#946 (gain factor)</font></a>.</p> <br>
<p>W/L ratio is directly proportional to &#946.The ratio &#946<sub>n</sub>/&#946<sub>p</sub> is crucial in determinig the transfer characteristic of the inverter.When the ratio is increased the transition shifts from left to right,but the output voltage transition remains sharp.For CMOS the ratio is desired to be 1 so that it requires equal time to charge and discharge.</p><br>
<h3>EFFECT OF CAPACITANCE ON THE RISE AND FALL TIME</h3><br>
<p>The rise time is defined as the time required to charge the capacitor from 10% to 90% and fall time is defined as the time required for the capacitor to discharge from 90% to 10%.
How the rise time and the fall time is calculated is shown in the figure below :</p><br>
<center><img src="trtf.jpg"></center><br>
<p>Greater value of capacitor implies larger rise and fall time,which furthur implies large <a href=#delay"><font color="red">delay</font></a>. The rise time and fall time are directly proportional to the capacitance, therefore, greater the value of capacitance, greater will be the time taken for rising and falling.</p><br> 
<h3>PSEUDO NMOS</h3><br>
<p>The gate of p-device is permanently grounded which is equivalent to use of NMOS in <a href="#dep"><font color="red">depletion mode</font></a></p><br>
</font>
<br>
<br>
<br>
<font size="3">
<hr>
<h3>SOME BASIC DEFINITIONS AND THEORY</h3><br>
<hr>
<br>
<a name="transistor"><h4>TRANSISTOR</h4></a><br>
<p>Basically transistor consistes of three parts - GATE, SOURCE and DRAIN as shown in figure below:</p> <br>
<center><img src="trans.jpg"></center>
<p> The gate is a control input which determines the flow of electric current between source and drain. Physically drain and source are equivalent and the two types of transistor i.e. n-transistor and p-transistor differ only in the way electric current flows between source and drain according to the different values applied at the controlling gate input. In n-transistor when logic 1 is aplied to gate, the current flows bwetween source and drain while no current flows when logic 0 is applied. The p-transistor works just the opposite way - the current flows between source and drain when logic 0 is applied and no current on logic 1.</p><br>
<a name="beta"><h4>&#946 - GAIN FACTOR</h4></a><br>
<p>&#946 is the MOS transistor gain factor which depends both on process parameters and geometry parameters.</p><br>
<center><b>&#946 = k(W/L)</b><br> where K is the factor which shows process dependency <br> and W & L shows geometry dependency<br></center>
<br>
<p>For NMOS, gain factor is denoted by  &#946<sub>n</sub> and for PMOS, gain factor is denoted by &#946<sub>p</sub>.</p><br> 
<a name="delay"><h4>DELAY</h4></a><br>
<p>Delay time is the time taken for the input transistion (50% level) into output (50% level). The <b>single gate delay</b> is given by the average of rise time and fall time, so delay also is directly proportional to the capacitance value</p><br>
<a name="dep"><h4>DEPLETION MODE</a><br>
<p>Using NMOS in depletion region means increasing negative voltage on the gate to reduce current flow or we can say to deplete the channel of free carriers which are electrons in n-channel.</p><br>
</body>
';

$quiz1 = '
<html>
<head>
<font size="3">
<title>Quiz on Inverter</title>

<script>


//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
   numCorrect += checkQuestionRadio( document.quiz.q10);


  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
   highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value =
     "You got " + numCorrect + " out of 10 questions correct.\n" +
     "The correct answers are highlighted." 

}
</script>
</head>
<body>
<center><a href="#post"><img src="post_quiz.jpg"></a></center><br>
<center><a href="#pre"><img src="pre_quiz.jpg"></a></center><br><br><hr><hr><br><br>
<a name="pre"><h1><b>PRE_QUIZ</b></h1></a><hr><br>
<ul>
<li> What do you mean by rise time and fall time ?
<li> What are the three regions of operation of an inverter ?
<li> What is the expression for gain factor ?
<li> Name the IC used for inverter.
<a name="post"><b><h1><b>POST_QUIZ</b></h1></b></a><hr><br>
<form name="quiz">
<ol>
<li><b>The number of inputs in an inverter is ____.</b><br>
   <span id="correct1"><input type="radio" name="q1" value="correct">1</span><br>
   <input type="radio" name="q1" value="wrong">2<br>
   <input type="radio" name="q1" value="wrong">3<br>
   <input type="radio" name="q1" value="wrong">4<br><br>
</li>
<hr>

<li><b>Inverter gate is same as __________.</b><br>
   <input type="radio" name="q2" value="wrong">AND gate<br>
   <span id="correct2"><input type="radio" name="q2" value="correct">NOT gate</span><br>
   <input type="radio" name="q2" value="wrong">NOR gate<br>
   <input type="radio" name="q2" value="wrong">NAND gate<br><br>
</li>
<hr>

<li><b>Which is the most suitable representation for a NOT gate?</b><br>
   <span id="correct3"><input type="radio" name="q3" value="correct"><img src="./vlsi_images/1st.jpg"></span><br><br>
   <input type="radio" name="q3" value="wrong"><img src="./vlsi_images/2nd.jpg"><br><br>
   <input type="radio" name="q3" value="wrong"><img src="./vlsi_images/3rd.jpg"><br><br>
   <input type="radio" name="q3" value="wrong"><img src="./vlsi_images/4th.jpg"><br><br><br>
</li>
<hr>

<li><b>Identify which statement is true for inverter?</b><br>
   <input type="radio" name="q4" value="wrong">Any difference in inputs gurantees a high output<br>
   <input type="radio" name="q4" value="wrong">Any difference in inputs gurantees a low output<br>
   <input type="radio" name="q4" value="wrong">A high input gives a high output<br>
   <span id="correct4"><input type="radio" name="q4" value="correct">A low input gives a high output</span><br><br>
</li>
<hr>

<li><b>What is the traditional symbol for inverter?</b><br>
   <input type="radio" name="q5" value="wrong"><img src="nand.jpg"><br>
   <input type="radio" name="q5" value="wrong"><img src="nor.jpg"><br>
   <span id="correct5"><input type="radio" name="q5" value="correct"><img src="./vlsi_images/not.jpg"></span><br>
   <input type="radio" name="q5" value="wrong"><img src="./vlsi_images/inv.jpg"><br><br>
</li>
<hr>
<hr><br><br>

<li><b>Choose the electrical analogue of an inverter.</b><br>
   <input type="radio" name="q6" value="wrong"><img src="elec_anal2.jpg"><br>
   <span id="correct6"><input type="radio" name="q6" value="correct"><img src="elec_anal1.jpg"></span><br>
   <input type="radio" name="q6" value="wrong"><img src="elec_anal3.jpg"><br>
   <input type="radio" name="q6" value="wrong">none of these<br>
</li>
<hr>

<li><b>What is the correct input voltage range for region D?</b><br>
   <span id="correct7"><input type="radio" name="q7" value="correct"><sup>V<sub>dd</sub></sup>/<sub>2</sub> &lt; V<sub>in</sub> &#8804; V<sub>dd</sub>-V<sub>tp</sub></span><br>
   <input type="radio" name="q7" value="wrong">V<sub>in</sub> = <sup>V<sub>dd</sub></sup>/<sub>2</sub><br>
   <input type="radio" name="q7" value="wrong">0 &#8804; V<sub>in</sub> &#8804; V<sub>tn</sub><br>
   <input type="radio" name="q7" value="wrong">V<sub>in</sub> &#8805; V<sub>dd</sub>-V<sub>tp</sub><br><br>
</li>
<hr>

<li><b>What are the operation states of n-device and p-device respectively in region B?</b><br>
   <input type="radio" name="q8" value="wrong">linear & unsaturated<br>
   <input type="radio" name="q8" value="wrong">cut-off & linear<br>
   <input type="radio" name="q8" value="wrong">linear & saturated<br>
   <span id="correct8"><input type="radio" name="q8" value="correct">saturated & linear</span><br><br>
</li>
<hr>

<li><b>What is delay?</b><br>
   <input type="radio" name="q9" value="wrong">maximum of rise time and fall time<br>
   <input type="radio" name="q9" value="wrong">product of rise time and fall time<br>
   <span id="correct9"><input type="radio" name="q9" value="correct">average of rise time and fall time</span><br>
   <input type="radio" name="q9" value="wrong">addition of rise time and fall time<br><br>
                                              </li>
<hr>

<li><b>What is desirable <sup>&#946;<sub>n</sub></sup>/<sub>&#946;<sub>p</sub></sub> ratio for an inverter?</b><br>
   <input type="radio" name="q10" value="wrong">0<br>
   <span id="correct10"><input type="radio" name="q10" value="correct">1</span><br>
   <input type="radio" name="q10" value="wrong">0.5<br>
   <input type="radio" name="q10" value="wrong">&#8734;<br><br>
</li>
<hr>

</ol>

<input type="button" onClick="checkQuiz()" value="check quiz">
<hr>
<textarea cols="80" rows="10" name="output"></textarea>
</form>
</font>
</body>


</html>
';

$ref1 = '
<font size="3"
<ol>
<li><b>"Principles of cmos vlsi design"</b>
by Weste-Eshraghian</li><br>
<li> http://www.iue.tuwien.ac.at/phd/pichler/node75.html
http://www.hitequest.com/Kiss/VLSI.html</li><br>
<li><b>CMOS: Circuit Design, Layout, and Simulation, Third Edition</b> by Bacor, R. Jacob. Wiley-IEEE. pp. 1174.
Chen, Wai-Kai (ed) (2006). </li><br>
<li><b>The VLSI Handbook, Second Edition (Electrical Engineering Handbook)</b> by Boca Raton: CRC. ISBN 0-8493-4199-X.</li><br>
<li>http://jas.eng.buffalo.edu/education/fab/NMOS/nmos.html</li><br>
<ol>
</font>';
$feedback1='<iframe src="https://spreadsheets.google.com/embeddedform?formkey=dFk3Mnh2b1J0Y2Z6eVRvRWJEdThGRXc6MQ" width="760" height="2856" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>';

$intro1 = mysql_real_escape_string($intro1);
$obj1 = mysql_real_escape_string($obj1);
$manual1 = mysql_real_escape_string($manual1);
$procedure1 = mysql_real_escape_string($procedure1);
$virExp1 = mysql_real_escape_string($virExp1);
$theory1 = mysql_real_escape_string($theory1);
$quiz1 = mysql_real_escape_string($quiz1);
$ref1 = mysql_real_escape_string($ref1);
$feedback1 = mysql_real_escape_string($feedback1);


// storing values for coloumb's law experiment

	$intro2 = '<html>
<body>
<font size="3">
<h3>DEFINITION OF NAND GATE</h3>
<b>NAND</b> gate has 1 output and 2 or more input<br>
The output of the NAND gate is low only when all the inputs are high else it is low.<br>
A NAND gate could be veiwed as an AND gate with inverter at the output<br><br>
<h3>SCHEMATIC OF NAND GATE</h3><br> 
<img src="./vlsi_images/nand_shematic.jpg" align="left" width="150" height="100"><br>
<center>
                                        <table border="1" color="#000000">
                                        <tr>
                                        <td align="center"><b>Input A</b></td>
                                        <td align="center"><b>Input B</b></td>
                                        <td align="center"><b>Output</b></td>
                                        </tr>
                                        <tr>
                                        <td align="center">0</td>
                                        <td align="center">0</td>
                                        <td align="center">1</td>
                                        </tr>
                                        <tr>
                                        <td align="center">0</td>
                                        <td align="center">1</td>
                                        <td align="center">1</td>
                                        </tr>
                                        <tr>
                                        <td align="center">1</td>
                                        <td align="center">0</td>
                                        <td align="center">1</td>
                                        </tr>
                                        <tr>
                                        <td align="center">1</td>
                                        <td align="center">1</td>
                                        <td align="center">0</td>
                                        </tr>
</table></center><br>
<h3>DEFINITION OF NOR GATE</h3>
<p><b>NOR</b> gate has 1 output and 2 or more input <br>
The output of NOR gate is high only when all the inputs are low else it is high<br>
A NOR gate could be viewed as an OR gate with inverter at the output<br></p>
<br><br> 
<h3>SCHEMATIC OF NOR GATE</h3><br>
<img src="./vlsi_images/nor_schematic.jpg" align="left" width="150" height="100">
                                        <center>
                                        <table border="1" color="#000000">
                                        <tr>
                                        <td align="center"><b>Input A</b></td>
                                        <td align="center"><b>Input B</b></td>
                                        <td align="center"><b>Output</b></td>
                                        </tr>
                                        <tr>
                                        <td align="center">0</td>
                                        <td align="center">0</td>
                                        <td align="center">1</td>
                                        </tr>
                                        <tr>
                                        <td align="center">0</td>
                                        <td align="center">1</td>
                                        <td align="center">0</td>
                                        </tr>
                                        <tr>
                                        <td align="center">1</td>
                                        <td align="center">0</td>
                                        <td align="center">0</td>
                                        </tr>
                                        <tr>
                                        <td align="center">1</td>
                                        <td align="center">1</td>
                                        <td align="center">0</td>
                                        </tr>


                                        </table></center>

</font>
</body>
</html>
';

$obj2 = '
<font size="3"> 
<p>(a)
&nbsp;
To design a 2 input NAND gate using 2 NMOS and 2 PMOS<br><br> 
<p>(b)
To design a 2 input NOR gate using 2 NMOS and 2 PMOS<br>
</font>


';

$manual2 = '<font size="3"> 
<a href="EXP_1sep2010/Manual_exp1/exp1.swf" target="_blank">Click Here For Experiment Manual</a>

</font> ';

/*$manual2 = '
<br /><br><i><p align="center" style="font-family:serif;font-size:17px;color:green">The following video shows you more details on how to do experiment by changing various parameters</p></i>
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="900" height="530" id="Manual.swf" ALIGN="top-right">
<PARAM NAME=movie VALUE="12.swf"> <PARAM NAME=quality VALUE=high> <EMBED src="EXP_1sep2010/Manual_exp1/exp1.swf" quality=high width="900" height="530" NAME=" Manual.swf" ALIGN="top" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED> </OBJECT>
';
*/
$procedure2 = '
<html>
<br>
<h2>NAND</h2>
<img src="nand_procedure.jpg">
<br>
<h2>NOR</h2>
<img src="nor_procedure.jpg">
';

$virExp2 = '
<font size="3"> 
<a href="./EXP_1sep2010/exp2/exp2.html" target="_blank">Experiment</a>
</font> ';


$theory2 = '
<font size="3">
 <p>
<h3>SWITCHING BEHAVIOUR OF TRANSISTOR</h3>
<p>The gate of the MOS transistor controls the passage of the current between the drain and source.If the voltage at the gate is Vdd ,no current flows between the drain and source of PMOS and same is the case with NMOS if its gate is grounded.This characteristic of MOS transistors,enables it to be viewed as a switch.The switching behaviour of nmos and pmos device is shown in the figure below.Here the input 0 indicates that the gate is grounded and input 1 indicates that Vdd is applied to the gate:</p><br><p><img src="./vlsi_images/nmos_as_switch.jpg"/><img src="./vlsi_images/pmos_as_switch.jpg"/></p>
<h3>SERIES AND PARALLEL CONNECTION</h3>
<p>The transistor level schematic of any combinational logic can be obtained by placing two or more n/p-switches in series or parallel.
<p>If switches are connected in series then the composite switch hence constructed is closed when both the switches are closed.The series connection is shown in the figure below.The table indicates the states of the switch contructed by series connection depending on the inputs A and B</p><br>
<img src="./vlsi_images/gen_series.jpg" align="left"/>
<p>
	<center><b>Series connection of NMOS devices</b><br>
	<table border="1">
	<tr>
	<th> &nbsp <sup>B</sup><br><sub>A</sub> </th>
        <th colspan="2">0   &nbsp 1</th>
	</tr>
        <tr> 
	<th rowspan="2">0<br>1</th>
        <td>OFF</td>
	<td>OFF</td>
	</tr>
 	<tr>
	<td>OFF</td>
	<td>ON</td>
	</tr>
	</table></center>
	<br>
	<center><b>Series connection of PMOS devices</b><br>
	<table border="1">
	<tr>
	<th> &nbsp <sup>B</sup><br><sub>A</sub> </th>
        <th colspan="2">0   &nbsp 1</th>
	</tr>
        <tr> 
	<th rowspan="2">0<br>1</th>
        <td>ON</td>
	<td>OFF</td>
	</tr>
 	<tr>
	<td>OFF</td>
	<td>OFF</td>
	</tr>
	</table></center>
<br>
<br>
<p>If the switches are connected in parallel then the composite switch hence constructed is closed when either or both of the switches are closed.The parallel connection is shown in the figure below.The table indicates the states of the switch obtained by parallel connection depending on the inputs A and B </p>
<img src="./vlsi_images/gen_parallel.jpg" align="left"/>
	<center><b>Parallel connection of NMOS devices</b><br>
	<table border="1">
	<tr>
	<th> &nbsp <sup>B</sup><br><sub>A</sub> </th>
        <th colspan="2">0   &nbsp 1</th>
	</tr>
        <tr> 
	<th rowspan="2">0<br>1</th>
        <td>OFF</td>
	<td>ON</td>
	</tr>
 	<tr>
	<td>ON</td>
	<td>ON</td>
	</tr>
	</table></center>
<br>
	<center><b>Parallel connection of PMOS devices</b><br>
	<table border="1">
	<tr>
	<th> &nbsp <sup>B</sup><br><sub>A</sub> </th>
        <th colspan="2">0   &nbsp 1</th>
	</tr>
        <tr> 
	<th rowspan="2">0<br>1</th>
        <td>ON</td>
	<td>ON</td>
	</tr>
 	<tr>
	<td>ON</td>
	<td>OFF</td>
	</tr>
	</table></center>
<br>
<br>
<p>By using any combinations of the above constructions,CMOS combinational gates can be obtained.In the following section ,Karnaugh maps for NAND and NOR have been used to determine the required combination</p><br>
<h3>K-MAP FOR NAND</h3><br>
<img src="./vlsi_images/theory_nand.jpg"/></p>
<p>Thus for NAND gate PMOS devices are connected in parallel between Vdd and output node,whereas the NMOS devices are in series between output node and ground.</p> 
<br>
<h3>K-MAP FOR NOR</h3><br>
<img src="./vlsi_images/theory_nor.jpg"/></p>
<p>Thus for NOR gate PMOS devices are connected in series between Vdd and output node,whereas the NMOS devices are in parallel between output node and ground.</p><br>
</font>
</body>
</html>
        

';

$quiz2 = '
<html>
<head>
<title>Quiz on Nand Nor</title>

<script>


//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
  //The orange highlighted code may need to be changed
   //you will need to match these question types(Radio/DropDown)
   //and names (q1, q2, ...) to the ones in your quiz
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
  // numCorrect += checkQuestionRadio( document.quiz.q10);

  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
//   highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value =
     "You got " + numCorrect + " out of 9 questions correct.\n" +
     "The correct answers are highlighted." 

}
</script>
</head>
<body>

<center><a href="#post"><img src="post_quiz.jpg"></a></center><br>
<center><a href="#pre"><img src="pre_quiz.jpg"></a></center><br><br><hr><hr><br><br>
<a name="pre"><h1><b>PRE_QUIZ</b></h1></a><hr><br>
<font size="3">
<ul>
<li>
Draw truth table for NAND and NOR gate.
</li>
<li>
Write the combinations of input for which NAND and NOR gate behaves exactly the same.
</li>
<li>
How can a NAND gate can be cinverted to behave as an inverter?
</li>
<li>
What are the driving volage range for n-switch and p-switch respectively?
</li>
<li>
What is the advantage of making Karnaugh Map of any combinational logic?
</li>
</ul>
</font>
<a name="post"><h1><b>POST_QUIZ</b></h1></a><hr><br>
<font size="3">

<form name="quiz">
<ol>
<li><b>Identify the symbol for NAND gate.</b><br>
   <span id="correct1"><input type="radio" name="q1" value="correct"><img src="nand.jpg"></span><br>
   <input type="radio" name="q1" value="wrong"><img src="./vlsi_images/inv.jpg"><br>
   <input type="radio" name="q1" value="wrong"><img src="./vlsi_images/not.jpg"><br>
   <input type="radio" name="q1" value="wrong"><img src="and.jpg"><br>
</li>
<hr>

<li><b>Identify the symbol for NOR gate.</b><br>
   <input type="radio" name="q2" value="wrong"><img src="and.jpg"><br>
   <input type="radio" name="q2" value="wrong"><img src="nand.jpg"><br>
   <span id="correct2"><input type="radio" name="q2" value="correct"><img src="nor.jpg"></span><br>
   <input type="radio" name="q2" value="wrong"><img src="or.jpg"><br>
</li>
<hr>

<li><b>How do we represent <img src="bar.jpg"> with n-devices?</b><br>
   <input type="radio" name="q3" value="wrong">series connection of n-devices with input A and input B<br>
   <span id="correct3"><input type="radio" name="q3" value="correct">parallel connection of p-devices with input A and input B</span><br>
   <input type="radio" name="q3" value="wrong">combination of series and parallel connecton of n-devices<br>
   <input type="radio" name="q3" value="wrong">none<br>
</li>
<hr>

<li><b>What is the correct representation (in terms of switches) for two n-devices connected in series having inputs 0 & 1?</b><br>
   <input type="radio" name="q4" value="wrong"><img src="./vlsi_images/n00.jpg"><br>
   <input type="radio" name="q4" value="wrong"><img src="./vlsi_images/n10.jpg"> <br>
   <input type="radio" name="q4" value="wrong"><img src="./vlsi_images/n11.jpg"> <br>
   <span id="correct4"><input type="radio" name="q4" value="correct"><img src="./vlsi_images/n01.jpg"</span><br>
</li>
<hr>

<li><b>What is the correct representation (in terms of switches) for two p-devices connected in series having both inputs as 1?</b><br>
   <input type="radio" name="q5" value="wrong"><img src="./vlsi_images/p00.jpg"><br>
   <span id="correct5"><input type="radio" name="q5" value="correct">NMOS in parallel and PMOS in series</span><br>
   <input type="radio" name="q5" value="wrong">Both NMOS and PMOS in parallel<br>
   <input type="radio" name="q5" value="wrong">Both NMOS and PMOS in series<br>
</li>
<hr>

<li><b>Which of the following Boolean expression is represented by the given karnaugh map?</b><br><center><img src="kar1.jpg"></center><br>
   <span id="correct6"><input type="radio" name="q6" value="correct">B</span><br>
   <input type="radio" name="q6" value="wrong">A<br>
   <input type="radio" name="q6" value="wrong">A+B<br>
   <input type="radio" name="q6" value="wrong">AB<br>
</li>
<hr>

<li><b>Which of the following Boolean expression is represented by the given karnaugh map?</b><br><center><img src="kar2.jpg"></center><br>
   <input type="radio" name="q7" value="wrong">AB<br>
   <input type="radio" name="q7" value="wrong">BC<br>
   <span id="correct7"><input type="radio" name="q7" value="correct">AC</span><br>
   <input type="radio" name="q7" value="wrong">ABC<br>
</li>
<hr>

<li><b>Which combination of logic gates is correct for the expression ABCD?</b><br>
   <input type="radio" name="q8" value="wrong"><img src="./vlsi_images/t1.jpg"><br>
   <input type="radio" name="q8" value="wrong"><img src="./vlsi_images/t2.jpg"><br><br><br>
   <span id="correct8"><input type="radio" name="q8" value="correct">Both a & b</span><br><br><br>
   <input type="radio" name="q8" value="wrong">None<br>
</li>
<hr>

<li><b>Which combination of logic gates is correct for the following expression?<br><center><img src="exp1.jpg"></center></b><br>
   <input type="radio" name="q9" value="wrong"><img src="./vlsi_images/t3.jpg"><br>
   <input type="radio" name="q9" value="wrong"><img src="./vlsi_images/t4.jpg"><br><br><br>
   <input type="radio" name="q10" value="wrong">none of the above<br><br><br>
   <span id="correct9"><input type="radio" name="q9" value="correct">both a & b</span><br>
</li>
<hr>

</ol>

<input type="button" onClick="checkQuiz()" value="check quiz">
<hr>
<textarea cols="80" rows="10" name="output"></textarea>
</form>
</font>
</body>


</html>';

$ref2 = '
<font size="3"
<ol>
<li><b>"Principles of cmos vlsi design"</b>
by Weste-Eshraghian</li>
<li> http://www.iue.tuwien.ac.at/phd/pichler/node75.html
http://www.hitequest.com/Kiss/VLSI.html</li><br>
<li><b>CMOS: Circuit Design, Layout, and Simulation, Third Edition</b> by Bacor, R. Jacob. Wiley-IEEE. pp. 1174.
Chen, Wai-Kai (ed) (2006). </li><br>
<li><b>The VLSI Handbook, Second Edition (Electrical Engineering Handbook)</b> by Boca Raton: CRC. ISBN 0-8493-4199-X.</li><br>
<li>http://jas.eng.buffalo.edu/education/fab/NMOS/nmos.html</li><br>
<ol>
</font>';



$feedback2='<iframe src="https://spreadsheets.google.com/embeddedform?formkey=dFk3Mnh2b1J0Y2Z6eVRvRWJEdThGRXc6MQ" width="760" height="2856" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>';

$feedback2 = mysql_real_escape_string($feedback2);
$intro2 = mysql_real_escape_string($intro2);
$obj2 = mysql_real_escape_string($obj2);
$manual2 = mysql_real_escape_string($manual2);
$procedure2 = mysql_real_escape_string($procedure2);
$virExp2 = mysql_real_escape_string($virExp2);
$theory2 = mysql_real_escape_string($theory2);
$quiz2 = mysql_real_escape_string($quiz2);
$ref2 = mysql_real_escape_string($ref2);



// third experiment

$intro3 = '
<html>
<body>
<font size="3">
<p><b>XOR</b>(exclusive OR)<br>
For a 2 input XOR,the output of the gate is low when both the inputs are same(either both low or both high).The output is high if one and only one of the inputs is high.The function is addition modulo 2 and hence the gate is used in half adder</p>
The schematic and truth table for 2 input A and B for XOR gate :-
<h3>SCHEMATIC OF XOR GATE</h3><br>
<img src="xorgate.jpeg" align="left" width="150" height="100">
                                        <center>
                                        <table border="1" color="#000000">
                                        <tr>
                                        <td align="center"><b>Input A</b></td>
                                        <td align="center"><b>Input B</b></td>
                                        <td align="center"><b>Output</b></td>
                                        </tr>
                                        <tr>
                                        <td align="center">0</td>
                                        <td align="center">0</td>
                                        <td align="center">0</td>
                                        </tr>
                                        <tr>
                                        <td align="center">0</td>
                                        <td align="center">1</td>
                                        <td align="center">1</td>
                                        </tr>
                                        <tr>
                                        <td align="center">1</td>
                                        <td align="center">0</td>
                                        <td align="center">1</td>
                                        </tr>
                                        <tr>
                                        <td align="center">1</td>
                                        <td align="center">1</td>
                                        <td align="center">0</td>
                                        </tr>


                                        </table></center>

<p><b>XNOR</b>(exclusive OR)<br>
For a 2 input XNOR,the output of the gate is high when both the inputs are same(either both low or both high).The output is low if one and only one of the inputs is high.</p>
The schematic and truth table for 2 input A and B for XOR gate :-
<h3>SCHEMATIC OF XNOR GATE</h3><br>
<img src="xnor.jpeg" align="left" width="150" height="100">
                                        <center>
                                        <table border="1" color="#000000">
                                        <tr>
                                        <td align="center"><b>Input A</b></td>
                                        <td align="center"><b>Input B</b></td>
                                        <td align="center"><b>Output</b></td>
                                        </tr>
                                        <tr>
                                        <td align="center">0</td>
                                        <td align="center">0</td>
                                        <td align="center">1</td>
                                        </tr>
                                        <tr>
                                        <td align="center">0</td>
                                        <td align="center">1</td>
                                        <td align="center">0</td>
                                        </tr>
                                        <tr>
                                        <td align="center">1</td>
                                        <td align="center">0</td>
                                        <td align="center">0</td>
                                        </tr>
                                        <tr>
                                        <td align="center">1</td>
                                        <td align="center">1</td>
                                        <td align="center">1</td>
                                        </tr>
</table>
</center>


</font>
</body>
</html>
';















$obj3 = '
<html>
<body>
<font size="3">
<p>(a)
To design a 2 input XOR gate using minimum number of transistors<br><br>
<p>(b)
To design a 2 input XNOR gate using minimum number of transistors<br>
</font>
</body>
</html>
';

$manual3 = '<font size="3"> 
<a href="EXP_1sep2010/Manual_exp1/exp1.swf" target="_blank">Click Here For Experiment Manual</a>
</font> ';

/*$manual3 = '
<br /><br><i><p align="center" style="font-family:serif;font-size:17px;color:green">The following video shows you more details on how to do experiment by changing various parameters</p></i>
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="900" height="530" id="Manual.swf" ALIGN="top-right">
<PARAM NAME=movie VALUE="12.swf"> <PARAM NAME=quality VALUE=high> <EMBED src="EXP_1sep2010/Manual_exp1/exp1.swf" quality=high width="900" height="530" NAME=" Manual.swf" ALIGN="top" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED> </OBJECT>
';
*/
$procedure3 = '
<html>
<br><h2>XOR</h2>
<img src="xor_procedure.jpg">
<br>
<h2>XNOR</h2>
<img src="xnor_procedure.jpg">
</html>';
$virExp3 ='
<font size="3"> 
<a href="./EXP_1sep2010/exp3/exp3.html" target="_blank">Experiment</a>
</font> ';


$theory3 = '<html>
<body>
<font size="3">
<p>Having gained sufficient knowledge about series and parallel connection, we now move towards desining transistor level schematic for any given combinational logic. This is done by analysing the kmap of the given combination for p- and n-switches and then deducing the required series or parallel combination.The following example will give you an idea about how to go for designing a combinational logic using transistors.
             we want to design transistor level schematic of <span style="text-decoration: overline">(AB+CD)</span> </p><br>
<h3><u>K-MAP</u></h3>
<br>
<img src="kmap_xor.png">
<font size="3">
<h3><u>IMPLEMENTATION</u> <u>FOR</u> <u>N-SWITCHES</u></h3>
<img src="nmos_imp.jpg">
The series combination of A and B is in parallel with the series combination of C and D.
<h3><u>IMPLEMENTATION</u> <u>FOR</u> <u>P-SWITCHES</u></h3>
<img src="pmos_imp.jpg"> 
The parallel combination of A and B is in series with the parallel combination of C and D.

<p>The complete design will be as shown in the figure below</p><br>
<img src="./vlsi_images/logic.jpg"/>
<!-- let say we dont have bar then what do we need to add in aur schematic----make using php logic -->
<h3>XOR</h3>
A &oplus; B = A<span style="text-decoration: overline">B</span> + <span style="text-decoration: overline">A</span>B <br>
<span style="text-decoration:overline">A</span> is analogous to C and <span style="text-decoration:overline">B</span> is analogous to D.
If implementation is done according to the example described above we would require 5 NMOS and 5 PMOS.<br> 4 NMOS and PMOS for implementation of complement of A<font style="text-decoration: overline">B</font>+<font style="text-decoration: overline">A</font>B <br>and 1 pair for the inverter. <br>.Now,think of a method to reduce the number of transistor. 1 pair needed for inverting can be reduced if XOR is implemented as the complement of XNOR.<br><br>
<h3>XNOR</h3>
<span style="text-decoration: overline"> A &oplus; B</span>
in the similar way xnor if implemented as complement of A &oplus; B rather than AB+<span style="text-decoration: overline">A</span> <span style="text-decoration: overline">B</span> would require 4 NMOS and PMOS.In that case <span style="text-decoration:overline">B</span> would be analougos to B in the above example,<span style="text-decoration:overline">A</span> to C and B to D.
</font>
</body>
</html>
~     

';

$quiz3 = '<title>Quiz on XOR and XNOR</title>
<script>

//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
//The orange highlighted code may need to be changed
   //you will need to match these question types(Radio/DropDown)
   //and names (q1, q2, ...) to the ones in your quiz
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
  // numCorrect += checkQuestionRadio( document.quiz.q10);

  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
  // highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value =
     "You got " + numCorrect + " out of 10 questions correct.\n" +
     "The correct answers are highlighted." 

}
</script>
</head>
<body>

<center><a href="#post"><img src="post_quiz.jpg"></a></center><br>
<center><a href="#pre"><img src="pre_quiz.jpg"></a></center><br><br><hr><hr><br><br>
<a name="pre"><h1><b>PRE_QUIZ</b></h1></a><hr><br>
<font size="3">
<ul>
<li> Draw the truth table for XNOR gate.
<li> Implement A+B using PMOS transistors.
<li> Write down the various possible logic for XOR.
<li> How do you convert XOR gate into buffer.

</ul>
<a name="post"><h1><b>POST_QUIZ</b></h1></a><hr><br>
<form name="quiz">
<ol>
<li><b>Can you distinguish between AND and XNOR gate when both the inputs are 1?</b><br>
   <span id="correct1"><input type="radio" name="q1" value="correct">NO</span><br>
   <input type="radio" name="q1" value="wrong">YES<br>
   <input type="radio" name="q1" value="wrong">MAY or MAY NOT<br>
   <input type="radio" name="q1" value="wrong">none of the above<br><br>
</li>
<hr>

<li><b>Chose the correct design of <font style="text-decoration:overline">A+BC</font> using NMOS only.</b><br>
   <input type="radio" name="q2" value="wrong"><img src="./vlsi_images/pic1.jpg"><br>
   <input type="radio" name="q2" value="wrong"><img src="./vlsi_images/pic2.jpg"><br>
   <span id="correct2"><input type="radio" name="q2" value="correct"><img src="./vlsi_images/pic3.jpg"></span><br>
   <input type="radio" name="q2" value="wrong"><img src="./vlsi_images/pic4.jpg"><br><br>
</li>
<hr>

<li><b>Chose the correct design of <font style="text-decoration:overline">AC+BC</font> using PMOS only.</b><br>
   <span id="correct3"><input type="radio" name="q3" value="correct"><img src="./vlsi_images/pic5.jpg"></span><br><br>
   <input type="radio" name="q3" value="wrong"><img src="./vlsi_images/pic4.jpg"><br><br>
   <input type="radio" name="q3" value="wrong"><img src="./vlsi_images/pic1.jpg"><br><br>
   <input type="radio" name="q3" value="wrong"><img src="./vlsi_images/pic2.jpg"><br><br><br>
</li>
<hr>

<li><b>In above question what is the minimum number of transistor required for making the design? </b><br>
   <input type="radio" name="q4" value="wrong">4<br>
   <input type="radio" name="q4" value="wrong">2<br>
   <input type="radio" name="q4" value="wrong">5<br>
   <span id="correct4"><input type="radio" name="q4" value="correct">3</span><br><br>
</li>
<hr>

<li><b>Chose the correct design of ABC using complementary logic..</b><br>
   <input type="radio" name="q5" value="wrong"><img src="./vlsi_images/comp1.jpg"><br>
   <span id="correct5"><input type="radio" name="q5" value="correct"><img src="./vlsi_images/comp2.jpg"></span><br>
   <input type="radio" name="q5" value="wrong"><img src="./vlsi_images/comp3.jpg"><br>

<input type="radio" name="q5" value="wrong"><img src="./vlsi_images/comp4.jpg"><br><br>
</li>
<hr>

<li><b>Chose the correct design of A+B+C using complementary logic..</b><br>
   <input type="radio" name="q6" value="wrong"><img src="./vlsi_images/comp3.jpg"><br>
   <span id="correct6"><input type="radio" name="q6" value="correct"><img src="./vlsi_images/comp1.jpg"></span><br>
   <input type="radio" name="q6" value="wrong"><img src="./vlsi_images/comp4.jpg"><br>
   <input type="radio" name="q6" value="wrong"><img src="./vlsi_images/comp2.jpg"><br>
</li>
<hr>

<li><b>What will be the minimum number of transistor required for designing ABC+<font style="text-decoration:overline">A</font>B<font style="text-decoration:overline">C</font>+<font style="text-decoration:overline">A</font><font style="text-decoration:overline">B</font>C+A<font style="text-decoration:overline">B</font><font style="text-decoration:overline">C</font></b><br>
   <input type="radio" name="q7" value="wrong">12<br>
   <input type="radio" name="q7" value="wrong">11<br>
   <span id="correct7"><input type="radio" name="q7" value="correct">8<br>
   <input type="radio" name="q7" value="wrong">10<br>
</li>
<hr>

<li><b>What will be the minimum number of transistor required for designing xy+xz+zy+x<font style="text-decoration:overline">y</font>+z</b><br>
   <input type="radio" name="q8" value="wrong">6<br>
   <input type="radio" name="q8" value="wrong">4<br>
   <input type="radio" name="q8" value="wrong">3<br>
   <span id="correct8"><input type="radio" name="q8" value="correct">2</span><br><br>
</li>
<hr>

<li><b>Reduce the expression xy(z+w)+<font style="text-decoration:overline">y</font>(<font style="text-decoration:overline">x</font>z+xz)+<font style="text-decoration:overline">z</font>w and tell the min number of transistor required for the design.</b><br>
   <span id="correct9"><input type="radio" name="q9" value="correct">8</span><br>
   <input type="radio" name="q9" value="wrong">6<br>
   <input type="radio" name="q9" value="wrong">11<br>
   <input type="radio" name="q9" value="wrong">12<br>
</li>
<hr>

<!--<li><b>What is desirable <sup>&#946;<sub>n</sub></sup>/<sub>&#946;<sub>p</sub></sub> ratio for an inverter?</b><br>
   <input type="radio" name="q10" value="wrong">0<br>
   <span id="correct10"><input type="radio" name="q10" value="correct">1</span><br>
   <input type="radio" name="q10" value="wrong">0.5<br>
   <input type="radio" name="q10" value="wrong">&#8734;<br><br>
</li>
<hr>-->

</ol>

<input type="button" onClick="checkQuiz()" value="check quiz">
<hr>
<textarea cols="80" rows="10" name="output"></textarea>
</font>
</form>
</body>


</html>

';

$ref3 = '
<font size="3"
<ol>
<li><b>"Principles of cmos vlsi design"</b>
by Weste-Eshraghian</li>
<li> http://www.iue.tuwien.ac.at/phd/pichler/node75.html
http://www.hitequest.com/Kiss/VLSI.html</li><br>
<li><b>CMOS: Circuit Design, Layout, and Simulation, Third Edition</b> by Bacor, R. Jacob. Wiley-IEEE. pp. 1174.
Chen, Wai-Kai (ed) (2006). </li><br>
<li><b>The VLSI Handbook, Second Edition (Electrical Engineering Handbook)</b> by Boca Raton: CRC. ISBN 0-8493-4199-X.</li><br>
<li>http://jas.eng.buffalo.edu/education/fab/NMOS/nmos.html</li><br>
<ol>
</font>
';

$feedback3='<iframe src="https://spreadsheets.google.com/embeddedform?formkey=dFk3Mnh2b1J0Y2Z6eVRvRWJEdThGRXc6MQ" width="760" height="2856" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>';

$feedback3 = mysql_real_escape_string($feedback3);
$intro3 = mysql_real_escape_string($intro3);
$obj3 = mysql_real_escape_string($obj3);
$manual3 = mysql_real_escape_string($manual3);
$procedure3 = mysql_real_escape_string($procedure3);
$virExp3 = mysql_real_escape_string($virExp3);
$theory3 = mysql_real_escape_string($theory3);
$quiz3 = mysql_real_escape_string($quiz3);
$ref3 = mysql_real_escape_string($ref3);

$intro4='<body><font size="3">
<br><p>Transmission gates are used in digital circuits to pass or block particular signal from the components. In transmission gates, NMOS and PMOS are parallel connected to each other. Schematic representation of transmission gate and its circuit symbol are shown below. </p>
<br>

<center><img src="passIntro1.jpg"><br>
<img src="passIntro2.jpg"></center><br>

<p>In the<b> transmission gates </b>the input to the gate acts as the controlling input and depending on the value of control variable, the input at the source end of transistor appears at the drain end or in other words the control variable controls a transmission gate to which pass variables are applied.  In figure shown above A is the control signal. </p>
<p><br><br>
<b>Pass transistor logic is an efficient alternative to Complementary CMOS logic design because of following reasons:</b><br><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Decreased node capacitance . <br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Reduced transistor count required to implement a logic function.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Due to the low voltage swing pass transistors require lower switching energy to charge up the node.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Better speed .<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Low power design.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. No static power consumption . <br><br>
</p>
<br>
<p>
<b>Applications of Transmission Gate:</b><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Transmission gates are typically used as building blocks for logic circuitry, such as a D Latch or D Flip-Flop.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Transmission gates are basic building block for multiplexer.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Transmission gates can be used for blocking particular component from live signal.<br><br>

</p>
<br><br>
	<h3> Multiplexer </h3><br>
<p>Multiplexer or MUX, which is also known as data selector, is a combinational circuit with multiple  input  and single output. At a time a single input is selected and given as output based on select signal. 
</p><br><br>
<p>
A multiplexer selects binary information present on any one on the input line, depending upon logic status of the selection inputs and routes to the output line. If there are n selection line then number of possible routes input lines is 2<sup>n</sup>  and then multiplexer is referred as a 2<sup>n</sup> x 1 multiplexer. 
</p><br><br>
<p>
<b>Advantages of Multiplexer based on pass transistor:</b><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Pass transistor multiplexer uses fewer transistors as compared to fully complementary gates.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Pass transistor is somewhat faster than complementary switch.<br><br>

</font>
</body>
';
$obj4='<body>
<font size="3">
<ul>
<li> To design positive level pass transistor logic .</li><br>
<li>To design a 2 input multiplexer using pass transistor logic for following logical expression :<br> In1*CLK\' + In2*CLK </li><br>
<li> To design negative level pass transistor logic </li><br>
<br></font>
</body>
';
$theory4='
<body>
<font size="3">
<p>

Transmission gate is the parallel combination of NMOS and PMOS. When control signal (signal A) is high then transmission gate passes signal from input to output.  NMOS passes good zero  and PMOS passes good one, putting NMOS and PMOS in parallel produces a transmission gate that passes both logic levels good.
</p><br><br>

<center><img src="passIntro1.jpg"></center><br>

<h3> PASS TRANSISTOR LOGIC THROUGH NMOS </h3><br>
<p>
As we already know NMOS permits flow of current from source to drain when the input to the gate is 1 therefore when control variable is equal to 1 the input at the source end appears on the drain.</p><br>
<TABLE BORDER=4 CELLSPACING=4 CELLPADDING=0 align="center">
<TR>
<TD BGCOLOR="#ffffff"><b>IN</b>
<TD BGCOLOR="#ffffff"><b>CONTROL</b>
<TD BGCOLOR="#ffffff"><b>OUT</b>
</TR>
<TR>
<TD BGCOLOR="#9966ff" align="center">0
<TD BGCOLOR="#9966ff" align="center">0
<TD BGCOLOR="#9966ff" align="center">X
<TR>
<TD BGCOLOR="#9966ff" align="center">1
<TD BGCOLOR="#9966ff" align="center">0
<TD BGCOLOR="#9966ff" align="center">X
</TR>
<TR>
<TD BGCOLOR="#9966ff" align="center">0
<TD BGCOLOR="#9966ff" align="center">1
<TD BGCOLOR="#9966ff" align="center">0
</TR>
<TR>
<TD BGCOLOR="#9966ff" align="center">1
<TD BGCOLOR="#9966ff" align="center">1
<TD BGCOLOR="#9966ff" align="center">1
</TR>
</TABLE><br>
<h3> PASS TRANSISTOR LOGIC THROUGH PMOS </h3><br>
<p>
As we already know PMOS permits flow of current from source to drain when the input to the gate is 0 therefore when control variable is equal to 0 the input at the source end appears on the drain.</p><br>
<TABLE BORDER=4 CELLSPACING=4 CELLPADDING=0 align="center">
<TR>
<TD BGCOLOR="#ffffff"> <b><b>IN</b>
<TD BGCOLOR="#ffffff"><b>CONTROL</b>
<TD BGCOLOR="#ffffff"><b>OUT</b>
</TR>
<TR>
<TD BGCOLOR="#9966ff" align="center">0
<TD BGCOLOR="#9966ff" align="center">0
<TD BGCOLOR="#9966ff" align="center">0
<TR>
<TD BGCOLOR="#9966ff" align="center">1
<TD BGCOLOR="#9966ff" align="center">0
<TD BGCOLOR="#9966ff" align="center">1
</TR>
<TR>
<TD BGCOLOR="#9966ff" align="center">0
<TD BGCOLOR="#9966ff" align="center">1
<TD BGCOLOR="#9966ff" align="center">X
</TR>
<TR>
<TD BGCOLOR="#9966ff" align="center">1
<TD BGCOLOR="#9966ff" align="center">1
<TD BGCOLOR="#9966ff" align="center">X
</TR>
</TABLE><br>
<br>
<b>Click on the following image to see the steps in making of complementary pass transistor</b>
<center><a target="blank" href="pass.wmv" width="300" height="150"><img src="ps3.jpg"></a></center><br>
<p>
The above shown pass transistor will now be able to give a good one as well as good zero. At the time when S=1, both will be able to pass so whether the input signal is zero or one it will be passed almost as it is.
</p><br>

<br><h3>MULTIPLEXER</h3><br>

<p>The multiplexer selects one of many analog or digital input. A  multiplexer with 2<sup>n</sup> input lines
have n select lines. The select lines can either be 0 or 1. Depending on the binary number(formed by combination
of 1s and 0s) at the select lines. One of the input is selected and it is passed on to the
output.</p>

The block diagram and truth table of the 2 input multiplexer is given below:
<img src="./symb_2_mux.jpg" height="300" width="300" align="center">
<img src="./truth_table_2mux.jpg" height="300" width="300 align="center">

<p>The logical expression for output can be <b>AS\'+BS</b> . If we implement this logic using nands and nors then no. of transistor required would be 5.We can use the knowledge of pass transistors,control variables an
pass variables.</p>


<p> <ul type="disc">
<br><br><li> Choice of control variable and pass variable??<br> <br>

  Select input should be the control variable and data inputs can act as pass variables</li>



<br><li> Whether to use nmos/pmos pass transistor ??<br> <br>
   Since nmos is preferable in passing logic 0 and pmos is preffered in passing logic 1. We use
   a combination of both with complementing control variables. This ensures that both are on simultaneously
   and any value applied at the input appears at the output</li>



<img src="./pass_transistor_s1.jpg" height="300" width="300" align="center">
The upper combination of nmos and pmos is switched on and hence B is passed .Similarily if select variable is 0 A is passed.

</font>
</body>';

$quiz4='<html>
<head>
<title>Quiz on Inverter</title>

<script>


//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
//The orange highlighted code may need to be changed
   //you will need to match these question types(Radio/DropDown)
   //and names (q1, q2, ...) to the ones in your quiz
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
   numCorrect += checkQuestionRadio( document.quiz.q10);

  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
   highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value =
     "You got " + numCorrect + " out of 10 questions correct.\n" +
     "The correct answers are highlighted." 

}
</script>
</head>


<body>
<font size="3">
<form name="quiz">
<ol>
<li><b>Identify which of the following can behave as pass transistors.</b><br>
   <input type="radio" name="q1" value="wrong"><img src="ps1.jpg"><br>
   <input type="radio" name="q1" value="wrong"><img src="ps2.jpg"><br>
   <input type="radio" name="q1" value="wrong"><img src="ps3.jpg"><br>
   <span id="correct1"><input type="radio" name="q1" value="correct">All of the above</span><br>
</li>
<hr>

<li><b>Identify the correct statement from the following.</b><br>
   <input type="radio" name="q2" value="wrong">PMOS passes from source to drain when logic 1 is applied to gate.<br>
   <span id="correct2"><input type="radio" name="q2" value="correct">NMOS passes from source to drain when logic 1 is applied to gate</span><br>
   <input type="radio" name="q2" value="wrong">PMOS always passes from source to drain whatever be the gate input<br>
   <input type="radio" name="q2" value="wrong">NMOS always passes from source to drain whatever be the gate input<br><br>
</li>
<hr>

<li><b>What can be designed using pass transistors?</b><br>
   <input type="radio" name="q3" value="wrong">Any combinational logic<br>
   <input type="radio" name="q3" value="wrong">Multiplexer<br>
   <span id="correct3"><input type="radio" name="q3" value="correct">Both</span><br>
   <input type="radio" name="q3" value="wrong">None<br><br>
</li>
<hr>

<li><b>Which gate is designed in the following picture using pass transistor?<br><img src="pand.jpg"></b><br>
   <input type="radio" name="q4" value="wrong">NOR gate<br>
   <input type="radio" name="q4" value="wrong">NAND gate<br>
   <input type="radio" name="q4" value="wrong">OR gate<br>
   <span id="correct4"><input type="radio" name="q4" value="correct">AND gate</span><br><br>
</li>
<hr>
              <li><b>Which gate is designed in the following picture using pass transistor?<br><img src="por.jpg"></b><br>
   <input type="radio" name="q5" value="wrong">NOR gate<br>
   <input type="radio" name="q5" value="wrong">NAND gate<br>
   <span id="correct5"><input type="radio" name="q5" value="correct">OR gate</span><br>
   <input type="radio" name="q5" value="wrong">AND gate<br><br>
</li>
<hr>

<li><b>Will n pass transistor and complementary pass transistor behave similarly for passing one?</b><br>
   <input type="radio" name="q6" value="wrong">No<br>
   <span id="correct6"><input type="radio" name="q6" value="correct">Yes</span><br>
   <input type="radio" name="q6" value="wrong">May be in some situations<br>
   <input type="radio" name="q6" value="wrong">can not say<br>
</li>
<hr>

<li><b>Are the two circits shown below same?</b><br>
<img src="cl1.jpg"><img src="pl1.jpg">
   <span id="correct7"><input type="radio" name="q7" value="correct">Yes</span><br>
   <input type="radio" name="q7" value="wrong">No<br>
   <input type="radio" name="q7" value="wrong">Cannot be said<br>
</li>
<hr>

<li><b>What is the correct expression corresponding to above circuits?</b><br>
   <input type="radio" name="q8" value="wrong">A+B<br>
   <input type="radio" name="q8" value="wrong">AS0 + B<br>
   <input type="radio" name="q8" value="wrong">A + BS0<br>
   <span id="correct8"><input type="radio" name="q8" value="correct">AS0\' + BS0</span><br><br>
</li>
<hr>

<li><b>_______ input mux can be formed using n select lines.</b><br>
   <input type="radio" name="q9" value="wrong">n<br>
   <input type="radio" name="q9" value="wrong">2*n<br>
   <span id="correct9"><input type="radio" name="q9" value="correct">2<sup>n</sup></span><br>
   <input type="radio" name="q9" value="wrong">None of the above<br><br>
</li>
<hr>

<li><b>Which gives good zero</b><br>
   <input type="radio" name="q10" value="wrong">Nmos Pass transistor<br>
   <span id="correct10"><input type="radio" name="q10" value="correct">Both pmos and complementary pass transistor</span><br>
   <input type="radio" name="q10" value="wrong">Pmos pass transistor<br>
   <input type="radio" name="q10" value="wrong">None of the above<br>
</li>
<hr>

</ol>

<input type="button" onClick="checkQuiz()" value="check quiz">
<hr>
<textarea cols="80" rows="10" name="output"></textarea>
</form>
</font>

</body>
';
$ref4='
<font size="3"
<ol>
<li><b>"Principles of cmos vlsi design"</b>by Weste-Eshraghian</li><br>
<li><b>"System integration:from transistor design to large scale integration"</b> by Kurt Hoffman</li><br>
<li><b>"Electronics(fundamentals and Applications)"</b>by D Chattopadhyay </li><br>
</ol>';

$manual4 = '<font size="3"> 
<a href="EXP_1sep2010/Manual_exp1/exp1.swf" target="_blank">Click Here For Experiment Manual</a>
</font> ';

// Beacause the 4th EXP on the Site is MUX and MULTIPLEX
//$virExp4 = '<font size="3"> 
//<a href="./EXP_1sep2010/exp5/exp5_mux.html" target="_blank">Experiment</a>
//</font> ';
 
$virExp4 = '
<p style="font-family:serif;font-size:17px">

<b><u style="color:#B0171F;">Pre-Quiz Questions</u>:</b><br><br></p>
<p style="font-family:serif;font-size:17px">
Test your Understanding Pass Transistor and Multiplexer , by going through the following quiz:<br />
&nbsp;&nbsp;<a href="preQuiz4.php" target="_blank"><i style="color:green"><u><ul><li>Start the Quiz</li></ul></u></i></a>
</p><br /><br />
<p style="font-family:serif;font-size:17px">
<b><u style="color:#B0171F">Virtual Experiment</u>:</b><br />
Please make sure that you are going to perform experiment only after going through the following sections:<br /><br />
1. Manual<br />
2. Procedure<br />
3. Objectives<br />
</p>
 <a href="./EXP_1sep2010/exp5/exp5_mux.html"
onclick="window.open(\'./EXP_1sep2010/exp5/exp5_pass.html\',
null,\'scrollbars=yes, width=\'  + (screen.availWidth)
+\',height=\' + (screen.availHeight));return false;"><br />
<p style="font-family:serif;font-size:17px">
<i style="color:green">&nbsp;&nbsp;&nbsp<u><ul><li>Start the Experiment On Positive Level Pass Transistor and Multiplexer </li></ul></u></i> 
 </p></a>
 <a href="./EXP_1sep2010/exp5/exp5_Pass_negative/exp5_Pass_negative.html"
onclick="window.open(\'./EXP_1sep2010/exp5/exp5_Pass_negative/exp5_Pass_negative.html\',
null,\'scrollbars=yes, width=\'  + (screen.availWidth)
+\',height=\' + (screen.availHeight));return false;"><br />
<p style="font-family:serif;font-size:17px">
<i style="color:green">&nbsp;&nbsp;&nbsp<u><ul><li>Start the Experiment On Negative Level  Pass Transistor</li></ul></u></i> 
 </p></a>
';

$feedback4='<iframe src="https://spreadsheets.google.com/embeddedform?formkey=dFk3Mnh2b1J0Y2Z6eVRvRWJEdThGRXc6MQ" width="760" height="2856" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>';
/*$procedure4 ='<h3>Positive Level Pass Transistor<h3/><br>
	 <img width="100%" height="100%" src="procedure_pics/positivePass.bmp"/> 
	<h3>Negative Level Pass Transistor<h3/><br>
	<img width="100%" height="100%" src="procedure_pics/negativePass.bmp"/>
	<h3>Multiplexer<h3/><br>
         <img width="100%" height="100%" src="procedure_pics/multiplexer.bmp"';
*/
$procedure4 ='<img width="100%" height="400%" src="Exp4Procedure.png"';
$feedback4 = mysql_real_escape_string($feedback4);
$intro4= mysql_real_escape_string($intro4);
$obj4 = mysql_real_escape_string($obj4);
$manual4 = mysql_real_escape_string($manual4);
$procedure4 = mysql_real_escape_string($procedure4);
$virExp4 = mysql_real_escape_string($virExp4);
$theory4 = mysql_real_escape_string($theory4);
$quiz4 = mysql_real_escape_string($quiz4);
$ref4 = mysql_real_escape_string($ref4);

$intro5='
<font size="3">
<p>
Common challenges that chip designers face is that how large should be the transistors and how many stages of logic can give least delay. In other words how to optimize gate size to minimize the delay of a logic path.</p><br>
<p>
 The method of logical effort is one of the methods used to estimate delay in a CMOS circuit. The model describes delay caused by the capacitive load that the logic gate drives and by the topology of the logic gate. As the gate increases delay also increases, but delay depends on the logic function of the gate also. 
</p><br><br>
<h3>Delay in a Logic Circuit</h3><br>
<p>
Gate delay can be estimated from following formula.<br><br>
<b>D= p + h</b><br><br>
Where, p is an intrinsic delay<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;h is an effort delay<br><br>
Effort delay is a product of logical effort and electrical effort. <br><br>
<b>h= g x f</b><br><br>
where, g is logical effort which is a ratio of gate input’s  capacitance to the inverter capacitance when sized to deliver the same current and f is an electrical effort (f= Cout/Cin) which is a function of load/gate size.  Logical effort of an inverter is 1 which is shown below. 
<p/>
<br>

<center><img src="gateIntro1.jpg"></center><br>

<p>In this experiment, it will be learnt how a delay can be reduced by changing the gate size of an inverter. The following figure shows what actually is meant by delay here</p><br>
<center><img src="dintro.jpg"></center><br>
<p>In theory we will be proceeding further with reducing the shown delay, i.e., reducing the time between giving an input and getting the output.
</font>

';

$obj5='
<body>
<font size="3">
<li> To study the effect of gate sizing in chain of inverters on its output delay.</li><br>
</font>
</body>
';

$theory5='
<body>
<font size="3">
<p>In this experiment, our goal is to calculate the propagation delay when some load is driven by a chain of inverters. To start with, let us consider simple case of a single inverter driving a capacitative load <b>C<sub>L</sub></b> as shown in the following figure</p><br>
<center><img src="t51.jpg"></center><br>
<p>Now we want to optimize size of the inverter, x, when driven by a source resistance 
<b>R<sub>s</sub></b> 
and driving a load of 
<b>C<sub>L</sub></b>
.</p><br>

<p>To drive <b>C<sub>L</sub></b> fastly, we can make inverter size very large but then <b>R<sub>s</sub></b> will become very slow while driving such large size inverter as its input capacitance will be very large on increasing size by large amount.</p><br>
<p>If we reduce the size of an inverter and make it very small such that <b>R<sub>s</sub></b> drive it very quickly, then the delay to drive load capacitance will increase. So there is an optimal point in between these two conditions and we will see that optimal point further in this section</p><br>
<p>One thing that should be remebered is the effect of scaling of size of an inverter on its resistance and capacitance value. Suppose the size of an inverter has been scaled by a factor x, then its resistance will get reduced by the same factor while its capacitance will be increased by the same factor.</p><br>
<p>For getting optimum size of inverter, we differentiate the delay with respect to size. And when we put that value of size in the expressions of delay at the input of an inverter and delay in output, we get the same expressions. So we can summarize the optimal result for the above figure as below:</p><br>
<p><p><p><b>An inverter is scaled for optimium delay when the RC product of its input capacitance and the external resistance driving it, equals the RC product of its output resistance and the external load that it drives.</b></p></p></p><br>
<p>Now we will extend this concept for a chain of inverters as shown below</p><br>
<center><img src="t52.jpg"/></center><br>
<p>
As we have seen  earlier that to minimize delay, the RC product at input and output of an inverter should be same. Similar is the case with chain of inverters. Therefor the optimum size of each inverter is the geometric mean of its neighbors - meaning that if each inverter is sized up by the same factor x with respect to the preceding inverter, it will have the same effective RC product and hence the same delay.
</p><br>
<p>The following figure shows the relationship in sizes of a chain of five inverters</p><br>
<center><img src="t53.jpg"></center><br>
<p>Now we just have to see what is the value of x. The value of x derived by differentiating delay expression is nth root of C<sub>L</sub>/C<sub>g1</sub> where </p><br>
&nbsp;&nbsp;&nbsp;&nbsp;
n is equal to the number of inverters in the chain  <br>
&nbsp;&nbsp;&nbsp;&nbsp;
C<sub>L</sub> is equal to the load capacitance<br>
&nbsp;&nbsp;&nbsp;&nbsp;
C<sub>g1</sub> is equal to the input gate capacitance of the first inverter<br>
<p>So expression for x is shown below</p><br>
<center><img src="t54.jpg"></center><br>
</font>
</body>
';

$quiz5 = '
<html>
<head>
<font size="3">
<title>Quiz on Gate sizing</title>

<script>


//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
   numCorrect += checkQuestionRadio( document.quiz.q10);


  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
   highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value =
     "You got " + numCorrect + " out of 10 questions correct.\n" +
     "The correct answers are highlighted." 

}
</script>
</head>
<body>
<form name="quiz">
<ol>
<li><b>
Can we reduce delay to zero? 
</b><br>
   <input type="radio" name="q1" value="wrong">Yes<br>
   <span id="correct1"><input type="radio" name="q1" value="correct">No</span><br>
   <input type="radio" name="q1" value="wrong">Yes in most of the cases<br>
   <input type="radio" name="q1" value="wrong">Yes in very few cases<br><br>
</li>
<hr>
<br>
<li><b>What you mean by delay?</b><br>
   <input type="radio" name="q2" value="wrong">time to correctly access the input<br>
   <input type="radio" name="q2" value="wrong">time to correctly access the output<br>
   <input type="radio" name="q2" value="wrong">average rise time and fall time<br>
   <span id="correct2"><input type="radio" name="q2" value="correct">time taken for the output to come after the input has been captured</span><br><br>
</li>
<hr>
<br>
<li>
<b>The optimum size of each inverter is ________ of its neighbours</b><br>
   <span id="correct3"><input type="radio" name="q3" value="correct">geometric mean</span><br>
   <input type="radio" name="q3" value="wrong">arithmetic mean<br>
   <input type="radio" name="q3" value="wrong">geometric or arithmetic mean<br>
   <input type="radio" name="q3" value="wrong">none of the above<br><br>
</li>
<hr>
<br>
<li>
<b>What does C<sub>g1</sub> corresponds to in the following formula?</b><br>
<center><img src="t54.jpg"></center>
   <input type="radio" name="q4" value="wrong">input gate capacitance of the last inverter driving capacitative load<br>
   <input type="radio" name="q4" value="wrong">sum of input capacitances of all the inverter in series<br>
   <span id="correct4"><input type="radio" name="q4" value="correct">input gate capacitance of first inverter in series</span><br>
   <input type="radio" name="q4" value="wrong">None of the above<br><br>
</li>
<hr>
<br>
<li><b>If the gate size is increased by n then what will be the effect on its resistance?</b><br>
   <input type="radio" name="q5" value="wrong">increases by n<br>
   <span id="correct5"><input type="radio" name="q5" value="correct">decreases by n</span><br>
   <input type="radio" name="q5" value="wrong">decreases by n<sup>2</sup><br>
   <input type="radio" name="q5" value="wrong">remains constant<br><br>
</li>
<hr>
<br>

<li><b>If the gate size is increased by n then what will be the effect on its capacitance?</b><br>
   <input type="radio" name="q6" value="wrong">increases by n<sup>2</sup><br>
   <span id="correct6"><input type="radio" name="q6" value="correct">increases by n</span><br>
   <input type="radio" name="q6" value="wrong">decreases by n<br>
   <input type="radio" name="q6" value="wrong">remains constant<br><br>
</li>
<hr>
<br>
<li>
<b>Choose the correct statement from the following.<br></b>
   <input type="radio" name="q7" value="wrong">All the inveters in series are kept to be of same size for minimum delay</sub><br>
   <input type="radio" name="q7" value="wrong">The inverter size does not matter as long as the inverter driving the load has very big size<br>
   <input type="radio" name="q7" value="wrong">The inverter size does not matter as long as the inverter driving the load has very small size<br>
   <span id="correct7"><input type="radio" name="q7" value="correct">The size of the inverter driving the load is maximum of all and is some multiple of size of the previous inverters</span><br>
</li>
<hr>
<br>
<li>
<b>For minimm delay, what is the no of inverters in the chain connected in series?</b><br>
   <input type="radio" name="q8" value="wrong">4<br>
   <input type="radio" name="q8" value="wrong">5<br>
   <input type="radio" name="q8" value="wrong">6<br>
   <span id="correct8"><input type="radio" name="q8" value="correct">need to calculate according to the situation given, it is not fixed.</span><br><br>
</li>
<hr>
<br>
<li>
<b>Let a be the stage ratio of an inverter chain. What is its optimum value to drive a load capacitor with minimum  delay?</b><br>
   <input type="radio" name="q9" value="wrong">4<br>
   <input type="radio" name="q9" value="wrong">1/e<br>
   <input type="radio" name="q9" value="wrong">2<br>
   <span id="correct9"><input type="radio" name="q9" value="correct">e</span><br><br>
</li>
<hr>
<br>
<li>
<b>In the above question, if parasitic capacitances are taken into consideration then what is the optimum value of a? </b></br>
   <span id="correct10"><input type="radio" name="q10" value="correct">4</span><br>
   <input type="radio" name="q10" value="wrong">e<br>
   <input type="radio" name="q10" value="wrong">1/e<br>
   <input type="radio" name="q10" value="wrong">2<br><br>
</li>

</ol>

<input type="button" onClick="checkQuiz()" value="check quiz">
<hr>
<textarea cols="80" rows="10" name="output"></textarea>
</form>
</font>
</body>


</html>
';
$virExp5 = '
<p style="font-family:serif;font-size:17px">

<b><u style="color:#B0171F;">Pre-Quiz Questions</u>:</b><br><br></p>
<p style="font-family:serif;font-size:17px">
Test your Understanding Gate Sizing , by going through the following quiz:<br />
&nbsp;&nbsp;<a href="preQuiz5.php" target="_blank"><i style="color:green"><u><ul><li>Start the Quiz</li></ul></u></i></a>
</p><br /><br />
<p style="font-family:serif;font-size:17px">
<b><u style="color:#B0171F">Virtual Experiment</u>:</b><br />
Please make sure that you are going to perform experiment only after going through the following sections:<br /><br />
1. Manual<br />
2. Procedure<br />
3. Objectives<br />
</p>
 <a href="./EXP_1sep2010/exp7/exp7_size.html"
onclick="window.open(\'./EXP_1sep2010/exp7/exp7_size.html\',
null,\'scrollbars=yes, width=\'  + (screen.availWidth)
+\',height=\' + (screen.availHeight));return false;"><br />
<p style="font-family:serif;font-size:17px">
<i style="color:green">&nbsp;&nbsp;&nbsp<u><ul><li>Start the Experiment</li></ul></u></i> 
 </p></a>
<!-- <object codetype="application/java" classid="java:crc.emt.demos.CoulombsLaw$MyApplet.class"  width="900" height="660" title="Electric field">
</object> -->
';


$manual5 = '<font size="3"> 
<a href="EXP_1sep2010/Manual_exp1/exp1.swf" target="_blank">Click Here For Experiment Manual</a>
</font> ';

$ref5='
<font size="3"
<ol>
<li><b> "Principles of cmos vlsi design"</b> by Weste-Eshraghian<br></li><br>
<li><b> "Logical effort: designing fast CMOS circuits"</b> by Ivan Edward Sutherland, Robert F. Sproull, David F. Harris<br></li><br>
<li><b> "Practical low power digital VLSI design"</b> by Gary K. Yeap <br></li><br>
<li><b> "Low Power Design Essentials" </b>by Jan Rabaey<br></li><br>
<li>www.stanford.edu/class/ee371/handouts/logicalEffort.pdf<br></li><br>
</ol>';
$feedback5='<iframe src="https://spreadsheets.google.com/embeddedform?formkey=dFk3Mnh2b1J0Y2Z6eVRvRWJEdThGRXc6MQ" width="760" height="2856" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>';

//$procedure5='<h3>Gate Sizing <h3/><img height="100%" width="100%" src="procedure_pics/gateChain.bmp" />';
$procedure5='<h3>Gate Sizing <h3/><img height="200%" width="100%" src="Exp5Procedure.png" />';

$feedback5 = mysql_real_escape_string($feedback5);
$intro5 = mysql_real_escape_string($intro5);
$obj5 = mysql_real_escape_string($obj5);
$manual5 = mysql_real_escape_string($manual5);
$procedure5 = mysql_real_escape_string($procedure5);
$virExp5 = mysql_real_escape_string($virExp5);
$theory5 = mysql_real_escape_string($theory5);
$quiz5 = mysql_real_escape_string($quiz5);
$ref5 = mysql_real_escape_string($ref5);

//6th experiment
$intro6='
<font size="3">
<h3>D-LATCH</h3><br>
</n>
<p>Latch is an electronic device that can be used to store one bit of information. The D latch is used to capture, or \'latch\' the logic level which is present on the Data line when the clock input is high. If the data on the D line changes state while the clock pulse is high, then the output, Q, follows the input, D. When the CLK input falls to logic 0, the last state of the D input is trapped and held in the latch.</p>
<h4>Timing diagram</h4>
</n>
<img src="d_latch_td.jpg" width="500" height="500">
<p>
From the timing diagram it is clear that the output Q\'s waveform resembles that of input D\'s waveform when the clock is high whereas when the clock is low Q retains the previous value of D (the value before clock dropped down to 0) </p>
<br><br>
<h3>D FLIP FLOP</h3><br>
<p>The working of D flip flop is similar to the D latch except that the output of D Flip Flop takes the state of the D input at the moment of a positive edge at the clock pin (or negative edge if the clock input is active low) and delays it by one clock cycle. That\'s why, it is commonly known as a delay flip flop. The D FlipFlop can be interpreted as a delay line or zero order hold. The advantage of the D flip-flop over the D-type "transparent latch" is that the signal on the D input pin is captured the moment the flip-flop is clocked, and subsequent changes on the D input will be ignored until the next clock event.</p><br><br>
<h4>Timing diagram</h4>
</n>
<img src="d_ff_td.jpg" width="500" height="500">
<p>
From the timing diagram it is clear that the output Q changes only at the positive edge.At each positive edge the output Q becomes equal to the input D at that instant and this value of Q is held untill the next positive edge </p>
<p>
<br>
<b>Characteristics and applications of D latch and D Flip Flop : </b><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. D-latch is a level Triggering device while D Flip Flop is an Edge triggering device.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. The disadvantage of the D FF is its circuit size, which is about twice as large as that of a D latch. That\'s why, delay and power consumption in Flip flop is more as compared to D latch. <br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Latches are used as temporary buffers whereas flip flops are used as registers.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Flip flop can be considered as a basic memory cell because it stores the value on the data line with the advantage of the output being synchronized to a clock.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Many logic synthesis tool use only D flip flop or D latch.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. FPGA contains edge triggered flip flops.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7. D flip flops are also used in finite state machines.<br><br>
<br>
<b>Edge Triggering vs. Level Clocking</b><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. When a circuit is edge triggered the output can change only on the rrising or falling edge of the clock. But  in the case of level-clocked, the output can change when the clock is high (or low). <br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. In edge triggering output can change only at one instant during the lock cycle; with level clocking output can change during an entire half cycle of the clock.<br><br>

</font>';
$obj6='
<font size="3">
<ul>
<li> To design D latch using pass transistor logic. </li>
<li> To design Positive Edge Trigger D-flip flop.  </li>
<li> To design Negative Egde Trigger D-flip flop. </li>
</font>
';
$theory6='
<font size="3">
With the definition of D latch and D flip-flop(given in the introduction) and the background knowledge of pass transistor(accquired in the fourth experiment) let us design the transistor level diagram of D latch in this experiment.
As mentioned earlier, when the clock is high the input D propogates to the output Q as it is and when the clock is low the output is held(irrespective of the changes in input D).This definition indicates that D latch can be implemented as a multiplexer with clock signal as the select input of multiplexer. Applying  analogy , we realise that when clock=1 the input to the CMOS pass transistor should be  D and  when clock=0 the input to the pass transistor should be value of D just before the transition of clock from 1 to 0.To obtain the value of D just before transition a buffer is needed.The final design is given below:
<img src="d_latch.jpg" width="700" height="500">
<h4>Working of the latch when clock is 1.</h4> 
<img src="d_latch_clk1.jpg" width="700" height="500" >
<p>When clock is 1 the pass transistor in red is on (the input to the gate of nmos is 1 and to the gate of pmos is 0) therefore the output is D as D changes the output changes accordingly.The two inverters act as a buffer.</p>
</n> 
<h4>Working of the latch when clock is 0.</h4> 
<img src="d_latch_clk0.jpg" width="700" height="500">
<p>When clock is 0 the pass transistor in red is on and the one connected to the input D is off thus any changes in D does not affect the circuit.If we observe the transistor in red is connected to the buffer at the output which loops back to its input thus the same value occurs at Q\' again and again till this pass transistor is on.</p> 

</n>
</n>
<br>
<br>
<h3>POSITIVE EDGE TRIGGERED FLIP FLOP</h3>
</n>
<p> From the introduction it is clear that for a positive edge triggered flip flop the changes in output occurs at the transition level.This is done by configuring two D latches in master slave configuration.A master slave D flip-flop is created by connecting two gated D latches in series, and inverting the clock input to one of them. It is called master slave because the second latch in the series only changes in response to a change in the first (master) latch. 
To understand the transistor level design of positive edge triggered flip flop study the two diagrams below 
</n>
<h4> Positive edge triggered flip flop when clock=0 </h4>
<img src="d_ff_clk0.jpg" height="500" width="900">
</n>

<p>
As evident from the figure when clk is 0 the input D passes through the first level of  pass transistor logic and held there because the second level does not pass on the value of D</p>
</n>
</n>
<h4> Positive edge triggered flip flop when clock=1 </h4>
<img src="d_ff_clk1.jpg" height="500" width="900">
</n>
<p>
When the clock input becomes 1, D(at that instant) is transferred to the output. Thereafter output Q does not change when D changes because D is not passed through the first level of pass transistor logic (as seen in the diagram). Now when the clock changes back to 1, Q still remains unaffected by the changes in D because it is now hindered by the second level of pass transistor. Thus we observe that Q remains unchanged for the entire clock cycle and changes only at the positive edge. Hence the above transistor level diagram implements positive edge triggerd flip flop. </p>
</n>
</n>
<br>
<br>
<h4> APPLICATION AND ADVANTAGES OF D- FLIP FLOP </h4>
<p>
D flip flop can be considered as a basic memory cell because it stores the value on the data line with the advantage of the output being synchronised to a clock. D flip flops form the basis of shift registers that are used in many electronic device. Many logic synthesis tool use only D flip flop or D latch. FPGA contains edge triggered flip flops. D flip flops are also used in finite state machines.</p>
</font>';

$quiz6 = '
<html>
<head>
<font size="3">
<title>Quiz on Spice</title>

<script>


//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
   numCorrect += checkQuestionRadio( document.quiz.q10);


  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
   highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value =
     "You got " + numCorrect + " out of 10 questions correct.\n" +
     "The correct answers are highlighted." 

}
</script>
</head>
<body>
<form name="quiz">
<ol>
<li><b>
What frequency clock source will produce clock waveforms having a period equal to 5 us (5 microseconds)? 
</b><br>
   <input type="radio" name="q1" value="wrong">5 MHz<br>
   <span id="correct1"><input type="radio" name="q1" value="correct">0.2 MHz</span><br>
   <input type="radio" name="q1" value="wrong">2 MHz<br>
   <input type="radio" name="q1" value="wrong">10 MHz<br><br>
</li>
<hr>
<br>
<li><b>On what parameters do the output of D flip flop depend?</b><br>
   <input type="radio" name="q2" value="wrong">independent of both previous state and input<br>
   <input type="radio" name="q2" value="wrong">both on previous state and input<br>
   <input type="radio" name="q2" value="wrong">only on the previous state<br>
   <span id="correct2"><input type="radio" name="q2" value="correct">only on input D</span><br><br>
</li>
<hr>
<br>
<li> <img src="d_latch_q.jpg" width="400" height="300">
<b>The timing diagram corresponds to:</b><br>
   <span id="correct3"><input type="radio" name="q3" value="correct">D latch </span><br>
   <input type="radio" name="q3" value="wrong">positive edge triggered D flip flop<br>
   <input type="radio" name="q3" value="wrong">negative edge triggered D flip flop <br>
   <input type="radio" name="q3" value="wrong">none of them<br><br>
</li>
<hr>
<br>
<li> <img src="pos_edge_d.jpg" width="400" height="300">
<b>The timing diagram corresponds to</b><br>
   <input type="radio" name="q4" value="wrong">D latch<br>
   <input type="radio" name="q4" value="wrong">negative edge triggered flip flop<br>
   <span id="correct4"><input type="radio" name="q4" value="correct">positive edge triggered</span><br>
   <input type="radio" name="q4" value="wrong">None of them<br><br>
</li>
<hr>
<br>
<li><b>Which statement is false about D latch<br></b>
   <input type="radio" name="q5" value="wrong">the output follows the input everytime<br>
   <span id="correct5"><input type="radio" name="q5" value="correct">the output follows the input when clock is high</span><br>
   <input type="radio" name="q5" value="wrong">the output follows the input when the clock is low<br>
   <input type="radio" name="q5" value="wrong">the output never follows the input<br><br>
</li>
<hr>
<br>

<li><b>Which latch has the property of either retaining or toggling the previous value </b><br>
   <input type="radio" name="q6" value="wrong">D-Latch<br>
   <span id="correct6"><input type="radio" name="q6" value="correct">T-Latch</span><br>
   <input type="radio" name="q6" value="wrong">SR-Latch<br>
   <input type="radio" name="q6" value="wrong">None of the above<br><br>
</li>
<hr>
<br>
<li>
<b>Which statement below is the apt definition of flip flop<br></b>
   <input type="radio" name="q7" value="wrong">latch</sub><br>
   <input type="radio" name="q7" value="wrong">coupled latch<br>
   <input type="radio" name="q7" value="wrong">de-coupled latch<br><br>
   <span id="correct7"><input type="radio" name="q7" value="correct">clocked latch</span><br>
</li>
<hr>
<br>
<li>
<b>The above figure is the gate level implementation of:</b><br>
   <input type="radio" name="q8" value="wrong">SR-Latch<br>
   <span id="correct8"><input type="radio" name="q8" value="correct">D-Latch</span><br>
   <input type="radio" name="q8" value="wrong">T-Latch<br>
   <input type="radio" name="q8" value="wrong">none of the above<br><br>
</li>
<br>
<hr>
<li> 
<b> What kind of flip flop is generally preffered for constructing counters?<br></b>
   <input type="radio" name="q9" value="wrong">JK-flip flop<br>
   <span id="correct9"><input type="radio" name="q9" value="correct">T flip flop</span><br>   
<input type="radio" name="q9" value="wrong">D flip flop <br>
   <input type="radio" name="q9" value="wrong">none of the above<br><br>
</li>
<br>
<hr>
<li>
<b> What is meant by the problem of metastability in flip flop </b> <br>
   <span id="correct10"><input type="radio" name="q10" value="correct">The data and the control input changes at the instant of clock pulse</span><br> 
  <input type="radio" name="q10" value="wrong">The data and the control input does not change at all <br>

  <input type="radio" name="q10" value="wrong">The clock input does not change at all <br>
  <input type="radio" name="q10" value="wrong">None of the above <br>
</ol>
<br>
<hr>
<input type="button" onClick="checkQuiz()" value="check quiz">
<hr>
<textarea cols="80" rows="10" name="output"></textarea>
</form>
</font>
</body>


</html>
';





$ref6='
<font size="3"
<ol>
<li><b>"Principles of cmos vlsi design"</b>
by Weste-Eshraghian</li><br>
<li><b>"Digital design and computer architecture"</b> by David Money Harris.Sarah L. Harris </li><br>
<li><b>"System integration:from transistor design to large scale integration"</b> by Kurt Hoffman</li>
</ol>';
$virExp6 = '
<p style="font-family:serif;font-size:17px">

<b><u style="color:#B0171F;">Pre-Quiz Questions</u>:</b><br><br></p>
<p style="font-family:serif;font-size:17px">
Test your Understanding D-Latch and D-FlipFlop , by going through the following quiz:<br />
&nbsp;&nbsp;<a href="preQuiz6.php" target="_blank"><i style="color:green"><u><ul><li>Start the Quiz</li></ul></u></i></a>
</p><br /><br />
<p style="font-family:serif;font-size:17px">
<b><u style="color:#B0171F">Virtual Experiment</u>:</b><br />
Please make sure that you are going to perform experiment only after going through the following sections:<br /><br />
1. Manual<br />
2. Procedure<br />
3. Objectives<br />
</p>
 <a href="./EXP_1sep2010/exp6/exp6_latch_positive.html"
onclick="window.open(\'./EXP_1sep2010/exp6/exp6_latch_positive.html\',
null,\'scrollbars=yes, width=\'  + (screen.availWidth)
+\',height=\' + (screen.availHeight));return false;"><br />
<p style="font-family:serif;font-size:17px">
<i style="color:green">&nbsp;&nbsp;&nbsp<u><ul><li>Start the Positive Level  D-Latch and D-FlipFlop Experiment</li></ul></u></i> 
 </p></a>
 <a href="./EXP_1sep2010/exp6/exp6_negative/exp6_flipflop_negative.html"
onclick="window.open(\'./EXP_1sep2010/exp6/exp6_negative/exp6_flipflop_negative.html\',
null,\'scrollbars=yes, width=\'  + (screen.availWidth)
+\',height=\' + (screen.availHeight));return false;"><br />
<p style="font-family:serif;font-size:17px">
<i style="color:green">&nbsp;&nbsp;&nbsp<u><ul><li>Start the Negative Edge D-FlipFlop Experiment</li></ul></u></i> 
 </p></a>
<!-- <object codetype="application/java" classid="java:crc.emt.demos.CoulombsLaw$MyApplet.class"  width="900" height="660" title="Electric field">
</object> -->
';


$manual6 = '<font size="3"> 
<a href="EXP_1sep2010/Manual_exp1/exp1.swf" target="_blank">Click Here For Experiment Manual</a>
</font> ';

$feedback6='<iframe src="https://spreadsheets.google.com/embeddedform?formkey=dFk3Mnh2b1J0Y2Z6eVRvRWJEdThGRXc6MQ" width="760" height="2856" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>';

$procedure6='<h3>D-Latch<h3/><br><img height="100%" width="100%" src="procedure_pics/dLatch.bmp" /> 
<h3>Positive Edge FlipFlop <h3/><br><img height="100%" width="100%" src="procedure_pics/PositiveFlipFlop.bmp" />';

$feedback6 = mysql_real_escape_string($feedback6);
$intro6 = mysql_real_escape_string($intro6);
$obj6 = mysql_real_escape_string($obj6);
$manual6 = mysql_real_escape_string($manual6);
$procedure6 = mysql_real_escape_string($procedure6);
$virExp6 = mysql_real_escape_string($virExp6);
$theory6 = mysql_real_escape_string($theory6);
$quiz6 = mysql_real_escape_string($quiz6);
$ref6 = mysql_real_escape_string($ref6);


// LAYOUT EXPERIMENT   EXP 10 on Website 

$feedback7='<iframe src="https://spreadsheets.google.com/embeddedform?formkey=dFk3Mnh2b1J0Y2Z6eVRvRWJEdThGRXc6MQ" width="760" height="2856" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>';
$virExp7 = '
<p style="font-family:serif;font-size:17px">

<b><u style="color:#B0171F;">Pre-Quiz Questions</u>:</b><br><br></p>
<p style="font-family:serif;font-size:17px">
Test your Understanding Layout Design, by going through the following quiz:<br />
&nbsp;&nbsp;<a href="preQuiz7php" target="_blank"><i style="color:green"><u><ul><li>Start the Quiz</li></ul></u></i></a>
</p><br /><br />
<p style="font-family:serif;font-size:17px">
<b><u style="color:#B0171F">Virtual Experiment</u>:</b><br />
Please make sure that you are going to perform experiment only after going through the following sections:<br /><br />
1. Manual<br />
2. Procedure<br />
3. Objectives<br />
</p>
 <a href="./EXP_1sep2010/layout/exp1.html"
onclick="window.open(\'./EXP_1sep2010/layout/exp1.html\',
null,\'scrollbars=yes, width=\'  + (screen.availWidth)
+\',height=\' + (screen.availHeight));return false;"><br />
<p style="font-family:serif;font-size:17px">
<i style="color:green">&nbsp;&nbsp;&nbsp<u><ul><li>CLICK HERE TO START LAYOUT DESIGN EXPERIMENT</li></ul></u></i> 
 </p></a>
<!-- <object codetype="application/java" classid="java:crc.emt.demos.CoulombsLaw$MyApplet.class"  width="900" height="660" title="Electric field">
</object> -->
';

$intro7='
<font size="3">
<body>
<h3>INTRODUCTION </h3><br>
<p>
In this experiment, layout design platform feature is included with layout design rule check (DRC).
</p>
</font>
</body>
';

$obj7='
<body>
<font size="3">
<br>
(a)To design transistor level physical layout of different circuits.<br><br>
(b)To check design rule violations present in layout design.<br>
</font>
</body>
';

$theory7='
<font size="3">
<body>
<h3>THEORY </h3><br>
<p>
The physical mask layout of any circuit to be manufactured using a particular process must conform to a set of geometric constraints or rules, which are generally called layout design rules. These rules usually specify the minimum allowable line widths for physical objects on-chip such as metal and polysilicon interconnects or diffusion areas, minimum feature dimensions, and minimum allowable separations between two such features. If a metal line width is made too small, for example, it is possible for the line to break during the fabrication process or afterwards, resulting in an open circuit. If two lines are placed too close to each other in the layout, they may form an unwanted short circuit by merging during or after the fabrication process. The main objective of design rules is to achieve a high overall yield and reliability while using the smallest possible silicon area, for any circuit to be manufactured with a particular process. 
</p><br>
<p>
 We can say, in general, that observing the layout design rules significantly increases the probability of fabricating a successful product with high yield.
</p>
<br>
<p>
The design rules are usually described in two ways :<br><br>
<li>Micron rules, in which the layout constraints such as minimum feature sizes and minimum allowable feature separations, are stated in terms of absolute dimensions in micrometers, or,</li>
<li>Lambda rules, which specify the layout constraints in terms of a single parameter Lambda  and, thus, allow linear, proportional scaling of all geometrical constraints.</li>
</p>

<p>
<br><br>
<h3>SOME DEFINED RULES :</h3><br>
			    Description	 :	                       L-Rule	<br><br>
			Minimum active area width			:	3 L	<br>
			Minimum active area spacing			:	3 L	<br>
 			Minimum poly width				:	2 L	<br>
			Minimum poly spacing				:	2 L	<br>
			Minimum gate extension of poly over active 	:	2 L	<br>

			Minimum poly-active edge spacing 		:	1 L	<br>
			(poly outside active area)					<br>
			Minimum poly-active edge spacing 		:	3 L 	<br>
			(poly inside active area)					<br>
			Minimum metal width				:	3 L	<br>
			Minimum metal spacing				:	3 L	<br>
			Poly contact size				:	2 L	<br>
			Minimum poly contact spacing			:	2 L	<br>
			Minimum poly contact to poly edge spacing	:	1 L	<br>
			Minimum poly contact to metal edge spacing	:	1 L	<br>
			Minimum poly contact to active edge spacing	:	3 L	<br>
			Active contact size				:	2 L	<br>
			Minimum active contact spacing			:	2 L	<br>
			(on the same active region)					<br>
			Minimum active contact to active edge spacing	:	1 L	<br>
			Minimum active contact to metal edge spacing	:	1 L	<br>
			Minimum active contact to poly edge spacing	:	3 L	<br>
			Minimum active contact spacing			:	6 L	<br>
<br><br>
</p>
<br>
<h3> Pictorial presentation of Layout Design Rules (DRCs) : 
Intra Layer Design Rules
</h3><br><br>
Figure1: Intra Layer Design Rules. <br>
<center><img src="LayoutExpTheroyImages/1.png"></center><br><br>
Figure2: Transistor Layout.<br>
<center><img src="LayoutExpTheroyImages/2.png"></center><br><br>
Figure3: Vias and Contacts.<br>
<center><img src="LayoutExpTheroyImages/3.png"></center><br><br>
Figure4: CMOS Inverter Layout.<br>
<center><img src="LayoutExpTheroyImages/4.png"></center><br><br>
</font>
</body>
';
$procedure7='
<body>
<font size="3">
<h3>Procedure :</h3><br>

<h3>1.Select and placing layers :</h3><br>
<li>Select a layer from available icons on the left panel.
The layer selected appears on the top left box.</li><br>
<li>Place the selected layer in the central grid.</li><br>
<li>Stretch the selected layer by using mouse left click and follow the pixels on grid.</li><br>
<li>Click on "freeze component size" button to fix the size of layer.
Note: Once freezing the layer size, this will not change in future. </li><br>
<li>Move this layer and place it.</li><br><br><br>

<h3>2.Layout completion and DRC check</h3><br><br>
<li>Place all required layers and check DRC rule every time while placing layers.</li><br>
<li>Place wrong created layers outside the grid.
Note: There is no delete option.</li><br>
<li>Check DRC after completion of your layout design.</li><br>

</font>
</body>
';
$manual7 = '<font size="3"> 
<a href="EXP_1sep2010/Manual/exp10.swf" target="_blank">Click Here For Experiment Manual</a>
</font> ';

$ref7='
<body>
<font size="3"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
1. <b>"CMOS Layout , concept, methodology and tools" </b>  by Dan Clein. <br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
2. <b>"Priciples of CMOS VLSI design"</b> by  Weste-Eshraghian.<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
3. <b>"CMOS Circuit Design, Kayout, and Simulation" Third Edition </b> by Baker, R. Jacob. Wiley-IEEE Press. <br><br>
</font>
</body>
';
$quiz7 = '
<html>
<head>
<font size="3">
<title>Quiz on Spice</title>

<script>


//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
   numCorrect += checkQuestionRadio( document.quiz.q10);


  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
   highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value =
     "You got " + numCorrect + " out of 10 questions correct.\n" +
     "The correct answers are highlighted."

}
</script>
</head>
<body>
<form name="quiz">
<ol>
<li><b>
What is the minimum width, minimum  spacing rule of same potential and different potential Well ?
</b><br>
   <input type="radio" name="q1" value="wrong"> 10,9 and 10,6.<br>
   <span id="correct1"><input type="radio" name="q1" value="correct"> 10,6 and 10,9.</span><br>
   <input type="radio" name="q1" value="wrong"> 10,10 and 9,6.<br>
   <input type="radio" name="q1" value="wrong"> 10,9 and 10,9.<br><br>
</li>
<hr>
<br>
<li><b>Transistor gate form when two layers overlap. These two layers are - </b><br>
   <input type="radio" name="q2" value="wrong"> Polysilicon and Select.<br>
   <input type="radio" name="q2" value="wrong">Polysilicon and Contact. <br>
   <input type="radio" name="q2" value="wrong"> Polysilicon and Metal.<br>
   <span id="correct2"><input type="radio" name="q2" value="correct">Polysilicon and Active.</span><br><br>
</li>
<hr>
<br>
<li><b> How many  physical  layers are used  in below given inverter layout design, excluding wells:</b><br>
 <img src="" width="400" height="300"><br><br>
   <span id="correct3"><input type="radio" name="q3" value="correct">6.</span><br>
   <input type="radio" name="q3" value="wrong">7.<br>
   <input type="radio" name="q3" value="wrong">5.<br>
   <input type="radio" name="q3" value="wrong">8.<br><br>
</li>
<hr>
<br>
<li><b> The layout design rules are usually described by - </b><br>
   <input type="radio" name="q4" value="wrong">Separation rule.<br>
   <input type="radio" name="q4" value="wrong">Distance  Rule.<br>
   <span id="correct4"><input type="radio" name="q4" value="correct">Micron rule and Design Rule.</span><br>
   <input type="radio" name="q4" value="wrong">Micron Rule.<br><br>
</li>
<hr>
<br>
<li><b> Lambda is known as -<br></b>
   <input type="radio" name="q5" value="wrong">sepaparation of layers.<br>
   <span id="correct5"><input type="radio" name="q5" value="correct"> minimum feature size.</span><br>
   <input type="radio" name="q5" value="wrong"> distance of pixel.<br>
   <input type="radio" name="q5" value="wrong">all of these.<br><br>
</li>
<hr>
<br>

<li><b> The Length and width of a transistor are two most important dimensions of transistors that depend on - </b><br>
   <input type="radio" name="q6" value="wrong">drain dimentions.<br>
   <span id="correct6"><input type="radio" name="q6" value="correct"> gate dimention.</span><br>
   <input type="radio" name="q6" value="wrong"> bulk dimention.<br>
   <input type="radio" name="q6" value="wrong"> source dimention.<br><br>
</li>
<hr>
<br>
<li>

<b> Which of these are wrong option regarding design rule - <br>
a. Width rule  <br>b. space rule <br>c. Overlap rule <br>d. pixel rule. </b><br><br>
   <input type="radio" name="q7" value="wrong">a, b, c, and d.<br>
   <input type="radio" name="q7" value="wrong">b and d.<br>
   <input type="radio" name="q7" value="wrong">a and b.<br>
   <span id="correct7"><input type="radio" name="q7" value="correct">a, b, and c.</span><br><br>
</li>
<hr>
<br>
<li>
<b> Minimum spacing rule of metal layer is - </b><br>
   <input type="radio" name="q8" value="wrong"> 3 mm.<br>
   <span id="correct8"><input type="radio" name="q8" value="correct"> 3 lamada.</span><br>
   <input type="radio" name="q8" value="wrong"> 6 lamada.<br>
   <input type="radio" name="q8" value="wrong">10 lamada.<br><br>
</li>
<br>
<hr>
<li>
<b> DRC means - <br></b>
   <input type="radio" name="q9" value="wrong">Direct Rule Check.<br>
   <span id="correct9"><input type="radio" name="q9" value="correct">Design Rule Check.</span><br>
   <input type="radio" name="q9" value="wrong"> Design Right Check.<br>
   <input type="radio" name="q9" value="wrong">Direct Right Check.<br><br>
</li>
<br>
<hr>
<li>
<b>  Overlapping is allowed in layers : </b> <br>
   <span id="correct10"><input type="radio" name="q10" value="correct">Poly and Metal.</span><br>
  <input type="radio" name="q10" value="wrong">Metal 1 and Metal 2.<br>
  <input type="radio" name="q10" value="wrong">Active and Poly.<br>
  <input type="radio" name="q10" value="wrong">All Of These.<br>
</ol>
<br>
<hr>
<input type="button" onClick="checkQuiz()" value="check quiz">
<hr>
<textarea cols="80" rows="10" name="output"></textarea>
</form>
</font>
</body>


</html>
';


// EXP 10 on website
$feedback7 = mysql_real_escape_string($feedback7);
$intro7 = mysql_real_escape_string($intro7);
$obj7 = mysql_real_escape_string($obj7);
$manual7 = mysql_real_escape_string($manual7);
$procedure7 = mysql_real_escape_string($procedure7);
$virExp7 = mysql_real_escape_string($virExp7);
$theory7 = mysql_real_escape_string($theory7);
$quiz7 = mysql_real_escape_string($quiz7);
$ref7 = mysql_real_escape_string($ref7);

$theory8='
<body>
<font size="3">
<p>
A spice input file, also called source file, consists
of three parts:<br><br><br>
1. Data statements: These statements are
description of the components and their I
nterconnections.<br><br>
2. Control statements: These statements are
responsible to tell SPICE simulator what type of
analysis to perform on the circuit.<br><br>
3. Output statements: These statements specify
what outputs are to be printed or plotted.<br><br><br>
Although these statements may appear in any order,
it is recommended that they be given in the above
sequence. Two other statements are required: the
title statement and the end statement. The title
statement is the first line and can contain any
information, while the end statement is always
.END. The title statement must be a line or word.
In addition, you can insert comment statements,
which must begin with an asterisk (*) and are
ignored by SPICE Simulator.

<center><img src="Exp7_TheoryImages/1.png"></center><br><br><br>

<h3>1. Data Statements</h3><br><br><br>
(A).Independent DC Sources
<center><img src="Exp7_TheoryImages/2.png"></center><br>
N1 is the positive terminal node.
N2 is the negative terminal node.
Type can be DC, AC or TRAN, depending on the
type of analysis.
Value gives the value of the source.
The name of a voltage and current source must start
with V and I, respectively.<br>

<center><img src="Exp7_TheoryImages/3.png"></center><br>
The positive current direction through the current
or voltage source is from the positive (N1) node to
the negative (N2) node:<br><br>
(B) Elements: for example MOSFETS<br>

<center><img src="Exp7_TheoryImages/4.png"></center><br>
The MOS transistor name (Mname) has to start
with a M; ND, NG, NS and NB are the node
numbers of the Drain, Gate, Source and Bulk
terminals, respectively. ModName is the name of
the transistor model (NMOS or PMOS). L and W
are the length and width of the gate (in m).<br><br><br><br>
<h3>2. Commands or Control Statements:</h3><br><br>
.TRAN Statement<br>

<center><img src="Exp7_TheoryImages/5.png"></center><br>

This statement specifies the time interval over
which the transient analysis takes place, and the
time increments. The format is as follows:
TSTEP is the printing increment.
TSTOP is the final time
TSTART is the starting time (if omitted, TSTART
is assumed to be zero)
TMAX is the maximum step size.
UIC stands for Use Initial Conditions. If UIC is
specified then simulator will use the initial
conditions specified in the element statements.<br><br><br><br>
<h3>3.Output Statements</h3><br><br>
These statements will instruct Simulator what
<br>

<center><img src="Exp7_TheoryImages/6.png"></center><br>

output to generate. If you do not specify an output
statement, Simulator will always calculate the DC
operating points. The two types of outputs are the
prints and plots. A print is a table of data points and
a plot is a graphical representation. The format is as
follows:<br><br>
In above format TYPE specifies the type of
analysis to be printed or plotted and can be:
<br>

<center><img src="Exp7_TheoryImages/7.png"></center><br>

The output variables are Y1, Y2 and can be voltage
or currents in voltage sources. Node voltages and
device currents can be specified as magnitude (M),
phase (P), real (R) or imaginary (I) parts by adding
the suffix to V or I as follows:<br><br><br>
M: Magnitude.<br><br>
DB: Magnitude in dB (decibels).<br><br>
P: Phase.<br><br>
R: Real part.<br><br>
I: Imaginary part.<br><br>


<br><center><img src="Exp7_TheoryImages/8.png"></center><br>

Complete example (Inverter-Netlist):

<br><center><img src="Exp7_TheoryImages/9.png"></center><br>
</p>

<p>
In introduction of this experiment we have seen what is spice actually. In first experiment we have designed inverter, so as we have read in introduction that whenever you place anyting like transistor or capacitor etc., there is a code which is written at back end corresponding to the element placed on screen. So in this experiment we are going to learn what is taht code which is written in the back end, that is, we learn how to write that code directly, that is, we will learn basic inverter designing using spice coding.
</p><br>
<p>The following is the code for inverter in spice along with some of the explaination.</p><br><br>
<center><img src="spice1.jpg"></center><br>
<p>Now we will be learning actually what parameters are specified by each of the element in every line in detail</p><br>
<h3><u>FIRST LINE</u></h3><br>
<p>First line of spice code is always a comment. So this line is always ignored by spice. Spice does not do any kind of processing on this line</p><br>

<h3><u>.INCLUDE LINE</u></h3><br>
<p>.include line includes the model file but you should confirm that your model file should be in your current directory in which you are working.</p><br>
<h3><u>LINE CORRESPONDING TO TRANSISTOR</u></h3><br>
</font>
</body>
';

$intro8='
<font size="3">
<p>In the experiments we have done till now we have designed gates by arranging transistors in various fashions .The simulation of these designs gave graphs of output voltages and we analyzed how these graph changes with varying different parameters of the transistor. Now when you place a transistor on screen there is a back end code which tells a simulator what are the points to which the transistor\'s substrate,gate,drain,source are connected. The language in which this information is conveyed is spice.</p><br><br>
<h3>INTRODUCTION TO SPICE</h3><br>
<p>
SPICE (Simulation Program with Integrated Circuit Emphasis) is a powerful program that is used in integrated circuit and board-level design to check the integrity of circuit designs and to predict circuit behavior. SPICE was originally developed at the Electronics Research Laboratory of the University of California, Berkeley (1975).Simulating the circuit with SPICE is the industry-standard way to verify circuit operation at the transistor level before committing to manufacturing an integrated circuit. In spice program, circuit elements (transistors, resistors, capacitors, etc) and their connections being translated into a text netlist.  
</p><br>
<br><center><img src="Exp7_Intro_Image.png"></center><br>
<p>
Several types of circuit analyses can be done using SPICE program. Here are the most important ones-  <br><br>
<li>DC analysis: calculates the DC transfer curve.</li>
<li>Transient analysis: calculates the voltage and current as a function of time when a large signal is applied.</li>

<li>AC Analysis: calculates the output as a function of frequency. A bode plot is generated.</li>

<li>Noise analysis.</li>

<li>Sensitivity analysis.</li>

<li>Distortion analysis.</li>

<li>Fourier analysis: calculates and plots the frequency spectrum.</li>

<li>Monte Carlo Analysis</li><br>

All analyses can be done at different temperatures. The default temperature is 300K

</p>

';

$quiz8 = '
<html>
<head>
<font size="3">
<title>Quiz on Spice</title>

<script>


//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
   numCorrect += checkQuestionRadio( document.quiz.q10);


  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
   highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value =
     "You got " + numCorrect + " out of 10 questions correct.\n" +
     "The correct answers are highlighted." 

}
</script>
</head>
<body>
<center><a href="#post"><img src="post_quiz.jpg"></a></center><br>
<center><a href="#pre"><img src="pre_quiz.jpg"></a></center><br><br><hr><hr><br><br>
<a name="pre"><h1><b>PRE_QUIZ</b></h1></a><hr><br>
<ul>
<li> What are various possible circuit analysis that can be implemented in SPICE?</li><br>
<li> In declarartion of MOSFET other than the essential parameters of length and breadth, what are the other parameters supported by SPICE?</li><br>
<li> A pulse voltage source is defined from 0 to VDD with 100ps delay, 100ps rise time, 100ps fall time, 2n pulse width, and 4ns repetition period.Write the declaration for such a source in SPICE?</li><br>
<li> What is the basic unit in Spice coding?</li><br>
<hr><br><br>
<a name="post"><b><h1><b>POST_QUIZ</b></h1></b></a><hr><br>
<form name="quiz">
<ol>
<li><b>Identify the correct order in which the nodes are specified in SPICE for a mosfet</b><br>
   <input type="radio" name="q1" value="wrong">Gate Source Drain Bulkterminal<br>
   <span id="correct1"><input type="radio" name="q1" value="correct">Drain Gate Source Bulkterminal</span><br>
   <input type="radio" name="q1" value="wrong">Bulkterinal Source Gate Drain<br>
   <input type="radio" name="q1" value="wrong">None of the above<br><br>
</li>
<hr>
<br>
<li><b>Which of the following is not a part of the SPICE input file?</b><br>
   <input type="radio" name="q2" value="wrong">Data statement<br>
   <input type="radio" name="q2" value="wrong">Control statement<br>
   <input type="radio" name="q2" value="wrong">Output statement<br>
   <span id="correct2"><input type="radio" name="q2" value="correct">Behavourial statement</span><br><br>
</li>
<hr>
<br>
<li><b>What does this indicate .DC Vds 0 5 0.5 Vgs 0 5 1?</b><br>
   <span id="correct3"><input type="radio" name="q3" value="correct">the voltage Vds will be swept from 0 to 5V in steps of 1V for every value of Vgs. </span><br>
   <input type="radio" name="q3" value="wrong">he voltage Vgs will be swept from 0 to 5V in steps of 1V for every value of Vds.  ()<br>
   <input type="radio" name="q3" value="wrong">he voltage Vds will be swept from 0 to 1V in steps of 5V for every value of Vgs. <br>
   <input type="radio" name="q3" value="wrong">none of them<br><br>
</li>
<hr>
<br>
<li><b>What are the analysis done to obtain the graphs for the experiments done so far?</b><br>
   <input type="radio" name="q4" value="wrong">DC analysis<br>
   <input type="radio" name="q4" value="wrong">transient<br>
   <span id="correct4"><input type="radio" name="q4" value="correct">both of them</span><br>
   <input type="radio" name="q4" value="wrong">None of them<br><br>
</li>
<hr>
<br>
<li><b>Which statement is false about declaration of capacitor in SPICE<br></b>
   <input type="radio" name="q5" value="wrong">the positive node is followed by the negative node in declsration<br>
   <span id="correct5"><input type="radio" name="q5" value="correct">there is no way to specify intial condition</span><br>
   <input type="radio" name="q5" value="wrong">both of the above<br>
   <input type="radio" name="q5" value="wrong">none of the above<br><br>
</li>
<hr>
<br>

<li><b>Among the following which of the analysis can neither be printed nor plotted </b><br>
   <input type="radio" name="q6" value="wrong">.DC<br>
   <span id="correct6"><input type="radio" name="q6" value="correct">.NOISE</span><br>
   <input type="radio" name="q6" value="wrong">.TRAN<br>
   <input type="radio" name="q6" value="wrong">.AC<br><br>
</li>
<hr>
<br>
<li><b>The file extension which is not generated by spice?<br></b>
   <input type="radio" name="q7" value="wrong">.tr0</sub><br>
   <input type="radio" name="q7" value="wrong">.st0<br>
   <input type="radio" name="q7" value="wrong">.ic<br><br>
   <span id="correct7"><input type="radio" name="q7" value="correct">none of the above</span><br>
</li>
<hr>
<br>
<li><b>What analysis should be performed to study variation of voltage over time?</b><br>
   <input type="radio" name="q8" value="wrong">.op<br>
   <span id="correct8"><input type="radio" name="q8" value="correct">.tran</span><br><br>
   <input type="radio" name="q8" value="wrong">.dc<br>
   <input type="radio" name="q8" value="wrong">.sens<br><br>
</li>
<hr>
<br>
<li><b>Which of the following statement is false?</b><br>
   <input type="radio" name="q9" value="wrong">First statement of a spice code is a comment<br>
   <input type="radio" name="q9" value="wrong">Comments in spice begin with *<br>
   <span id="correct9"><input type="radio" name="q9" value="correct">Comments in spice begin with #</span><br>
   <input type="radio" name="q9" value="wrong">None of the above<br><br>
</li>
<hr>
<br>
<li><b>What is the PC version of spice called?</b><br>
   <input type="radio" name="q10" value="wrong">HSPICE<br>
   <span id="correct10"><input type="radio" name="q10" value="correct">PSPICE</span><br>
   <input type="radio" name="q10" value="wrong">TSPICE<br>
   <input type="radio" name="q10" value="wrong">NSPICE<br><br>
</li>
<hr>

</ol>

<input type="button" onClick="checkQuiz()" value="check quiz">
<hr>
<textarea cols="80" rows="10" name="output"></textarea>
</form>
</font>
</body>


</html>
';

// Because the 8th exp on site is sppice coding
$virExp8 = '<font size="3"> 
<a href="./EXP_1sep2010/exp4/exp4.php" target="_blank">Experiment</a>
</font> ';

$obj8='
<font size="3">
1. To write and simulate spice codes for:<br><br>

	&nbsp &nbsp &nbsp i. Simple Inverter <br><br>
	
	&nbsp &nbsp &nbsp ii. Two input NAND gate <br><br>

	&nbsp &nbsp &nbsp iii. Two input NOR gate<br><br><br>

2. To write spice code for any transistor level schematic.<br><br>
</font>'; 

$procedure8 ='<h3>Spice Code Design <h3/><br>
	 <img width="90%" height="180%" src="Exp7_Procedure.png"/> ';

$feedback8='<iframe src="https://spreadsheets.google.com/embeddedform?formkey=dFk3Mnh2b1J0Y2Z6eVRvRWJEdThGRXc6MQ" width="760" height="2856" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>';

$ref8='
<font size="3">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<li>The Spice Book, Andrei Vladimirescu, John Wiley & Sons, Inc.</li>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<li>http://www.brunel.ac.uk/~eestmba/usergS.html</li>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<li>http://www.seas.upenn.edu/~jan/spice/spice.overview.html</li>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<li>http://users.ece.utexas.edu/~adnan/vlsi-05-backup/lec7Spice.ppt</li>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<li>A Guide to Circuit Simulation and Analysis Using PSpice, Paul Tuinenga, 3rd Edition, Prentice-Hall.</li>
</font>
</body>

';

$manual8 = '<font size="3"> 
<a href="EXP_1sep2010/Manual/exp7.swf" target="_blank">Click Here For Experiment Manual</a>
</font> ';

// EXP 7 On Website
$intro8= mysql_real_escape_string($intro8);
$obj8 = mysql_real_escape_string($obj8);
$manual8 = mysql_real_escape_string($manual8);
$procedure8 = mysql_real_escape_string($procedure8);
$virExp8 = mysql_real_escape_string($virExp8);
$theory8 = mysql_real_escape_string($theory8);
$quiz8 = mysql_real_escape_string($quiz8);
$ref8 = mysql_real_escape_string($ref8);
$feedback8 = mysql_real_escape_string($feedback8);



$intro9='
<font size=\'3\'>
<h3>INTRODUCTION TO VERILOG</h3><br>
<p>
In previous experiments, we have been dealt with transistor level analog and digital circuit design. This experiment lets you perform logic design at the functional level, which enables a designer to test his logic without going into gory details of the transistor level operations.
Verilog is language commonly used in designing digital systems, which interpret only logic levels i.e. logic \'0\' and logic \'1\'.</p>

</font>';

'Verilog is language commonly used in designing digital systems. It is a hardware description language, which means that it is substantially different from any other language you might have encountered so far. Even though it does have control flow statements and variables, it relies primarily on logic functions. It is a textual format for describing electronic circuits and systems.</p><br><br>
<p>
Verilog has evolved as a standard hardware description language. Verilog offers many useful features for hardware design. it is easy to learn and easy to use as it is similar to C Programming language. Designers with C Programming experience will find it easy to learn Verilog. </p>

Till now we have dealt with transistor level issues involved in designing a gate and studied the effects on the waveforms on changing various parameters of transistor(length and width) .The graphs we have seen till now will gives the corresponding analog output voltages. In the earlier experiments, when a transistor was placed and connections were made a spice code was written in the back end. We learned spice in the previous experiment . Now we proceed towards digital level designing of circuits for example lets take an or gate  in the second experiment  was  we arranged pmos and nmos  in a particular fashion and simulated to obtain a graph , changing the parameters we analyzed how the rise time ,fall time ,delay etc. changes. If you observe the graph you will find that the input changes from low value near 0 V to high value near 5V ,the rise is not steep one but gradual . In digital designing we will bother only about two levels 0 and 1(a threshold  is determined i.e. voltages below threshold will be 0 and those above will be 1 )As we move towards digital designing we shift our concerns from how does the analog voltage changes to how to generate a desired output  from a given sequence of inputs. For instance now we will visualize gate as an entity which will gives the desired truth table.
</p>
<p> Primarily digital designing problem will be of this sort that we expect a certain kind of inputs to yield some output, our aim will be to design a system that will behave accordingly. VHDL  is a language to describe such a  system.</p>
<p>
<h3>INTRODUCTION TO VHDL</h3>
<b>VHDL</b> stands for <b>VHSIC</b> hardware description language.VHSIC means very-high-speed integrated circuit.As the name suggests it is a hardware description language used to model a digital system.VHDL is commonly used to write text models that describe a logic circuit. VHDL is a <b>Dataflow language</b>, (i.e. models a program as a directed graph of the data flowing between operations). unlike procedural computing languages such as BASIC, C, and assembly code, which all run sequentially, one instruction at a time.VHDL is a language that can be understood by hardware
</p><br>
<p>
A hardware description language is inherently parallel, i.e. commands, which correspond to logic gates, are executed (computed) in parallel, as soon as a new input arrives. The key advantage of VHDL when used for systems design is that it allows the behavior of the required system to be described (modeled) and verified (simulated) before synthesis tools translate the design into real hardware (gates and wires).</p>
</font>';

$obj9='
<body>
<font size="3">
<br>
(a)To learn the basic concepts of Verilog code through schematic.<br><br>
(b)To design Positive Edge Trigger D-flip flop using Verilog code.<br><br>
(c)To design Negative Edge Trigger D-flip flop using Verilog code.<br><br>

</font>
</body>';

$theory9='
<body>
<font size="3">
<br>
<p>
<center><img width=100% src="Exp8_TheoryImages/1.png"></center><br>
<center><img width=100% src="Exp8_TheoryImages/2.png"></center><br>
<center><img width=100% src="Exp8_TheoryImages/3.png"></center><br>
<center><img width=100% src="Exp8_TheoryImages/4.png"></center><br>
</p>
</font>
</body>';


'As mentioned in introduction vhdl is a language to describe a digital system with certain functionality. Now it has certain inputs and is required to generate output from it .Any digital system is modeled as an entity in VHDL. When we say an entity we mean that it has certain input ports ,certain output ports and is expected to gererate output from the input and the manner in which it does so is described in architecture. Now we will illustrate vhdl concepts through an example
</p>
<img src="vhdl_ex.jpg">
<br><br>
<p>
As seen in the example the first part is the entity declaration followed by architecture below is the detailed description of the two.</p>
&nbsp(1)ENTITY DECLARATION: includes the name of entity being modeled along with the lists of set of interface ports.It does not include any specification about internals.Ports are the signals with which the entity communicates with the external environment.The general form is as follows:<br><br>
&nbsp &nbsp &nbsp &nbsp &nbsp entity ENTITY\'S NAME<br>
&nbsp &nbsp &nbsp &nbsp &nbsp <b>port</b>(signal_names: <b><i>mode</i></b> <i>type</i><br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp .<br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp .<br>

&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp(signal_names: <b><i>mode</i></b> <i>type</i>);<br>

&nbsp &nbsp &nbsp &nbsp &nbsp <b>end</b> ENTITY\'S NAME<br> <br>
<ul type="disc"> 
<li>
 <b>entity</b>: keyword which marks the begining of the entity declaration </li><li>
 <b>ENTITY\'S NAME</b>: is a user-selected identifier it could be anything like half_adder</li>
<li>
 <b>port</b>: port declarations begin with the keyword port</li>
<ul type="circle">
 <li><b>signal</b> :List of user-selected identifiers specifying external interface signals,seperated by comma</li> 
 <li><b>mode</b> :Specifies the direction of signal <i>in</i> for input <i>out</i> for output <i>inout</i> for signal that can act as both input and output 
<li> <b>type</b> :Specifies the type of signal<br>
<p>example of half adder: <br>
&nbsp &nbsp &nbsp <b>entity</b> half_adder is<br>
&nbsp &nbsp &nbsp <b>port</b>(A, B : in BIT ; SUM, CARRY : out BIT);<br>
&nbsp &nbsp &nbsp <b>end</b>half_adder<br> <br> <br>
&nbsp (2)ARCHITECTURE OF BODY: Consists of the description of the entities.Architecture can be described in three ways <br>
<ol type="disc">
 <li>Structural : entity is described as set of interconnected components</li>
<li>Dataflow : entity is described by the flow of data using concurrent signal assignment statements</li>
<li>Behavourial : entity comprises of set of statements to be executed sequentially
</ol>
<br>
<p>The architecture body looks as follow:-</p>
<br>
<br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<b>architecture</b> architecture_name <b>of</b> NAME_OF_ENTITY <b>is</b> <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
--Declarations <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
--components declaration <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
--signal declarations <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
--constant declarations <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
--function declarations <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
--procedure declarations <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
--type declarations <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp .
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp .
<br>
<br>

&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <b>begin</b> <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp --Statements <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp . <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp . <br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <b>end</b> architecture_name <br>
<br>
<br>
<p>As seen in the example the words in red are <b>keywords</b> the name of the entity "mux" is an <b>identifier</b> In the case statement it is compared with a <b>number</b> 00 .All these are together called lexical elements.</p><br>
 
<img src="lexical_vhdl.jpg"> <br> <br>
<p>As seen in the example I3,I2 etc. are signals similarily there are other data objects in vhdl</p>
<br>
<img src="dataobject_vhdl.jpg"> <br> <br>

&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <h3>DATA TYPE</h3>
<br>
<p>In the example std_logic_vector is a datatype.The other datatypes are:</p>
<br> 
<img src="datatype.jpg">
We now describe <b>behavourial modelling</b> which by means of sequential statements describe the behaviour of components and circuits.Sequential statements are used within the constuct called <b> process </b>
<br>The syntax of process statement is given below:<br>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[process_label:]<b>process</b>[(sensitivity _list)[<b> is </b>]<br>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[process_declarations]
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<b>begin</b> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp list of sequential statements
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a href="#signal_assign"><font color="blue">signal assignments</font></a> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a href="#variable_assign"><font color="blue">variable assignments</font></a> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a href="#case"><font color="blue">case statement</font></a> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a href="#exit"><font color="blue">exit statement</font></a> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a href="#if"><font color="blue">if statement</font></a> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a href="#loop"><font color="blue">loop statement</font></a> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a href="#next"><font color="blue">next statement</font></a> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a href="#null"><font color="blue">null statement</font></a> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a href="#procedure"><font color="blue">procedure call</font></a> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<a href="#wait"><font color="blue">wait statement</font></a> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b> end process </b> [process label];<br>
<br>
<br> 
<a name="if"><h3>IF STATEMENT</h3></a>
<br>
<p>
The if statement executes a sequence of statements depending on the condition.The sequential statements following the condition which gives boolean value true is executed.The syntax is as follows:-</p>

<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>if</b> condition <b>then</b>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
sequential statements
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>elseif</b> condition <b>then</b>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
sequential statements ]
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b> else</b>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
sequential statements ]
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>endif</b>;
<br>
<br>
<a name="case"><h3>CASE STATEMENT</h3></a>
<br>
<p>
The case statement executes one of several sequences depending on the value of expression.The value is compared to all the set of choices and for the choice it matches sequential statements corresponding to it are executed.The syntax is as follows:-</p>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>case</b> expression  <b>is</b>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>when</b>choices =>  
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
sequential statements
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>when</b>choices =>  
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
sequential statements
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
--branches are allowed
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>when othe</b>r => sequential statements ]
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b> end case</b>;
<br>
<br>
<a name="loop"><h3>LOOP STATEMENT</h3></a>
<br>
<p>
The loop statement executes a sequence of sequential statements repeatedly .The syntax is as follows:-</p>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[loop_label:]iteration_scheme <b>loop</b> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
sequential statements
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>next</b> [label] [<b>when</b> condition]; 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>exit</b> [label] [<b>when</b> condition]; 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>end loop</b> [loop_label];
<br>
<br>
The iteration scheme are of three types:
<br>
<br>
<ol type="I">
<li>BASIC LOOP:This loop has no iteration scheme.It is executed continously untill it encounters a next or exit statement<br>

<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[loop_label:] <b>loop</b> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
sequential statements
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>next</b> [label] [<b>when</b> condition]; 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>exit</b> [label] [<b>when</b> condition]; 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>end loop</b> [loop_label];
<br>
<br>
<li>WHILE LOOP:It iterates till the Boolean iteration condition is true.the syntax is as follows:
<br>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[loop_label:]<b>while</b>condition <b>loop</b> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
sequential statements
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>next</b> [label] [<b>when</b> condition]; 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>exit</b> [label] [<b>when</b> condition]; 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>end loop</b> [loop_label];
<br>
<br>
<li>FOR LOOP:The number of iterations is determined by an integer.the syntax is as follows:
<br>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[loop_label:]<b>for</b>identifier<b>in</b>range <b>loop</b> 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
sequential statements
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>next</b> [label] [<b>when</b> condition]; 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>exit</b> [label] [<b>when</b> condition]; 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>end loop</b> [loop_label];
<br>
<br>
<a name="next"><h3>NEXT STATEMENT</h3></a>
<br>
<p>
The next statement is used within loop statement it stops the execution of the following sequential statements and jumps to the next iteration.The syntax is as follows:-</p>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>next</b> [label] [<b>when</b> condition]; 
<br>
<br>
<a name="end"><h3>END STATEMENT</h3></a>
<br>
<p>
The exit statement is also used with loop statement like next.The difference between the two statements are that next jumps to next iteration while end terminates the loop statement.
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
[<b>exit</b> [label] [<b>when</b> condition]; 
<br>
<br>
<a name="wait"><h3>WAIT STATEMENT</h3></a>
<br>
<p>
It haults a certain process till an event occurs.This statement is executed in various ways:-</p>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>wait until</b> condition; 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>wait for</b> time expression; 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>wait on</b> signal; 
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>wait</b>; 
<br>
<br>
<a name="null"><h3>NULL STATEMENT</h3></a>
<br>
<p>
the null statement states that no action should be performed</p>
<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<b>null</b>' ; 

/*'
<html>
<head>
<font size="3">
<title>Quiz on VHDL</title>

<script>


//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
   numCorrect += checkQuestionRadio( document.quiz.q10);


  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
   highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value +=
     "You got " + numCorrect + " out of 10 questions correct.\n" +
     "The correct answers are highlighted." 

}
</script>
</head>
<body>
<center><a href="#post"><img src="post_quiz.jpg"></a></center><br>
<center><a href="#pre"><img src="pre_quiz.jpg"></a></center><br><br><hr><hr><br><br>
<a name="pre"><h1><b>PRE_QUIZ</b></h1></a><hr><br>
<ul>
<li> What is the difference between Spice and VHDL?</li><br>
<li> What do you mean by dataflow modelling ?</li><br>
<li> What are the two basic components of a VHDL code?</li><br>
<li> What do you mean by sensitivity list ?</li><br>
<li> What is the difference between signal and variable?</li><br><br><br><br>
<hr><br><br>
<a name="post"><b><h1><b>POST_QUIZ</b></h1></b></a><hr><br>
<form name="quiz">
<ol>
<li><b>If the declarative part in the architecture of a half adder is as below<br>
component XOR2<br>
port (X,Y:in BIT;z: out BIT);<br>
end component<br>
component AND2<br>
port (L,M:in BIT;z:out BIT);<br>
end component<br>
Then what kind of architecture is it ? </b><br>
   <input type="radio" name="q1" value="wrong">behavourial<br>
   <span id="correct1"><input type="radio" name="q1" value="correct">structural</span><br>
   <input type="radio" name="q1" value="wrong">dataflow<br>
   <input type="radio" name="q1" value="wrong">none of these<br><br>
</li>
<hr>
<br>
<li><b>What is the symbol used for signal assignment?</b><br>
   <input type="radio" name="q2" value="wrong"> == <br>
   <input type="radio" name="q2" value="wrong"> = <br>
   <input type="radio" name="q2" value="wrong"> := <br>
   <span id="correct2"><input type="radio" name="q2" value="correct"> <= </span><br><br>
</li>
<hr>
<br>
<li><b>What cannot be defined within process units?</b><br>
   <span id="correct3"><input type="radio" name="q3" value="correct"> signal</span><br>
   <input type="radio" name="q3" value="wrong"> variables<br>
   <input type="radio" name="q3" value="wrong"> constants <br>
   <input type="radio" name="q3" value="wrong"> functions <br><br>
</li>
<hr>
<br>
<li><b>Where should you define the signal clock in a process?</b><br>
   <input type="radio" name="q4" value="wrong"> process declaration<br>
   <input type="radio" name="q4" value="wrong"> list of sequential statement <br>
   <span id="correct4"><input type="radio" name="q4" value="correct">sensitivity list</span><br>
   <input type="radio" name="q4" value="wrong">nowhere<br><br>
</li>
<hr>
<br>
<li><b>Which of these is an valid identifier</b><br>
   <input type="radio" name="q5" value="wrong">_c1<br>
   <span id="correct5"><input type="radio" name="q5" value="correct">c_10</span><br>
   <input type="radio" name="q5" value="wrong">process<br>
   <input type="radio" name="q5" value="wrong">1d<br><br>
</li>
<hr>
<br>

<li><b>FF_PROCESS: process (CLK, CLEAR)<br>

     begin<br>

           if (CLEAR = \'1\') then <br>

                Q <= \'0\';<br>

           elsif (CLK\'event and CLK = \'1\') then <br>

                Q <= D;<br>

           end if;<br>

     end process;<br>
The above code is the process for which flip flop?</b><br>
   <input type="radio" name="q6" value="wrong">T-flip flop<br>
   <span id="correct6"><input type="radio" name="q6" value="correct">D-flip flop</span><br>
   <input type="radio" name="q6" value="wrong">Latch<br>
   <input type="radio" name="q6" value="wrong">None of the above<br><br>
</li>
<hr>
<br>
<li><b>Which statement is used to terminate the current loop iteration and proceed on the next iteration</b><br>
   <span id="correct7"><input type="radio" name="q7" value="correct">next</span><br>
   <input type="radio" name="q7" value="wrong">exit</sub><br>
   <input type="radio" name="q7" value="wrong">both of these<br>
   <input type="radio" name="q7" value="wrong">none of these<br><br>
</li>
<hr>
<br>
<li><b>Which is an invalid form of wait?</b><br>
   <input type="radio" name="q8" value="wrong">wait untill time expression<br>
   <input type="radio" name="q8" value="wrong">wait on signal <br>
   <input type="radio" name="q8" value="wrong">wait for condition<br><br>
   <span id="correct8"><input type="radio" name="q8" value="correct">both  a and c </span><br><br>
</li>
<hr>
<br>
<li><b>How many architectures can be associated with an entity ?</b><br>
   <input type="radio" name="q9" value="wrong">only one<br>
   <input type="radio" name="q9" value="wrong">three<br>
   <span id="correct9"><input type="radio" name="q9" value="correct">more than one</span><br>
   <input type="radio" name="q9" value="wrong">none<br><br>
</li>
<hr>
<br>
<li><b>In vhdl a digital system is modeled as</b><br>
   <input type="radio" name="q10" value="wrong">module<br>
   <span id="correct10"><input type="radio" name="q10" value="correct">entity</span><br>
   <input type="radio" name="q10" value="wrong">process<br>
   <input type="radio" name="q10" value="wrong">all of the above<br><br>
</li>
<hr>

</ol>

<input type="button" onClick="checkQuiz()" value="check quiz">
<hr>
<textarea cols="80" rows="10" name="output"></textarea>
</form>
</font>
</body>
</html>

';
*/
$quiz9 = '
<html>
<head>
<font size="3">
<title>Quiz on Inverter</title>

<script>


//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
   numCorrect += checkQuestionRadio( document.quiz.q10);


  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
   highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value =
     "You got " + numCorrect + " out of 10 questions correct.\n" +
     "The correct answers are highlighted." 

}
</script>
</head>
<body>
<center><a href="#pre"><img src="pre_quiz.jpg"></a></center><br>
<center><a href="#post"><img src="post_quiz.jpg"></a></center><br><br><hr><hr><br><br>
<a name="pre"><h1><b>PRE_QUIZ</b></h1></a><hr><br>
<ul>
<li> What is the relationship of input and output in T-FLip Flop?</li><br>
<li> What will be the output of a 4-bit down counter?</li><br>
<li> What is the difference between T-flip flop and D-flip flop?</li><br>
<li> What is the difference between asynchronous and synchronous counter?</li><br>
<li> Explain what do you mean by positive edge reset or negative edge clear?</li><br><br><br><br>
<hr><br><br>
<a name="post"><b><h1><b>POST_QUIZ</b></h1></b></a><hr><br>
<form name="quiz">
<ol>
<li><b>Does the order of input and output ports in the argument of module matters?</b><br>
   <input type="radio" name="q1" value="wrong">yes<br>
   <span id="correct1"><input type="radio" name="q1" value="correct">no</span><br>
   <input type="radio" name="q1" value="wrong">may matter in some situation<br>
   <input type="radio" name="q1" value="wrong">may not matter in certain conditions<br><br>
</li>
<hr>
<br>
<li><b>Which of the following loops are supported by verilog?</b><br>
   <input type="radio" name="q2" value="wrong">if-else loop<br>
   <input type="radio" name="q2" value="wrong">for loop<br>
   <input type="radio" name="q2" value="wrong">while loop<br>
   <span id="correct2"><input type="radio" name="q2" value="correct">all of these</span><br><br>
</li>
<hr>
<br>
<li><b>What defines the beginning and end of a loop</b><br>
   <span id="correct3"><input type="radio" name="q3" value="correct">begin----end</span><br>
   <input type="radio" name="q3" value="wrong">curly brackets ()<br>
   <input type="radio" name="q3" value="wrong">none of these<br>
   <input type="radio" name="q3" value="wrong">both of them<br><br>
</li>
<hr>
<br>
<li><b>What defines high impedance state or floating state in verilog?</b><br>
   <input type="radio" name="q4" value="wrong">1<br>
   <input type="radio" name="q4" value="wrong">X<br>
   <span id="correct4"><input type="radio" name="q4" value="correct">Z</span><br>
   <input type="radio" name="q4" value="wrong">Both X and Z<br><br>
</li>
<hr>
<br>
<li><b>In the following figure A is input and B is output of inverter and C is clock. Tell whether inverter is working synchronously or asynchronously?</b><br><center><img src="syn.jpg"></center><br>
   <input type="radio" name="q5" value="wrong">asynchronous<br>
   <span id="correct5"><input type="radio" name="q5" value="correct">synchronous</span><br>
   <input type="radio" name="q5" value="wrong">unpredictable<br>
   <input type="radio" name="q5" value="wrong">sometimes synchronous and sometimes asynchronous<br><br>
</li>
<hr>
<br>

<li><b>In the above figure, tell whether inverter is working on positive edge or negative edge of clock?</b><br>
<center><img src="syn.jpg"></center><br>
   <input type="radio" name="q6" value="wrong">negative edge<br>
   <span id="correct6"><input type="radio" name="q6" value="correct">positive edge</span><br>
   <input type="radio" name="q6" value="wrong">both on positive edge and negative edge<br>
   <input type="radio" name="q6" value="wrong">middle of positive and negative edge of clock<br><br>
</li>
<hr>
<br>
<li><b>In the following figure tell whether reset is synchronous or asynchronous?</b><br>
<center><img src="asyn.jpg"></center><br>
   <span id="correct7"><input type="radio" name="q7" value="correct">asynchronous</span><br>
   <input type="radio" name="q7" value="wrong">synchronous</sub><br>
   <input type="radio" name="q7" value="wrong">unpredictable<br>
   <input type="radio" name="q7" value="wrong">sometimes synchronous and sometimes asynchronous<br><br>
</li>
<hr>
<br>
<li><b>What is the similar system task in verilog as printf in C?</b><br>
   <input type="radio" name="q8" value="wrong">$monitor<br>
   <span id="correct8"><input type="radio" name="q8" value="correct">$display</span><br><br>
   <input type="radio" name="q8" value="wrong">$print<br>
   <input type="radio" name="q8" value="wrong">all of these<br><br>
</li>
<hr>
<br>
<li><b>In the figure given in ques7, tell whether it is a positive edge reset or negative edge?</b><br>
   <input type="radio" name="q9" value="wrong">both positive and negative edge reset<br>
   <input type="radio" name="q9" value="wrong">negative edge reset<br>
   <span id="correct9"><input type="radio" name="q9" value="correct">positive edge</span><br>
   <input type="radio" name="q9" value="wrong">unpredictable<br><br>
</li>
<hr>
<br>
<li><b>Can we include one source file in another in verilog?</b><br>
   <input type="radio" name="q10" value="wrong">no<br>
   <span id="correct10"><input type="radio" name="q10" value="correct">yes using `include</span><br>
   <input type="radio" name="q10" value="wrong">yes using `define<br>
   <input type="radio" name="q10" value="wrong">yes by just writing the name of file in another file<br><br>
</li>
<hr>

</ol>

<input type="button" onClick="checkQuiz()" value="check quiz">
<hr>
<textarea cols="80" rows="10" name="output"></textarea>
</form>
</font>
</body>


</html>
';
$ref9='
<body>
<font size="3">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
1. <b>"Verilog HDL - A guide to Digital Design and Synthesis"</b> by Samir Palnitkar<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
2. <b>"Verilog Tutorial"</b> by Deepak Kumar Tala<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
3. <b>"Verilog tutorial based on Weste and Harris"</b> edited by Lukasz Strozek<br>
</font>
</body>
';





$virExp9 = '<font size="3"> 
<a href="./EXP_1sep2010/gtkwave.tar.gz" target="_blank">Download GTKWAVE Tool to view .vcd file generated by below given experiment. </a><br><br><br>
<a href="./EXP_1sep2010/exp9/exp9_flipflop_positive_verilog.html" target="_blank" >Experiment On Positive Edge D FlipFlop</a><br><br>
<a href="./EXP_1sep2010/exp9//exp9_negative/exp9_flipflop_negative_verilog.html" target="_blank" > Experiment On Negative Edge D FlipFlop</a>
</font> ';


$procedure9 ='<h3>Positive Edge Triggered D-Flip Flop <h3/><br>
	 <img width="90%" height="180%" src="procedure_pics/DFFP-Procedure.png"> <br><br><br>
	<h3>Negative Edge Triggered D-Flip Flop <h3/><br>
	 <img width="90%" height="180%" src="procedure_pics/DFFN-Procedure.png"> <br><br><br>

	<h3>Waveform Viewer Installation Process <h3/><br>
	 <img width="90%" height="250%" src="procedure_pics/GTK_installation.png"/> ';

$feedback9='<iframe src="https://spreadsheets.google.com/embeddedform?formkey=dFk3Mnh2b1J0Y2Z6eVRvRWJEdThGRXc6MQ" width="760" height="2856" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>';

$manual9 = '<font size="3"> 
<a href="EXP_1sep2010/Manual/exp8.swf" target="_blank">Click Here For Experiment Manual</a>
</font> ';

// EXP 8 on website
//--------------------------------------------------
$intro9 = mysql_real_escape_string($intro9);
$obj9 = mysql_real_escape_string($obj9);
$manual9 = mysql_real_escape_string($manual9);
$procedure9 = mysql_real_escape_string($procedure9);
$virExp9 = mysql_real_escape_string($virExp9);
$theory9 = mysql_real_escape_string($theory9);
$quiz9 = mysql_real_escape_string($quiz9);  // Doing it same as exp 9 on website( i.e 91 here ) ;;; This is Exp 8 on website
$ref9 = mysql_real_escape_string($ref9);
$feedback9 = mysql_real_escape_string($feedback9);










$intro91='
<font size="3">
<body>
<h3>INTRODUCTION TO VERILOG</h3><br>
<p>Verilog is language commonly used in designing digital systems. It is a hardware description language, which means that it is substantially different from any other language you might have encountered so far. Even though it does have control flow statements and variables, it relies primarily on logic functions.It is a textual format for describing electronic circuits and systems.</p><br>
<p>Verilog has evolved as a standard hardware description language. Verilog offers many useful features for hardware design. it is easy to learn and easy to use as it is similar to C Programming language. Designers with C Programming experience will find it easy to learn Verilog.</p>
</font>
</body>
';

$obj91='
<body>
<font size="3">
<br>
(a)To learn the basic concepts of verilog programming<br><br>
(b)To  design multiplexers, counters etc. using verilog coding.<br>
</font>
</body>
';

$theory91='
<body>
<font size="3">
<p>As we have seen in introduction what verilog is all about, why verilog was developed, what is its need, what is the advantages using verilog, now we are ready to make some digital designs using verilog. We will learn three basic designs which are listed below in this experiment.</p><br>
<ol>
<a href="#t"><li><font color="green"> T-Flip Flop</font></li></a><br>
<a href="#c"><li><font color="green"> Counter</font></li></a><br>
<a href="#f"><li><font color="green"> T-Flip Flop usind D-Flip Flop</font></li></a><br>
</ol><br>
<hr>
<a name="t"><h3><b><u> T-FLIP FLOP </b></u></h3></a><br>
The verilog code for T-flip flop is given below with explaination of different parts of code.<br><br><br>
<center><img src="t.jpg"></center><br>
<p>Some of the following points which are not explained in detail in the above image are explained here below</p><br>
<h4><u>MODULE</u></h4><br>
<p>
Verilog provides the concept of a <i>module</i>. A module is the basic building block in verilog. A module can be an element or a collection of lower-level design blocks. Typically, elements are grouped int mmodules to provide common functonality that is used at many places in the design. A module provides the necessary functionality to the higher-level block through its port interface (inputs and outputs), but hides the internal implementation. This allows the designer to modify module internals without affecting the rest of the design.</p><br>
<h4><u>MODULE NAME</u></h4><br>
<p>
Module name can be anything accordig to our own choice. It is just another name consisting of characters and numbers. It is used when module is instantiated in another module. We instantiate by calling the module using the name given to it. Instiating the module is explained in the third example code given below.</p><br>
<h4><u>ARGUMENTS IN MODULE</u></h4><br>
<p>Just as in C function we give some arguments to function, here also we give arguments which consists of all the input and output ports which that module is using to take input fromthe user and give output to the user.
</p><br>
<h4><u>INPUT-OUTPUT PORTS - I/O PORTS</u></h4><br>
<p>
Input and Output ports are the ports through user can give inputs and take outputs. Whatever arguments we have given to module should be mentioned inside the
module that which arguments correspond to input ports and which correspond to output ports as done in the image above.</p><br>
<h4><u>DATA TYPES</u></h4><br>
<p>
Here in this example we have used <b>reg</b> data type and in upcoming examples we will be using some more as <b>wire</b> and all. So to know about various kinds of operators in verilog just read the following chart carefully.</p><br>
<center><img src="data.jpg"></center> 
<br>
<h4><u>ALWAYS BLOCK</u></h4><br>
<p>
All statements inside an always statement consists of always block. The always statement starts at time 0 and executes the always statement in the looping fashion continuously according to the condition given in the bracket of always block after "@".</p><br>
<h4><u>POSEDGE CLOCK</u></h4><br>
<p>
Posedge clock is written in the bracket of always statement means that the statements inside the always block will be executed only at the positive edge of the clock, that is, only when clock goes from low level to high level or generally 0V level to 5V level.
</p><br>
<h4><u>NEGEDGE RESET</u></h4><br>
<p>
Reset is also a pulse here when the negative edge of reset is encountered then asynchronously that means irrespective of the clock the output will be set to zero. Negative edge means reset will go from high level to low level.
</p><br>
<h4><u>OPERATORS AND OTHER LEXICAL CONVENTIONS</u></h4><br>
<p>~ and ! opertars are used in the above code. Apart from these there are various operators, numbers and identifiers provided by verilog. All of these are shown in figure below</p><br>
<center><img src="lex.jpg"></center>
<br>
<h4><u>LOOPS</u></h4><br>
<p>
Verilog also supports <b>for, if-else, while</b> loops as in C. In the above example if and else are used. The syntax for all loops is same as C just the difference is that they have a <b>begin</b> and <b>end</b> to denote the statements inside a loop.
</p><br>
<h4><u>BLOCKING AND NON-BLOCKING ASSIGNMENT</u></h4><br>
<p>Blocking statement is specified by <b>=</b> operator and Non-Blocking statement is specified by <b><=</b> operator. Suppose there are two statements<br>
&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;<b>a = b</b><br> 
&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;<b>b = a</b><br>
Then both a and b will get values equal to b but if in place of equal to sign we place less than equal to operator, that is, if we use non blocking assignment then bith statement will be executed at same time, that is a will get the value of b and b will get the value of a at the same time so the values will be swapped. Hence statements with non-blocking assignment is started executing simultaneously.</p><br>

<hr><hr>



<br>
<a name="c"><h3><b><u> COUNTER </b></u></h3></a><br>
The verilog code for counter is given below with explaination of different parts of code.<br>
<center><img src="c.jpg"></center><br>
<p>
In tha above code, everything is pretty much explained in the box on right hand side given above. Just the <b>assign</b> statement is new so it is explained here. When we use assign before a statement like in above example Q=tmp, it means Q will be updated as soon as the value in tmp register changes whether or not it comes in the execution sequence or not. This is the speciality of assign keyword.
</p><br>
<hr><hr>
<br>
<a name="f"><h3><b><u> T_FLIP FLOP USING D-FLIP FLOP </b></u></h3></a><br>
<p>The verilog code for the T-flip flop using D-flip flop is given below with explaination of different parts of code.</p><br><br>
<center><img src="td.jpg"></center><br>
<p>In the above example instantiation of module is used which is explained in detail here.</p><br>
<h4><u>INSTANTIATION OF MODULE</u></h4><br>
<p>
We does not use module inside a module, thats why we instantiate it that means we call it as we call some function. One important thing to not while instantiating is that we call module with same name as we have given it while coding for it separately but when we are using it in other module we give it some other name and if it is instantiated more than one time then we have to give different name each time. Here in above example we have called the module with same name <b>D_FF</b> but given a new name <b>dff0</b>.
</p><br>
<h4><u>NOT - VERILOG PROVIDED PRIMITIVE</u></h4><br>
<p>
There are many primitives already defined in verilog which provides some particular functionalities. <b>not</b> is one of them. In not first argument is output value and second is input value. So in above example d is output and q is input.
</p><br>
<br>
<hr><hr>
<br>
<p>Verilog also provides us with some compiler directives and system tasks. These are not used in above programs but if you want to know about these functionalities, read the following flowcharts.</p><br>
<center><img src="task.jpg"></center> <br><br>
<center><img src="direc.jpg"></center><br><br>
</font>
</body>
';

$quiz91 = '
<html>
<head>
<font size="3">
<title>Quiz on Inverter</title>

<script>


//highlight color of answer - can change this color to a hex code or recognized color name
var highlightColor = "#0066cc";


//this should not be changed
function checkQuestionRadio(radioGroup) {

//go through the radio group sent in and determine if radio button
//checked is "correct".
//return 1 for correct value, 0 for incorrect

   for (i=0; i<radioGroup.length; i++) {
     if (radioGroup[i].checked) {
       if (radioGroup[i].value == "correct") {
         return 1;
       }
       else {
         return 0;
       }
     }
   }
return 0;
}


//this should not be changed
function highlightCorrectButton(radioButton) {
   document.getElementById(radioButton).style.backgroundColor = highlightColor;
}

function checkQuiz() {
   numCorrect = 0;
   numCorrect += checkQuestionRadio( document.quiz.q1);
   numCorrect += checkQuestionRadio( document.quiz.q2);
   numCorrect += checkQuestionRadio( document.quiz.q3);
   numCorrect += checkQuestionRadio( document.quiz.q4);
   numCorrect += checkQuestionRadio( document.quiz.q5);
   numCorrect += checkQuestionRadio( document.quiz.q6);
   numCorrect += checkQuestionRadio( document.quiz.q7);
   numCorrect += checkQuestionRadio( document.quiz.q8);
   numCorrect += checkQuestionRadio( document.quiz.q9);
   numCorrect += checkQuestionRadio( document.quiz.q10);


  //highlight correct answers from radio button groups...use span id name
   highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct6");
   highlightCorrectButton("correct7");
   highlightCorrectButton("correct8");
   highlightCorrectButton("correct9");
   highlightCorrectButton("correct10");

   //produce output in textarea.
   document.quiz.output.value =
     "You got " + numCorrect + " out of 10 questions correct.\n" +
     "The correct answers are highlighted." 

}
</script>
</head>
<body>
<center><a href="#pre"><img src="pre_quiz.jpg"></a></center><br>
<center><a href="#post"><img src="post_quiz.jpg"></a></center><br><br><hr><hr><br><br>
<a name="pre"><h1><b>PRE_QUIZ</b></h1></a><hr><br>
<ul>
<li>How is verilog different from software programming language?</li><br>
<li> Explain what do you mean by positive edge reset or negative edge clear?</li><br><br><br><br>
<hr><br><br>
<a name="post"><b><h1><b>POST_QUIZ</b></h1></b></a><hr><br>
<form name="quiz">
<ol>
<li><b>Which is correct assignment for two input and gate shown in Fig.1?</b><br>
<center><img src="./exp9QuizFigures/image003.gif"> </center><br>
   <input type="radio" name="q1" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Wire Y; assign Y = A x B ;<br>
   <span id="correct1"><input type="radio" name="q1" value="correct">&nbsp;&nbsp;&nbsp;&nbsp;Wire Y; assign Y = A & B ;</span><br>
   <input type="radio" name="q1" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Wire Y; assign Y = A and B ;<br>
   <input type="radio" name="q1" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Wire Y; assign A & B = Y ;<br><br>
</li>
<hr>
<br>
<li><b>Which is correct assignment for try state buffer shown in Fig.2?</b><br>
<center><img src="./exp9QuizFigures/image005.gif"> </center><br>
   <input type="radio" name="q2" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Tri Y ; assign Y = (ENB) : A : Z ;<br>
   <input type="radio" name="q2" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Y = (ENB) ? A : Z ;<br>
   <input type="radio" name="q2" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Tri Y ; assign Y = (ENB) ? A : Z ;<br>
   <span id="correct2"><input type="radio" name="q2" value="correct">&nbsp;&nbsp;&nbsp;&nbsp;Tri Y ;  Y = (ENB) ? A : Z ;</span><br><br>
</li>
<hr>
<br>
<li><b>Which is not a logical operator ?</b><br>
   <span id="correct3"><input type="radio" name="q3" value="correct"></span>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;   logical  OR<br>
   <input type="radio" name="q3" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp; logical OR<br>
   <input type="radio" name="q3" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;&&&nbsp;&nbsp;&nbsp;&nbsp;  logical AND<br>
   <input type="radio" name="q3" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;!&nbsp;&nbsp;&nbsp;&nbsp;logical  NOT<br><br>
</li>
<hr>
<br>
<li><b>Which is/are bitwise operator ? <br>
&nbsp;&nbsp;&nbsp;&nbsp;	A) & <br>
&nbsp;&nbsp;&nbsp;&nbsp;	B) ~ <br>
&nbsp;&nbsp;&nbsp;&nbsp;	C) | <br>
&nbsp;&nbsp;&nbsp;&nbsp;	D) ~^ <br></b><br>

   <input type="radio" name="q4" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Only A. <br>
   <input type="radio" name="q4" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;A and B.<br>
   <input type="radio" name="q4" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;A, B and C.<br>
   <span id="correct4"><input type="radio" name="q4" value="correct">&nbsp;&nbsp;&nbsp;&nbsp;All Of These.</span><br><br>
</li>
<hr>
<br>


<li><b>Which is not a correct statement?<br><br>

&nbsp;&nbsp;&nbsp;&nbsp;(A)  >>    is a shift right operator. <br>

&nbsp;&nbsp;&nbsp;&nbsp;(B)  &      is a reduction operator  <br>

&nbsp;&nbsp;&nbsp;&nbsp;(C)  ===   is a case equality operator <br>

&nbsp;&nbsp;&nbsp;&nbsp;(D)   Y = (sel) ? A : B;   is an example of conditional operator</b><br><br>

   <input type="radio" name="q5" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;A<br>
   <span id="correct5"><input type="radio" name="q5" value="correct">&nbsp;&nbsp;&nbsp;&nbsp;None</span><br>
   <input type="radio" name="q5" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;All Of These.<br>
   <input type="radio" name="q5" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;A, B and C.<br><br>
</li>
<hr>
<br>

<li><b>Which is/are correct verilog code for Fig.3?</b><br><br>
<center><img src="exp9QuizFigures/Exp9-Q6.jpg"></center><br>
   <input type="radio" name="q6" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Only A.<br>
   <input type="radio" name="q6" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Only B.<br>
   <input type="radio" name="q6" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;C and D.<br>
   <span id="correct6"><input type="radio" name="q6" value="correct">&nbsp;&nbsp;&nbsp;&nbsp;A and B.</span><br><br>
</li>
<hr>
<br>
<li><b>Which is correct verilog code for Fig.4?</b><br>
<center><img src="exp9QuizFigures/image009.gif"></center><br>
<center><img src="exp9QuizFigures/Exp9-Q7.jpg"></center><br><br>
   <input type="radio" name="q7" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Only A.<br>
   <input type="radio" name="q7" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Only B.<br>
   <span id="correct7"><input type="radio" name="q7" value="correct">&nbsp;&nbsp;&nbsp;&nbsp;Only C.</span><br>
   <input type="radio" name="q7" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;A and D.<br><br>
</li>
<hr>
<br>
<li><b>Which is not a correct port assignment for a module?</b><br>
<center><img src="exp9QuizFigures/Exp9-Q8.jpg"></center><br><br>
   <input type="radio" name="q8" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;(i)<br>
   <input type="radio" name="q8" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;(ii)<br>
   <input type="radio" name="q8" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;(iii)<br>
   <span id="correct8"><input type="radio" name="q8" value="correct">&nbsp;&nbsp;&nbsp;&nbsp;(iv)</span><br><br>
</li>
<hr>
<br>
<li><b>Which is/are not correct escaped characters?<br>
&nbsp;&nbsp;&nbsp;&nbsp;(A)&nbsp;&nbsp; \n for new line <br>
&nbsp;&nbsp;&nbsp;&nbsp;(B)&nbsp;&nbsp; \t for new tab  <br>
&nbsp;&nbsp;&nbsp;&nbsp;(C)&nbsp;&nbsp; %% for %   <br>
&nbsp;&nbsp;&nbsp;&nbsp;(D)&nbsp;&nbsp; \\ for \ <br>
&nbsp;&nbsp;&nbsp;&nbsp;(E)&nbsp;&nbsp; \" for " <br>
&nbsp;&nbsp;&nbsp;&nbsp;(F)&nbsp;&nbsp; \s for string </b><br><br>
   <input type="radio" name="q9" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;A and B.<br>
   <input type="radio" name="q9" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;C and D.<br>
   <input type="radio" name="q9" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Only E. <br>
   <span id="correct9"><input type="radio" name="q9" value="correct"></span>&nbsp;&nbsp;&nbsp;&nbsp;Only F.<br><br>
</li>
<hr>
<br>
<li><b>Which is/are showing incorrect result for given operands and operator ?</b><br>
&nbsp;&nbsp;&nbsp;&nbsp;(i) 1 > 0 -> 1<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     \'b1 x 1 <= 0 -> x<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      10 < z -> x<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;(ii) 4\'b 1z0x == 4\'b 1z0x -> x<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          4\'b 1z0x != 4\'b 1z0x -> x<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;(iii) One multi-bit operand -> One single-bit result<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       a = 4\'b1001;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        c = |a; // c = 1|0|0|1 = 1<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;(iv) 4\'b 1z0x === 4\'b 1z0x -> 1<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          4\'b 1z0x !== 4\'b 1z0x -> 0<br><br>
<br>
   <input type="radio" name="q10" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;(i), (ii) and (iii).<br>
   <input type="radio" name="q10" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;Only (i).<br>
   <input type="radio" name="q10" value="wrong">&nbsp;&nbsp;&nbsp;&nbsp;All of these<br>
   <span id="correct10"><input type="radio" name="q10" value="correct">&nbsp;&nbsp;&nbsp;&nbsp;None</span><br><br>
</li>
<hr>

</ol>

<input type="button" onClick="checkQuiz()" value="check quiz">
<hr>
<textarea cols="80" rows="10" name="output"></textarea>
</form>
</font>
</body>


</html>
';



$ref91='
<body>
<font size="3">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
1. <b>"Verilog HDL - A guide to Digital Design and Synthesis"</b> by Samir Palnitkar<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
2. <b>"Verilog Tutorial"</b> by Deepak Kumar Tala<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
3. <b>"Verilog tutorial based on Weste and Harris"</b> edited by Lukasz Strozek<br>
</font>
</body>
';
$virExp91 = '<font size="3"> 
<a href="./EXP_1sep2010/gtkwave.tar.gz" target="_blank">Download GTKWAVE Tool to view .vcd file generated by below given experiment. </a><br><br>
<a href="./EXP_1sep2010/exp8/exp8.php" target="_blank">Experiment</a>
</font> ';

$feedback91='<iframe src="https://spreadsheets.google.com/embeddedform?formkey=dFk3Mnh2b1J0Y2Z6eVRvRWJEdThGRXc6MQ" width="760" height="2856" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>';

$procedure91=' <img width="90%" height="180%" src="Exp9_Procedure.png"> <br><br><br>';


$manual91 = '<font size="3"> 
<a href="EXP_1sep2010/Manual/exp9.swf" target="_blank">Click Here For Experiment Manual</a>
</font> ';

// EXP 9 on Website

$intro91 = mysql_real_escape_string($intro91);
$obj91 = mysql_real_escape_string($obj91);
$manual91 = mysql_real_escape_string($manual91);
$procedure91 = mysql_real_escape_string($procedure91);
$virExp91 = mysql_real_escape_string($virExp91);
$theory91 = mysql_real_escape_string($theory91);
$quiz91 = mysql_real_escape_string($quiz91);
$ref91 = mysql_real_escape_string($ref91);
$feedback91 = mysql_real_escape_string($feedback91);




// database insertion
mysql_query("insert into content values
		(1,'C001','T001','CN001','P001','Introduction','Sushanth Poojary','$intro1','1'),
		(2,'C001','T002','CN001','P001','Objective','Sushanth Poojary','$obj1','1'),
		(3,'C001','T003','CN001','P001','Manual','Sushanth Poojary','$manual1','1'),
		(4,'C001','T004','CN001','P001','Procedure','Sushanth Poojary','$procedure1','1'),
		(5,'C001','T005','CN001','P001','Virtual Experiment','Sushanth Poojary','$virExp1','1'),
		(6,'C001','T006','CN001','P001','Theory','Sushanth Poojary','$theory1','1'),
		(7,'C001','T007','CN001','P001','Quiz','Sushanth Poojary','$quiz1','1'),
		(8,'C001','T008','CN001','P001','References','Sushanth Poojary','$ref1','1'),
		(1120,'C001','T009','CN001','P001','Feedback','Sushanth Poojary','$feedback1','1')
");

mysql_query("insert into content values
		(9,'C002','T001','CN001','P001','Introduction','Sushanth Poojary','$intro2','1'),
		(10,'C002','T002','CN001','P001','Objective','Sushanth Poojary','$obj2','1'),
		(11,'C002','T003','CN001','P001','Manual','Sushanth Poojary','$manual2','1'),
		(12,'C002','T004','CN001','P001','Procedure','Sushanth Poojary','$procedure2','1'),
		(13,'C002','T005','CN001','P001','Virtual Experiment','Sushanth Poojary','$virExp2','1'),
		(14,'C002','T006','CN001','P001','Theory','Sushanth Poojary','$theory2','1'),
		(15,'C002','T007','CN001','P001','Quiz','Sushanth Poojary','$quiz2','1'),
		(16,'C002','T008','CN001','P001','References','Sushanth Poojary','$ref2','1'),
		(1121,'C002','T009','CN001','P001','Feedback','Sushanth Poojary','$feedback2','1')
");

mysql_query("insert into content values
		(17,'C003','T001','CN001','P001','Introduction','Sushanth Poojary','$intro3','1'),
		(18,'C003','T002','CN001','P001','Objective','Sushanth Poojary','$obj3','1'),
		(19,'C003','T003','CN001','P001','Manual','Sushanth Poojary','$manual3','1'),
		(20,'C003','T004','CN001','P001','Procedure','Sushanth Poojary','$procedure3','1'),
		(21,'C003','T005','CN001','P001','Virtual Experiment','Sushanth Poojary','$virExp3','1'),
		(22,'C003','T006','CN001','P001','Theory','Sushanth Poojary','$theory3','1'),
		(233,'C003','T007','CN001','P001','Quiz','Sushanth Poojary','$quiz3','1'),
		(24,'C003','T008','CN001','P001','References','Sushanth Poojary','$ref3','1'),
		(1122,'C003','T009','CN001','P001','Feedback','Sushanth Poojary','$feedback3','1')
");

mysql_query("insert into content values
		(25,'C004','T001','CN001','P001','Introduction','Sushanth Poojary','$intro4','1'),
		(26,'C004','T002','CN001','P001','Objective','Sushanth Poojary','$obj4','1'),
		(27,'C004','T003','CN001','P001','Manual','Sushanth Poojary','$manual4','1'),
		(28,'C004','T004','CN001','P001','Procedure','Sushanth Poojary','$procedure4','1'),
		(29,'C004','T005','CN001','P001','Virtual Experiment','Sushanth Poojary','$virExp4','1'),
		(30,'C004','T006','CN001','P001','Theory','Sushanth Poojary','$theory4','1'),
		(31,'C004','T007','CN001','P001','Quiz','Sushanth Poojary','$quiz4','1'),
		(32,'C004','T008','CN001','P001','References','Sushanth Poojary','$ref4','1'),
		(1123,'C004','T009','CN001','P001','Feedback','Sushanth Poojary','$feedback4','1')
");

mysql_query("insert into content values
		(33,'C005','T001','CN001','P001','Introduction','Sushanth Poojary','$intro5','1'),
		(34,'C005','T002','CN001','P001','Objective','Sushanth Poojary','$obj5','1'),
		(35,'C005','T003','CN001','P001','Manual','Sushanth Poojary','$manual5','1'),
		(36,'C005','T004','CN001','P001','Procedure','Sushanth Poojary','$procedure5','1'),
		(37,'C005','T005','CN001','P001','Virtual Experiment','Sushanth Poojary','$virExp5','1'),
		(38,'C005','T006','CN001','P001','Theory','Sushanth Poojary','$theory5','1'),
		(39,'C005','T007','CN001','P001','Quiz','Sushanth Poojary','$quiz5','1'),
		(40,'C005','T008','CN001','P001','References','Sushanth Poojary','$ref5','1'),
		(1124,'C005','T009','CN001','P001','Feedback','Sushanth Poojary','$feedback5','1')
");
mysql_query("insert into content values
		(60,'C006','T001','CN001','P001','Introduction','Sushanth Poojary','$intro6','1'),
		(61,'C006','T002','CN001','P001','Objective','Sushanth Poojary','$obj6','1'),
		(62,'C006','T003','CN001','P001','Manual','Sushanth Poojary','$manual6','1'),
		(63,'C006','T004','CN001','P001','Procedure','Sushanth Poojary','$procedure6','1'),
		(64,'C006','T005','CN001','P001','Virtual Experiment','Sushanth Poojary','$virExp6','1'),
		(65,'C006','T006','CN001','P001','Theory','Sushanth Poojary','$theory6','1'),
		(66,'C006','T007','CN001','P001','Quiz','Sushanth Poojary','$quiz6','1'),
		(67,'C006','T008','CN001','P001','References','Sushanth Poojary','$ref6','1'),
		(1125,'C006','T009','CN001','P001','Feedback','Sushanth Poojary','$feedback6','1')
");
mysql_query("insert into content values
		(160,'C007','T001','CN001','P001','Introduction','Sushanth Poojary','$intro7','1'),
		(161,'C007','T002','CN001','P001','Objective','Sushanth Poojary','$obj7','1'),
		(162,'C007','T003','CN001','P001','Manual','Sushanth Poojary','$manual7','1'),
		(163,'C007','T004','CN001','P001','Procedure','Sushanth Poojary','$procedure7','1'),
		(164,'C007','T005','CN001','P001','Virtual Experiment','Sushanth Poojary','$virExp7','1'),
		(165,'C007','T006','CN001','P001','Theory','Sushanth Poojary','$theory7','1'),
		(166,'C007','T007','CN001','P001','Quiz','Sushanth Poojary','$quiz7','1'),
		(167,'C007','T008','CN001','P001','References','Sushanth Poojary','$ref7','1'),
		(11125,'C007','T009','CN001','P001','Feedback','Sushanth Poojary','$feedback7','1')
");
mysql_query("insert into content values
		(81,'C008','T001','CN001','P001','Introduction','Sushanth Poojary','$intro8','1'),
		(82,'C008','T002','CN001','P001','Objective','Sushanth Poojary','$obj8','1'),
		(83,'C008','T003','CN001','P001','Manual','Sushanth Poojary','$manual8','1'),
		(84,'C008','T004','CN001','P001','Procedure','Sushanth Poojary','$procedure8','1'),
		(85,'C008','T005','CN001','P001','Virtual Experiment','Sushanth Poojary','$virExp8','1'),
		(86,'C008','T006','CN001','P001','Theory','Sushanth Poojary','$theory8','1'),
		(87,'C008','T007','CN001','P001','Quiz','Sushanth Poojary','$quiz8','1'),
		(88,'C008','T008','CN001','P001','References','Sushanth Poojary','$ref8','1'),
		(3125,'C008','T009','CN001','P001','Feedback','Sushanth Poojary','$feedback8','1')
");

mysql_query("insert into content values
		(49,'C009','T001','CN001','P001','Introduction','Sushanth Poojary','$intro9','1'),
		(50,'C009','T002','CN001','P001','Objective','Sushanth Poojary','$obj9','1'),
		(51,'C009','T003','CN001','P001','Manual','Sushanth Poojary','$manual9','1'),
		(52,'C009','T004','CN001','P001','Procedure','Sushanth Poojary','$procedure9','1'),
		(53,'C009','T005','CN001','P001','Virtual Experiment','Sushanth Poojary','$virExp9','1'),
		(54,'C009','T006','CN001','P001','Theory','Sushanth Poojary','$theory9','1'),
		(55,'C009','T007','CN001','P001','Quiz','Sushanth Poojary','$quiz9','1'),
		(56,'C009','T008','CN001','P001','References','Sushanth Poojary','$ref9','1'),
		(156,'C009','T009','CN001','P001','Feedback','Sushanth Poojary','$feedback9','1')
");
mysql_query("insert into content values

		(41,'C0091','T001','CN001','P001','Introduction','Sushanth Poojary','$intro91','1'),
		(42,'C0091','T002','CN001','P001','Objective','Sushanth Poojary','$obj91','1'),
		(43,'C0091','T003','CN001','P001','Manual','Sushanth Poojary','$manual91','1'),
		(44,'C0091','T004','CN001','P001','Procedure','Sushanth Poojary','$procedure91','1'),
		(45,'C0091','T005','CN001','P001','Virtual Experiment','Sushanth Poojary','$virExp91','1'),
		(46,'C0091','T006','CN001','P001','Theory','Sushanth Poojary','$theory91','1'),
		(47,'C0091','T007','CN001','P001','Quiz','Sushanth Poojary','$quiz91','1'),
		(48,'C0091','T008','CN001','P001','References','Sushanth Poojary','$ref91','1'),
		(148,'C0091','T009','CN001','P001','Feedback','Sushanth Poojary','$feedback91','1')
");
echo "connected to database<br />";
