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
$PID = intval(cleanit($_REQUEST['compid']));
$comment = cleanit($_REQUEST['thecomment']);

if($SID > 0)
{
	if($PID > 0)
	{
		if($comment != "")
		{
			$clen = strlen($comment);
			if($clen > 300)
			{
				$arr = array('error' => true, 'msg' => $lang['138']);
			}
			else
			{
				$query="INSERT INTO comments SET USERID='".mysql_real_escape_string($SID)."', PID='".mysql_real_escape_string($PID)."', comment='".mysql_real_escape_string($comment)."', time_added='".time()."', pip='".$_SERVER['REMOTE_ADDR']."'";
				$result=$conn->execute($query);
				$comid = mysql_insert_id();	
				if(intval($comid) > 0)
				{
					update_compoints($PID);	
					$query="INSERT INTO activity SET USERID='".mysql_real_escape_string($SID)."', atype='com', PID='".mysql_real_escape_string($PID)."', COMID='".mysql_real_escape_string($comid)."', comment='".mysql_real_escape_string($comment)."', time_added='".time()."'";
					$result=$conn->execute($query);
				}
				$arr = array('success' => true, 'msg' => 'success', 'm1' => $comment);	
				
				$query="SELECT A.username, A.mail_com, A.email from members A, posts B WHERE B.PID='".mysql_real_escape_string($PID)."' AND A.USERID=B.USERID";
				$result=$conn->execute($query);
				$mail_com = $result->fields['mail_com'];
				if($mail_com == "1")
				{
					$key = md5($PID);
					$username = $result->fields['username'];
					$sendto = $result->fields['email'];
					$sendername = $config['site_name'];
					$from = $config['site_email'];
					$subject = stripslashes($_SESSION['USERNAME'])." ".$lang['496'];
					$sendmailbody = stripslashes($username).",<br><br>";
					$sendmailbody .= stripslashes($_SESSION['USERNAME'])." ".$lang['496']."<br><br>".$lang['497']."<br>";
					$sendmailbody .= "<a href=".$config['baseurl']."/pin/$key>".$config['baseurl']."/pin/$key</a><br><br>";
					$sendmailbody .= $lang['69'].",<br>".stripslashes($sendername);
					mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
				}				
						
			}
		}
		else
		{
			$arr = array('error' => true, 'msg' => $lang['137']);
		}
	}
	else
	{
		$arr = array('error' => true, 'msg' => $lang['136']);
	}
}
else
{
	$arr = array('error' => true, 'msg' => $lang['108']);
}

echo json_encode($arr);

?>