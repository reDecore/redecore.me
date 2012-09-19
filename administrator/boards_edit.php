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

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

function insert_get_all_users()
{
    global $config,$conn;
	$query = "select USERID,username from members order by username asc"; 
	$results = $conn->execute($query);
	$returnthis = $results->getrows();
	return $returnthis;
}


function insert_get_all_cats()
{
    global $config,$conn;
	$query = "select CATID,name from categories order by name asc"; 
	$results = $conn->execute($query);
	$returnthis = $results->getrows();
	return $returnthis;
}

$BID = intval($_REQUEST['BID']);

if($_POST['submitform'] == "1")
{
	if($BID > 0)
	{
		$bname = cleanit($_REQUEST['bname']);
		if($bname == "")
		{
			$error = $lang['80'];
		}
		elseif(!preg_match("/^[a-zA-Z0-9 ]*$/i",$bname))
		{
			$error = $lang['105'];
		}
		elseif($bname == $lang['82'])
		{
			$error = $lang['80'];
		}
		elseif(strlen($bname) > 100)
		{
			$error = $lang['238'];
		}
		else
		{
			$USERID = intval($_REQUEST['USERID']);
			$CATID = intval($_REQUEST['CATID']);
			$sql = "update boards set bname='".mysql_real_escape_string($bname)."', USERID='".mysql_real_escape_string($USERID)."', CATID='".mysql_real_escape_string($CATID)."' where BID='".mysql_real_escape_string($BID)."'";
			$conn->execute($sql);
	
			$message = "Board Successfully Edited.";
			Stemplate::assign('message',$message);
		}
		Stemplate::assign('error',$error);
	}
}

if($BID > 0)
{
	$query = $conn->execute("select * from boards where BID='".mysql_real_escape_string($BID)."' limit 1");
	$board = $query->getrows();
	Stemplate::assign('board', $board[0]);
}

$mainmenu = "13";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/boards_edit.tpl");
STemplate::display("administrator/global_footer.tpl");
?>