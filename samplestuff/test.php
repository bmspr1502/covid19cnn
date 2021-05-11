<?php
    //$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.34)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ;
    $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 14.139.161.31)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ;

    if($c = OCILogon("S2019103555", "STPHQMAX@SFLDB1", $db))
    {
        echo "Successfully connected to Oracle.\n";
        OCILogoff($c);
    }
    else
    {
        $err = OCIError();
        echo "Connection failed." . $err[text];
    }
?>

<HTML>
    <BODY>
        HELLLOOO
</BODY>
</HTML>