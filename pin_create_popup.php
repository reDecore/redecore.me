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

$PID = intval(cleanit($_REQUEST['id']));
if($PID > 0)
{
	$query = "select A.PID, A.ptitle, A.pic, A.OID, A.USERID, A.OUSERID, B.USERID from posts A, members B WHERE A.active='1' AND A.USERID=B.USERID AND A.PID='".mysql_real_escape_string($PID)."' limit 1"; 
	$results = $conn->execute($query);
	$pins = $results->getrows();
	STemplate::assign('pins',$pins[0]);
	STemplate::display('pin_create_popup.tpl');
}
?>