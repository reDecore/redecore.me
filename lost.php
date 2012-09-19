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

if($_REQUEST['fpsub'] == "1")
{
	$user_email = cleanit($_REQUEST['identity']);
	if($user_email == "")
	{
		$error = $lang['35'];
	}
	
	if($error == "")
	{
		$query="SELECT USERID,username,pwd FROM members WHERE email='".mysql_real_escape_string($user_email)."'";
		$result=$conn->execute($query);
		$UID = $result->fields['USERID'];
		$pwd = $result->fields['pwd'];
		$un = $result->fields['username'];
		
		if(intval($UID) > 0)
		{
			if($pwd == "")
			{
				if(intval($UID) > 0)
				{
					$pwd = generateCode(8);
					$mp = md5($pwd);
					$query = "UPDATE members SET password='".mysql_real_escape_string($mp)."', pwd='".mysql_real_escape_string($pwd)."' WHERE USERID='".mysql_real_escape_string($UID)."' AND status='1'";
					$conn->execute($query);
				}
			}
			
			// Send E-Mail Begin
			$sendto = $user_email;
			$sendername = $config['site_name'];
			$from = $config['site_email'];
			$subject = $lang['50'];
			$sendmailbody = stripslashes($un).",<br><br>";
			$sendmailbody .= $lang['51']."<br>";
			$sendmailbody .= $lang['52']." $pwd <br><br>";
			$sendmailbody .= $lang['42'].",<br>".stripslashes($sendername);
			mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
			// Send E-Mail End
			$msg = $lang['53'];
		}
		else
		{
			$error = $lang['43'];
		}
	}
}
STemplate::assign('pagetitle',$lang['11']);
STemplate::assign('error',$error);
STemplate::assign('msg',$msg);
STemplate::display('header2.tpl');
STemplate::display('lost.tpl');
STemplate::display('footer.tpl');
?>