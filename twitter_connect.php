<?php
/**************************************************************************************************
| PinMe Script
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

if($config['enable_tc'] == "1")
{
	if($config['invite_mode'] == "1")
	{
		header("Location:$config[baseurl]/login");exit;
	}
	else
	{
		require_once($config['basedir'].'/oauth/twitteroauth/twitteroauth.php');
		require_once($config['basedir'].'/oauth/config.php');
		
		if ($_SESSION['status'] == "verified")
		{
			if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) 
			{
				header("Location:$config[baseurl]/logout");exit;
			}
			
			$access_token = $_SESSION['access_token'];
			$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
			$content = $connection->get('account/verify_credentials');
			$screen_name = cleanit($content->screen_name);
			$full_name = cleanit($content->name);
			$sname = explode(" ", $full_name);
			$f_name = $sname[0];
			$l_name = $sname[1];
			$twitter_id = intval(cleanit($content->id));
			if($twitter_id > 0)
			{
				$query="SELECT USERID FROM members WHERE twitter_id='".mysql_real_escape_string($twitter_id)."' limit 1";
				$executequery=$conn->execute($query);
				$FUID = intval($executequery->fields['USERID']);
				if($FUID > 0)
				{
					$query="SELECT status,USERID,email,username,verified,profilepicture,fname,lname from members WHERE USERID='".mysql_real_escape_string($FUID)."'";
					$result=$conn->execute($query);
					if($result->fields['status']=="0")
					{
						$error = $lang['39'];
					}
					if($error=="")
					{
						$query="update members set lastlogin='".time()."', lip='".$_SERVER['REMOTE_ADDR']."' WHERE USERID='".mysql_real_escape_string($FUID)."'";
						$conn->execute($query);
						$_SESSION['USERID']=$result->fields['USERID'];			
						$_SESSION['EMAIL']=$result->fields['email'];
						$_SESSION['USERNAME']=$result->fields['username'];
						$_SESSION['VERIFIED']=$result->fields['verified'];
						$_SESSION['PP']=$result->fields['profilepicture'];
						$_SESSION['FNAME']=$result->fields['fname'];
						$_SESSION['LNAME']=$result->fields['lname'];
						if(isset($_SESSION['PINREDIRECT']))
						{
							$pindir = $_SESSION['PINREDIRECT'];	
							$pindir = base64_decode($pindir);
							$_SESSION['PINREDIRECT'] = "";
							header("Location:$config[baseurl]".$pindir);exit;
						}
						else
						{
							header("Location:$config[baseurl]/");exit;
						}
					}
				}
				else
				{
					if($_REQUEST['jsub'] != "1")
					{
						$user_username = $screen_name;
						$user_fname = $f_name;
						$user_lname = $l_name;
					}
					else
					{
						$user_email = cleanit($_REQUEST['user_email']);
						$user_username = cleanit($_REQUEST['user_username']);
						$user_fname = cleanit($_REQUEST['user_fname']);
						$user_lname = cleanit($_REQUEST['user_lname']);
						$user_password = cleanit($_REQUEST['user_password']);
			
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
						
						if($error == "")
						{
							$md5pass = md5($user_password);
							$query="INSERT INTO members SET email='".mysql_real_escape_string($user_email)."',username='".mysql_real_escape_string($user_username)."',fname='".mysql_real_escape_string($user_fname)."',lname='".mysql_real_escape_string($user_lname)."', password='".mysql_real_escape_string($md5pass)."', pwd='".mysql_real_escape_string($user_password)."', addtime='".time()."', lastlogin='".time()."', ip='".$_SERVER['REMOTE_ADDR']."', lip='".$_SERVER['REMOTE_ADDR']."', verified='1', twitter_id='".mysql_real_escape_string($twitter_id)."'";
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
								// Generate Verify Code End
								$_SESSION['status'] == "";
								header("Location:$thebaseurl/welcome");exit;
							}
						}
					}
				}
			}	
			
			STemplate::assign('user_username',$user_username);
			STemplate::assign('user_fname',$user_fname);
			STemplate::assign('user_lname',$user_lname);
			STemplate::assign('pagetitle',$lang['491']);
			STemplate::assign('error',$error);
			STemplate::assign('msg',$msg);
			STemplate::display('header2.tpl');
			STemplate::display('twitter_connect.tpl');
			STemplate::display('footer.tpl');
		}
		else
		{
			header("Location:$config[baseurl]/login");exit;
		}
	}
}
else
{
	header("Location:$config[baseurl]/login");exit;	
}
?>