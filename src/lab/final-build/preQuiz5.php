<!DOCTYPE HTML>
<html>
<head>
<title> VLSI </title>

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


  //highlight correct answers from radio button groups...use span id name
highlightCorrectButton("correct1");
   highlightCorrectButton("correct2");
   highlightCorrectButton("correct3");
   highlightCorrectButton("correct4");
   highlightCorrectButton("correct5");

   //produce output in textarea.
  document.quiz.output.value +=
     "You got " + numCorrect + " out of 5 questions correct.\n" +
     "The correct answers are highlighted." 
}
</script>






<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script type="text/javascript" src="jquery.js"></script>

<script type="text/javascript"> 
function panel1()
{
	    $(".panel1").slideToggle("slow");
}
function panel2()
{
	    $(".panel2").slideToggle("slow");
}
function panel3()
{
	    $(".panel3").slideToggle("slow");
}
</script>


<style type="text/css">

div.flip 
{
	
}
div.panel1
{
	display:none;
}
.tmp
{
}
div.panel2
{
	height:270px;
	display:none;
}
div.panel3
{
	height:330px;
	display:none;
}


<!--
-->
</style>
<style type="text/css">@import "css/flexnav.css";</style>

<script type="text/javascript" src="js/beethoven.js"></script>
<link href="css/default.css" rel="stylesheet" type="text/css">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="css/my.css" rel="stylesheet" type="text/css">

<style type="text/css">
.top{
margin-top: 0px;
}
</style>

<script type="text/javascript" src="ddtabmenufiles/ddtabmenu.js">

</script>

<link rel="stylesheet" type="text/css" href="ddtabmenufiles/glowtabs.css" />



</head>

<body bgcolor="#FFFFFF">
<div id="header_main"><img src="header_01.jpg" align="right" style="padding-right:0px"></div>
 <div id="no_print">
<!-- start header -->
<div id="header">
         <ul id="menuTop">

<li><a href="index.php" target="_self">Home</a></li><li><a href="#" target="_self">FAQ</a></li><li><a href="aboutus.php" target="_self">Contact us</a></li><li><a href="http://vlab.co.in" target="_self">Vlab.co.in</a></li>
        </ul>

</div>
<div style="position: relative; margin:auto; width: 1024px; background-color:#e3f2fc"><br/>

<div style="font-size:23px"><center><p style="color:green">Pre-Quiz on Gate Sizing </p></center> </div>
</div>
 <div id="no_print">

</div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width:1024px;">
        <div id="contentBox" style=" padding:0px; padding-left:50px; padding-right:50px;background-color:#e3f2fc">


<br>

<form name="quiz">
<font size="3">
<ol>
<li><b>If load is more , then delay will _____ .</b><br>
   <input type="radio" name="q1" value="wrong">Decrease because it requires less time to charge .<br>
   <span id="correct1"><input type="radio" name="q1" value="correct">Increase because it requires more time to charge .</span><br>
   <input type="radio" name="q1" value="wrong">Remains same .<br>
   <input type="radio" name="q1" value="wrong">None of the above .<br>

</li><br />
<hr><br />

<li><b>Resistance of transistor is proportional to ________ and inversely proportional to _______ .</b><br>
   <input type="radio" name="q2" value="wrong">Width , Length<br>
   <input type="radio" name="q2" value="wrong">Width, Width<br>
   <span id="correct2"><input type="radio" name="q2" value="correct">Length , Width .</span><br>
   <input type="radio" name="q2" value="wrong">None of the above .<br>

</li><br />
<hr><br />

<li><b> Electrical effort (h) is sometimes called as _______ .</b><br>
   <input type="radio" name="q3" value="wrong">Fanin .<br>
   <input type="radio" name="q3" value="wrong">Parasitic delay .<br>
   <span id="correct3"><input type="radio" name="q3" value="correct">Fanout .</span><br>
   <input type="radio" name="q3" value="wrong">Logical effort .<br>

</li><br />
<hr><br />
<li><b> Logical effort of an inverter is _____ .</b><br>
   <input type="radio" name="q4" value="wrong">Three .<br>
   <span id="correct4"><input type="radio" name="q4" value="correct"></span>One .<br>
   <input type="radio" name="q4" value="wrong">Four .<br>
   <input type="radio" name="q4" value="wrong">Two .<br>

</li><br />
<hr><br />
<li><b> Logical effort is _______ .</b><br>
   <input type="radio" name="q5" value="wrong">Ratio of input capacitance of gate to the input capacitance of an inverter delivering the same output current .<br>
   <span id="correct5"><input type="radio" name="q5" value="correct"></span>Ratio of input capacitance of an inverter to the input capacitance of gate .<br>
   <input type="radio" name="q5" value="wrong">Three for NAND gate .<br>
   <input type="radio" name="q5" value="wrong">Same as that of parasitic delay .<br>
</ol>
<br />
<input type="button" onClick="checkQuiz()" value="Check Quiz"><br><br>
<hr>
<textarea cols="80" rows="10" name="output"></textarea><br>
</form>
</font>

     
  </div>
</div>
<div style="position: relative; margin:auto; width: 1024px; background-color:#0e8de0"><img src="images/footer-curve.jpg" width="1024" height="31" alt=""><div class="copyright">Copyright &copy; 2009-2010</div><br>

</div>


</body>
</html>

