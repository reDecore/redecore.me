<?php

function insert_get_seo_bname($a)
{
        $bname = $a['bname'];
		$bname = str_replace(" ", "-", $bname);
		echo $bname;
}

function insert_return_seo_bname($a)
{
        $bname = $a['bname'];
		$bname = str_replace(" ", "-", $bname);
		return $bname;
}

function seo_bname($a)
{
        $bname = $a;
		$bname = str_replace(" ", "-", $bname);
		return $bname;
}

function get_price($text)
{
	$text = str_replace("  ", " ", $text);
	$words = explode(" ", $text);
	foreach ($words as $item)
	{
		$item = str_replace(",", "", $item);
		$wfirst = substr($item, 0, 1);
		if($wfirst == "\$")
		{
			$item2 = substr($item, 1);
			$theprice = number_format($item2, 2, '.', '');
		}
	}		
	return $theprice;
}

function insert_get_source_domain($a)
{
        $dname = $a['dname'];
		$dname = getHost($dname);
		$dsub = substr($dname, 0, 4);
		if(strtolower($dsub) == "www.")
		{
			$dname = substr($dname, 4);
		}
		return $dname;
}

function get_source_domain($dname)
{
		$dname = getHost($dname);
		$dsub = substr($dname, 0, 4);
		if(strtolower($dsub) == "www.")
		{
			$dname = substr($dname, 4);
		}
		return $dname;
}

function getHost($Address) {
   $parseUrl = parse_url(trim($Address));
   return trim($parseUrl[host] ? $parseUrl[host] : array_shift(explode('/', $parseUrl[path], 2)));
} 

function insert_is_fav($a)
{
    global $config,$conn;
	$PID = $a['PID'];
	$SID = intval(cleanit($_SESSION['USERID']));
	$query = "select count(*) as total from posts_fav where USERID='".mysql_real_escape_string($SID)."' AND PID='".mysql_real_escape_string($PID)."'"; 
	$executequery = $conn->execute($query);
	$totalu = intval($executequery->fields['total']);
	return $totalu;
}

function insert_favcount($a)
{
    global $config,$conn;
	$PID = $a['PID'];
	$query = "select count(*) as total from posts_fav where PID='".mysql_real_escape_string($PID)."'"; 
	$executequery = $conn->execute($query);
	$totalu = intval($executequery->fields['total']);
	return $totalu;
}

function insert_repincount($a)
{
    global $config,$conn;
	$PID = $a['PID'];
	$query = "select count(*) as total from posts where REPID='".mysql_real_escape_string($PID)."' and active='1'"; 
	$executequery = $conn->execute($query);
	$totalu = intval($executequery->fields['total']);
	return $totalu;
}

function insert_is_folm($a)
{
    global $config,$conn;
	$USERID = $a['USERID'];
	$SID = intval(cleanit($_SESSION['USERID']));
	$query = "select count(*) as total from followm where USERID='".mysql_real_escape_string($SID)."' AND ISFOL='".mysql_real_escape_string($USERID)."'"; 
	$executequery = $conn->execute($query);
	$totalu = intval($executequery->fields['total']);
	return $totalu;
}

function insert_is_folb($a)
{
    global $config,$conn;
	$BID = $a['BID'];
	$SID = intval(cleanit($_SESSION['USERID']));
	$query = "select count(*) as total from followb where USERID='".mysql_real_escape_string($SID)."' AND ISFOLBID='".mysql_real_escape_string($BID)."'"; 
	$executequery = $conn->execute($query);
	$totalu = intval($executequery->fields['total']);
	return $totalu;
}

function escape($data)
{
    if (ini_get('magic_quotes_gpc'))
	{
    	$data = stripslashes($data);
    }
    return mysql_real_escape_string($data);
}

function insert_get_categories($a)
{
    global $config,$conn;
	$query = "select CATID,name,seo from categories order by name asc"; 
	$results = $conn->execute($query);
	$returnthis = $results->getrows();
	return $returnthis;
}

function insert_get_flname($a)
{
    global $config,$conn;
	$query = "select fname,lname from members WHERE USERID='".mysql_real_escape_string($_SESSION['USERID'])."' limit 1"; 
	$results = $conn->execute($query);
	$returnthis = $results->getrows();
	return $returnthis;
}

function insert_get_boards($a)
{
    global $config,$conn;
	$query = "select BID,bname from boards WHERE USERID='".mysql_real_escape_string($_SESSION['USERID'])."' order by bname asc"; 
	$results = $conn->execute($query);
	$returnthis = $results->getrows();
	return $returnthis;
}

function insert_get_comments($a)
{
    global $config,$conn;
	$query = "select A.username, A.fname, A.lname, A.profilepicture, B.COMID, B.comment from members A, comments B WHERE B.PID='".mysql_real_escape_string($a['PID'])."' AND A.USERID=B.USERID order by B.COMID desc limit 5"; 
	$results = $conn->execute($query);
	$returnthis = $results->getrows();
	return $returnthis;
}

function insert_get_total_comments($a)
{
    global $config,$conn;
	$query = "select count(*) as total from members A, comments B WHERE B.PID='".mysql_real_escape_string($a['PID'])."' AND A.USERID=B.USERID"; 
	$executequery=$conn->execute($query);
    $tt = $executequery->fields['total'];
	return $tt;
}

function insert_board_pics($a)
{
    global $config,$conn;
	$query = "select pic from posts WHERE active='1' AND BID='".mysql_real_escape_string($a['BID'])."' order by rand() limit 9"; 
	$results = $conn->execute($query);
	$returnthis = $results->getrows();
	return $returnthis;
}

function insert_board_pics2($a)
{
    global $config,$conn;
	$query = "select pic from posts WHERE active='1' AND BID='".mysql_real_escape_string($a['BID'])."' order by rand() limit 10"; 
	$results = $conn->execute($query);
	$returnthis = $results->getrows();
	return $returnthis;
}

function insert_board_pics_count($a)
{
    global $config,$conn;
	$query = "select count(*) as total from posts WHERE active='1' AND BID='".mysql_real_escape_string($a['BID'])."'"; 
	$executequery=$conn->execute($query);
    $tt = $executequery->fields['total'];	
	return intval($tt);
}

function insert_get_advertisement($var)
{
        global $conn;
        $query="SELECT code FROM advertisements WHERE AID='".mysql_real_escape_string($var[AID])."' AND active='1' limit 1";
        $executequery=$conn->execute($query);
        $getad = $executequery->fields[code];
		echo strip_mq_gpc($getad);
}

function insert_get_advertisement2($var)
{
        global $conn;
        $query="SELECT code FROM advertisements WHERE AID='".mysql_real_escape_string($var[AID])."' AND active='1' limit 1";
        $executequery=$conn->execute($query);
        $getad = $executequery->fields[code];
		return strip_mq_gpc($getad);
}

function verify_login_admin()
{
        global $config,$conn;
        if($_SESSION['ADMINID'] != "" && is_numeric($_SESSION['ADMINID']) && $_SESSION['ADMINUSERNAME'] != "" && $_SESSION['ADMINPASSWORD'] != "")
        {
			$query="SELECT * FROM administrators WHERE username='".mysql_real_escape_string($_SESSION['ADMINUSERNAME'])."' AND password='".mysql_real_escape_string($_SESSION['ADMINPASSWORD'])."' AND ADMINID='".mysql_real_escape_string($_SESSION['ADMINID'])."'";
        	$executequery=$conn->execute($query);
			
			if(mysql_affected_rows()==1)
			{
			
			}
			else
			{
				header("location:$config[adminurl]/index.php");
            	exit;
			}
			
        }
		else
		{
			header("location:$config[adminurl]/index.php");
            exit;
		}
}

