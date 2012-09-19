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

$SID = intval($_SESSION['USERID']);	
if($SID > 0)
{
	$query = "select password FROM members WHERE USERID='".mysql_real_escape_string($SID)."'"; 
	$results = $conn->execute($query);
	$u = $results->getrows();
	$pass = $u[0]['password'];
	
	if($_REQUEST['esub'] == "1")
	{
		$password = cleanit($_REQUEST['password']);
		$npassword = cleanit($_REQUEST['npassword']);
		$cpassword = cleanit($_REQUEST['cpassword']);
		
		if($password == "")
		{
			$error = $lang['267'];
		}
		elseif($npassword == "")
		{
			$error = $lang['268'];
		}
		elseif($cpassword == "")
		{
			$error = $lang['269'];
		}
		elseif(md5($password) != $pass)
		{
			$error = $lang['270'];
		}
		elseif($npassword != $cpassword)
		{
			$error = $lang['271'];
		}
		else
		{
			$mpass = md5($npassword);
			$query = "UPDATE members SET password='".mysql_real_escape_string($mpass)."', pwd='".mysql_real_escape_string($npassword)."' WHERE USERID='".mysql_real_escape_string($SID)."' limit 1"; 
			$conn->execute($query);
			$msg = $lang['272'];
		}
	}	
}
else
{
	header("Location:".$thebaseurl."/login");exit;
}



STemplate::assign('pagetitle',stripslashes($lang['251']));
//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::assign('msg',$msg);
STemplate::display('header.tpl');
STemplate::display('edit_pass.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>