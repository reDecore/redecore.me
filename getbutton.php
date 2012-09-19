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

if ($_SESSION['USERID'] != "" && $_SESSION['USERID'] >= 0 && is_numeric($_SESSION['USERID']))
{
	$theme = "getbutton.tpl";
}
else
{
	header("Location:$config[baseurl]/login");exit;
}
//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::display('header2.tpl');
STemplate::display($theme);
STemplate::display('footer.tpl');
//TEMPLATES END
?>