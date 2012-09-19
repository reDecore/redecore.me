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
$adminurl = $config['adminurl'];

//DELETE MEMBER
if($_REQUEST[delete]=="1")
{
	$DUSERID = intval($_REQUEST['USERID']);	
	delete_user($DUSERID);
	$message = "Member Successfully Deleted.";
	Stemplate::assign('message',$message);
}
//DELETE MEMBER END

//ACTIVE
if($_POST['asub']=="1")
{
	$AUSERID = $_POST['AUSERID'];
	$aval = $_POST['aval'];
	if($aval == "0")
	{
		$aval2 = "1";
	}
	else
	{
		$aval2 = "0";
	}
	$sql="UPDATE members SET status='".intval($aval2)."' WHERE USERID='".mysql_real_escape_string($AUSERID)."'";
	$conn->Execute($sql);
}
//ACTIVE

//VERIFIED
if($_POST['vsub']=="1")
{
	$VUSERID = $_POST['VUSERID'];
	$vval = $_POST['vval'];
	if($vval == "0")
	{
		$vval2 = "1";
	}
	else
	{
		$vval2 = "0";
	}
	$sql="UPDATE members SET verified='".intval($vval2)."' WHERE USERID='".mysql_real_escape_string($VUSERID)."'";
	$conn->Execute($sql);
}
//VERIFIED

if($_REQUEST['sortby']=="username")
{
	$sortby = "username";
	$sort =" order by username";
	$add1 = "&sortby=username";
}
elseif($_REQUEST['sortby']=="email")
{
	$sortby = "email";
	$sort =" order by email";
	$add1 = "&sortby=email";
}
elseif($_REQUEST['sortby']=="verified")
{
	$sortby = "verified";
	$sort =" order by verified";
	$add1 = "&sortby=verified";
}
elseif($_REQUEST['sortby']=="addtime")
{
	$sortby = "addtime";
	$sort =" order by addtime";
	$add1 = "&sortby=addtime";
}
elseif($_REQUEST['sortby']=="status")
{
	$sortby = "status";
	$sort =" order by status";
	$add1 = "&sortby=status";
}
else
{
	$sortby = "USERID";
	$sort =" order by USERID";
	$add1 = "&sortby=USERID";
}

if($_REQUEST['sorthow']=="desc")
{
	$sorthow ="desc";
	$add1 .= "&sorthow=desc";
}
else
{
	$sorthow ="asc";
	$add1 .= "&sorthow=asc";
}

//Search
$fromid = intval($_REQUEST['fromid']);
$toid = intval($_REQUEST['toid']);
$username = htmlentities(strip_tags($_REQUEST['username']), ENT_COMPAT, "UTF-8");
$email = htmlentities(strip_tags($_REQUEST['email']), ENT_COMPAT, "UTF-8");
$verified = htmlentities(strip_tags($_REQUEST['verified']), ENT_COMPAT, "UTF-8");
$status = htmlentities(strip_tags($_REQUEST['status']), ENT_COMPAT, "UTF-8");
$add1 .= "&fromid=$fromid&toid=$toid&username=$username&email=$email&verified=$verified&status=$status";
if($_POST['submitform'] == "1" || ($_REQUEST['fromid']!="" || $toid>0 || $username!="" || $email!="" || $verified!="" || $status!=""))
{
	if($fromid > 0)
	{
		$addtosql = "WHERE USERID>='".mysql_real_escape_string($fromid)."'";
		Stemplate::assign('fromid',$fromid);
	}
	else
	{
		$addtosql = "WHERE USERID>'".mysql_real_escape_string($fromid)."'";
	}
	if($toid > 0)
	{
		$addtosql .= "AND USERID<='".mysql_real_escape_string($toid)."'";
		Stemplate::assign('toid',$toid);
	}
	if($username != "")
	{
		$addtosql .= "AND username like'%".mysql_real_escape_string($username)."%'";
		Stemplate::assign('username',$username);
	}
	if($email != "")
	{
		$addtosql .= "AND email like'%".mysql_real_escape_string($email)."%'";
		Stemplate::assign('email',$email);
	}
	if($verified != "")
	{
		$addtosql .= "AND verified='1'";
		Stemplate::assign('verified',$verified);
	}
	if($status != "")
	{
		$addtosql .= "AND status='1'";
		Stemplate::assign('status',$status);
	}
	Stemplate::assign('search',"1");
}
//Search End

