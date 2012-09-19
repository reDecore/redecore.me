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
$subpin = intval(cleanit($_REQUEST['subpin']));
$board_id = intval(cleanit($_REQUEST['board_id']));
$comment = cleanit($_REQUEST['comment']);	
$sourceimg = cleanit($_REQUEST['sourceurl']);
$url = cleanit($_REQUEST['sourceimg']);
$youtube1 = cleanit($_REQUEST['youtube1']);
$youtube2 = cleanit($_REQUEST['youtube2']);
if($SID > 0)
{
	if($subpin > 0)
	{
		if($board_id == "0")
		{
			$arr = array('error' => true, 'msg' => $lang['87']);	
		}
		elseif($comment == "")
		{
			$arr = array('error' => true, 'msg' => $lang['88']);	
		}
		elseif(strlen($comment) > 500)
		{
			$arr = array('error' => true, 'msg' => $lang['237']);
		}
		elseif($url == "")
		{
			$arr = array('error' => true, 'msg' => $lang['166']);	
		}
		else
		{
			$pos = strrpos($url,".");
			$ph = strtolower(substr($url,$pos+1,strlen($url)-$pos));
			$pcount = strlen($ph);
			if($pcount > 4)
			{
				$pas = strpos($url, "?");
				$url2 = substr($url, 0, $pas);
				$pos = strrpos($url2,".");
				$ph = strtolower(substr($url2,$pos+1,strlen($url2)-$pos));
			}
			if($youtube1 == "youtube")
			{
				$youtube = $youtube2;
			}
			if($ph == "jpg" || $ph == "jpeg" || $ph == "png" || $ph == "gif")
			{
				$price = get_price($comment);
				$query="INSERT INTO posts SET USERID='".mysql_real_escape_string($SID)."', ptitle='".mysql_real_escape_string($comment)."', BID='".mysql_real_escape_string($board_id)."', source='".mysql_real_escape_string($sourceimg)."', orig='".mysql_real_escape_string($url)."', time_added='".time()."', date_added='".date("Y-m-d")."', active='0', pip='".$_SERVER['REMOTE_ADDR']."', price='".mysql_real_escape_string($price)."', youtube='".mysql_real_escape_string($youtube)."'";
				$result=$conn->execute($query);
				$pid = mysql_insert_id();
				$uploadedimage = $config['pdir'].'/'.$pid.'-temp.'.$ph;
				
				if(download_photo($url, $uploadedimage))//
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
								$arr = array('error' => true, 'msg' => $lang['91']);
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
							$arr = array('error' => true, 'msg' => $lang['91']);
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
							$arr = array('error' => true, 'msg' => $lang['91']);
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
						$arr = array('error' => true, 'msg' => $lang['91']);
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
							$arr = array('error' => true, 'msg' => $lang['91']);
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
								
								$pinurl = $thebaseurl."/pin/".$pkey;
								$query="SELECT bname FROM boards WHERE BID='".mysql_real_escape_string($board_id)."' limit 1";
								$executequery=$conn->execute($query);
								$bname = $executequery->fields['bname'];
								$seobname = seo_bname($bname);
								$boardurl = $thebaseurl."/".stripslashes($_SESSION['USERNAME'])."/".$seobname;
								$arr = array('success' => true, 'msg' => 'success', 'm1' => $lang['167'].' <a href="'.$boardurl.'">'.$bname.'</a>', 'm2' => '<a href="'.$pinurl.'">'.$lang['93'].'</a>');
								
								$query10 = "UPDATE boards SET pincount=pincount+1 WHERE BID='".mysql_real_escape_string($board_id)."'"; 
								$conn->execute($query10);
								
								$query="INSERT INTO activity SET USERID='".mysql_real_escape_string($_SESSION['USERID'])."', atype='pin', PID='".mysql_real_escape_string($pid)."', ptitle='".mysql_real_escape_string($comment)."', time_added='".time()."'";
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
							}
						}
					}					
				}
			}
			else
			{
				$arr = array('error' => true, 'msg' => $lang['90']);
			}
		}
	}
}
else
{
	$arr = array('error' => true, 'msg' => $lang['108']);
}
echo json_encode($arr);	
?>