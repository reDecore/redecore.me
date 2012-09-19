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
	$USERID = intval(cleanit($_REQUEST['id']))	;
	if($USERID > 0)
	{
		$query="DELETE FROM followm WHERE USERID='".mysql_real_escape_string($SID)."' AND ISFOL='".mysql_real_escape_string($USERID)."'";
		$result=$conn->execute($query);	
		
		$query="DELETE FROM activity WHERE atype='folm' AND USERID='".mysql_real_escape_string($SID)."' AND FOLM='".mysql_real_escape_string($USERID)."'";
		$result=$conn->execute($query);
	}
}
?>