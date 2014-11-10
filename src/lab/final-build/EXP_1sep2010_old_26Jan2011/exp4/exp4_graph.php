<!-- This file is used to take the spice code from the main exp4.php , then run it on the ngspice (server)  . The output is parsed here and then send to the exp4_out.class applet , which show the graph --!>

<html>
<body>
<?php

 //---------------------------------------------------
 // Writing the spice code -----------------------------
 //---------------------------------------------------


$file_name =  str_replace(" ","A", microtime());   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .

$f = fopen($file_name , "w");
fwrite($f , $_POST["code"]);
fclose($f);

//-----------------------------------------------------------------------------
//-----------------------------------------------------------------------------
$out_file =  str_replace(" ","A", microtime());   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .

//$error_file =  str_replace(" ","A", microtime());   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .

`ngspice -b $file_name -r $out_file `;

$output_file =  str_replace(" ","A", microtime());   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .
`cat $out_file |tr [:blank:] "\n" >  $output_file`;  // replaces spaces by \n 

`rm $out_file`;   

$out_f = fopen($output_file , "r");
$i = 0 ;
while (!feof ($out_f))
{
	$temp =  fgets($out_f);
	if ( $temp != "\n" )
	{
		$str[$i] = trim($temp);    // trim() is used to remove the white spaces , \n etc .
//		echo $str[$i]."<br>";
		$i = $i + 1 ;
	}
}
fclose($out_f);
`rm $file_name`;
`rm $output_file`;
$str_len = $i ;

//---------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------
$var_count = 0 ;
$points_count = 0 ;
$variable_flag = -1  ;

for ( $i = 0 ; $i < $str_len ; $i++ )
{
	if ( strcmp ($str[$i] , "Variables:") == 0  )
	{
		if ( $variable_flag == -1 )      // It Stores the " # of varviables we are going to get "
		{
			$var_count = (int)$str[$i + 1];
//			echo "<br>VARIABLES : ".$var_count."<br>";
			$variable_flag = 0  ;
		}
		else if (  $variable_flag == 0 )
		{
			for ( $j = 0 ; $j < $var_count ; $j++ )	
			{
				$var_describe[$j] = $str[$i + (3 * $j ) + 2 ];// ."...." . $str[$i + (3 * $j ) + 3 ] ;// It stores the description  about the variables 
				// ... is added because the string part after space is not send via Param to the Applet 
//				echo "<br>".$var_describe[$j]."<br>";
			}
			$variable_flag = 1  ;
		}
	}
	else if ( strcmp ($str[$i] , "Points:") == 0  )
	{
		$points_count = (int)$str[$i + 1];
//		echo "<br>POINTS : ".$points_count."<br>";
	}
	else if  ( strcmp ($str[$i] , "Values:") == 0  )   // It stores the the points in the strings 
	{
		$i = $i + 1 ;
		for ( $j = 0 ; $j < $points_count ; $j ++ )
		{
			for ( $k = 0 ; $k <= $var_count ; $k++ ) /*+1 for the index in the parsing */
			{
				$value[$k]  = $value[$k].$str[$i + ( $j * ( $var_count + 1  /*+1 for the index in the parsing */)  + $k ) ]."/" ;

			}
		}
		break ;
	}
	
}

echo '<applet code="exp4_out.class" width="410" height="185" Align="Middle" name= "exp4_out">';

echo '<param name = variableCount value ='.$var_count .' >';
echo '<param name = valueCount value ='.$points_count .' >';
for ( $i = 0 ; $i <  $var_count ; $i ++ )
{
	echo '<param  name = variableDescription'.$i.' value='.$var_describe[$i].'>';  
	echo '<param  name = value'.$i.' value='.$value[$i + 1].'>'; // +1 bec the value is stored in +1 index
}
//echo `echo $error_file`;

//`rm $error_file`
?>
</body>
</html>



