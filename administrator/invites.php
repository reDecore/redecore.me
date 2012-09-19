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
 
if($_REQUEST['delete']=="1")
{
	$DPID = intval($_REQUEST['DIP']);
	if($DPID > 0)
	{
		$deleteme = $DPID;
		$query = "DELETE FROM invites WHERE ID='".mysql_real_escape_string($deleteme)."'";
		$conn->Execute($query);
		
		$message = "Invitation Request Successfully Deleted.";
		Stemplate::assign('message',$message);
	}
} 
elseif($_REQUEST['go']=="1")
{
	$IID = intval($_REQUEST['DIP']);
	if($IID > 0)
	{
		$query = "select email from invites WHERE ID='".mysql_real_escape_string($IID)."'"; 
		$executequery=$conn->execute($query);
    	$sendto = $executequery->fields['email'];
		if($sendto != "")
		{
			$verifycode = generateCode(5).time();
			$query = "INSERT INTO invites_code SET code='$verifycode'";
			$conn->execute($query);
			if(mysql_affected_rows()>=1)
			{
				$sendername = $config['site_name'];
				$from = $config['site_email'];
				$subject = $lang['475']." ".$sendername;
				$sendmailbody = $lang['476'].",<br><br>";
				$sendmailbody .= $lang['477']."<br>";
				$sendmailbody .= "<a href=".$config['baseurl']."/invite_signup?c=$verifycode>".$config['baseurl']."/invite_signup?c=$verifycode</a><br><br>";
				$sendmailbody .= $lang['69'].",<br>".stripslashes($sendername);
				mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="");
				
				$query = "DELETE FROM invites WHERE ID='".mysql_real_escape_string($IID)."'";
				$conn->Execute($query);
				
				$message = "Invitation Request Successfully Sent.";
				Stemplate::assign('message',$message);
			}			
		}
	}
}

$sortby = "email";
$sort =" order by email";
$add1 = "&sortby=email";

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
$email = htmlentities(strip_tags($_REQUEST['email']), ENT_COMPAT, "UTF-8");
$add1 .= "&email=$email";
if($email!="")
{
	$addtosql .= "WHERE email like'%".mysql_real_escape_string($email)."%'";
	Stemplate::assign('email',$email);
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

$queryselected = "select count(*) as total from invites $addtosql $sort $sorthow limit $config[maximum_results]";
$query2 = "select * from invites $addtosql $sort $sorthow limit $pagingstart, $config[items_per_page]";
$executequeryselected = $conn->Execute($queryselected);
$totalposts = $executequeryselected->fields['total'];	
if ($totalposts > 0)
{
	if($totalposts<=$config[maximum_results])
	{
		$total = $totalposts;
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
			$pagelinks.="<a href='$adminurl/invites.php?page=1$add1' title='first page'>First</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/invites.php?page=$theprevpage$add1'>Previous</a>&nbsp;";
		};
		$counter=0;
		$lowercount = $currentpage-5;
		if ($lowercount <= 0) $lowercount = 1;
		while ($lowercount < $currentpage)
		{
			$pagelinks.="<a href='$adminurl/invites.php?page=$lowercount$add1'>$lowercount</a>&nbsp;";
			$lowercount++;
			$counter++;
		}
		$pagelinks.=$currentpage."&nbsp;";
		$uppercounter = $currentpage+1;
		while (($uppercounter < $currentpage+10-$counter) && ($uppercounter<=$toppage))
		{
			$pagelinks.="<a href='$adminurl/invites.php?page=$uppercounter$add1'>$uppercounter</a>&nbsp;";
			$uppercounter++;
		}
		if($currentpage < $toppage) 
		{
			$pagelinks.="<a href='$adminurl/invites.php?page=$thenextpage$add1'>Next</a>&nbsp;";
			$pagelinks.="<a href='$adminurl/invites.php?page=$toppage$add1' title='last page'>Last</a>&nbsp;";
		};
	}
}
else
{
	$error = "Sorry, no invitiation requests were found.";
}

$mainmenu = "14";
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
STemplate::display("administrator/invites.tpl");
STemplate::display("administrator/global_footer.tpl");
?>