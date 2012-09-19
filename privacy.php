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

STemplate::assign('pagetitle',$lang['213']);
STemplate::assign('error',$error);
STemplate::assign('msg',$msg);
STemplate::display('header4.tpl');
STemplate::display('privacy.tpl');
STemplate::display('footer.tpl');
?>