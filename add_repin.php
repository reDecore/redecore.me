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
$PID = intval(cleanit($_REQUEST['PID']));
$OID = intval(cleanit($_REQUEST['OID']));
$board_id = intval(cleanit($_REQUEST['board_id']));
$comment = cleanit($_REQUEST['comment']);
$USERID = intval(cleanit($_REQUEST['USERID']));
$OUSERID = intval(cleanit($_REQUEST['OUSERID']));

if($SID > 0)
{
	if($PID > 0)
	{
		if($OID == "0")
		{
			$owner = $PID;
			$owner2 = $USERID;
		}
		else
		{
			$owner = $OID;
			$owner2 = $OUSERID;
		}
		if($owner > 0)
		{
			if($board_id == "0")
			{
				$arr = array('error' => true, 'msg' => $lang['87']);	
			}
			elseif($comment == "")
			{
				$arr = array('error' => true, 'msg' => $lang['88']);	
			}
			else
			{
				$query="SELECT pic, source, orig, youtube FROM posts WHERE PID='".mysql_real_escape_string($PID)."' AND active='1' limit 1";
        		$executequery=$conn->execute($query);
        		$mypic = $executequery->fields['pic'];
				$sourceurl = $executequery->fields['source'];
				$url = $executequery->fields['orig'];
				$youtube = $executequery->fields['youtube'];
				if($mypic == "")
				{
					$arr = array('error' => true, 'msg' => $lang['109']);
				}
				else
				{
					$price = get_price($comment);
					$query="INSERT INTO posts SET USERID='".mysql_real_escape_string($SID)."', OID='".mysql_real_escape_string($owner)."', OUSERID='".mysql_real_escape_string($owner2)."', REPIN='".mysql_real_escape_string($USERID)."', REPID='".mysql_real_escape_string($PID)."', ptitle='".mysql_real_escape_string($comment)."', pic='".mysql_real_escape_string($mypic)."', BID='".mysql_real_escape_string($board_id)."', source='".mysql_real_escape_string($sourceurl)."', orig='".mysql_real_escape_string($url)."', youtube='".mysql_real_escape_string($youtube)."', time_added='".time()."', date_added='".date("Y-m-d")."', active='0', pip='".$_SERVER['REMOTE_ADDR']."', price='".mysql_real_escape_string($price)."'";
					$result=$conn->execute($query);
					$thepid = mysql_insert_id();
					$pkey = md5($thepid);
					$query = "UPDATE posts SET active='1', pkey='".mysql_real_escape_string($pkey)."' WHERE PID='".mysql_real_escape_string($thepid)."'";
					$conn->execute($query);
					$pinurl = $thebaseurl."/pin/".$pkey;
					$query="SELECT bname FROM boards WHERE BID='".mysql_real_escape_string($board_id)."' limit 1";
					$executequery=$conn->execute($query);
					$bname = $executequery->fields['bname'];
					$seobname = seo_bname($bname);
					$boardurl = $thebaseurl."/".stripslashes($_SESSION['USERNAME'])."/".$seobname;
					$arr = array('success' => true, 'msg' => 'success', 'm1' => $lang['110'].' <a href="'.$boardurl.'">'.$bname.'</a>', 'm2' => '<a href="'.$pinurl.'">'.$lang['93'].'</a>');
					update_repinpoints($PID);
					
					$query10 = "UPDATE boards SET pincount=pincount+1 WHERE BID='".mysql_real_escape_string($board_id)."'"; 
					$conn->execute($query10);
					
					$query="INSERT INTO activity SET USERID='".mysql_real_escape_string($SID)."', atype='repin', PID='".mysql_real_escape_string($thepid)."', ptitle='".mysql_real_escape_string($comment)."', time_added='".time()."'";
					$result=$conn->execute($query);
					
					if($config['use_username'] == "1")
					{
						$postfromname = stripslashes($_SESSION['USERNAME']);
					}
					else
					{
						$postfromname = stripslashes($_SESSION['FNAME']);
					}
					$fbphotourl = $config['purl']."/t/".$mypic;
					$board_named = stripslashes($bname);
					$scriptolution_msg = $postfromname." ".$lang['489']." ".$board_named." ".$lang['487']." ".stripslashes($config['site_name']);
					$scriptolution_link = $config['baseurl']."/pin/".$pkey;;
					$scriptolution_picture = $fbphotourl;
					$scriptolution_caption = stripslashes($config['site_name']);
					publishToFacebook($config['FACEBOOK_APP_ID'], $config['FACEBOOK_SECRET'], "me", $scriptolution_msg, $scriptolution_link, $scriptolution_picture, $scriptolution_caption);	
				}
			}
		}
		else
		{
			$arr = array('error' => true, 'msg' => $lang['109']);
		}
	}
	else
	{
		$arr = array('error' => true, 'msg' => $lang['109']);
	}
}
else
{
	$arr = array('error' => true, 'msg' => $lang['108']);
}
echo json_encode($arr);
?>