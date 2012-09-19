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

$SID = intval(cleanit($_SESSION['USERID']));
if($SID > 0)
{
	$PID = intval(cleanit($_REQUEST['id']))	;
	if($PID > 0)
	{
		$query="INSERT INTO posts_fav SET USERID='".mysql_real_escape_string($SID)."', PID='".mysql_real_escape_string($PID)."'";
		$result=$conn->execute($query);	
		update_likepointsadd($PID);		
		
		$query = "select ptitle from posts WHERE PID='".mysql_real_escape_string($PID)."'"; 
		$executequery=$conn->execute($query);
    	$ptitle = $executequery->fields['ptitle'];
		if($ptitle != "")
		{
			$query="INSERT INTO activity SET USERID='".mysql_real_escape_string($SID)."', atype='like', PID='".mysql_real_escape_string($PID)."', ptitle='".mysql_real_escape_string($ptitle)."', time_added='".time()."'";
			$result=$conn->execute($query);
		}
		
		$query="SELECT A.username, A.mail_like, A.email from members A, posts B WHERE B.PID='".mysql_real_escape_string($PID)."' AND A.USERID=B.USERID";
		$result=$conn->execute($query);
		$mail_like = $result->fields['mail_like'];
		if($mail_like == "1")
		{
			$key = md5($PID);
			$username = $result->fields['username'];
			$sendto = $result->fields['email'];
			$sendername = $config['site_name'];
			$from = $config['site_email'];
			$subject = stripslashes($_SESSION['USERNAME'])." ".$lang['498'];
			$sendmailbody = stripslashes($username).",<br><br>";
			$sendmailbody .= stripslashes($_SESSION['USERNAME'])." ".$lang['498']."<br><br>".$lang['499']."<br>";
			$sendmailbody .= "<a href=".$config['baseurl']."/pin/$key>".$config['baseurl']."/pin/$key</a><br><br>";
			$sendmailbody .= $lang['69'].",<br>".stripslashes($sendername);
			mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
		}
					
	}
}
?>