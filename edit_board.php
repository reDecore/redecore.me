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
	$ido = intval(cleanit($_REQUEST['id']));
	if($ido > 0)
	{
		$query = "select BID from boards WHERE BID='".mysql_real_escape_string($ido)."' AND USERID='".mysql_real_escape_string($SID)."'"; 
		$executequery=$conn->execute($query);
    	$id = $executequery->fields['BID'];
		if($id > 0)
		{
			if($_REQUEST['esub'] == "1")
			{
				$bname = cleanit($_REQUEST['bname']);
				$cat = intval(cleanit($_REQUEST['cat']));
				if($bname == "")
				{
					$error = $lang['80'];
				}
				elseif(!preg_match("/^[a-zA-Z0-9 ]*$/i",$bname))
				{
					$error = $lang['105'];
				}
				elseif(strlen($bname) > 100)
				{
					$error = $lang['238'];
				}
				elseif($cat == "0")
				{
					$error = $lang['81'];
				}
				else
				{
					$query = "UPDATE boards SET bname='".mysql_real_escape_string($bname)."', CATID='".mysql_real_escape_string($cat)."' WHERE USERID='".mysql_real_escape_string($SID)."' AND BID='".mysql_real_escape_string($id)."' limit 1"; 
					$conn->execute($query);
					$query = "UPDATE activity SET bname='".mysql_real_escape_string($bname)."' WHERE atype='folb' AND FOLB='".mysql_real_escape_string($id)."'"; 
					$conn->execute($query);
					$msg = $lang['241'];
				}
			}
	
			$query = "select BID, bname, CATID FROM boards WHERE USERID='".mysql_real_escape_string($SID)."' AND BID='".mysql_real_escape_string($id)."' limit 1"; 
			$results = $conn->execute($query);
			$pins = $results->getrows();
			STemplate::assign('pins',$pins[0]);
		}
		else
		{
			header("Location:".$thebaseurl."/myboards");exit;
		}
	}
	else
	{
		header("Location:".$thebaseurl."/myboards");exit;
	}
}
else
{
	header("Location:".$thebaseurl."/login");exit;
}



STemplate::assign('pagetitle',stripslashes($lang['223']));
//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::assign('msg',$msg);
STemplate::display('header.tpl');
STemplate::display('edit_board.tpl');
STemplate::display('footer.tpl');
//TEMPLATES END
?>