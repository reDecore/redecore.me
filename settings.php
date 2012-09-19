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
	if($_REQUEST['esub'] == "1")
	{
		$email = cleanit($_REQUEST['email']);
		$fname = cleanit($_REQUEST['fname']);
		$lname = cleanit($_REQUEST['lname']);
		$username = cleanit($_REQUEST['username']);
		$gender = intval(cleanit($_REQUEST['gender']));
		$description = cleanit($_REQUEST['about']);
		$location = cleanit($_REQUEST['location']);
		$website = cleanit($_REQUEST['website']);
		
		if($email == "")
		{
			$error = $lang['35'];
		}
		elseif(!verify_valid_email($email))
		{
			$error = $lang['46'];
		}
		else
		{
			if($email != $_SESSION['EMAIL'])
			{
				if(!verify_email_unique($email))
				{
					$error = $lang['63'];
				}
				else
				{
					$addu .= ", email='".mysql_real_escape_string($email)."', verified='0'";	
					$echange = "1";
				}
			}
		}
		
		if($error == "")
		{
			if($fname == "")
			{
				$error = $lang['103'];
			}
			elseif($lname == "")
			{
				$error = $lang['104'];
			}
			elseif($username == "")
			{
				$error = $lang['19'];
			}
			elseif(strlen($username) < 3)
			{
				$error = $lang['20'];	
			}
			elseif(!preg_match("/^[a-zA-Z0-9]*$/i",$username))
			{
				$error = $lang['21'];
			}
			else
			{
				if($username != $_SESSION['USERNAME'])
				{
					if(!verify_email_username($username))
					{
						$error = $lang['14'];
					}
					else
					{
						$addu .= ", username='".mysql_real_escape_string($username)."'";
						$uchange = 1;	
					}
				}
			}
			
			if($config['enable_fc'] == "1")
			{
				$post_fb = intval(cleanit($_REQUEST['post_fb']));
				$addfb .= ", post_fb='".mysql_real_escape_string($post_fb)."'";
			}
			
			if($error == "")
			{
				$query = "UPDATE members SET fname='".mysql_real_escape_string($fname)."', lname='".mysql_real_escape_string($lname)."', gender='".mysql_real_escape_string($gender)."', description='".mysql_real_escape_string($description)."', location='".mysql_real_escape_string($location)."', website='".mysql_real_escape_string($website)."' $addu $addfb WHERE USERID='".mysql_real_escape_string($SID)."' limit 1"; 
				$conn->execute($query);
				$msg = $lang['261'];				
				
				if($echange == "1")
				{
					$_SESSION['EMAIL'] = $email;
					$_SESSION['VERIFIED'] = 0;
				
					// Generate Verify Code Begin
					$query = "DELETE FROM members_verifycode WHERE USERID='".mysql_real_escape_string($SID)."'";
					$conn->execute($query);
					$verifycode = generateCode(5).time();
					$query = "INSERT INTO members_verifycode SET USERID='".mysql_real_escape_string($SID)."', code='$verifycode'";
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
						$sendto = $email;
						$sendername = $config['site_name'];
						$from = $config['site_email'];
						$subject = $lang['262'];
						$sendmailbody = stripslashes($_SESSION['USERNAME']).",<br><br>";
						$sendmailbody .= $lang['263']."<br>";
						$sendmailbody .= "<a href=".$config['baseurl']."/confirmemail?c=$verifycode>".$config['baseurl']."/confirmemail?c=$verifycode</a><br><br>";
						$sendmailbody .= $lang['69'].",<br>".stripslashes($sendername);
						mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
					}
					// Send Welcome E-Mail End
				}

				$pid = $SID;
				$gstop = "1";
				$gphoto = $_FILES['gphoto']['tmp_name'];
				if($gphoto != "")
				{
					$ext = substr(strrchr($_FILES['gphoto']['name'], '.'), 1);
					$ext2 = strtolower($ext);
					if($ext2 == "jpeg" || $ext2 == "jpg" || $ext2 == "gif" || $ext2 == "png")
					{
						$theimageinfo = getimagesize($gphoto);
						if($theimageinfo[2] != 1 && $theimageinfo[2] != 2 && $theimageinfo[2] != 3)
						{
							$gstop = "1";
						}
						else
						{
							$gstop = "0";	
						}
					}
				}
				if($gstop == "0")
				{
					$thepp = $pid;
					if($theimageinfo[2] == 1)
					{
						$thepp .= ".gif";
					}
					elseif($theimageinfo[2] == 2)
					{
						$thepp .= ".jpg";
					}
					elseif($theimageinfo[2] == 3)
					{
						$thepp .= ".png";
					}
					if($error == "")
					{
						$myvideoimgnew=$config['mdir']."/o/".$thepp;
						if(file_exists($myvideoimgnew))
						{
							unlink($myvideoimgnew);
						}
						move_uploaded_file($gphoto, $myvideoimgnew);
						$myvideoimgnew2=$config['mdir']."/".$thepp;
						do_resize_image($myvideoimgnew, "192", "192", false, $myvideoimgnew2);
						$myvideoimgnew3=$config['mdir']."/thumbs/".$thepp;
						do_resize_image($myvideoimgnew, "50", "50", false, $myvideoimgnew3);
						if(file_exists($config['mdir']."/o/".$thepp))
						{
							$query = "UPDATE members SET profilepicture='$thepp' WHERE USERID='".mysql_real_escape_string($SID)."'";
							$conn->execute($query);
							$_SESSION['PP']=$thepp;
						}
					}
				}
				if($uchange == "1")
				{
					$_SESSION['USERNAME']=$username;
				}
				$_SESSION['FNAME']=$fname;
				$_SESSION['LNAME']=$lname;
			}
		}
	}
			
	$query = "select gender, description, location, website, post_fb, mail_like, mail_com FROM members WHERE USERID='".mysql_real_escape_string($SID)."'"; 
	$results = $conn->execute($query);
	$u = $results->getrows();
	STemplate::assign('u',$u[0]);
}
else
{
	header("Location:".$thebaseurl."/login");exit;
}



STemplate::assign('pagetitle',stripslashes($lang['215']));
//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::assign('msg',$msg);
STemplate::display('header.tpl');
STemplate::display('settings.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>