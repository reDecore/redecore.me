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

$SID = intval(cleanit($_SESSION['USERID']));
if($SID > 0)
{
	$PID = intval(cleanit($_REQUEST['id']))	;
	if($PID > 0)
	{
		$query="DELETE FROM posts_fav WHERE USERID='".mysql_real_escape_string($SID)."' AND PID='".mysql_real_escape_string($PID)."'";
		$result=$conn->execute($query);	
		update_likepointsrem($PID);
		
		$query="DELETE FROM activity WHERE atype='like' AND USERID='".mysql_real_escape_string($SID)."' AND PID='".mysql_real_escape_string($PID)."'";
		$result=$conn->execute($query);
		
	}
}
?>