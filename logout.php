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
destroy_slrememberme($_SESSION[USERNAME]);
$_SESSION['USERID']="";
$_SESSION['EMAIL']="";
$_SESSION['USERNAME']="";
$_SESSION['VERIFIED']="";
$_SESSION['PP']="";
$_SESSION['FNAME']="";
$_SESSION['LNAME']="";
$_SESSION['FB']="";
$_SESSION['PINREDIRECT'] = "";
header("location: $config[baseurl]/");
?>
