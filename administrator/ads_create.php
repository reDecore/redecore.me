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
	$details = $_POST[details];
	$code = $_POST[code];
	$active = intval($_POST[active]);
	
	if($details == "")
	{
		$error = "Error: Please enter a description.";
	}
	elseif($code == "")
	{
		$error = "Error: Please enter your advertisement code.";
	}
	else
	{
		$sql = "insert advertisements set description='".mysql_real_escape_string($details)."', code='".mysql_real_escape_string($code)."', active='".mysql_real_escape_string($active)."'";
		$conn->execute($sql);
		$message = "Advertisement Successfully Added.";
		Stemplate::assign('message',$message);
	}
}

$mainmenu = "11";
$submenu = "1";
Stemplate::assign('error',$error);
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/ads_create.tpl");
STemplate::display("administrator/global_footer.tpl");
?>