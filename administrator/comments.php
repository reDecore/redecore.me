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

// DELETE 
if($_REQUEST[delete]=="1")
{
	$DCOMID = intval($_REQUEST['COMID']);
	if($DCOMID > 0)
	{
		$query = "DELETE FROM comments WHERE COMID='".mysql_real_escape_string($DCOMID)."'";
		$conn->Execute($query);
	}	
	$message = "Comment Successfully Deleted.";
	Stemplate::assign('message',$message);
}
// DELETE 

if($_REQUEST['sortby']=="PID")
{
	$sortby = "PID";
	$sort =" order by B.PID";
	$add1 = "&sortby=PID";
}
elseif($_REQUEST['sortby']=="story")
{
	$sortby = "story";
	$sort =" order by B.ptitle";
	$add1 = "&sortby=story";
}
elseif($_REQUEST['sortby']=="username")
{
	$sortby = "username";
	$sort =" order by C.username";
	$add1 = "&sortby=username";
}
elseif($_REQUEST['sortby']=="details")
{
	$sortby = "details";
	$sort =" order by A.comment";
	$add1 = "&sortby=details";
}
elseif($_REQUEST['sortby']=="time_added")
{
	$sortby = "time_added";
	$sort =" order by A.time_added";
	$add1 = "&sortby=time_added";
}
else
{
	$sortby = "COMID";
	$sort =" order by A.COMID";
	$add1 = "&sortby=COMID";
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
$pid = intval($_REQUEST['pid']);
$story = htmlentities(strip_tags($_REQUEST['story']), ENT_COMPAT, "UTF-8");
$username = htmlentities(strip_tags($_REQUEST['username']), ENT_COMPAT, "UTF-8");
$details = htmlentities(strip_tags($_REQUEST['details']), ENT_COMPAT, "UTF-8");
$add1 .= "&fromid=$fromid&toid=$toid&pid=$pid&story=$story&username=$username&details=$details";
if($_POST['submitform'] == "1" || ($_REQUEST['fromid']!="" || $toid>0 || $pid>0 || $story!="" || $details!="" || $username!=""))
{
	if($fromid > 0)
	{
		$addtosql = "AND A.COMID>='".mysql_real_escape_string($fromid)."'";
		Stemplate::assign('fromid',$fromid);
	}
	else
	{
		$addtosql = "AND A.COMID>'".mysql_real_escape_string($fromid)."'";
	}
	if($toid > 0)
	{
		$addtosql .= "AND A.COMID<='".mysql_real_escape_string($toid)."'";
		Stemplate::assign('toid',$toid);
	}
	if($pid > 0)
	{
		$addtosql .= "AND B.PID='".mysql_real_escape_string($pid)."'";
		Stemplate::assign('pid',$pid);
	}
	if($story != "")
	{
		$addtosql .= "AND B.ptitle like'%".mysql_real_escape_string($story)."%'";
		Stemplate::assign('story',$story);
	}
	if($details != "")
	{
		$addtosql .= "AND A.comment like'%".mysql_real_escape_string($details)."%'";
		Stemplate::assign('details',$details);
	}
	if($username != "")
	{
		$addtosql .= "AND C.username like'%".mysql_real_escape_string($username)."%'";
		Stemplate::assign('username',$username);
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

$queryselected = "select A.COMID,B.PID,C.username from comments A,posts B, members C WHERE A.PID=B.PID AND A.USERID=C.USERID $addtosql $sort $sorthow limit $config[maximum_results]";
$query2 = "select A.*,B.PID,B.ptitle,C.username from comments A,posts B, members C WHERE A.PID=B.PID AND A.USERID=C.USERID $addtosql $sort $sorthow limit $pagingstart, $config[items_per_page]";
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
			$pagelinks.="<a href='$adminurl/comments.php?page=1$add1' title='first page'>First</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/comments.php?page=$theprevpage$add1'>Previous</a>&nbsp;";
		};
		$counter=0;
		$lowercount = $currentpage-5;
		if ($lowercount <= 0) $lowercount = 1;
		while ($lowercount < $currentpage)
		{
			$pagelinks.="<a href='$adminurl/comments.php?page=$lowercount$add1'>$lowercount</a>&nbsp;";
			$lowercount++;
			$counter++;
		}
		$pagelinks.=$currentpage."&nbsp;";
		$uppercounter = $currentpage+1;
		while (($uppercounter < $currentpage+10-$counter) && ($uppercounter<=$toppage))
		{
			$pagelinks.="<a href='$adminurl/comments.php?page=$uppercounter$add1'>$uppercounter</a>&nbsp;";
			$uppercounter++;
		}
		if($currentpage < $toppage) 
		{
			$pagelinks.="<a href='$adminurl/comments.php?page=$thenextpage$add1'>Next</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/comments.php?page=$toppage$add1' title='last page'>Last</a>&nbsp;";
		};
	}
}
else
{
	$error = "There are no comments yet.";
}

$mainmenu = "9";
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
STemplate::display("administrator/comments.tpl");
STemplate::display("administrator/global_footer.tpl");
?>