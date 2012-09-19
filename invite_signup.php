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

$r = cleanit(stripslashes($_REQUEST['r']));
STemplate::assign('r',$r);

if($config['invite_mode'] == "1")
{
	$c = cleanit(stripslashes($_REQUEST['c']));
	if($c == "")
	{
		$error = $lang['479'];
		$templateselect = "error.tpl";
	}
	else
	{
		$query = "select count(*) as total from invites_code where code='".mysql_real_escape_string($c)."'"; 
		$executequery = $conn->execute($query);
		$totalc = intval($executequery->fields['total']);
		if($totalc > 0)
		{
			STemplate::assign('c',$c);
			if($_REQUEST['jsub'] == "1")
			{
				$user_email = cleanit($_REQUEST['user_email']);
				$user_username = cleanit($_REQUEST['user_username']);
				$user_fname = cleanit($_REQUEST['user_fname']);
				$user_lname = cleanit($_REQUEST['user_lname']);
				$user_password = cleanit($_REQUEST['user_password']);
				$user_password2 = cleanit($_REQUEST['user_password2']);
				$user_captcha_solution = cleanit($_REQUEST['user_captcha_solution']);
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
				elseif($user_fname == "")
				{
					$error = $lang['103'];	
				}
				elseif($user_lname == "")
				{
					$error = $lang['104'];	
				}
				elseif($user_email == "")
				{
					$error = $lang['35'];
				}
				elseif(!verify_valid_email($user_email))
				{
					$error = $lang['46'];
				}
				elseif (!verify_email_unique($user_email))
				{
					$error = $lang['63'];
				}		
				elseif($user_password == "")
				{
					$error = $lang['70'];	
				}	
				elseif($user_password2 == "")
				{
					$error = $lang['71'];	
				}
				elseif($user_password != $user_password2)
				{
					$error = $lang['64'];	
				}	
				elseif($user_captcha_solution == "")
				{
					$error = $lang['66'];	
				}
				elseif($user_captcha_solution != $_SESSION['imagecode'])
				{
					$error = $lang['65'];	
				}
				
				if($error == "")
				{
					$md5pass = md5($user_password);
					$query="INSERT INTO members SET email='".mysql_real_escape_string($user_email)."',username='".mysql_real_escape_string($user_username)."',fname='".mysql_real_escape_string($user_fname)."',lname='".mysql_real_escape_string($user_lname)."', password='".mysql_real_escape_string($md5pass)."', pwd='".mysql_real_escape_string($user_password)."', addtime='".time()."', lastlogin='".time()."', ip='".$_SERVER['REMOTE_ADDR']."', lip='".$_SERVER['REMOTE_ADDR']."'";
					$result=$conn->execute($query);
					$userid = mysql_insert_id();
					
					if($userid != "" && is_numeric($userid) && $userid > 0)
					{
						$query="SELECT USERID,email,username,verified,profilepicture,fname,lname from members WHERE USERID='".mysql_real_escape_string($userid)."'";
						$result=$conn->execute($query);
						
						$SUSERID = $result->fields['USERID'];
						$SEMAIL = $result->fields['email'];
						$SUSERNAME = $result->fields['username'];
						$SVERIFIED = $result->fields['verified'];
						$SPP = $result->fields['profilepicture'];
						$SFNAME = $result->fields['fname'];
						$SLNAME = $result->fields['lname'];
						$_SESSION['USERID']=$SUSERID;
						$_SESSION['EMAIL']=$SEMAIL;
						$_SESSION['USERNAME']=$SUSERNAME;
						$_SESSION['VERIFIED']=$SVERIFIED;
						$_SESSION['PP']=$SPP;
						$_SESSION['FNAME']=$SFNAME;
						$_SESSION['LNAME']=$SLNAME;
						
						// Generate Verify Code Begin
						$verifycode = generateCode(5).time();
						$query = "INSERT INTO members_verifycode SET USERID='".mysql_real_escape_string($SUSERID)."', code='$verifycode'";
						$conn->execute($query);
						if(mysql_affected_rows()>=1)
						{
							$proceedtoemail = true;
						}
						else
						{
							$proceedtoemail = false;
						}
						// Generate Verify Code End
						
						// Send Welcome E-Mail Begin
						if ($proceedtoemail)
						{
							$sendto = $SEMAIL;
							$sendername = $config['site_name'];
							$from = $config['site_email'];
							$subject = $lang['67']." ".$sendername;
							$sendmailbody = stripslashes($_SESSION['USERNAME']).",<br><br>";
							$sendmailbody .= $lang['68']."<br>";
							$sendmailbody .= "<a href=".$config['baseurl']."/confirmemail?c=$verifycode>".$config['baseurl']."/confirmemail?c=$verifycode</a><br><br>";
							$sendmailbody .= $lang['69'].",<br>".stripslashes($sendername);
							mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
						}
						// Send Welcome E-Mail End
						
						$query = "DELETE FROM invites_code WHERE code='".mysql_real_escape_string($c)."'";
						$conn->Execute($query);
						
						$redirect = base64_decode($r);
						if($redirect == "")
						{
							header("Location:$thebaseurl/welcome");exit;
						}
						else
						{
							$rto = $thebaseurl."/".$redirect;
							header("Location:$rto");exit;
						}
					}	
				}
				else
				{
					STemplate::assign('user_email',$user_email);
					STemplate::assign('user_username',$user_username);
					STemplate::assign('user_password',$user_password);
					STemplate::assign('user_password2',$user_password2);
				}
			}
			$templateselect = "invite_signup.tpl";
		}
		else
		{
			$error = $lang['479'];
			$templateselect = "error.tpl";
		}
	}
}
else
{
	$rto = $thebaseurl."/signup";
	header("Location:$rto");exit;
}
$pagetitle = $lang['48'];
STemplate::assign('pagetitle',$pagetitle);

//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::display('header2.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>