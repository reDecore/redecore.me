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
	$BID = intval(cleanit($_REQUEST['id']))	;
	if($BID > 0)
	{
		$query="INSERT INTO followb SET USERID='".mysql_real_escape_string($SID)."', ISFOLBID='".mysql_real_escape_string($BID)."'";
		$result=$conn->execute($query);	
		
		
		$query = "select A.username, B.bname from members A, boards B WHERE B.BID='".mysql_real_escape_string($BID)."' AND A.USERID=B.USERID limit 1"; 
		$executequery=$conn->execute($query);
    	$bname = $executequery->fields['bname'];
		$username = $executequery->fields['username'];
		if($bname != "")
		{
			$query="INSERT INTO activity SET USERID='".mysql_real_escape_string($SID)."', atype='folb', FOLB='".mysql_real_escape_string($BID)."', bname='".mysql_real_escape_string($bname)."', username='".mysql_real_escape_string($username)."', time_added='".time()."'";
			$result=$conn->execute($query);
		}
		
	}
}
?>