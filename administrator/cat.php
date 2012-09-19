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
if($_REQUEST['delete']=="1")
{
	$DCATID = intval($_REQUEST['CATID']);
	if($DCATID > 0)
	{
		$query="SELECT count(*) as total FROM boards WHERE CATID='".mysql_real_escape_string($DCATID)."' AND pincount>'0'";
        $executequery=$conn->execute($query);
        $thet = $executequery->fields['total'];
		if($thet > 0)
		{
			$error = "Error: The category has could not be deleted because there are pins in that category.";
			Stemplate::assign('error',$error);
		}
		else
		{
			$query="SELECT ext FROM categories WHERE CATID='".mysql_real_escape_string($DCATID)."'";
        	$executequery=$conn->execute($query);
       	 	$ext = $executequery->fields['ext'];
		
			$sql="DELETE FROM categories WHERE CATID='".mysql_real_escape_string($DCATID)."'";
			$conn->Execute($sql);
			
			$myvideoimgnew=$config['imagedir']."/cat/".$DCATID.$ext;
			if(file_exists($myvideoimgnew))
			{
				unlink($myvideoimgnew);
			}
					
			$message = "Category Successfully Deleted.";
			Stemplate::assign('message',$message);
		}
	}
}
// DELETE END

if($_REQUEST['sortby']=="name")
{
	$sortby = "name";
	$sort =" order by name";
	$add1 = "&sortby=name";
}
elseif($_REQUEST['sortby']=="details")
{
	$sortby = "details";
	$sort =" order by example";
	$add1 = "&sortby=details";
}
else
{
	$sortby = "CATID";
	$sort =" order by CATID";
	$add1 = "&sortby=CATID";
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
$name = cleanit($_REQUEST['name']);
$details = cleanit($_REQUEST['details']);
$add1 .= "&fromid=$fromid&toid=$toid&name=$name&details=$details";
if($_POST['submitform'] == "1" || ($_REQUEST['fromid']!="" || $toid>0 || $name!="" || $details!=""))
{
	if($fromid > 0)
	{
		$addtosql = "WHERE CATID>='".mysql_real_escape_string($fromid)."'";
		Stemplate::assign('fromid',$fromid);
	}
	else
	{
		$addtosql = "WHERE CATID>'".mysql_real_escape_string($fromid)."'";
	}
	if($toid > 0)
	{
		$addtosql .= "AND CATID<='".mysql_real_escape_string($toid)."'";
		Stemplate::assign('toid',$toid);
	}
	if($name != "")
	{
		$addtosql .= "AND name like'%".mysql_real_escape_string($name)."%'";
		Stemplate::assign('name',$name);
	}
	if($details != "")
	{
		$addtosql .= "AND example like'%".mysql_real_escape_string($details)."%'";
		Stemplate::assign('details',$details);
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

$queryselected = "select CATID from categories $addtosql $sort $sorthow limit $config[maximum_results]";
$query2 = "select * from categories $addtosql $sort $sorthow limit $pagingstart, $config[items_per_page]";
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
			$pagelinks.="<a href='$adminurl/cat.php?page=1$add1' title='first page'>First</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/cat.php?page=$theprevpage$add1'>Previous</a>&nbsp;";
		};
		$counter=0;
		$lowercount = $currentpage-5;
		if ($lowercount <= 0) $lowercount = 1;
		while ($lowercount < $currentpage)
		{
			$pagelinks.="<a href='$adminurl/cat.php?page=$lowercount$add1'>$lowercount</a>&nbsp;";
			$lowercount++;
			$counter++;
		}
		$pagelinks.=$currentpage."&nbsp;";
		$uppercounter = $currentpage+1;
		while (($uppercounter < $currentpage+10-$counter) && ($uppercounter<=$toppage))
		{
			$pagelinks.="<a href='$adminurl/cat.php?page=$uppercounter$add1'>$uppercounter</a>&nbsp;";
			$uppercounter++;
		}
		if($currentpage < $toppage) 
		{
			$pagelinks.="<a href='$adminurl/cat.php?page=$thenextpage$add1'>Next</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/cat.php?page=$toppage$add1' title='last page'>Last</a>&nbsp;";
		};
	}
}
else
{
	$error = "Sorry, no categories were found.";
}

$mainmenu = "3";
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
STemplate::display("administrator/cat.tpl");
STemplate::display("administrator/global_footer.tpl");
?>