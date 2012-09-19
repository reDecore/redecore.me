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

if($_POST['submitform1'] == "1")
{
	$arr = array("title", "value");
	foreach ($arr as $value)
	{
		$sql = "update static set $value='".mysql_real_escape_string($_POST[$value])."' where ID='1'";
		$conn->execute($sql);
	}
	$message = "Terms Of Use Successfully Saved.";
	Stemplate::assign('message',$message);
}

if($_POST['submitform2'] == "1")
{
	$arr = array("title", "value");
	foreach ($arr as $value)
	{
		$sql = "update static set $value='".mysql_real_escape_string($_POST[$value])."' where ID='2'";
		$conn->execute($sql);
	}
	$message = "Privacy Policy Successfully Saved.";
	Stemplate::assign('message',$message);
}

if($_POST['submitform3'] == "1")
{
	$arr = array("title", "value");
	foreach ($arr as $value)
	{
		$sql = "update static set $value='".mysql_real_escape_string($_POST[$value])."' where ID='3'";
		$conn->execute($sql);
	}
	$message = "About Us Successfully Saved.";
	Stemplate::assign('message',$message);
}

if($_POST['submitform4'] == "1")
{
	$arr = array("title", "value");
	foreach ($arr as $value)
	{
		$sql = "update static set $value='".mysql_real_escape_string($_POST[$value])."' where ID='4'";
		$conn->execute($sql);
	}
	$message = "Rules Successfully Saved.";
	Stemplate::assign('message',$message);
}

if($_POST['submitform5'] == "1")
{
	$arr = array("title", "value");
	foreach ($arr as $value)
	{
		$sql = "update static set $value='".mysql_real_escape_string($_POST[$value])."' where ID='5'";
		$conn->execute($sql);
	}
	$message = "Contact Us Successfully Saved.";
	Stemplate::assign('message',$message);
}

if($_POST['submitform6'] == "1")
{
	$arr = array("title", "value");
	foreach ($arr as $value)
	{
		$sql = "update static set $value='".mysql_real_escape_string($_POST[$value])."' where ID='6'";
		$conn->execute($sql);
	}
	$message = "Help Successfully Saved.";
	Stemplate::assign('message',$message);
}

$query = $conn->execute("select * from static");
$static = $query->getrows();
Stemplate::assign('static1', $static[0]);
Stemplate::assign('static2', $static[1]);
Stemplate::assign('static3', $static[2]);
Stemplate::assign('static4', $static[3]);
Stemplate::assign('static5', $static[4]);
Stemplate::assign('static6', $static[5]);

$mainmenu = "2";
$submenu = "7";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/settings_static.tpl");
STemplate::display("administrator/global_footer.tpl");
?>