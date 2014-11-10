<?php
mysql_connect("db.virtual-labs.ac.in","cse14","changethis") or die(mysql_error());
mysql_select_db("cse14") or die(mysql_error());
$result = mysql_query("delete from topmenu");
mysql_query("insert into topmenu values
                (1,'Home','index.php'),
                (2,'FAQ','faqs.php'),
                (3,'Contact us','aboutus.php'),
                (4,'Vlab.co.in','http://vlab.co.in')
");
?>