function verify_email_username($usernametocheck)
{
    global $config,$conn;
	$query = "select count(*) as total from members where username='".mysql_real_escape_string($usernametocheck)."' limit 1"; 
	$executequery = $conn->execute($query);
	$totalu = $executequery->fields[total];
	if ($totalu >= 1)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function verify_valid_email($emailtocheck)
{	
	if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $emailtocheck))
	{
		return false;
	}
	else
	{
		return true;
	}

}

function verify_email_unique($emailtocheck)
{
    global $config,$conn;
	$query = "select count(*) as total from members where email='".mysql_real_escape_string($emailtocheck)."' limit 1"; 
	$executequery = $conn->execute($query);
	$totalemails = $executequery->fields[total];
	if ($totalemails >= 1)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function mailme($sendto,$sendername,$from,$subject,$sendmailbody,$bcc="")
{
	global $SERVER_NAME;
	$subject = nl2br($subject);
	$sendmailbody = nl2br($sendmailbody);
	$sendto = $sendto;
	if($bcc!="")
	{
		$headers = "Bcc: ".$bcc."\n";
	}
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=utf-8 \n";
	$headers .= "X-Priority: 3\n";
	$headers .= "X-MSMail-Priority: Normal\n";
	$headers .= "X-Mailer: PHP/"."MIME-Version: 1.0\n";
	$headers .= "From: " . $from . "\n";
	$headers .= "Content-Type: text/html\n";
	mail("$sendto","$subject","$sendmailbody","$headers");
}

function insert_get_member_profilepicture($var)
{
		$results = $var['profilepicture'];
		if ($results == "")
		{
			return "noprofilepicture.gif";
		}
		else
		{
			return $results;
		}
}

function insert_get_member_profilepicture2($var)
{
        global $conn;
        $query="SELECT profilepicture FROM members WHERE USERID='".mysql_real_escape_string($var[USERID])."' limit 1";
        $executequery=$conn->execute($query);
		$results = $executequery->fields['profilepicture'];
		if ($results == "")
			return "noprofilepicture.gif";
		else
			return $results;
}

function update_last_viewed($a)
{
        global $conn;
		$query = "UPDATE posts SET last_viewed='".time()."' WHERE PID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_your_viewed ($a)
{
        global $conn;
		$query = "UPDATE members SET yourviewed  = yourviewed  + 1 WHERE USERID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_you_viewed($a)
{
        global $conn;
		$query = "UPDATE members SET youviewed = youviewed + 1 WHERE USERID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function session_verification()
{
    if ($_SESSION[USERID] != "")
	{
		if (is_numeric($_SESSION[USERID]))
		{
        	return true;
		}
    }
	else
		return false;
}

function update_viewcount_profile($a)
{
        global $conn;
		$query = "UPDATE members SET profileviews = profileviews + 1 WHERE USERID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_viewcount($a)
{
        global $conn, $config;
		$points_view = intval($config['points_view']);
		$query = "UPDATE posts SET viewcount=viewcount+1, points=points+$points_view WHERE PID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_compoints($a)
{
        global $conn, $config;
		$points_com = intval($config['points_com']);
		$query = "UPDATE posts SET points=points+$points_com WHERE PID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_likepointsadd($a)
{
        global $conn, $config;
		$points_like = intval($config['points_like']);
		$query = "UPDATE posts SET points=points+$points_like WHERE PID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_likepointsrem($a)
{
        global $conn, $config;
		$points_like = intval($config['points_like']);
		$query = "UPDATE posts SET points=points-$points_like WHERE PID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function update_repinpoints($a)
{
        global $conn, $config;
		$points_repin = intval($config['points_repin']);
		$query = "UPDATE posts SET points=points+$points_repin WHERE PID='".mysql_real_escape_string($a)."'";
        $executequery=$conn->execute($query);
}

function delete_board($did)
{
    global $config,$conn;
	$SID = intval($_SESSION['USERID']);	
	if(intval($did) > 0)
	{
		$queryd = "select BID from boards where USERID='".mysql_real_escape_string($SID)."' AND BID='".mysql_real_escape_string($did)."'"; 
		$executequeryd = $conn->execute($queryd);
		$DBID = intval($executequeryd->fields['BID']);	
		if($DBID > 0)
		{
			$queryd = "select PID from posts where USERID='".mysql_real_escape_string($SID)."' AND BID='".mysql_real_escape_string($DBID)."'";
			$resultsd = $conn->execute($queryd);
			$dpins = $resultsd->getrows();
			foreach ($dpins as &$value) 
			{
				$DPID = $value['PID'];
				delete_pic($DPID);
			}
			$query = "DELETE FROM boards WHERE USERID='".mysql_real_escape_string($SID)."' AND BID='".mysql_real_escape_string($did)."'";
			$conn->Execute($query);	
			$query = "DELETE FROM activity WHERE atype='folb' AND FOLB='".mysql_real_escape_string($did)."'";
			$conn->Execute($query);	
		}
	}
}

function delete_pic($DPID)
{
    global $config,$conn;
	$SID = intval($_SESSION['USERID']);	
	$queryd = "select PID, BID, REPID, pic from posts where USERID='".mysql_real_escape_string($SID)."' AND PID='".mysql_real_escape_string($DPID)."'"; 
	$executequeryd = $conn->execute($queryd);
	$DPID = intval($executequeryd->fields['PID']);	
	$DBID = intval($executequeryd->fields['BID']);
	$REPID = intval($executequeryd->fields['REPID']);
	$pic = $executequeryd->fields['pic'];
	if($DPID > 0)
	{
		$query = "DELETE FROM activity WHERE PID='".mysql_real_escape_string($DPID)."'";
		$conn->Execute($query);	
		if($DBID > 0)
		{
			$query = "UPDATE boards SET pincount=pincount-1 WHERE pincount>'0' AND BID='".mysql_real_escape_string($DBID)."'";
			$conn->Execute($query);	
		}
		$query = "DELETE FROM comments WHERE PID='".mysql_real_escape_string($DPID)."'";
		$conn->Execute($query);	
		$query = "DELETE FROM posts_fav WHERE PID='".mysql_real_escape_string($DPID)."'";
		$conn->Execute($query);	
		$query = "DELETE FROM posts_reports WHERE PID='".mysql_real_escape_string($DPID)."'";
		$conn->Execute($query);	
		if($REPID > 0)
		{
			$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($DPID)."'";
			$conn->Execute($query);	
		}
		else
		{
			$query = "select count(*) as total from posts WHERE (REPID='".mysql_real_escape_string($DPID)."' OR OID='".mysql_real_escape_string($DPID)."')"; 
			$executequery=$conn->execute($query);
    		$tt = $executequery->fields['total'];
			if($tt == "0")
			{
				delete_pic_images($pic);	
				$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($DPID)."'";
				$conn->Execute($query);	
			}
			else
			{
				$query = "INSERT INTO posts_delete SET PID='".mysql_real_escape_string($DPID)."', pic='".mysql_real_escape_string($pic)."'";
				$conn->Execute($query);	
				$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($DPID)."'";
				$conn->Execute($query);
				$query = "UPDATE posts SET OID='0',OUSERID='0',REPIN='0',REPID='0' WHERE (REPID='".mysql_real_escape_string($DPID)."' OR OID='".mysql_real_escape_string($DPID)."')";
				$conn->Execute($query);	
			}
		}
	}
}

function delete_pic_images($thepp)
{
	global $config, $conn;
	if($thepp != "")
	{		
		$dp1 = $config['pdir']."/t/l-".$thepp;
		@chmod($dp1, 0777);
		if (file_exists($dp1))
		{
			@unlink($dp1);
		}
		$dp1 = $config['pdir']."/t/".$thepp;
		@chmod($dp1, 0777);
		if (file_exists($dp1))
		{
			@unlink($dp1);
		}
		$dp1 = $config['pdir']."/t/s-".$thepp;
		@chmod($dp1, 0777);
		if (file_exists($dp1))
		{
			@unlink($dp1);
		}
		$dp1 = $config['pdir']."/t/t-".$thepp;
		@chmod($dp1, 0777);
		if (file_exists($dp1))
		{
			@unlink($dp1);
		}
	}
}

function insert_get_static($var)
{
        global $conn;
        $query="SELECT value FROM static WHERE ID='".mysql_real_escape_string($var['ID'])."'";
        $executequery=$conn->execute($query);
        $returnme = $executequery->fields['value'];
		return $returnme;
}

function cleanit($text)
{
	return htmlentities(strip_tags(stripslashes($text)), ENT_COMPAT, "UTF-8");
}

function insert_seo_clean_titles($a)
{
	$title2 = explode(" ", $a['title']);
	$i = 0;
	foreach($title2 as $line)
	{
		if($i < 15)
		{
			$title .= $line."-";
			$i++;
		}
	}
    $title = str_replace(array(":", ".", "^", "*", ",", ";", "~", "[", "]", "<", ">", "\\", "/", "=", "+", "%"),"", $title);
	$last = substr($title, -1);
	if($last == "-")
	{
		$title = substr($title, 0, -1);
	}
	$title = str_replace(" ", "-", $title);
	return $title;
}

function seo_clean_titles($a)
{
	$title2 = explode(" ", $a);
	$i = 0;
	foreach($title2 as $line)
	{
		if($i < 15)
		{
			$title .= $line."-";
			$i++;
		}
	}
    $title = str_replace(array(":", ".", "^", "*", ",", ";", "~", "[", "]", "<", ">", "\\", "/", "=", "+", "%"),"", $title);
	$last = substr($title, -1);
	if($last == "-")
	{
		$title = substr($title, 0, -1);
	}
	$title = str_replace(" ", "-", $title);
	return $title;
}

function insert_get_time_to_days_ago($a)
{
	global $lang;
	$currenttime = time();
	$timediff = $currenttime - $a[time];
	$oneday = 60 * 60 * 24;
	$dayspassed = floor($timediff/$oneday);
	if ($dayspassed == "0")
	{
		$mins = floor($timediff/60);
		if($mins == "0")
		{
			$secs = floor($timediff);
			if($secs == "1")
			{
				return $lang['112'];
			}
			else
			{
				return $secs." ".$lang['113'];
			}
		}
		elseif($mins == "1")
		{
			return $lang['114'];
		}
		elseif($mins < "60")
		{
			return $mins." ".$lang['115'];
		}
		elseif($mins == "60")
		{
			return $lang['116'];
		}
		else
		{
			$hours = floor($mins/60);
			return "$hours ".$lang['117'];
		}
	}
	else
	{
		if ($dayspassed > "30")
		{
			return date("F j, Y",$a[time]);
		}
		else
		{
			if($dayspassed == "1")
			{
				return "$dayspassed ".$lang['119'];
			}
			else
			{
				return "$dayspassed ".$lang['118'];
			}
		}
	}
}

function follow_redirect($url)
{
   $redirect_url = null;
   if(function_exists("curl_init"))
   {
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HEADER, true);
      curl_setopt($ch, CURLOPT_NOBODY, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      curl_close($ch);
   }
   else
   {
      $url_parts = parse_url($url);
      $sock = fsockopen($url_parts['host'], (isset($url_parts['port']) ? (int)$url_parts['port'] : 80));
      $request = "HEAD " . $url_parts['path'] . (isset($url_parts['query']) ? '?'.$url_parts['query'] : '') . " HTTP/1.1\r\n";
      $request .= 'Host: ' . $url_parts['host'] . "\r\n";
      $request .= "Connection: Close\r\n\r\n";
      fwrite($sock, $request);
      $response = fread($sock, 2048);
      fclose($sock);
   }
   $header = "Location: ";
   $pos = strpos($response, $header);
   if($pos === false)
   {
      return false;
   }
   else
   {
      $pos += strlen($header);
      $redirect_url = substr($response, $pos, strpos($response, "\r\n", $pos)-$pos);
      return $redirect_url;
   }
}

function insert_get_google_url($a)
{
    global $conn, $config;
	$skey = stripslashes($a['key']);
	$sshort = stripslashes($a['short']);
	$gee_url = $config['baseurl']."/pin/".$skey;
	if($skey != "")
	{
		if($sshort == "")
		{
			$takenurl =  @file_get_contents("http://www.taken.to/geeurl.php?url=".$gee_url);
			if($takenurl != "")
			{
				$sshort = str_replace("http://www.taken.to/", "", $takenurl);
				if($sshort != "")
				{
					$query = "UPDATE posts SET short='".mysql_real_escape_string($sshort)."' WHERE pkey='".mysql_real_escape_string($skey)."'";
					$conn->execute($query);
					$rme = 	"http://www.taken.to/".$sshort;
				}
				else
				{
					$rme = 	$gee_url;	
				}
			}
			else
			{
				$rme = 	$gee_url;
			}
			
		}
		else
		{
			$rme = 	"http://www.taken.to/".$sshort;
		}
	}
	else
	{
		$rme = 	$gee_url;
	}
	return $rme;
}

function insert_country_code_to_country($a)
{
	$code = $a['code'];
    $country = '';
    if( $code == 'AF' ) $country = 'Afghanistan';
    if( $code == 'AX' ) $country = 'Aland Islands';
    if( $code == 'AL' ) $country = 'Albania';
    if( $code == 'DZ' ) $country = 'Algeria';
    if( $code == 'AS' ) $country = 'American Samoa';
    if( $code == 'AD' ) $country = 'Andorra';
    if( $code == 'AO' ) $country = 'Angola';
    if( $code == 'AI' ) $country = 'Anguilla';
    if( $code == 'AQ' ) $country = 'Antarctica';
    if( $code == 'AG' ) $country = 'Antigua and Barbuda';
    if( $code == 'AR' ) $country = 'Argentina';
    if( $code == 'AM' ) $country = 'Armenia';
    if( $code == 'AW' ) $country = 'Aruba';
    if( $code == 'AU' ) $country = 'Australia';
    if( $code == 'AT' ) $country = 'Austria';
    if( $code == 'AZ' ) $country = 'Azerbaijan';
    if( $code == 'BS' ) $country = 'Bahamas the';
    if( $code == 'BH' ) $country = 'Bahrain';
    if( $code == 'BD' ) $country = 'Bangladesh';
    if( $code == 'BB' ) $country = 'Barbados';
    if( $code == 'BY' ) $country = 'Belarus';
    if( $code == 'BE' ) $country = 'Belgium';
    if( $code == 'BZ' ) $country = 'Belize';
    if( $code == 'BJ' ) $country = 'Benin';
    if( $code == 'BM' ) $country = 'Bermuda';
    if( $code == 'BT' ) $country = 'Bhutan';
    if( $code == 'BO' ) $country = 'Bolivia';
    if( $code == 'BA' ) $country = 'Bosnia and Herzegovina';
    if( $code == 'BW' ) $country = 'Botswana';
    if( $code == 'BV' ) $country = 'Bouvet Island (Bouvetoya)';
    if( $code == 'BR' ) $country = 'Brazil';
    if( $code == 'IO' ) $country = 'British Indian Ocean Territory (Chagos Archipelago)';
    if( $code == 'VG' ) $country = 'British Virgin Islands';
    if( $code == 'BN' ) $country = 'Brunei Darussalam';
    if( $code == 'BG' ) $country = 'Bulgaria';
    if( $code == 'BF' ) $country = 'Burkina Faso';
    if( $code == 'BI' ) $country = 'Burundi';
    if( $code == 'KH' ) $country = 'Cambodia';
    if( $code == 'CM' ) $country = 'Cameroon';
    if( $code == 'CA' ) $country = 'Canada';
    if( $code == 'CV' ) $country = 'Cape Verde';
    if( $code == 'KY' ) $country = 'Cayman Islands';
    if( $code == 'CF' ) $country = 'Central African Republic';
    if( $code == 'TD' ) $country = 'Chad';
    if( $code == 'CL' ) $country = 'Chile';
    if( $code == 'CN' ) $country = 'China';
    if( $code == 'CX' ) $country = 'Christmas Island';
    if( $code == 'CC' ) $country = 'Cocos (Keeling) Islands';
    if( $code == 'CO' ) $country = 'Colombia';
    if( $code == 'KM' ) $country = 'Comoros the';
    if( $code == 'CD' ) $country = 'Congo';
    if( $code == 'CG' ) $country = 'Congo the';
    if( $code == 'CK' ) $country = 'Cook Islands';
    if( $code == 'CR' ) $country = 'Costa Rica';
    if( $code == 'CI' ) $country = 'Cote d\'Ivoire';
    if( $code == 'HR' ) $country = 'Croatia';
    if( $code == 'CU' ) $country = 'Cuba';
    if( $code == 'CY' ) $country = 'Cyprus';
    if( $code == 'CZ' ) $country = 'Czech Republic';
    if( $code == 'DK' ) $country = 'Denmark';
    if( $code == 'DJ' ) $country = 'Djibouti';
    if( $code == 'DM' ) $country = 'Dominica';
    if( $code == 'DO' ) $country = 'Dominican Republic';
    if( $code == 'EC' ) $country = 'Ecuador';
    if( $code == 'EG' ) $country = 'Egypt';
    if( $code == 'SV' ) $country = 'El Salvador';
    if( $code == 'GQ' ) $country = 'Equatorial Guinea';
    if( $code == 'ER' ) $country = 'Eritrea';
    if( $code == 'EE' ) $country = 'Estonia';
    if( $code == 'ET' ) $country = 'Ethiopia';
    if( $code == 'FO' ) $country = 'Faroe Islands';
    if( $code == 'FK' ) $country = 'Falkland Islands (Malvinas)';
    if( $code == 'FJ' ) $country = 'Fiji the Fiji Islands';
    if( $code == 'FI' ) $country = 'Finland';
    if( $code == 'FR' ) $country = 'France, French Republic';
    if( $code == 'GF' ) $country = 'French Guiana';
    if( $code == 'PF' ) $country = 'French Polynesia';
    if( $code == 'TF' ) $country = 'French Southern Territories';
    if( $code == 'GA' ) $country = 'Gabon';
    if( $code == 'GM' ) $country = 'Gambia the';
    if( $code == 'GE' ) $country = 'Georgia';
    if( $code == 'DE' ) $country = 'Germany';
    if( $code == 'GH' ) $country = 'Ghana';
    if( $code == 'GI' ) $country = 'Gibraltar';
    if( $code == 'GR' ) $country = 'Greece';
    if( $code == 'GL' ) $country = 'Greenland';
    if( $code == 'GD' ) $country = 'Grenada';
    if( $code == 'GP' ) $country = 'Guadeloupe';
    if( $code == 'GU' ) $country = 'Guam';
    if( $code == 'GT' ) $country = 'Guatemala';
    if( $code == 'GG' ) $country = 'Guernsey';
    if( $code == 'GN' ) $country = 'Guinea';
    if( $code == 'GW' ) $country = 'Guinea-Bissau';
    if( $code == 'GY' ) $country = 'Guyana';
    if( $code == 'HT' ) $country = 'Haiti';
    if( $code == 'HM' ) $country = 'Heard Island and McDonald Islands';
    if( $code == 'VA' ) $country = 'Holy See (Vatican City State)';
    if( $code == 'HN' ) $country = 'Honduras';
    if( $code == 'HK' ) $country = 'Hong Kong';
    if( $code == 'HU' ) $country = 'Hungary';
    if( $code == 'IS' ) $country = 'Iceland';
    if( $code == 'IN' ) $country = 'India';
    if( $code == 'ID' ) $country = 'Indonesia';
    if( $code == 'IR' ) $country = 'Iran';
    if( $code == 'IQ' ) $country = 'Iraq';
    if( $code == 'IE' ) $country = 'Ireland';
    if( $code == 'IM' ) $country = 'Isle of Man';
    if( $code == 'IL' ) $country = 'Israel';
    if( $code == 'IT' ) $country = 'Italy';
    if( $code == 'JM' ) $country = 'Jamaica';
    if( $code == 'JP' ) $country = 'Japan';
    if( $code == 'JE' ) $country = 'Jersey';
    if( $code == 'JO' ) $country = 'Jordan';
    if( $code == 'KZ' ) $country = 'Kazakhstan';
    if( $code == 'KE' ) $country = 'Kenya';
    if( $code == 'KI' ) $country = 'Kiribati';
    if( $code == 'KP' ) $country = 'Korea';
    if( $code == 'KR' ) $country = 'Korea';
    if( $code == 'KW' ) $country = 'Kuwait';
    if( $code == 'KG' ) $country = 'Kyrgyz Republic';
    if( $code == 'LA' ) $country = 'Lao';
    if( $code == 'LV' ) $country = 'Latvia';
    if( $code == 'LB' ) $country = 'Lebanon';
    if( $code == 'LS' ) $country = 'Lesotho';
    if( $code == 'LR' ) $country = 'Liberia';
    if( $code == 'LY' ) $country = 'Libyan Arab Jamahiriya';
    if( $code == 'LI' ) $country = 'Liechtenstein';
    if( $code == 'LT' ) $country = 'Lithuania';
    if( $code == 'LU' ) $country = 'Luxembourg';
    if( $code == 'MO' ) $country = 'Macao';
    if( $code == 'MK' ) $country = 'Macedonia';
    if( $code == 'MG' ) $country = 'Madagascar';
    if( $code == 'MW' ) $country = 'Malawi';
    if( $code == 'MY' ) $country = 'Malaysia';
    if( $code == 'MV' ) $country = 'Maldives';
    if( $code == 'ML' ) $country = 'Mali';
    if( $code == 'MT' ) $country = 'Malta';
    if( $code == 'MH' ) $country = 'Marshall Islands';
    if( $code == 'MQ' ) $country = 'Martinique';
    if( $code == 'MR' ) $country = 'Mauritania';
    if( $code == 'MU' ) $country = 'Mauritius';
    if( $code == 'YT' ) $country = 'Mayotte';
    if( $code == 'MX' ) $country = 'Mexico';
    if( $code == 'FM' ) $country = 'Micronesia';
    if( $code == 'MD' ) $country = 'Moldova';
    if( $code == 'MC' ) $country = 'Monaco';
    if( $code == 'MN' ) $country = 'Mongolia';
    if( $code == 'ME' ) $country = 'Montenegro';
    if( $code == 'MS' ) $country = 'Montserrat';
    if( $code == 'MA' ) $country = 'Morocco';
    if( $code == 'MZ' ) $country = 'Mozambique';
    if( $code == 'MM' ) $country = 'Myanmar';
    if( $code == 'NA' ) $country = 'Namibia';
    if( $code == 'NR' ) $country = 'Nauru';
    if( $code == 'NP' ) $country = 'Nepal';
    if( $code == 'AN' ) $country = 'Netherlands Antilles';
    if( $code == 'NL' ) $country = 'Netherlands the';
    if( $code == 'NC' ) $country = 'New Caledonia';
    if( $code == 'NZ' ) $country = 'New Zealand';
    if( $code == 'NI' ) $country = 'Nicaragua';
    if( $code == 'NE' ) $country = 'Niger';
    if( $code == 'NG' ) $country = 'Nigeria';
    if( $code == 'NU' ) $country = 'Niue';
    if( $code == 'NF' ) $country = 'Norfolk Island';
    if( $code == 'MP' ) $country = 'Northern Mariana Islands';
    if( $code == 'NO' ) $country = 'Norway';
    if( $code == 'OM' ) $country = 'Oman';
    if( $code == 'PK' ) $country = 'Pakistan';
    if( $code == 'PW' ) $country = 'Palau';
    if( $code == 'PS' ) $country = 'Palestinian Territory';
    if( $code == 'PA' ) $country = 'Panama';
    if( $code == 'PG' ) $country = 'Papua New Guinea';
    if( $code == 'PY' ) $country = 'Paraguay';
    if( $code == 'PE' ) $country = 'Peru';
    if( $code == 'PH' ) $country = 'Philippines';
    if( $code == 'PN' ) $country = 'Pitcairn Islands';
    if( $code == 'PL' ) $country = 'Poland';
    if( $code == 'PT' ) $country = 'Portugal, Portuguese Republic';
    if( $code == 'PR' ) $country = 'Puerto Rico';
    if( $code == 'QA' ) $country = 'Qatar';
    if( $code == 'RE' ) $country = 'Reunion';
    if( $code == 'RO' ) $country = 'Romania';
    if( $code == 'RU' ) $country = 'Russian Federation';
    if( $code == 'RW' ) $country = 'Rwanda';
    if( $code == 'BL' ) $country = 'Saint Barthelemy';
    if( $code == 'SH' ) $country = 'Saint Helena';
    if( $code == 'KN' ) $country = 'Saint Kitts and Nevis';
    if( $code == 'LC' ) $country = 'Saint Lucia';
    if( $code == 'MF' ) $country = 'Saint Martin';
    if( $code == 'PM' ) $country = 'Saint Pierre and Miquelon';
    if( $code == 'VC' ) $country = 'Saint Vincent and the Grenadines';
    if( $code == 'WS' ) $country = 'Samoa';
    if( $code == 'SM' ) $country = 'San Marino';
    if( $code == 'ST' ) $country = 'Sao Tome and Principe';
    if( $code == 'SA' ) $country = 'Saudi Arabia';
    if( $code == 'SN' ) $country = 'Senegal';
    if( $code == 'RS' ) $country = 'Serbia';
    if( $code == 'SC' ) $country = 'Seychelles';
    if( $code == 'SL' ) $country = 'Sierra Leone';
    if( $code == 'SG' ) $country = 'Singapore';
    if( $code == 'SK' ) $country = 'Slovakia (Slovak Republic)';
    if( $code == 'SI' ) $country = 'Slovenia';
    if( $code == 'SB' ) $country = 'Solomon Islands';
    if( $code == 'SO' ) $country = 'Somalia, Somali Republic';
    if( $code == 'ZA' ) $country = 'South Africa';
    if( $code == 'GS' ) $country = 'South Georgia and the South Sandwich Islands';
    if( $code == 'ES' ) $country = 'Spain';
    if( $code == 'LK' ) $country = 'Sri Lanka';
    if( $code == 'SD' ) $country = 'Sudan';
    if( $code == 'SR' ) $country = 'Suriname';
    if( $code == 'SJ' ) $country = 'Svalbard & Jan Mayen Islands';
    if( $code == 'SZ' ) $country = 'Swaziland';
    if( $code == 'SE' ) $country = 'Sweden';
    if( $code == 'CH' ) $country = 'Switzerland, Swiss Confederation';
    if( $code == 'SY' ) $country = 'Syrian Arab Republic';
    if( $code == 'TW' ) $country = 'Taiwan';
    if( $code == 'TJ' ) $country = 'Tajikistan';
    if( $code == 'TZ' ) $country = 'Tanzania';
    if( $code == 'TH' ) $country = 'Thailand';
    if( $code == 'TL' ) $country = 'Timor-Leste';
    if( $code == 'TG' ) $country = 'Togo';
    if( $code == 'TK' ) $country = 'Tokelau';
    if( $code == 'TO' ) $country = 'Tonga';
    if( $code == 'TT' ) $country = 'Trinidad and Tobago';
    if( $code == 'TN' ) $country = 'Tunisia';
    if( $code == 'TR' ) $country = 'Turkey';
    if( $code == 'TM' ) $country = 'Turkmenistan';
    if( $code == 'TC' ) $country = 'Turks and Caicos Islands';
    if( $code == 'TV' ) $country = 'Tuvalu';
    if( $code == 'UG' ) $country = 'Uganda';
    if( $code == 'UA' ) $country = 'Ukraine';
    if( $code == 'AE' ) $country = 'United Arab Emirates';
    if( $code == 'GB' ) $country = 'United Kingdom';
    if( $code == 'US' ) $country = 'United States of America';
    if( $code == 'UM' ) $country = 'United States Minor Outlying Islands';
    if( $code == 'VI' ) $country = 'United States Virgin Islands';
    if( $code == 'UY' ) $country = 'Uruguay, Eastern Republic of';
    if( $code == 'UZ' ) $country = 'Uzbekistan';
    if( $code == 'VU' ) $country = 'Vanuatu';
    if( $code == 'VE' ) $country = 'Venezuela';
    if( $code == 'VN' ) $country = 'Vietnam';
    if( $code == 'WF' ) $country = 'Wallis and Futuna';
    if( $code == 'EH' ) $country = 'Western Sahara';
    if( $code == 'YE' ) $country = 'Yemen';
    if( $code == 'ZM' ) $country = 'Zambia';
    if( $code == 'ZW' ) $country = 'Zimbabwe';
    if( $country == '') $country = $code;
    return $country;
}

function country_code_to_country($code)
{
    $country = '';
    if( $code == 'AF' ) $country = 'Afghanistan';
    if( $code == 'AX' ) $country = 'Aland Islands';
    if( $code == 'AL' ) $country = 'Albania';
    if( $code == 'DZ' ) $country = 'Algeria';
    if( $code == 'AS' ) $country = 'American Samoa';
    if( $code == 'AD' ) $country = 'Andorra';
    if( $code == 'AO' ) $country = 'Angola';
    if( $code == 'AI' ) $country = 'Anguilla';
    if( $code == 'AQ' ) $country = 'Antarctica';
    if( $code == 'AG' ) $country = 'Antigua and Barbuda';
    if( $code == 'AR' ) $country = 'Argentina';
    if( $code == 'AM' ) $country = 'Armenia';
    if( $code == 'AW' ) $country = 'Aruba';
    if( $code == 'AU' ) $country = 'Australia';
    if( $code == 'AT' ) $country = 'Austria';
    if( $code == 'AZ' ) $country = 'Azerbaijan';
    if( $code == 'BS' ) $country = 'Bahamas the';
    if( $code == 'BH' ) $country = 'Bahrain';
    if( $code == 'BD' ) $country = 'Bangladesh';
    if( $code == 'BB' ) $country = 'Barbados';
    if( $code == 'BY' ) $country = 'Belarus';
    if( $code == 'BE' ) $country = 'Belgium';
    if( $code == 'BZ' ) $country = 'Belize';
    if( $code == 'BJ' ) $country = 'Benin';
    if( $code == 'BM' ) $country = 'Bermuda';
    if( $code == 'BT' ) $country = 'Bhutan';
    if( $code == 'BO' ) $country = 'Bolivia';
    if( $code == 'BA' ) $country = 'Bosnia and Herzegovina';
    if( $code == 'BW' ) $country = 'Botswana';
    if( $code == 'BV' ) $country = 'Bouvet Island (Bouvetoya)';
    if( $code == 'BR' ) $country = 'Brazil';
    if( $code == 'IO' ) $country = 'British Indian Ocean Territory (Chagos Archipelago)';
    if( $code == 'VG' ) $country = 'British Virgin Islands';
    if( $code == 'BN' ) $country = 'Brunei Darussalam';
    if( $code == 'BG' ) $country = 'Bulgaria';
    if( $code == 'BF' ) $country = 'Burkina Faso';
    if( $code == 'BI' ) $country = 'Burundi';
    if( $code == 'KH' ) $country = 'Cambodia';
    if( $code == 'CM' ) $country = 'Cameroon';
    if( $code == 'CA' ) $country = 'Canada';
    if( $code == 'CV' ) $country = 'Cape Verde';
    if( $code == 'KY' ) $country = 'Cayman Islands';
    if( $code == 'CF' ) $country = 'Central African Republic';
    if( $code == 'TD' ) $country = 'Chad';
    if( $code == 'CL' ) $country = 'Chile';
    if( $code == 'CN' ) $country = 'China';
    if( $code == 'CX' ) $country = 'Christmas Island';
    if( $code == 'CC' ) $country = 'Cocos (Keeling) Islands';
    if( $code == 'CO' ) $country = 'Colombia';
    if( $code == 'KM' ) $country = 'Comoros the';
    if( $code == 'CD' ) $country = 'Congo';
    if( $code == 'CG' ) $country = 'Congo the';
    if( $code == 'CK' ) $country = 'Cook Islands';
    if( $code == 'CR' ) $country = 'Costa Rica';
    if( $code == 'CI' ) $country = 'Cote d\'Ivoire';
    if( $code == 'HR' ) $country = 'Croatia';
    if( $code == 'CU' ) $country = 'Cuba';
    if( $code == 'CY' ) $country = 'Cyprus';
    if( $code == 'CZ' ) $country = 'Czech Republic';
    if( $code == 'DK' ) $country = 'Denmark';
    if( $code == 'DJ' ) $country = 'Djibouti';
    if( $code == 'DM' ) $country = 'Dominica';
    if( $code == 'DO' ) $country = 'Dominican Republic';
    if( $code == 'EC' ) $country = 'Ecuador';
    if( $code == 'EG' ) $country = 'Egypt';
    if( $code == 'SV' ) $country = 'El Salvador';
    if( $code == 'GQ' ) $country = 'Equatorial Guinea';
    if( $code == 'ER' ) $country = 'Eritrea';
    if( $code == 'EE' ) $country = 'Estonia';
    if( $code == 'ET' ) $country = 'Ethiopia';
    if( $code == 'FO' ) $country = 'Faroe Islands';
    if( $code == 'FK' ) $country = 'Falkland Islands (Malvinas)';
    if( $code == 'FJ' ) $country = 'Fiji the Fiji Islands';
    if( $code == 'FI' ) $country = 'Finland';
    if( $code == 'FR' ) $country = 'France, French Republic';
    if( $code == 'GF' ) $country = 'French Guiana';
    if( $code == 'PF' ) $country = 'French Polynesia';
    if( $code == 'TF' ) $country = 'French Southern Territories';
    if( $code == 'GA' ) $country = 'Gabon';
    if( $code == 'GM' ) $country = 'Gambia the';
    if( $code == 'GE' ) $country = 'Georgia';
    if( $code == 'DE' ) $country = 'Germany';
    if( $code == 'GH' ) $country = 'Ghana';
    if( $code == 'GI' ) $country = 'Gibraltar';
    if( $code == 'GR' ) $country = 'Greece';
    if( $code == 'GL' ) $country = 'Greenland';
    if( $code == 'GD' ) $country = 'Grenada';
    if( $code == 'GP' ) $country = 'Guadeloupe';
    if( $code == 'GU' ) $country = 'Guam';
    if( $code == 'GT' ) $country = 'Guatemala';
    if( $code == 'GG' ) $country = 'Guernsey';
    if( $code == 'GN' ) $country = 'Guinea';
    if( $code == 'GW' ) $country = 'Guinea-Bissau';
    if( $code == 'GY' ) $country = 'Guyana';
    if( $code == 'HT' ) $country = 'Haiti';
    if( $code == 'HM' ) $country = 'Heard Island and McDonald Islands';
    if( $code == 'VA' ) $country = 'Holy See (Vatican City State)';
    if( $code == 'HN' ) $country = 'Honduras';
    if( $code == 'HK' ) $country = 'Hong Kong';
    if( $code == 'HU' ) $country = 'Hungary';
    if( $code == 'IS' ) $country = 'Iceland';
    if( $code == 'IN' ) $country = 'India';
    if( $code == 'ID' ) $country = 'Indonesia';
    if( $code == 'IR' ) $country = 'Iran';
    if( $code == 'IQ' ) $country = 'Iraq';
    if( $code == 'IE' ) $country = 'Ireland';
    if( $code == 'IM' ) $country = 'Isle of Man';
    if( $code == 'IL' ) $country = 'Israel';
    if( $code == 'IT' ) $country = 'Italy';
    if( $code == 'JM' ) $country = 'Jamaica';
    if( $code == 'JP' ) $country = 'Japan';
    if( $code == 'JE' ) $country = 'Jersey';
    if( $code == 'JO' ) $country = 'Jordan';
    if( $code == 'KZ' ) $country = 'Kazakhstan';
    if( $code == 'KE' ) $country = 'Kenya';
    if( $code == 'KI' ) $country = 'Kiribati';
    if( $code == 'KP' ) $country = 'Korea';
    if( $code == 'KR' ) $country = 'Korea';
    if( $code == 'KW' ) $country = 'Kuwait';
    if( $code == 'KG' ) $country = 'Kyrgyz Republic';
    if( $code == 'LA' ) $country = 'Lao';
    if( $code == 'LV' ) $country = 'Latvia';
    if( $code == 'LB' ) $country = 'Lebanon';
    if( $code == 'LS' ) $country = 'Lesotho';
    if( $code == 'LR' ) $country = 'Liberia';
    if( $code == 'LY' ) $country = 'Libyan Arab Jamahiriya';
    if( $code == 'LI' ) $country = 'Liechtenstein';
    if( $code == 'LT' ) $country = 'Lithuania';
    if( $code == 'LU' ) $country = 'Luxembourg';
    if( $code == 'MO' ) $country = 'Macao';
    if( $code == 'MK' ) $country = 'Macedonia';
    if( $code == 'MG' ) $country = 'Madagascar';
    if( $code == 'MW' ) $country = 'Malawi';
    if( $code == 'MY' ) $country = 'Malaysia';
    if( $code == 'MV' ) $country = 'Maldives';
    if( $code == 'ML' ) $country = 'Mali';
    if( $code == 'MT' ) $country = 'Malta';
    if( $code == 'MH' ) $country = 'Marshall Islands';
    if( $code == 'MQ' ) $country = 'Martinique';
    if( $code == 'MR' ) $country = 'Mauritania';
    if( $code == 'MU' ) $country = 'Mauritius';
    if( $code == 'YT' ) $country = 'Mayotte';
    if( $code == 'MX' ) $country = 'Mexico';
    if( $code == 'FM' ) $country = 'Micronesia';
    if( $code == 'MD' ) $country = 'Moldova';
    if( $code == 'MC' ) $country = 'Monaco';
    if( $code == 'MN' ) $country = 'Mongolia';
    if( $code == 'ME' ) $country = 'Montenegro';
    if( $code == 'MS' ) $country = 'Montserrat';
    if( $code == 'MA' ) $country = 'Morocco';
    if( $code == 'MZ' ) $country = 'Mozambique';
    if( $code == 'MM' ) $country = 'Myanmar';
    if( $code == 'NA' ) $country = 'Namibia';
    if( $code == 'NR' ) $country = 'Nauru';
    if( $code == 'NP' ) $country = 'Nepal';
    if( $code == 'AN' ) $country = 'Netherlands Antilles';
    if( $code == 'NL' ) $country = 'Netherlands the';
    if( $code == 'NC' ) $country = 'New Caledonia';
    if( $code == 'NZ' ) $country = 'New Zealand';
    if( $code == 'NI' ) $country = 'Nicaragua';
    if( $code == 'NE' ) $country = 'Niger';
    if( $code == 'NG' ) $country = 'Nigeria';
    if( $code == 'NU' ) $country = 'Niue';
    if( $code == 'NF' ) $country = 'Norfolk Island';
    if( $code == 'MP' ) $country = 'Northern Mariana Islands';
    if( $code == 'NO' ) $country = 'Norway';
    if( $code == 'OM' ) $country = 'Oman';
    if( $code == 'PK' ) $country = 'Pakistan';
    if( $code == 'PW' ) $country = 'Palau';
    if( $code == 'PS' ) $country = 'Palestinian Territory';
    if( $code == 'PA' ) $country = 'Panama';
    if( $code == 'PG' ) $country = 'Papua New Guinea';
    if( $code == 'PY' ) $country = 'Paraguay';
    if( $code == 'PE' ) $country = 'Peru';
    if( $code == 'PH' ) $country = 'Philippines';
    if( $code == 'PN' ) $country = 'Pitcairn Islands';
    if( $code == 'PL' ) $country = 'Poland';
    if( $code == 'PT' ) $country = 'Portugal, Portuguese Republic';
    if( $code == 'PR' ) $country = 'Puerto Rico';
    if( $code == 'QA' ) $country = 'Qatar';
    if( $code == 'RE' ) $country = 'Reunion';
    if( $code == 'RO' ) $country = 'Romania';
    if( $code == 'RU' ) $country = 'Russian Federation';
    if( $code == 'RW' ) $country = 'Rwanda';
    if( $code == 'BL' ) $country = 'Saint Barthelemy';
    if( $code == 'SH' ) $country = 'Saint Helena';
    if( $code == 'KN' ) $country = 'Saint Kitts and Nevis';
    if( $code == 'LC' ) $country = 'Saint Lucia';
    if( $code == 'MF' ) $country = 'Saint Martin';
    if( $code == 'PM' ) $country = 'Saint Pierre and Miquelon';
    if( $code == 'VC' ) $country = 'Saint Vincent and the Grenadines';
    if( $code == 'WS' ) $country = 'Samoa';
    if( $code == 'SM' ) $country = 'San Marino';
    if( $code == 'ST' ) $country = 'Sao Tome and Principe';
    if( $code == 'SA' ) $country = 'Saudi Arabia';
    if( $code == 'SN' ) $country = 'Senegal';
    if( $code == 'RS' ) $country = 'Serbia';
    if( $code == 'SC' ) $country = 'Seychelles';
    if( $code == 'SL' ) $country = 'Sierra Leone';
    if( $code == 'SG' ) $country = 'Singapore';
    if( $code == 'SK' ) $country = 'Slovakia (Slovak Republic)';
    if( $code == 'SI' ) $country = 'Slovenia';
    if( $code == 'SB' ) $country = 'Solomon Islands';
    if( $code == 'SO' ) $country = 'Somalia, Somali Republic';
    if( $code == 'ZA' ) $country = 'South Africa';
    if( $code == 'GS' ) $country = 'South Georgia and the South Sandwich Islands';
    if( $code == 'ES' ) $country = 'Spain';
    if( $code == 'LK' ) $country = 'Sri Lanka';
    if( $code == 'SD' ) $country = 'Sudan';
    if( $code == 'SR' ) $country = 'Suriname';
    if( $code == 'SJ' ) $country = 'Svalbard & Jan Mayen Islands';
    if( $code == 'SZ' ) $country = 'Swaziland';
    if( $code == 'SE' ) $country = 'Sweden';
    if( $code == 'CH' ) $country = 'Switzerland, Swiss Confederation';
    if( $code == 'SY' ) $country = 'Syrian Arab Republic';
    if( $code == 'TW' ) $country = 'Taiwan';
    if( $code == 'TJ' ) $country = 'Tajikistan';
    if( $code == 'TZ' ) $country = 'Tanzania';
    if( $code == 'TH' ) $country = 'Thailand';
    if( $code == 'TL' ) $country = 'Timor-Leste';
    if( $code == 'TG' ) $country = 'Togo';
    if( $code == 'TK' ) $country = 'Tokelau';
    if( $code == 'TO' ) $country = 'Tonga';
    if( $code == 'TT' ) $country = 'Trinidad and Tobago';
    if( $code == 'TN' ) $country = 'Tunisia';
    if( $code == 'TR' ) $country = 'Turkey';
    if( $code == 'TM' ) $country = 'Turkmenistan';
    if( $code == 'TC' ) $country = 'Turks and Caicos Islands';
    if( $code == 'TV' ) $country = 'Tuvalu';
    if( $code == 'UG' ) $country = 'Uganda';
    if( $code == 'UA' ) $country = 'Ukraine';
    if( $code == 'AE' ) $country = 'United Arab Emirates';
    if( $code == 'GB' ) $country = 'United Kingdom';
    if( $code == 'US' ) $country = 'United States of America';
    if( $code == 'UM' ) $country = 'United States Minor Outlying Islands';
    if( $code == 'VI' ) $country = 'United States Virgin Islands';
    if( $code == 'UY' ) $country = 'Uruguay, Eastern Republic of';
    if( $code == 'UZ' ) $country = 'Uzbekistan';
    if( $code == 'VU' ) $country = 'Vanuatu';
    if( $code == 'VE' ) $country = 'Venezuela';
    if( $code == 'VN' ) $country = 'Vietnam';
    if( $code == 'WF' ) $country = 'Wallis and Futuna';
    if( $code == 'EH' ) $country = 'Western Sahara';
    if( $code == 'YE' ) $country = 'Yemen';
    if( $code == 'ZM' ) $country = 'Zambia';
    if( $code == 'ZW' ) $country = 'Zimbabwe';
    if( $country == '') $country = $code;
    return $country;
}

function generatevideothumbs($theconvertimg,$thevideoimgnew,$thewidth,$theheight)
{
	global $config;
    $convertimg = $theconvertimg;
    $videoimgnew = $thevideoimgnew;

    $theimagesizedata = GetImageSize($convertimg);
    $videoimgwidth = $theimagesizedata[0];
    $videoimgheight = $theimagesizedata[1];
    $videoimgformat = $theimagesizedata[2];
	
	$dest_width = $thewidth;
	$dest_height = $theheight;
	
    if($videoimgformat == 2)
    {
        $videoimgsource = @imagecreatefromjpeg($convertimg);
        $videoimgdest = @imageCreateTrueColor($dest_width, $dest_height);
        ImageCopyResampled($videoimgdest, $videoimgsource, 0, 0, 0, 0, $dest_width, $dest_height, $videoimgwidth, $videoimgheight);
        imagejpeg($videoimgdest, $videoimgnew, 100);
        imagedestroy($videoimgsource);
        imagedestroy($videoimgdest);
    }
    elseif ($videoimgformat == 3)
    {
        $videoimgsource = imagecreatefrompng($convertimg);
        $videoimgdest = imageCreateTrueColor($dest_width, $dest_height);
        ImageCopyResampled($videoimgdest, $videoimgsource, 0, 0, 0, 0, $dest_width, $dest_height, $videoimgwidth, $videoimgheight);
        imagepng($videoimgdest, $videoimgnew, 100);
        imagedestroy($videoimgsource);
        imagedestroy($videoimgdest);
    }
    else
    {
        $videoimgsource = imagecreatefromgif($convertimg);
        $videoimgdest = imageCreateTrueColor($dest_width, $dest_height);
        ImageCopyResampled($videoimgdest, $videoimgsource, 0, 0, 0, 0, $dest_width, $dest_height, $videoimgwidth, $videoimgheight);
        imagejpeg($videoimgdest, $videoimgnew, 100);
        imagedestroy($videoimgsource);
        imagedestroy($videoimgdest);
    }
}

function delete_pic_delete_user($DPID)
{
    global $config,$conn;
	$queryd = "select PID, BID, REPID, pic from posts where PID='".mysql_real_escape_string($DPID)."'"; 
	$executequeryd = $conn->execute($queryd);
	$DPID = intval($executequeryd->fields['PID']);	
	$DBID = intval($executequeryd->fields['BID']);
	$REPID = intval($executequeryd->fields['REPID']);
	$pic = $executequeryd->fields['pic'];
	if($DPID > 0)
	{
		$query = "DELETE FROM activity WHERE PID='".mysql_real_escape_string($DPID)."'";
		$conn->Execute($query);	
		if($DBID > 0)
		{
			$query = "UPDATE boards SET pincount=pincount-1 WHERE pincount>'0' AND BID='".mysql_real_escape_string($DBID)."'";
			$conn->Execute($query);	
		}
		$query = "DELETE FROM comments WHERE PID='".mysql_real_escape_string($DPID)."'";
		$conn->Execute($query);	
		$query = "DELETE FROM posts_fav WHERE PID='".mysql_real_escape_string($DPID)."'";
		$conn->Execute($query);	
		$query = "DELETE FROM posts_reports WHERE PID='".mysql_real_escape_string($DPID)."'";
		$conn->Execute($query);	
		if($REPID > 0)
		{
			$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($DPID)."'";
			$conn->Execute($query);	
		}
		else
		{
			$query = "select count(*) as total from posts WHERE (REPID='".mysql_real_escape_string($DPID)."' OR OID='".mysql_real_escape_string($DPID)."')"; 
			$executequery=$conn->execute($query);
    		$tt = $executequery->fields['total'];
			if($tt == "0")
			{
				delete_pic_images($pic);	
				$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($DPID)."'";
				$conn->Execute($query);	
			}
			else
			{
				$query = "INSERT INTO posts_delete SET PID='".mysql_real_escape_string($DPID)."', pic='".mysql_real_escape_string($pic)."'";
				$conn->Execute($query);	
				$query = "DELETE FROM posts WHERE PID='".mysql_real_escape_string($DPID)."'";
				$conn->Execute($query);
				$query = "UPDATE posts SET OID='0',OUSERID='0',REPIN='0',REPID='0' WHERE (REPID='".mysql_real_escape_string($DPID)."' OR OID='".mysql_real_escape_string($DPID)."')";
				$conn->Execute($query);	
			}
		}
	}
}

function delete_user($USERID)
{
    global $config,$conn;
	if($USERID > 0)
	{
		$query = "select profilepicture from members where USERID='".mysql_real_escape_string($USERID)."' limit 1"; 
		$executequery = $conn->execute($query);
		$delpp = $executequery->fields['profilepicture'];
		if($delpp != "")
		{
			$del1=$config['mdir']."/".$delpp;
			if(file_exists($del1))
			{
				unlink($del1);
			}
			$del2=$config['mdir']."/thumbs/".$delpp;
			if(file_exists($del2))
			{
				unlink($del2);
			}
			$del3=$config['mdir']."/o/".$delpp;
			if(file_exists($del3))
			{
				unlink($del3);
			}
		}
		$query="SELECT PID FROM posts WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$results = $conn->execute($query);
		$returnthis = $results->getrows();
		$vtotal = count($returnthis);
		for($i=0;$i<$vtotal;$i++)
		{
			$DPID = intval($returnthis[$i]['PID']);
			if($DPID > 0)
			{
				delete_pic_delete_user($DPID);
			}
		}
		$query = "DELETE FROM activity WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM boards WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM categories_subscribe WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM comments WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM followb WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM followm WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM followm WHERE ISFOL='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);		
		$query = "DELETE FROM members WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM members_passcode WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM members_verifycode WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_fav WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
		$query = "DELETE FROM posts_reports WHERE USERID='".mysql_real_escape_string($USERID)."'";
		$conn->execute($query);
	}
}

function get_board_name($BID)
{
        global $conn;
		$BID = intval($BID);
        $query="SELECT bname FROM boards WHERE BID='".mysql_real_escape_string($BID)."' limit 1";
        $executequery=$conn->execute($query);
        $bname = $executequery->fields['bname'];
		return $bname;
}

function publishToFacebook($app_id, $app_secret, $fb_id, $scriptolution_msg, $scriptolution_link, $scriptolution_picture, $scriptolution_caption) 
{
	global $config, $conn;
	if($config['enable_fc'] == "1")
	{
		if($_SESSION['FB'] == "1")
		{
			$USERID = intval($_SESSION['USERID']);
			if($USERID > 0)
			{
				$queryd = "select post_fb from members where USERID='".mysql_real_escape_string($USERID)."'"; 
				$executequeryd = $conn->execute($queryd);
				$post_fb = intval($executequeryd->fields['post_fb']);
				if($post_fb == "1")
				{	
					require_once $config['basedir'].'/src/facebook.php'; 
					$facebook = new Facebook(array(appId => $app_id,
							secret => $app_secret,
							cookie => true));
					if(is_null($facebook)) 
					{
					}
					else 
					{
						try 
						{
						   $post_id = $facebook->api('/' . $fb_id . '/feed/', 'post', array(
							'message' => $scriptolution_msg,
							'link' => $scriptolution_link,
							'picture'  => $scriptolution_picture,
							'caption' => $scriptolution_caption
							));
						   return $post_id;
						}
						catch (FacebookApiException $e) 
						{
						}
					}
				}
			}
		}
	}
}
?>