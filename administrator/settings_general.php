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

include("../include/config.php");
include_once("../include/functions/import.php");
verify_login_admin();

if($_POST['submitform'] == "1")
{
	$arr = array("site_name", "short_name", "site_slogan", "site_email", "enable_fc", "FACEBOOK_APP_ID", "FACEBOOK_SECRET", "enable_tc", "CONSUMER_KEY", "CONSUMER_SECRET", "enable_gifts", "invite_mode", "use_username", "points_view", "points_com", "points_repin", "points_like", "twitter");
	foreach ($arr as $value)
	{
		$sql = "update config set value='".mysql_real_escape_string($_POST[$value])."' where setting='$value'";
		$conn->execute($sql);
		Stemplate::assign($value,strip_mq_gpc($_POST[$value]));
	}
	$message = "General Settings Successfully Saved.";
	Stemplate::assign('message',$message);
}

$mainmenu = "2";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
STemplate::display("administrator/global_header.tpl");
STemplate::display("administrator/settings_general.tpl");
STemplate::display("administrator/global_footer.tpl");
?>