$page = intval($_REQUEST['page']);
if($page=="")
{
	$page = "1";
}
$currentpage = $page;

if ($page >=2)
{
	$pagingstart = ($page-1)*$config['items_per_page'];
}
else
{
	$pagingstart = "0";
}

$queryselected = "select USERID from members $addtosql $sort $sorthow limit $config[maximum_results]";
$query2 = "select * from members $addtosql $sort $sorthow limit $pagingstart, $config[items_per_page]";
$executequeryselected = $conn->Execute($queryselected);
$totalvideos = $executequeryselected->rowcount();	
if ($totalvideos > 0)
{
	if($totalvideos<=$config[maximum_results])
	{
		$total = $totalvideos;
	}
	else
	{
		$total = $config[maximum_results];
	}
	$toppage = ceil($total/$config[items_per_page]);
	if($toppage==0)
	{
		$xpage=$toppage+1;
	}
	else
	{
		$xpage = $toppage;
	}
	$executequery2 = $conn->Execute($query2);	
	$results = $executequery2->getrows();
	$beginning=$pagingstart+1;
	$ending=$pagingstart+$executequery2->recordcount();
	$pagelinks="";
	$k=1;
	$theprevpage=$currentpage-1;
	$thenextpage=$currentpage+1;
	if ($currentpage > 0)
	{	
		if($currentpage > 1) 
		{
			$pagelinks.="<a href='$adminurl/members_manage.php?page=1$add1' title='first page'>First</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/members_manage.php?page=$theprevpage$add1'>Previous</a>&nbsp;";
		};
		$counter=0;
		$lowercount = $currentpage-5;
		if ($lowercount <= 0) $lowercount = 1;
		while ($lowercount < $currentpage)
		{
			$pagelinks.="<a href='$adminurl/members_manage.php?page=$lowercount$add1'>$lowercount</a>&nbsp;";
			$lowercount++;
			$counter++;
		}
		$pagelinks.=$currentpage."&nbsp;";
		$uppercounter = $currentpage+1;
		while (($uppercounter < $currentpage+10-$counter) && ($uppercounter<=$toppage))
		{
			$pagelinks.="<a href='$adminurl/members_manage.php?page=$uppercounter$add1'>$uppercounter</a>&nbsp;";
			$uppercounter++;
		}
		if($currentpage < $toppage) 
		{
			$pagelinks.="<a href='$adminurl/members_manage.php?page=$thenextpage$add1'>Next</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/members_manage.php?page=$toppage$add1' title='last page'>Last</a>&nbsp;";
		};
	}
}
else
{
	$error = "Sorry, no members were found.";
}

$mainmenu = "7";
$submenu = "1";
Stemplate::assign('mainmenu',$mainmenu);
Stemplate::assign('submenu',$submenu);
Stemplate::assign('sorthow',$sorthow);
Stemplate::assign('sortby',$sortby);
Stemplate::assign('currentpage',$currentpage);
STemplate::display("administrator/global_header.tpl");
STemplate::assign('beginning',$beginning);
STemplate::assign('ending',$ending);
STemplate::assign('pagelinks',$pagelinks);
STemplate::assign('total',$total+0);
STemplate::assign('results',$results);
Stemplate::assign('error',$error);
STemplate::display("administrator/members_manage.tpl");
STemplate::display("administrator/global_footer.tpl");
?>