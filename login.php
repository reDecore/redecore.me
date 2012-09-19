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

$r = cleanit(stripslashes($_REQUEST['r']));
STemplate::assign('r',$r);

if($_REQUEST['sublog'] == "1")
{	
	$identity = cleanit($_REQUEST['identity']);
	STemplate::assign('identity',$identity);
	$user_password = cleanit($_REQUEST['credential']);
	if($identity == "")
	{
		$error = $lang['35'];	
	}	
	elseif($user_password == "")
	{
		$error = $lang['36'];	
	}
	
	$l_remember_me = cleanit($_REQUEST['l_remember_me']);
	
	if($error == "")
	{
		$encryptedpassword = md5($user_password);
		$query="SELECT status,USERID,email,username,verified,profilepicture,fname,lname from members WHERE email='".mysql_real_escape_string($identity)."' and password='".mysql_real_escape_string($encryptedpassword)."'";
		$result=$conn->execute($query);
		if($result->recordcount() == 0)
		{
			$error = $lang['37'];
		}
		elseif($result->fields['status']=="0")
		{
			$error = $lang['39'];
		}

		if($error=="")
		{
			$query="update members set lastlogin='".time()."', lip='".$_SERVER['REMOTE_ADDR']."' WHERE email='".mysql_real_escape_string($identity)."'";
			$conn->execute($query);
	    	$_SESSION['USERID']=$result->fields['USERID'];			
			$_SESSION['EMAIL']=$result->fields['email'];
			$_SESSION['USERNAME']=$result->fields['username'];
			$_SESSION['VERIFIED']=$result->fields['verified'];
			$_SESSION['PP']=$result->fields['profilepicture'];
			$_SESSION['FNAME']=$result->fields['fname'];
			$_SESSION['LNAME']=$result->fields['lname'];
			if($l_remember_me == "1")
			{
				create_slrememberme();
			}
			$redirect = base64_decode($r);
			if($redirect == "")
			{
				header("Location:$thebaseurl/");exit;
			}
			else
			{
				$rto = $thebaseurl."/".$redirect;
				header("Location:$rto");exit;
			}
		}	
	}
}

$templateselect = "login.tpl";
$pagetitle = $lang['0'];
STemplate::assign('pagetitle',$pagetitle);

//TEMPLATES BEGIN
STemplate::assign('error',$error);
STemplate::display('header2.tpl');
STemplate::display($templateselect);
STemplate::display('footer.tpl');
//TEMPLATES END
?>