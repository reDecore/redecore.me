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
$tpage = getCurrentPageUrl();
$thes = substr($tpage, -3);
STemplate::assign('pinpage',"1");
$pkey = cleanit($_REQUEST['PID']);
$query = "select A.PID, A.ptitle, A.pic, A.pkey, A.price, A.youtube, A.REPIN, A.REPID, A.time_added, A.source, A.OUSERID, B.USERID, B.username, B.fname, B.lname, B.profilepicture, C.bname, C.BID, C.pincount from posts A, members B, boards C WHERE A.active='1' AND A.USERID=B.USERID AND A.BID=C.BID AND A.pkey='".mysql_real_escape_string($pkey)."' AND B.status='1' limit 1"; 
$results = $conn->execute($query);
$pins = $results->getrows();
STemplate::assign('pins',$pins[0]);
STemplate::assign('pagetitle',stripslashes($pins[0]['ptitle']));
$PID = intval($pins[0]['PID']);
$BID = intval($pins[0]['BID']);
$USERID = intval($pins[0]['USERID']);
$OUSERID = intval($pins[0]['OUSERID']);
$username = $pins[0]['username'];
$fname = $pins[0]['fname'];
$lname = $pins[0]['lname'];
$source = $pins[0]['source'];
$REPIN = intval($pins[0]['REPIN']);
$REPID = intval($pins[0]['REPID']);
if($REPIN > 0 && $REPID > 0)
{
	$query="SELECT A.username, A.fname, A.lname, B.BID, C.bname FROM members A, posts B, boards C WHERE A.USERID='".mysql_real_escape_string($REPIN)."' AND B.PID='".mysql_real_escape_string($REPID)."' AND A.USERID=B.USERID AND C.BID=B.BID AND A.status='1' limit 1";
	$executequery=$conn->execute($query);
	$repinfrom = $executequery->fields['username'];
	$repinfrom2 = $executequery->fields['fname']." ".$executequery->fields['lname'];
	$bname = $executequery->fields['bname'];
	STemplate::assign('repinfrom',$repinfrom);
	STemplate::assign('repinfrom2',$repinfrom2);
	STemplate::assign('bname',$bname);
}
if($BID > 0 && $USERID > 0)
{
	if($thes == "s=1")
	{
		$query2 = "select ptitle, pic, pkey from posts WHERE active='1' AND BID='".mysql_real_escape_string($BID)."' AND USERID='".mysql_real_escape_string($USERID)."' order by rand() limit 11"; 
		$results2 = $conn->execute($query2);
		$bp = $results2->getrows();
		STemplate::assign('bp',$bp);
	}
	else
	{
		$query2 = "select ptitle, pic, pkey from posts WHERE active='1' AND BID='".mysql_real_escape_string($BID)."' AND USERID='".mysql_real_escape_string($USERID)."' order by rand() limit 9"; 
		$results2 = $conn->execute($query2);
		$bp = $results2->getrows();
		STemplate::assign('bp',$bp);
	}
}
if($OUSERID > 0)
{
	$query3="SELECT fname, lname, username FROM members WHERE USERID='".mysql_real_escape_string($OUSERID)."' AND status='1' limit 1";
	$executequery3=$conn->execute($query3);
	$o_name = $executequery3->fields['username'];
	$o_fname = $executequery3->fields['fname'];
	$o_lname = $executequery3->fields['lname'];
	STemplate::assign('o_name',$o_name);
	STemplate::assign('o_fname',$o_fname." ".$o_lname);
	$opics = $OUSERID;
}
else
{
	STemplate::assign('o_name',$username);
	STemplate::assign('o_fname',$fname." ".$lname);
	$opics = $USERID;
}
if($opics > 0)
{
	$query4 = "select ptitle, pic, pkey from posts WHERE active='1' AND USERID='".mysql_real_escape_string($opics)."' order by rand() limit 9"; 
	$results4 = $conn->execute($query4);
	$op = $results4->getrows();
	STemplate::assign('op',$op);
}
$csource = get_source_domain($source);
STemplate::assign('csource',$csource);
if($csource != "")
{
	$query5 = "select pic from posts WHERE active='1' AND source like '%".mysql_real_escape_string($csource)."%' order by rand() limit 9"; 
	$results5 = $conn->execute($query5);
	$sim = $results5->getrows();
	STemplate::assign('sim',$sim);
}
if($PID > 0)
{
	$query6 = "select B.bname, C.username, C.fname, C.lname, C.profilepicture from posts A, boards B, members C WHERE A.active='1' AND A.REPID='".mysql_real_escape_string($PID)."' AND A.BID=B.BID AND A.USERID=C.USERID AND C.status='1' order by A.PID desc limit 10"; 
	$results6 = $conn->execute($query6);
	$rp = $results6->getrows();
	STemplate::assign('rp',$rp);
	$hmrp = count($rp);
	if($hmrp > 0)
	{
		$query7 = "select count(*) as total from posts A, boards B, members C WHERE A.active='1' AND A.REPID='".mysql_real_escape_string($PID)."' AND A.BID=B.BID AND A.USERID=C.USERID AND C.status='1'";
		$executequery7=$conn->execute($query7);
		$totalrp = $executequery7->fields['total'];
		STemplate::assign('totalrp',$totalrp);
		if($hmrp == 10)
		{
			$morerp = $totalrp - 10;
			STemplate::assign('morerp',$morerp);
		}
	}
	
	$query8 = "select B.username, B.profilepicture from posts_fav A, members B WHERE A.PID='".mysql_real_escape_string($PID)."' AND A.USERID=B.USERID AND B.status='1' order by A.FID desc limit 10"; 
	$results8 = $conn->execute($query8);
	$pl = $results8->getrows();
	STemplate::assign('pl',$pl);
	$hmpl = count($pl);
	if($hmpl > 0)
	{
		$query9 = "select count(*) as total from posts_fav A, members B WHERE A.PID='".mysql_real_escape_string($PID)."' AND A.USERID=B.USERID AND B.status='1'";
		$executequery9=$conn->execute($query9);
		$totfav = $executequery9->fields['total'];
		STemplate::assign('totfav',$totfav);
		if($hmpl == 10)
		{
			$morefav = $totfav - 10;
			STemplate::assign('morefav',$morefav);
		}
	}
	
	$query10 = "select A.USERID, A.username, A.fname, A.lname, A.profilepicture, B.COMID, B.comment, B.time_added from members A, comments B WHERE B.PID='".mysql_real_escape_string($PID)."' AND A.USERID=B.USERID AND A.status='1' order by B.COMID asc limit 100"; 
	$results10 = $conn->execute($query10);
	$com = $results10->getrows();
	STemplate::assign('com',$com);
	
	update_viewcount($PID);
}

if($thes == "s=1")
{
	STemplate::assign('error',$error);
	if($PID > 0)
	{
		STemplate::display('pin.tpl');
	}
	else
	{
		STemplate::display('pin_error2.tpl');
	}
}
else
{
	STemplate::assign('error',$error);
	STemplate::display('header.tpl');
	if($PID > 0)
	{
		STemplate::display('pin2.tpl');
	}
	else
	{
		STemplate::display('pin_error.tpl');
	}
	STemplate::display('footer.tpl');
}
?>