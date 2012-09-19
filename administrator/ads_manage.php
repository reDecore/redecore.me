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

// DELETE BEGIN
if($_REQUEST[delete]=="1")
{
	$DAID = intval($_REQUEST['AID']);
	if($DAID > 0)
	{
		$sql="DELETE FROM advertisements WHERE AID='".mysql_real_escape_string($DAID)."'";
		$conn->Execute($sql);
		$message = "Advertisement Successfully Deleted.";
		Stemplate::assign('message',$message);
	}
}
// DELETE END

//ACTIVE
if($_POST['asub']=="1")
{
	$AAID = $_POST['AAID'];
	$aval = $_POST['aval'];
	if($aval == "0")
	{
		$aval2 = "1";
	}
	else
	{
		$aval2 = "0";
	}
	$sql="UPDATE advertisements SET active='".intval($aval2)."' WHERE AID='".mysql_real_escape_string($AAID)."'";
	$conn->Execute($sql);
}
//ACTIVE

if($_REQUEST['sortby']=="details")
{
	$sortby = "details";
	$sort =" order by description";
	$add1 = "&sortby=details";
}
elseif($_REQUEST['sortby']=="active")
{
	$sortby = "active";
	$sort =" order by active";
	$add1 = "&sortby=active";
}
else
{
	$sortby = "AID";
	$sort =" order by AID";
	$add1 = "&sortby=AID";
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
$details = htmlentities(strip_tags($_REQUEST['details']), ENT_COMPAT, "UTF-8");
$active = htmlentities(strip_tags($_REQUEST['active']), ENT_COMPAT, "UTF-8");
$add1 .= "&fromid=$fromid&toid=$toid&details=$details&active=$active";
if($_POST['submitform'] == "1" || ($_REQUEST['fromid']!="" || $toid>0 || $details!="" || $active!=""))
{
	if($fromid > 0)
	{
		$addtosql = "WHERE AID>='".mysql_real_escape_string($fromid)."'";
		Stemplate::assign('fromid',$fromid);
	}
	else
	{
		$addtosql = "WHERE AID>'".mysql_real_escape_string($fromid)."'";
	}
	if($toid > 0)
	{
		$addtosql .= "AND AID<='".mysql_real_escape_string($toid)."'";
		Stemplate::assign('toid',$toid);
	}
	if($details != "")
	{
		$addtosql .= "AND description like'%".mysql_real_escape_string($details)."%'";
		Stemplate::assign('details',$details);
	}
	if($active != "")
	{
		$addtosql .= "AND active='1'";
		Stemplate::assign('active',$active);
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

$queryselected = "select AID from advertisements $addtosql $sort $sorthow limit $config[maximum_results]";
$query2 = "select * from advertisements $addtosql $sort $sorthow limit $pagingstart, $config[items_per_page]";
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
			$pagelinks.="<a href='$adminurl/ads_manage.php?page=1$add1' title='first page'>First</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/ads_manage.php?page=$theprevpage$add1'>Previous</a>&nbsp;";
		};
		$counter=0;
		$lowercount = $currentpage-5;
		if ($lowercount <= 0) $lowercount = 1;
		while ($lowercount < $currentpage)
		{
			$pagelinks.="<a href='$adminurl/ads_manage.php?page=$lowercount$add1'>$lowercount</a>&nbsp;";
			$lowercount++;
			$counter++;
		}
		$pagelinks.=$currentpage."&nbsp;";
		$uppercounter = $currentpage+1;
		while (($uppercounter < $currentpage+10-$counter) && ($uppercounter<=$toppage))
		{
			$pagelinks.="<a href='$adminurl/ads_manage.php?page=$uppercounter$add1'>$uppercounter</a>&nbsp;";
			$uppercounter++;
		}
		if($currentpage < $toppage) 
		{
			$pagelinks.="<a href='$adminurl/ads_manage.php?page=$thenextpage$add1'>Next</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/ads_manage.php?page=$toppage$add1' title='last page'>Last</a>&nbsp;";
		};
	}
}
else
{
	$error = "Sorry, no standard advertisements were found.";
}

$mainmenu = "11";
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
STemplate::display("administrator/ads_manage.tpl");
STemplate::display("administrator/global_footer.tpl");
?>