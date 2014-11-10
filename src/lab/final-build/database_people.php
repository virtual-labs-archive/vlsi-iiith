<?php
mysql_connect("db.virtual-labs.ac.in","cse14","changethis") or die(mysql_error());
mysql_select_db("cse14") or die(mysql_error());
$result = mysql_query("delete from people");
mysql_query("insert into people values
                (1,'http://faculty.iiit.ac.in/~Azeemuddin.s/azim-picture.jpg','Dr.Azeemuddin Syed','Areas of Interest : VLSI Design , RFID,Antennas,RFIC Design,Integrated Photonics – All Optical Devices using ring lasers','faculty','http://faculty.iiit.ac.in/~Azeemuddin.s'),
                (2,'../../../images/quest.gif','Shashank Sharma','B.Tech (Honors) C.S.E, IIIT-Hyderabad.<br> VLSI Virtual Experiment Lab designer and developer. ','student','#')
");
?>


