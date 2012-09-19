<?php
/**************************************************************************************************
| PinMe Script by Scriptolution.com
| http://www.pinmescript.com
| webmaster@pinmescript.com
|
|**************************************************************************************************
|
| By using this software you agree that you have read and acknowledged our End-User License 
| Agreement available at http://www.pinmescript.com/eula.html and to be bound by it.
|
| Copyright (c) PinMeScript.com. All rights reserved.
|**************************************************************************************************/

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

function insert_get_total_v2($var)
{
        global $conn;
        $query="SELECT count(*) as total FROM posts_reports";
        $executequery=$conn->execute($query);
        $t = $executequery->fields[total];
		echo $t+0;
}

function insert_get_total_v4($var)
{
        global $conn;
		$week = time() - (7 * 24 * 60 * 60);
        $query="SELECT count(*) as total FROM posts WHERE time_added>='$week'";
        $executequery=$conn->execute($query);
        $t = $executequery->fields[total];
		echo $t+0;
}

function insert_get_total_v5($var)
{
        global $conn;
        $query="SELECT count(*) as total FROM posts";
        $executequery=$conn->execute($query);
        $t = $executequery->fields[total];
		echo $t+0;
}

function insert_get_total_com($var)
{
        global $conn;
        $query="SELECT count(*) as total FROM $var[table]";
        $executequery=$conn->execute($query);
        $t = $executequery->fields[total];
		echo $t+0;
}

function insert_get_total_m3($var)
{
        global $conn;
        $query="SELECT count(*) as total FROM members";
        $executequery=$conn->execute($query);
        $t = $executequery->fields[total];
		echo $t+0;
}

$query2 = "select username,email from members order by USERID desc limit 10";
$executequery2 = $conn->Execute($query2);	
$results = $executequery2->getrows();
STemplate::assign('results',$results);

$mainmenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('error',$error);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/home.tpl");
STemplate::display("administrator/global_footer.tpl");
?>