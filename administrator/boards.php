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
	$DBID = intval($_REQUEST['BID']);
	if($DBID > 0)
	{
		delete_board($DBID);
	}	
	$message = "Board Successfully Deleted.";
	Stemplate::assign('message',$message);
}
// DELETE 

if($_REQUEST['sortby']=="cname")
{
	$sortby = "cname";
	$sort =" order by B.name";
	$add1 = "&sortby=cname";
}
elseif($_REQUEST['sortby']=="bname")
{
	$sortby = "bname";
	$sort =" order by A.bname";
	$add1 = "&sortby=bname";
}
elseif($_REQUEST['sortby']=="username")
{
	$sortby = "username";
	$sort =" order by C.username";
	$add1 = "&sortby=username";
}
elseif($_REQUEST['sortby']=="pincount")
{
	$sortby = "pincount";
	$sort =" order by A.pincount";
	$add1 = "&sortby=pincount";
}
else
{
	$sortby = "BID";
	$sort =" order by A.BID";
	$add1 = "&sortby=BID";
}

if($_REQUEST['sorthow']=="asc")
{
	$sorthow ="asc";
	$add1 .= "&sorthow=asc";
}
else
{
	$sorthow ="desc";
	$add1 .= "&sorthow=desc";
}

//Search
$fromid = intval($_REQUEST['fromid']);
$toid = intval($_REQUEST['toid']);
$cname = htmlentities(strip_tags($_REQUEST['cname']), ENT_COMPAT, "UTF-8");
$bname = htmlentities(strip_tags($_REQUEST['bname']), ENT_COMPAT, "UTF-8");
$username = htmlentities(strip_tags($_REQUEST['username']), ENT_COMPAT, "UTF-8");
$pincount = $toid = intval($_REQUEST['pincount']);
$add1 .= "&fromid=$fromid&toid=$toid&cname=$cname&bname=$bname&username=$username&pincount=$pincount";
if($_POST['submitform'] == "1" || ($_REQUEST['fromid']!="" || $toid>0 || $cname!="" || $bname!="" || $pincount>0 || $username!=""))
{
	if($fromid > 0)
	{
		$addtosql = "AND A.BID>='".mysql_real_escape_string($fromid)."'";
		Stemplate::assign('fromid',$fromid);
	}
	else
	{
		$addtosql = "AND A.BID>'".mysql_real_escape_string($fromid)."'";
	}
	if($toid > 0)
	{
		$addtosql .= "AND A.BID<='".mysql_real_escape_string($toid)."'";
		Stemplate::assign('toid',$toid);
	}
	if($cname != "")
	{
		$addtosql .= "AND B.name like'%".mysql_real_escape_string($cname)."%'";
		Stemplate::assign('cname',$cname);
	}
	if($bname != "")
	{
		$addtosql .= "AND A.bname like'%".mysql_real_escape_string($bname)."%'";
		Stemplate::assign('bname',$bname);
	}
	if($pincount != "")
	{
		$addtosql .= "AND A.pincount > '".mysql_real_escape_string($pincount)."'";
		Stemplate::assign('pincount',$pincount);
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

$queryselected = "select A.BID,B.CATID,C.username from boards A,categories B, members C WHERE A.CATID=B.CATID AND A.USERID=C.USERID $addtosql $sort $sorthow limit $config[maximum_results]";
$query2 = "select A.BID, A.bname, A.pincount,B.name,C.username from boards A,categories B, members C WHERE A.CATID=B.CATID AND A.USERID=C.USERID $addtosql $sort $sorthow limit $pagingstart, $config[items_per_page]";
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
			$pagelinks.="<a href='$adminurl/boards.php?page=1$add1' title='first page'>First</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/boards.php?page=$theprevpage$add1'>Previous</a>&nbsp;";
		};
		$counter=0;
		$lowercount = $currentpage-5;
		if ($lowercount <= 0) $lowercount = 1;
		while ($lowercount < $currentpage)
		{
			$pagelinks.="<a href='$adminurl/boards.php?page=$lowercount$add1'>$lowercount</a>&nbsp;";
			$lowercount++;
			$counter++;
		}
		$pagelinks.=$currentpage."&nbsp;";
		$uppercounter = $currentpage+1;
		while (($uppercounter < $currentpage+10-$counter) && ($uppercounter<=$toppage))
		{
			$pagelinks.="<a href='$adminurl/boards.php?page=$uppercounter$add1'>$uppercounter</a>&nbsp;";
			$uppercounter++;
		}
		if($currentpage < $toppage) 
		{
			$pagelinks.="<a href='$adminurl/boards.php?page=$thenextpage$add1'>Next</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/boards.php?page=$toppage$add1' title='last page'>Last</a>&nbsp;";
		};
	}
}
else
{
	$error = "There are no boards yet.";
}

$mainmenu = "13";
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
STemplate::display("administrator/boards.tpl");
STemplate::display("administrator/global_footer.tpl");
?>