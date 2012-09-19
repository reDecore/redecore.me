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

$q = cleanit($_REQUEST['params']['q']);
STemplate::assign('q',$q);
if($q != "")
{
	$addme = "AND A.source like '%".mysql_real_escape_string($q)."%'";
}
$offset = intval($_REQUEST['offset']);
$query = "select A.PID, A.ptitle, A.pic, A.pkey, A.price, A.youtube, B.USERID, B.username, B.fname, B.lname, B.profilepicture, C.bname from posts A, members B, boards C WHERE A.active='1' AND A.USERID=B.USERID AND A.BID=C.BID $addme order by A.points desc, A.viewcount desc, A.PID desc limit $offset, 10"; 
$results = $conn->execute($query);
$pins = $results->getrows();
STemplate::assign('pins',$pins);
$pcount = count($pins);

$html = STemplate::fetch('more.tpl');

$arr = array('count' => $pcount, 'lastPage' => false, 'html' => $html);

header("Content-Type: application/json");
echo json_encode($arr);

?>