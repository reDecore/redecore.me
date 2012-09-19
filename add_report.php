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
$comment = cleanit($_REQUEST['comment']);

if($PID > 0)
{
	if($comment != "")
	{
		$query="INSERT INTO posts_reports SET USERID='".mysql_real_escape_string($SID)."', PID='".mysql_real_escape_string($PID)."', reason='".mysql_real_escape_string($comment)."', time='".time()."', pip='".$_SERVER['REMOTE_ADDR']."'";
		$result=$conn->execute($query);
		$arr = array('success' => true, 'msg' => 'success');
	}
	else
	{
		$arr = array('error' => true, 'msg' => $lang['142']);
	}
}
else
{
	$arr = array('error' => true, 'msg' => $lang['143']);
}
echo json_encode($arr);
?>