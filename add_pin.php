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

//$url = urldecode($_REQUEST['url']);
$url = $_REQUEST['url'];
$sourceurl = urldecode($_REQUEST['sourceurl']);
$title = urldecode($_REQUEST['title']);
$urle = urlencode($_REQUEST['url']);
$sourceurle = urlencode($_REQUEST['sourceurl']);
$fullurl = "/add_pin?url=".$urle."&sourceurl=".$sourceurle."&title=".$title;

STemplate::assign('url',$url);
STemplate::assign('sourceurl',$sourceurl);
STemplate::assign('title',$title);
STemplate::assign('fullurl',$fullurl);

if ($_SESSION['USERID'] != "" && $_SESSION['USERID'] >= 0 && is_numeric($_SESSION['USERID']))
{
	if($_REQUEST['pinsub'] == "1")
	{
		$board_id = intval(cleanit($_REQUEST['board_id']));
		$description = cleanit($_REQUEST['description']);
		$sourceurl = cleanit($_REQUEST['sourceurl']);
		$url = cleanit($_REQUEST['image_src']);
		STemplate::assign('title',$description);	
			
		if($board_id == "0")
		{
			$error = $lang['87'];
		}
		elseif($description == "")
		{
			$error = $lang['88'];
		}
		elseif(strlen($description) > 500)
		{
			$error = $lang['237'];
		}
		elseif($url == "")
		{
			$error = $lang['89'];
		}
		else
		{
			$yt = strpos($url, "#youtube#");
			if($yt > 0)
			{
				$firsturl = $url;
				$url = substr($url, 0, $yt);
				$urlcount = strlen($url);				
				$ykey = substr($firsturl, $urlcount+9, 11);				
				if(strlen($ykey) > 0)
				{
					$youtube = $ykey;
				}
			}
		
			$tmbchk = substr($url, 0, 28);
			$tmbchk2 = substr($url, 0, 39);
			if($tmbchk == "http://www.tumblr.com/photo/")
			{
				while(($newurl = follow_redirect($url)) !== false)
				{
				   $url = $newurl;
				   $tmfound = 1;
				}
			}
			elseif($tmbchk2 == "http://s3.amazonaws.com/data.tumblr.com")
			{
				$tmfound2 = 1;
			}
			if($tmfound == "1")
			{
				$pas = strpos($url, "?");
				$url2 = substr($url, 0, $pas);
				$pos = strrpos($url2,".");
				$ph = strtolower(substr($url2,$pos+1,strlen($url2)-$pos));
			}
			elseif($tmfound2 == "1")
			{
				$pas = strpos($url, "?");
				$url2 = substr($url, 0, $pas);
				$pos = strrpos($url2,".");
				$ph = strtolower(substr($url2,$pos+1,strlen($url2)-$pos));
			}
			else
			{
				$pos = strrpos($url,".");
				$ph = strtolower(substr($url,$pos+1,strlen($url)-$pos));
			}
			$pcount = strlen($ph);
			if($pcount > 4)
			{
				$pas = strpos($url, "?");
				$url2 = substr($url, 0, $pas);
				$pos = strrpos($url2,".");
				$ph = strtolower(substr($url2,$pos+1,strlen($url2)-$pos));
			}		
			if($ph == "jpg" || $ph == "jpeg" || $ph == "png" || $ph == "gif")
			{
				$price = get_price($description);
				$query="INSERT INTO posts SET USERID='".mysql_real_escape_string($_SESSION['USERID'])."', ptitle='".mysql_real_escape_string($description)."', BID='".mysql_real_escape_string($board_id)."', source='".mysql_real_escape_string($sourceurl)."', orig='".mysql_real_escape_string($url)."', time_added='".time()."', date_added='".date("Y-m-d")."', active='0', pip='".$_SERVER['REMOTE_ADDR']."', price='".mysql_real_escape_string($price)."', youtube='".mysql_real_escape_string($youtube)."'";
				$result=$conn->execute($query);
				$pid = mysql_insert_id();
				$uploadedimage = $config['pdir'].'/'.$pid.'-temp.'.$ph;
				if(download_photo($url, $uploadedimage))
				{
					$info = getimagesize($uploadedimage);
					list($widthz, $heightz) = $info;
					if(intval($widthz) == "0" || intval($heightz) == "0")
					{
						if(download_photo_new($url, $uploadedimage, $sourceurl ))
						{
							$infob = getimagesize($uploadedimage);
							list($widthb, $heightb) = $infob;
							if(intval($widthb) == "0" || intval($heightb) == "0")
							{
								$error = $lang['91'];
								$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($pid)."'";
								$conn->execute($query);
								if(file_exists($uploadedimage))
								{
									unlink($uploadedimage);
								}
								$scriptolution_move_on = "0";
							}
							else
							{
								$scriptolution_move_on = "1";
							}
						}
						else
						{
							$error = $lang['91'];
							$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($pid)."'";
							$conn->execute($query);
							if(file_exists($uploadedimage))
							{
								unlink($uploadedimage);
							}
							$scriptolution_move_on = "0";	
						}
					}
					else
					{
						$scriptolution_move_on = "1";
					}
				}
				else
				{
					if(download_photo_new($url, $uploadedimage, $sourceurl ))
					{
						$infob = getimagesize($uploadedimage);
						list($widthb, $heightb) = $infob;
						if(intval($widthb) == "0" || intval($heightb) == "0")
						{
							$error = $lang['91'];
							$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($pid)."'";
							$conn->execute($query);
							if(file_exists($uploadedimage))
							{
								unlink($uploadedimage);
							}
							$scriptolution_move_on = "0";
						}
						else
						{
							$scriptolution_move_on = "1";
						}
					}
					else
					{
						$error = $lang['91'];
						$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($pid)."'";
						$conn->execute($query);
						if(file_exists($uploadedimage))
						{
							unlink($uploadedimage);
						}
						$scriptolution_move_on = "0";	
					}	
				}
				if($scriptolution_move_on == "1")
				{							

					$thepp = $pid;
					if($ph == "gif")
					{
						$thepp .= ".gif";
						$processgif = "1";
					}
					elseif($ph == "jpg")
					{
						$thepp .= ".jpg";
					}
					elseif($ph == "jpeg")
					{
						$thepp .= ".jpeg";
					}
					elseif($ph == "png")
					{
						$thepp .= ".png";
					}
					if($error == "")
					{
						$myvideoimgnew=$config['pdir']."/".$thepp;
						if(file_exists($myvideoimgnew))
						{
							unlink($myvideoimgnew);
						}
						copy ($uploadedimage , $myvideoimgnew);
						$info = getimagesize($myvideoimgnew);
						list($width_old, $height_old) = $info;
						if(intval($width_old) == "0" || intval($height_old) == "0")
						{
							$error = $lang['91'];
							$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($pid)."'";
							$conn->execute($query);
							if(file_exists($uploadedimage))
							{
								unlink($uploadedimage);
							}
						}
						else
						{
							if($processgif == "1")
							{
								do_resize_image2($myvideoimgnew, "1200", "12000", true, $config['pdir']."/t/l-".$thepp, $config['pdir']."/t/z-".$thepp);
								do_resize_image2($myvideoimgnew, "600", "6000", true, $config['pdir']."/t/".$thepp, $config['pdir']."/t/z-".$thepp);
								do_resize_image2($myvideoimgnew, "192", "4000", true, $config['pdir']."/t/s-".$thepp, $config['pdir']."/t/z-".$thepp);
								do_resize_image2($myvideoimgnew, "75", "75", false, $config['pdir']."/t/t-".$thepp, $config['pdir']."/t/z-".$thepp);
							}
							else
							{
								do_resize_image($myvideoimgnew, "1200", "12000", true, $config['pdir']."/t/l-".$thepp);
								do_resize_image($myvideoimgnew, "600", "6000", true, $config['pdir']."/t/".$thepp);
								do_resize_image($myvideoimgnew, "192", "4000", true, $config['pdir']."/t/s-".$thepp);
								do_resize_image($myvideoimgnew, "75", "75", false, $config['pdir']."/t/t-".$thepp);
							}
							$fbphotourl = $config['purl']."/t/".$thepp;
							if(file_exists($config['pdir']."/".$thepp))
							{
								$pkey = md5($pid);
								$query = "UPDATE posts SET pic='$thepp', active='1', pkey='".mysql_real_escape_string($pkey)."' WHERE PID='".mysql_real_escape_string($pid)."'";
								$conn->execute($query);
								
								
								if(file_exists($myvideoimgnew))
								{
									unlink($myvideoimgnew);
								}
								$theimageinfo = getimagesize($uploadedimage);
								$ow = $theimageinfo[0];
								if($ow > 0)
								{
									if($processgif == "1")
									{
										do_resize_image2($uploadedimage, $ow, "12000", true, $config['pdir']."/".$thepp, $config['pdir']."/t/z-".$thepp);
										if(file_exists($config['pdir']."/t/z-".$thepp))
										{
											unlink($config['pdir']."/t/z-".$thepp);
										}
									}
									else
									{
										do_resize_image($uploadedimage, $ow, "12000", true, $config['pdir']."/".$thepp);
									}
								}
								
								unlink($uploadedimage);
								
								$query10 = "UPDATE boards SET pincount=pincount+1 WHERE BID='".mysql_real_escape_string($board_id)."'"; 
								$conn->execute($query10);
								
								$query="INSERT INTO activity SET USERID='".mysql_real_escape_string($_SESSION['USERID'])."', atype='pin', PID='".mysql_real_escape_string($pid)."', ptitle='".mysql_real_escape_string($description)."', time_added='".time()."'";
								$result=$conn->execute($query);

								if($config['use_username'] == "1")
								{
									$postfromname = stripslashes($_SESSION['USERNAME']);
								}
								else
								{
									$postfromname = stripslashes($_SESSION['FNAME']);
								}
								$board_named = stripslashes(get_board_name($board_id));
								$scriptolution_msg = $postfromname." ".$lang['486']." ".$board_named." ".$lang['487']." ".stripslashes($config['site_name']);
								$scriptolution_link = $config['baseurl']."/pin/".$pkey;;
								$scriptolution_picture = $fbphotourl;
								$scriptolution_caption = stripslashes($config['site_name']);
								publishToFacebook($config['FACEBOOK_APP_ID'], $config['FACEBOOK_SECRET'], "me", $scriptolution_msg, $scriptolution_link, $scriptolution_picture, $scriptolution_caption);									
			
								header("Location:$config[baseurl]/pin_success?id=".$pid);exit;
							}
							else
							{
								if(file_exists($uploadedimage))
								{
									unlink($uploadedimage);
								}	
							}
						}
					}
					
				}
			}
			else
			{
				$error = $lang['90'];
			}
		}
	}
	$theme = "add_pin.tpl";
}
else
{
	$fullurl = base64_encode($fullurl);
	$_SESSION['PINREDIRECT'] = $fullurl;

	if($_REQUEST['sublog'] == "1")
	{	
		$email = cleanit($_REQUEST['email']);
		STemplate::assign('email',$email);
		$user_password = cleanit($_REQUEST['password']);
		if($email == "")
		{
			$error = $lang['35'];	
		}	
		elseif($user_password == "")
		{
			$error = $lang['36'];	
		}
		
		$l_remember_me = cleanit($_REQUEST['l_remember_me']);
		
		if($error == "")
		{
			$encryptedpassword = md5($user_password);
			$query="SELECT status,USERID,email,username,verified,profilepicture,fname,lname from members WHERE email='".mysql_real_escape_string($email)."' and password='".mysql_real_escape_string($encryptedpassword)."'";
			$result=$conn->execute($query);
			if($result->recordcount() == 0)
			{
				$error = $lang['37'];
			}
			elseif($result->fields['status']=="0")
			{
				$error = $lang['39'];
			}
	
			if($error=="")
			{
				$query="update members set lastlogin='".time()."', lip='".$_SERVER['REMOTE_ADDR']."' WHERE email='".mysql_real_escape_string($email)."'";
				$conn->execute($query);
				$_SESSION['USERID']=$result->fields['USERID'];			
				$_SESSION['EMAIL']=$result->fields['email'];
				$_SESSION['USERNAME']=$result->fields['username'];
				$_SESSION['VERIFIED']=$result->fields['verified'];
				$_SESSION['PP']=$result->fields['profilepicture'];
				$_SESSION['FNAME']=$result->fields['fname'];
				$_SESSION['LNAME']=$result->fields['lname'];
				if($l_remember_me == "1")
				{
					create_slrememberme();
				}
				$redirect = base64_decode($fullurl);
				$rto = $thebaseurl.$redirect;
				header("Location:$rto");exit;
			}	
		}
	}
	
	$theme = "add_pin_login.tpl";
}
//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::display($theme);
//TEMPLATES END
?>