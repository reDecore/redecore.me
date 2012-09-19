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

$COMID = intval($_REQUEST['COMID']);

if($_POST['submitform'] == "1")
{
	if($COMID > 0)
	{
		$details = cleanit($_REQUEST['details']);
		$sql = "update comments set comment='".mysql_real_escape_string($details)."' where COMID='".mysql_real_escape_string($COMID)."'";
		$conn->execute($sql);

		$message = "Comment Successfully Edited.";
		Stemplate::assign('message',$message);
	}
}

if($COMID > 0)
{
	$query = $conn->execute("select * from comments where COMID='".mysql_real_escape_string($COMID)."' limit 1");
	$comment = $query->getrows();
	Stemplate::assign('comment', $comment[0]);
}

$mainmenu = "9";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/comments_edit.tpl");
STemplate::display("administrator/global_footer.tpl");
?>