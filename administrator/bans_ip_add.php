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

if($_POST['submitform'] == "1")
{
	$myip = $_SERVER['REMOTE_ADDR'];
	if($myip == $_POST['add'])
	{
		$error = "Error: You cannot ban yourself.";
		Stemplate::assign('error',$error);
	}
	else
	{
		$sql = "insert bans_ips set ip='".mysql_real_escape_string($_POST['add'])."'";
		$conn->execute($sql);
		$message = "IP Successfully Banned.";
		Stemplate::assign('message',$message);
	}
}

$mainmenu = "5";
$submenu = "2";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/bans_ip_add.tpl");
STemplate::display("administrator/global_footer.tpl");
?>