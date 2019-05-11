
<?php

// This file is used to take the spice code from the main exp4.php , then run it on the ngspice (server)  . 
//The Error Code return by the command on the console is returned  

//--------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------
$file_name1 =  str_replace(" ","A", microtime());   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .
$vcdFile = str_replace(".","A", $file_name1).".vcd";   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .
$file_name1 =  str_replace(".","A", $file_name1).".v";   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .
$f = fopen($file_name1 , "w");
fwrite($f , $_POST["code1"]);
fwrite($f , "\n\n");

$code2 = $_POST["code2"] ;
$dumpCode = " initial begin \n \$dumpfile (\"$vcdFile\");  \n \$dumpvars; \nend \n endmodule \n ";
$code2 = str_replace("endmodule",$dumpCode,$code2);

//fwrite($f , $_POST["code2"]);
fwrite($f , $code2 );
//echo $code2;
//echo $_POST["code1"];
//echo $_POST["code2"];
fclose($f);

//--------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------
$file_name2 =  str_replace(" ","A", microtime());   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .
$file_name2 =  str_replace(".","A", $file_name2).".v";   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .

$f = fopen($file_name2 , "w");
fclose($f);
//--------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------

echo `cat $file_name1 |tr "@" "&" |  tr -d "\\\" >> $file_name2 `;

$vvpFile =  str_replace(" ","A", microtime());   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .
$vvpFile =  str_replace(".","A", $vvpFile).".vvp";   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .

//--------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------


//$error_file =  "report.txt";


//`iverilog $file_name1`;
//`iverilog $file_name2`;
`iverilog -o $vvpFile $file_name2`;
`vvp $vvpFile`;

if ( file_exists ($vcdFile))
{
        echo  "<font size='3' color=blue ><a href= $vcdFile target=\"_blank\" > <br><br>DOWNLOAD .vcd FILE</a></font>";
//echo  "<a href= 'full_adder.vcd'> <font size=6 ><br>DOWNLOAD .vvp FILE </font></a>";
}
else
{
        echo "<font face=arial size='3' color=blue ><br><br>CODE IS INCORRECT. <br><br> PLEASE CHECK IT. </font>";
}


//echo  "<a href= $vcdFile target=\"_blank\" > <br><br>DOWNLOAD .vcd FILE</a>";
//echo  "<a href= 'full_adder.vcd'> <font size=6 ><br>DOWNLOAD .vvp FILE </font></a>";

//echo  `cat $error_file`;

`rm $file_name1`;
`rm $file_name2`;
`rm $vvpFile`;


?>
























