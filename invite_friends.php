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
	$email1 = cleanit($_REQUEST['email1']);
	if($email1 != "")
	{
		if(!verify_valid_email($email1))
		{
			$error = $lang['197'];
		}
	}
	$email2 = cleanit($_REQUEST['email2']);
	if($email2 != "")
	{
		if(!verify_valid_email($email2))
		{
			$error = $lang['198'];
		}
	}
	$email3 = cleanit($_REQUEST['email3']);
	if($email3 != "")
	{
		if(!verify_valid_email($email3))
		{
			$error = $lang['199'];
		}
	}
	$email4 = cleanit($_REQUEST['email4']);
	if($email4 != "")
	{
		if(!verify_valid_email($email4))
		{
			$error = $lang['200'];
		}
	}
	if($email1 == "" && $email2 == "" && $email3 == "" && $email4 == "")
	{
		$error = $lang['201'];
	}
	
	if($error == "")
	{
		$comment = cleanit($_REQUEST['message']);
		
		if ($email1 != "")
		{
			$sendto = $email1;
			$sendername = $config['site_name'];
			$from = $config['site_email'];
			$subject = $lang['203']." ".$sendername;
			$sendmailbody = stripslashes($email1).",<br><br>";
			$sendmailbody .= $lang['203']." ".$sendername."<br>";
			$sendmailbody .= $lang['205'].":<br>";
			$sendmailbody .= "<a href=".$config['baseurl'].">".$config['baseurl']."</a><br><br>";
			if($comment != "")
			{
				$sendmailbody .= $lang['207'].":<br>";
				$sendmailbody .= stripslashes($comment)."<br><br>";
			}
			$sendmailbody .= $lang['206'].",<br>".stripslashes($sendername);
			mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
		}
		if ($email2 != "")
		{
			$sendto = $email2;
			$sendername = $config['site_name'];
			$from = $config['site_email'];
			$subject = $lang['203']." ".$sendername;
			$sendmailbody = stripslashes($email2).",<br><br>";
			$sendmailbody .= $lang['203']." ".$sendername."<br>";
			$sendmailbody .= $lang['205']."<br>";
			$sendmailbody .= "<a href=".$config['baseurl'].">".$config['baseurl']."</a><br><br>";
			$sendmailbody .= $lang['206'].",<br>".stripslashes($sendername);
			mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
		}
		if ($email3 != "")
		{
			$sendto = $email3;
			$sendername = $config['site_name'];
			$from = $config['site_email'];
			$subject = $lang['203']." ".$sendername;
			$sendmailbody = stripslashes($email3).",<br><br>";
			$sendmailbody .= $lang['203']." ".$sendername."<br>";
			$sendmailbody .= $lang['205']."<br>";
			$sendmailbody .= "<a href=".$config['baseurl'].">".$config['baseurl']."</a><br><br>";
			$sendmailbody .= $lang['206'].",<br>".stripslashes($sendername);
			mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
		}
		if ($email4 != "")
		{
			$sendto = $email4;
			$sendername = $config['site_name'];
			$from = $config['site_email'];
			$subject = $lang['203']." ".$sendername;
			$sendmailbody = stripslashes($email4).",<br><br>";
			$sendmailbody .= $lang['203']." ".$sendername."<br>";
			$sendmailbody .= $lang['205']."<br>";
			$sendmailbody .= "<a href=".$config['baseurl'].">".$config['baseurl']."</a><br><br>";
			$sendmailbody .= $lang['206'].",<br>".stripslashes($sendername);
			mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
		}
		$msg = $lang['202'];

	}
}
STemplate::assign('pagetitle',$lang['156']);
STemplate::assign('error',$error);
STemplate::assign('msg',$msg);
STemplate::display('header4.tpl');
STemplate::display('invite_friends.tpl');
STemplate::display('footer.tpl');
?>