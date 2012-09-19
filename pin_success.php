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

$PID = intval(cleanit($_REQUEST['id']));
if($PID > 0)
{
	$query="SELECT A.bname, C.username FROM boards A, posts B, members C WHERE B.PID='".mysql_real_escape_string($PID)."' AND A.BID=B.BID AND B.USERID=C.USERID limit 1";
    $executequery=$conn->execute($query);
	$bname = $executequery->fields['bname'];
	$username = $executequery->fields['username'];
	$PID = md5($PID);
	STemplate::assign('PID',$PID);
	STemplate::assign('bname',$bname);
	STemplate::assign('username',$username);
}

//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::display('pin_success.tpl');
//TEMPLATES END
?>