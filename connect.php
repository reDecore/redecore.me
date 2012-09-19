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

include("include/config.php");
include("include/functions/import.php");
$thebaseurl = $config['baseurl'];

if ($_SESSION['USERID'] != "" && $_SESSION['USERID'] >= 0 && is_numeric($_SESSION['USERID']))
{
	if($_REQUEST['jsub'] == "1")
	{	
		$user_username = cleanit($_REQUEST['l_username']);
		STemplate::assign('user_username',$user_username);
		$password = cleanit($_REQUEST['credential']);
		STemplate::assign('password',$password);
		if($user_username == "")
		{
			$error = $lang['19'];	
		}
		elseif(strlen($user_username) < 3)
		{
			$error = $lang['20'];	
		}
		elseif(!preg_match("/^[a-zA-Z0-9]*$/i",$user_username))
		{
			$error = $lang['21'];
		}
		elseif(!verify_email_username($user_username))
		{
			$error = $lang['14'];
		}
		elseif($password == "")
		{
			$error = $lang['15'];	
		}
			
		if($error == "")
		{
			$mpass = md5($password);
			$SID = intval($_SESSION['USERID']);
			$query="UPDATE members SET username='".mysql_real_escape_string($user_username)."', password='".mysql_real_escape_string($mpass)."', pwd='".mysql_real_escape_string($password)."' WHERE USERID='".mysql_real_escape_string($SID)."' and status='1'";
			$result=$conn->execute($query);
			$_SESSION['USERNAME']=$user_username;
			header("Location:$config[baseurl]/welcome");exit;
		}
	}
}
else
{
	header("Location:$config[baseurl]/login");exit;
}
//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::display('header3.tpl');
STemplate::display('connect.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>