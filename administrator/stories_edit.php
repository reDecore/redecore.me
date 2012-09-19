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

function insert_get_all_users()
{
    global $config,$conn;
	$query = "select USERID,username from members order by username asc"; 
	$results = $conn->execute($query);
	$returnthis = $results->getrows();
	return $returnthis;
}

$PID = intval($_REQUEST['PID']);

if($_POST['submitform'] == "1")
{
	if($PID > 0)
	{
		$arr = array("USERID", "ptitle", "orig", "source", "points", "viewcount", "active");
		foreach ($arr as $value)
		{
			$sql = "update posts set $value='".mysql_real_escape_string($_POST[$value])."' where PID='".mysql_real_escape_string($PID)."'";
			$conn->execute($sql);
		}
		$ptitle = $_POST['ptitle'];
		if($ptitle != "")
		{
			$price = get_price($ptitle);
			if($price != "")
			{
				$sql = "update posts set price='".mysql_real_escape_string($price)."' where PID='".mysql_real_escape_string($PID)."'";
				$conn->execute($sql);	
			}
		}
		$message = "Pin Successfully Edited.";
		Stemplate::assign('message',$message);
	}
}

if($PID > 0)
{
	$query = $conn->execute("select * from posts where PID='".mysql_real_escape_string($PID)."' limit 1");
	$story = $query->getrows();
	Stemplate::assign('story', $story[0]);
}

$mainmenu = "4";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/stories_edit.tpl");
STemplate::display("administrator/global_footer.tpl");
?>