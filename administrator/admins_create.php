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
	$username = $_POST[username];
	$password = $_POST[password];
	$email = $_POST[email];
	
	if($username == "")
	{
		$error = "Error: Please enter a username.";
	}
	elseif($password == "")
	{
		$error = "Error: Please enter a password.";
	}
	elseif($email == "")
	{
		$error = "Error: Please enter a e-mail address.";
	}
	else
	{
		$sql="select count(*) as total from administrators WHERE username='".mysql_real_escape_string($username)."'";
		$executequery = $conn->Execute($sql);
		$tadmins = $executequery->fields[total];
		
		if($tadmins == "0")
		{ 
			$sql="select count(*) as total from administrators WHERE email='".mysql_real_escape_string($email)."'";
			$executequery = $conn->Execute($sql);
			$tadmins = $executequery->fields[total];
			
			if($tadmins == "0")
			{
				$sql = "insert administrators set username='".mysql_real_escape_string($username)."', password='".md5($password)."', email='".mysql_real_escape_string($email)."'";
				$conn->execute($sql);
				$message = "Administrator Successfully Added.";
				Stemplate::assign('message',$message);
			}
			else
			{
				$error = "Error: The e-mail address $email is already taken.";
			}
		}
		else
		{
			$error = "Error: The username $username is already taken.";
		}
	}
}

$mainmenu = "12";
$submenu = "1";
Stemplate::assign('error',$error);
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/admins_create.tpl");
STemplate::display("administrator/global_footer.tpl");
?>