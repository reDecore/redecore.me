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

$iurl = cleanit($_REQUEST['url']);
if($iurl != "")
{	
	$ytpos = strpos($iurl, "http://www.youtube.com/watch?v=");
	$ytposb = strpos($iurl, "http://www.youtu.be/");
	$ytposc = strpos($iurl, "http://youtu.be/");
	if ($ytpos === false)
	{
		if ($ytposb === false)
		{
			if ($ytposc === false)
			{
				$yskip = "1";
				$ypro = "0";
			}
			else
			{
				$ypro = "3";	
			}
		}
		else
		{
			$ypro = "2";	
		}
	}
	else
	{
		$ypro = "1";	
	}	
	if($yskip != "1")
	{
		if($ypro == "1")
		{	
			$position       = strpos($iurl, 'watch?v=')+8;
			$remove_length  = strlen($iurl)-$position;
			$video_id       = substr($iurl, -$remove_length, 11);
		}
		elseif($ypro == "2" || $ypro == "3")
		{	
			$position       = strpos($iurl, 'youtu.be/')+9;
			$remove_length  = strlen($iurl)-$position;
			$video_id       = substr($iurl, -$remove_length, 11);
		}
		$youtube_image = "http://img.youtube.com/vi/".$video_id."/0.jpg";
		$idata = "<li><img id=\"myimage1\" src=\"".$youtube_image."\" /></li>\n";
		$arr = array('success' => true, 'msg' => 'success', 'm1' => $idata, 'm2' => '1', 'm3' => $youtube_image, 'm4' => 'youtube', 'm5' => $video_id);
	}
	else
	{
		$pos = strrpos($iurl,".");
		$ph = strtolower(substr($iurl,$pos+1,strlen($iurl)-$pos));
		$pcount = strlen($ph);
		if($pcount > 4)
		{
			$pas = strpos($iurl, "?");
			$iurl2 = substr($iurl, 0, $pas);
			$pos = strrpos($iurl2,".");
			$ph = strtolower(substr($iurl2,$pos+1,strlen($iurl2)-$pos));
		}
		if($ph == "jpg" || $ph == "jpeg" || $ph == "png" || $ph == "gif")
		{
			$idata = "<li><img id=\"myimage1\" src=\"".$iurl."\" /></li>\n";
			$arr = array('success' => true, 'msg' => 'success', 'm1' => $idata, 'm2' => '1', 'm3' => $iurl, 'm4' => '', 'm5' => '');	
		}
		else
		{
			$html = file_get_contents($iurl);
			$dom = new domDocument;
			@$dom->loadHTML($html);
			$dom->preserveWhiteSpace = false;
			$images = $dom->getElementsByTagName('img');
			$count = 1;
			$idata = "";
			foreach($images as $img)
			{
				$url = $img->getAttribute('src');       
				$alt = $img->getAttribute('alt');  
				if($count == "1")
				{ 
					$idata .= "<li><img id=\"myimage".$count."\" src=\"".$url."\" /></li>\n";
					$fimg = $url;
				}
				else
				{
					$idata .= "<li><img style='display:none;' id=\"myimage".$count."\" src=\"".$url."\" /></li>\n";
				}
				$count++;
			}
			if($count > 1)
			{
				$count--;
				$arr = array('success' => true, 'msg' => 'success', 'm1' => $idata, 'm2' => $count, 'm3' => $fimg, 'm4' => '', 'm5' => '');	
			}
			else
			{
				$arr = array('error' => true, 'msg' => $lang['165']);
			}
		}
	}	
}
else
{
	$arr = array('error' => true, 'msg' => $lang['164']);
}
echo json_encode($arr);	
?>