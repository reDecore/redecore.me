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

$ADMINID = intval($_REQUEST[ADMINID]);

if($_POST['submitform'] == "1")
{
	$username = $_POST[username];
	$password = $_POST[password];
	$email = $_POST[email];
	
	if($ADMINID > 0)
	{
		if($username == "")
		{
			$error = "Error: Please enter a username.";
		}
		elseif($email == "")
		{
			$error = "Error: Please enter a e-mail address.";
		}
		else
		{
			$sql="select count(*) as total from administrators WHERE username='".mysql_real_escape_string($username)."' AND ADMINID!='".mysql_real_escape_string($ADMINID)."'";
			$executequery = $conn->Execute($sql);
			$tadmins = $executequery->fields[total];
						
			if($tadmins == "0")
			{ 
				$sql="select count(*) as total from administrators WHERE email='".mysql_real_escape_string($email)."' AND ADMINID!='".mysql_real_escape_string($ADMINID)."'";
				$executequery = $conn->Execute($sql);
				$tadmins = $executequery->fields[total];
				
				if($tadmins == "0")
				{
					$addtosql = "";
					if ($password != "")
					{
						$newpassword = escape($password);
						$newpassword = md5($newpassword);
						$addtosql = ", password = '".mysql_real_escape_string($newpassword)."'"; 
					}
	
					$sql = "UPDATE administrators set username='".mysql_real_escape_string($username)."', email='".mysql_real_escape_string($email)."' $addtosql WHERE ADMINID='".mysql_real_escape_string($ADMINID)."'";
					$conn->execute($sql);
					$message = "Administrator Successfully Edited.";
					Stemplate::assign('message',$message);
					
					if($_SESSION['ADMINID'] == $ADMINID)
					{
						$_SESSION['ADMINUSERNAME'] = $username;
						
						if ($password != "")
						{
							$_SESSION['ADMINPASSWORD'] = $newpassword;
						}
					}
					
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
}

if($ADMINID > 0)
{
	$query = $conn->execute("select * from administrators where ADMINID='".mysql_real_escape_string($ADMINID)."' limit 1");
	$admin = $query->getrows();
	Stemplate::assign('admin', $admin[0]);
}

$mainmenu = "12";
$submenu = "1";
Stemplate::assign('error',$error);
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/admins_edit.tpl");
STemplate::display("administrator/global_footer.tpl");
?>