
<?php

// This file is used to take the spice code from the main exp4.php , then run it on the ngspice (server)  . 
//The Error Code return by the command on the console is returned  

$file_name =  str_replace(" ","A", microtime());   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .

$f = fopen($file_name , "w");
fwrite($f , $_POST["code"]);
fclose($f);

$out_file =  str_replace(" ","A", microtime());   // beacaue in microtime() output  there is a space in between . So we need to replace it by some character .

$error_file =  "report.txt";

`ngspice -b $file_name -r $out_file > $error_file`;


echo  `cat $error_file`;
`rm $out_file`
//`rm $file_name`

//`rm $error_file` ;

?>



