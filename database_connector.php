<?php
//$link = mysql_connect ( "rerun", "potiro", "pcXZb(kL" );
$link = mysql_connect ( "localhost", "root", "noinhieula" );
if (! $link)
    die ( "Could not connect to Server" );
mysql_select_db ( "poti", $link );