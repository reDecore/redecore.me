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
	$COMID = intval(cleanit($_REQUEST['id']));
	if($COMID > 0)
	{
		$query9 = "select A.PID from posts A, comments B WHERE B.COMID='".mysql_real_escape_string($COMID)."' AND A.USERID='".mysql_real_escape_string($SID)."' AND A.PID=B.PID";
		$executequery9=$conn->execute($query9);
		$PID = intval($executequery9->fields['PID']);
		
		if($PID > 0)
		{
			$query="DELETE FROM comments WHERE PID='".mysql_real_escape_string($PID)."' AND COMID='".mysql_real_escape_string($COMID)."'";
			$result=$conn->execute($query);	
			$query="DELETE FROM activity WHERE atype='com' AND COMID='".mysql_real_escape_string($COMID)."'";
			$result=$conn->execute($query);
		}
	}
}
?>