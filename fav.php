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
		$query="INSERT INTO followm SET USERID='".mysql_real_escape_string($SID)."', ISFOL='".mysql_real_escape_string($USERID)."'";
		$result=$conn->execute($query);	
		
		$query2 = "select BID from boards WHERE USERID='".mysql_real_escape_string($USERID)."'"; 
		$results2 = $conn->execute($query2);
		$bp = $results2->getrows();
		foreach ($bp as &$value) {
			$BID = $value['BID'];
			$query="INSERT INTO followb SET USERID='".mysql_real_escape_string($SID)."', ISFOLBID='".mysql_real_escape_string($BID)."'";
			$result=$conn->execute($query);	
		}
		
		
		$query = "select username, fname, lname from members WHERE USERID='".mysql_real_escape_string($USERID)."'"; 
		$executequery=$conn->execute($query);
    	$username = $executequery->fields['username'];
		$fname = $executequery->fields['fname'];
		$lname = $executequery->fields['lname'];
		if($fname != "")
		{
			$query="INSERT INTO activity SET USERID='".mysql_real_escape_string($SID)."', atype='folm', FOLM='".mysql_real_escape_string($USERID)."', username='".mysql_real_escape_string($username)."', fname='".mysql_real_escape_string($fname)."', lname='".mysql_real_escape_string($lname)."', time_added='".time()."'";
			$result=$conn->execute($query);
		}
			
	}
}
?>