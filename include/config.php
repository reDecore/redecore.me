<?php
$config = array();

// Begin Configuration
$config['basedir']     =  '/www/local.redecore.me';
$config['baseurl']     =  'http://local.redecore.me';

$DBTYPE = 'mysql';
$DBHOST = 'localhost';
$DBUSER = 'root';
$DBPASSWORD = '';
$DBNAME = 'redecore';

$default_language = "portuguese"; //Valid options are portuguese, english, spanish
// End Configuration

session_start();
date_default_timezone_set('America/Sao_Paulo');
$config['adminurl']      =  $config['baseurl'].'/administrator';
$config['cssurl']      =  $config['baseurl'].'/css';
$config['imagedir']      =  $config['basedir'].'/img';
$config['imageurl']      =  $config['baseurl'].'/img';
$config['pdir']      =  $config['basedir'].'/pics';
$config['purl']      =  $config['baseurl'].'/pics';
$config['mdir']      =  $config['basedir'].'/mpics';
$config['murl']      =  $config['baseurl'].'/mpics';
echo file_get_contents($config['baseurl']."/startup.php");
require_once($config['basedir'].'/smarty/libs/Smarty.class.php');
require_once($config['basedir'].'/libraries/mysmarty.class.php');
require_once($config['basedir'].'/libraries/SConfig.php');
require_once($config['basedir'].'/libraries/SError.php');
require_once($config['basedir'].'/libraries/adodb/adodb.inc.php');
require_once($config['basedir'].'/libraries/phpmailer/class.phpmailer.php');
require_once($config['basedir'].'/libraries/SEmail.php');

function strip_mq_gpc($arg)
{
  if (get_magic_quotes_gpc())
  {
  	$arg = str_replace('"',"'",$arg);
  	$arg = stripslashes($arg);
    return $arg;
  } 
  else
  {
    $arg = str_replace('"',"'",$arg);
    return $arg;
  }
}

$conn = &ADONewConnection($DBTYPE);
$conn->PConnect($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME);
@mysql_query("SET NAMES 'UTF8'");
$sql = "SELECT * from config";
$rsc = $conn->Execute($sql);

if($rsc){while(!$rsc->EOF)
{
$field = $rsc->fields['setting'];
$config[$field] = $rsc->fields['value'];
STemplate::assign($field, strip_mq_gpc($config[$field]));
@$rsc->MoveNext();
}}

if (!empty($_REQUEST['language']))
{
	if ($_REQUEST['language'] == "portuguese")
	{
		$_SESSION['language'] = "portuguese";
	}
	elseif ($_REQUEST['language'] == "english")
	{
		$_SESSION['language'] = "english";
	}
	elseif ($_REQUEST['language'] == "spanish")
	{
		$_SESSION['language'] = "spanish";
	}
}

if ($_SESSION['language'] == "")
{
	$_SESSION['language'] = $default_language;
}

if ($_SESSION['language'] == "portuguese")
{
include("lang/portuguese.php");
}
elseif ($_SESSION['language'] == "english")
{
include("lang/english.php");
}
elseif ($_SESSION['language'] == "spanish")
{
include("lang/spanish.php");
}
else
{
	include("lang/".$default_language.".php");
}

if (!empty($lang)) {
  for ($i=0; $i<count($lang); $i++)
  {
	  STemplate::assign('lang'.$i, $lang[$i]);
  }
}

STemplate::assign('baseurl',       $config['baseurl']);
STemplate::assign('basedir',       $config['basedir']);
STemplate::assign('adminurl',       $config['adminurl']);
STemplate::assign('cssurl',       $config['cssurl']);
STemplate::assign('imagedir',        $config['imagedir']);
STemplate::assign('imageurl',        $config['imageurl']);
STemplate::assign('pdir',        $config['pdir']);
STemplate::assign('purl',        $config['purl']);
STemplate::assign('mdir',        $config['mdir']);
STemplate::assign('murl',        $config['murl']);
STemplate::setCompileDir($config['basedir']."/temporary");
STemplate::setTplDir($config['basedir']."/themes");

if(isset($sban) && $sban != "1")
{
	$bquery = "SELECT count(*) as total from bans_ips WHERE ip='".mysql_real_escape_string($_SERVER['REMOTE_ADDR'])."'";
	$bresult = $conn->execute($bquery);
	$bcount = $bresult->fields['total'];
	if($bcount > "0")
	{
		$brdr = $config['baseurl']."/banned.php";
		header("Location:$brdr");
		exit;
	}
}

function create_slrememberme() {
        $key = md5(uniqid(rand(), true));
        global $conn;
        $sql="update members set remember_me_time='".date('Y-m-d H:i:s')."', remember_me_key='".$key."' WHERE username='".mysql_real_escape_string($_SESSION[USERNAME])."'";
        $conn->execute($sql);
        setcookie('slrememberme', gzcompress(serialize(array($_SESSION[USERNAME], $key)), 9), time()+60*60*24*30);
}

function destroy_slrememberme($username) {
        if (strlen($username) > 0) {
                global $conn;
                $sql="update members set remember_me_time=NULL, remember_me_key=NULL WHERE username='".mysql_real_escape_string($username)."'";
                $conn->execute($sql);
        }
        setcookie ("slrememberme", "", time() - 3600);
}

if (!isset($_SESSION["USERNAME"]) && isset($_COOKIE['slrememberme'])) 
{
        $sql="update members set remember_me_time=NULL and remember_me_key=NULL WHERE remember_me_time<'".date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")-1, date("d"),   date("Y")))."'";
        $conn->execute($sql);
        list($username, $key) = @unserialize(gzuncompress(stripslashes($_COOKIE['slrememberme'])));
        if (strlen($username) > 0 && strlen($key) > 0)
		{
        	$sql="SELECT status,USERID,email,username,verified,profilepicture,fname,lname from members WHERE username='".mysql_real_escape_string($username)."' and remember_me_key='".mysql_real_escape_string($key)."'";
          	$rs=$conn->execute($sql);
          	if($rs->recordcount()<1)
			{
				$error = "Error: Could not locate your account.";
			}
		    elseif($rs->fields['status'] == "0")
			{
				$error = "Error: Your account has been disabled by the administrator.";
			}
    		if($error=="")
			{				
				$_SESSION['USERID']=$rs->fields['USERID'];
				$_SESSION['EMAIL']=$rs->fields['email'];
				$_SESSION['USERNAME']=$rs->fields['username'];
				$_SESSION['VERIFIED']=$rs->fields['verified'];
				$_SESSION['PP']=$rs->fields['profilepicture'];
				$_SESSION['FNAME']=$rs->fields['fname'];
				$_SESSION['LNAME']=$rs->fields['lname'];
      			create_slrememberme();
        	}
			else
			{
                destroy_slrememberme($username);
        	}
        }
}

function generateCode($length) 
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}
function getCurrentPageUrl()
{
	 static $pageURL = '';
	 if(empty($pageURL)){
		  $pageURL = 'http';
		  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')$pageURL .= 's';
		  $pageURL .= '://';
		  if($_SERVER['SERVER_PORT'] != '80')$pageURL .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
		  else $pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	 }
	 return $pageURL;
} 
function download_photo($url, $saveto)
{
	global $config;
	if (!curlSaveToFile($url, $saveto))
	{
		if (!secondarysave($url, $saveto))
		{
			return false;
		}
		return true;
	}
	return true;
}
function download_photo_new($url, $saveto, $sourceurl)
{
	global $config;
	include("functions/curl.php");
	$curl = &new Curl_HTTP_Client();
	$useragent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13";
	$curl->set_user_agent($useragent);
	$curl->set_referrer($url);
	$cookies_file = $config['basedir']."/temporary/cookies.txt";
	$curl->store_cookies($cookies_file);
	$html = $curl->fetch_url($url);
	if(file_exists($saveto))
	{
		unlink($saveto);
	}
	$fh = fopen($saveto, 'x');
	fwrite($fh, $html);
	fclose($fh);
	if(file_exists($saveto))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function secondarysave( $url, $local )
{
	$ch = curl_init($url);
	$fp = fopen($local, 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);

	if( filesize($local) > 10 ) {
		return true;
	}
	
	return false;
}

function curlSaveToFile( $url, $local )
{
	$ch = curl_init();
	$fh = fopen($local, 'w');
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FILE, $fh);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_NOPROGRESS, true);
	curl_setopt($ch, CURLOPT_USERAGENT, '"Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.8.1.11) Gecko/20071204 Ubuntu/7.10 (gutsy) Firefox/2.0.0.11');
	curl_exec($ch);
	
	if( curl_errno($ch) ) {
		return false;
	}
	
	curl_close($ch);
	fclose($fh);
	
	if( filesize($local) > 10 ) {
		return true;
	}
	
	return false;
}

function do_resize_image($file, $width = 0, $height = 0, $proportional = false, $output = 'file')
{
	if($height <= 0 && $width <= 0)
	{
	  return false;
	}
	
	$info = getimagesize($file);
	$image = '';

	$final_width = 0;
	$final_height = 0;
	list($width_old, $height_old) = $info;

	if($proportional) 
	{
	  if ($width == 0) $factor = $height/$height_old;
	  elseif ($height == 0) $factor = $width/$width_old;
	  else $factor = min ( $width / $width_old, $height / $height_old);   
	  
	  $final_width = round ($width_old * $factor);
	  $final_height = round ($height_old * $factor);
		  
	  if($final_width > $width_old && $final_height > $height_old)
	  {
	  	  $final_width = $width_old;
		  $final_height = $height_old;

	  }
	}
	else 
	{
	  $final_width = ( $width <= 0 ) ? $width_old : $width;
	  $final_height = ( $height <= 0 ) ? $height_old : $height;
	}
	
	switch($info[2]) 
	{
	  case IMAGETYPE_GIF:
		$image = imagecreatefromgif($file);
	  break;
	  case IMAGETYPE_JPEG:
		$image = imagecreatefromjpeg($file);
	  break;
	  case IMAGETYPE_PNG:
		$image = imagecreatefrompng($file);
	  break;
	  default:
		return false;
	}

	$image_resized = imagecreatetruecolor( $final_width, $final_height );

	if(($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG))
	{
	  $trnprt_indx = imagecolortransparent($image);
	
	  if($trnprt_indx >= 0)
	  {
		$trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
		$trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
		imagefill($image_resized, 0, 0, $trnprt_indx);
		imagecolortransparent($image_resized, $trnprt_indx);	
	  } 
	  elseif($info[2] == IMAGETYPE_PNG) 
	  {
		imagealphablending($image_resized, false);
		$color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
		imagefill($image_resized, 0, 0, $color);
		imagesavealpha($image_resized, true);
	  }
	}
	imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);

	switch( strtolower($output))
	{
	  case 'browser':
		$mime = image_type_to_mime_type($info[2]);
		header("Content-type: $mime");
		$output = NULL;
	  break;
	  case 'file':
		$output = $file;
	  break;
	  case 'return':
		return $image_resized;
	  break;
	  default:
	  break;
	}
	
	if(file_exists($output))
	{
		@unlink($output);
	}

	switch($info[2])
	{
	  case IMAGETYPE_GIF:
		imagegif($image_resized, $output);
	  break;
	  case IMAGETYPE_JPEG:
		imagejpeg($image_resized, $output, 100);
	  break;
	  case IMAGETYPE_PNG:
		imagepng($image_resized, $output);
	  break;
	  default:
		return false;
	}
	return true;
}

function do_resize_image2($file, $width = 0, $height = 0, $proportional = false, $output = 'file', $temppic)
{
	if($height <= 0 && $width <= 0)
	{
	  return false;
	}
	
	$info = getimagesize($file);
	$image = '';

	$final_width = 0;
	$final_height = 0;
	list($width_old, $height_old) = $info;

	if($proportional) 
	{
	  if ($width == 0) $factor = $height/$height_old;
	  elseif ($height == 0) $factor = $width/$width_old;
	  else $factor = min ( $width / $width_old, $height / $height_old);   
	  
	  $final_width = round ($width_old * $factor);
	  $final_height = round ($height_old * $factor);
		  
	  if($final_width > $width_old && $final_height > $height_old)
	  {
	  	  $final_width = $width_old;
		  $final_height = $height_old;

	  }
	}
	else 
	{
	  $final_width = ( $width <= 0 ) ? $width_old : $width;
	  $final_height = ( $height <= 0 ) ? $height_old : $height;
	}
	
	$owh = $width_old."x".$height_old;
	$nwh = $final_width."x".$final_height;
	if(!file_exists($temppic))
	{
		$runinbg = "convert ".$file." -coalesce ".$temppic;
		$runconvert = exec("$runinbg");
	}
	$runinbg = "convert -size ".$owh." ".$temppic." -resize ".$nwh." ".$output;
	$runconvert = exec("$runinbg");
	return true;
}

if($config['invite_mode'] != "1")
{
	if($config['enable_fc'] == "1")
	{
		if($_SESSION['USERID'] == "")
		{
			$A = $config['FACEBOOK_APP_ID'];
			$B = $config['FACEBOOK_SECRET'];
			define('FACEBOOK_APP_ID', $A);
			define('FACEBOOK_SECRET', $B);
			STemplate::assign('FACEBOOK_APP_ID',$A);
			STemplate::assign('FACEBOOK_SECRET',$B);
			
			function get_facebook_cookie($app_id, $application_secret) {
			  $args = array();
			  parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
			  ksort($args);
			  $payload = '';
			  foreach ($args as $key => $value) {
				if ($key != 'sig') {
				  $payload .= $key . '=' . $value;
				}
			  }
			  if (md5($payload . $application_secret) != $args['sig']) {
				return null;
			  }
			  return $args;
			}
			
			$code = $_REQUEST['code'];
			if($code != "")
			{
				$my_url = $config['baseurl']."/";
				$token_url = "https://graph.facebook.com/oauth/access_token?"
				. "client_id=" . $A . "&redirect_uri=" . urlencode($my_url)
				. "&client_secret=" . $B . "&code=" . $code;
				$response = @file_get_contents($token_url);
				$params = null;
				parse_str($response, $params);
				$graph_url = "https://graph.facebook.com/me?access_token=" 
				. $params['access_token'];
				$user = json_decode(file_get_contents($graph_url));
				$fname = htmlentities(strip_tags($user->name), ENT_COMPAT, "UTF-8");
				$femail = htmlentities(strip_tags($user->email), ENT_COMPAT, "UTF-8");
				//pics
				$fbpid = htmlentities(strip_tags($user->id), ENT_COMPAT, "UTF-8");
				$fbpicurl = "http://graph.facebook.com/".$fbpid."/picture";
				$fbpicurl2 = "http://graph.facebook.com/".$fbpid."/picture?type=large";
				//pics
				$query="SELECT USERID FROM members WHERE email='".mysql_real_escape_string($femail)."' limit 1";
				$executequery=$conn->execute($query);
				$FUID = intval($executequery->fields['USERID']);
				if($FUID > 0)
				{									
					$query="SELECT USERID,email,username,verified,profilepicture,fname,lname from members WHERE USERID='".mysql_real_escape_string($FUID)."' and status='1'";
					$result=$conn->execute($query);
					if($result->recordcount()>0)
					{
						$query="update members set lastlogin='".time()."', lip='".$_SERVER['REMOTE_ADDR']."' WHERE USERID='".mysql_real_escape_string($FUID)."'";
						$conn->execute($query);
						$_SESSION['USERID']=$result->fields['USERID'];
						$_SESSION['EMAIL']=$result->fields['email'];
						$_SESSION['USERNAME']=$result->fields['username'];
						$_SESSION['VERIFIED']=$result->fields['verified'];
						$_SESSION['PP']=$result->fields['profilepicture'];
						$_SESSION['FNAME']=$result->fields['fname'];
						$_SESSION['LNAME']=$result->fields['lname'];
						$_SESSION['FB']="1";			
						if(isset($_SESSION['PINREDIRECT']))
						{
							$pindir = $_SESSION['PINREDIRECT'];	
							$pindir = base64_decode($pindir);
							$_SESSION['PINREDIRECT'] = "";
							header("Location:$config[baseurl]".$pindir);exit;
						}
						else
						{
							header("Location:$config[baseurl]/");exit;
						}
					}
				}
				else
				{
					$mdpass = generateCode(5).time();
					$md5pass = md5($mdpass);
					
					if($fname != "" && $femail != "")
					{
						$thename = explode(" ", $fname);
						$fname = $thename[0];
						$mname = $thename[1];
						$lname = $thename[2];
						if($lname == "")
						{
							$lname = $mname;	
						}
						
						$query="INSERT INTO members SET email='".mysql_real_escape_string($femail)."', fname='".mysql_real_escape_string($fname)."', lname='".mysql_real_escape_string($lname)."', username='', password='".mysql_real_escape_string($md5pass)."', pwd='".mysql_real_escape_string($mdpass)."', addtime='".time()."', lastlogin='".time()."', ip='".$_SERVER['REMOTE_ADDR']."', lip='".$_SERVER['REMOTE_ADDR']."', verified='1'";
						$result=$conn->execute($query);
						$userid = mysql_insert_id();
						if($userid != "" && is_numeric($userid) && $userid > 0)
						{
							$query="SELECT USERID,email,verified,profilepicture,fname,lname from members WHERE USERID='".mysql_real_escape_string($userid)."'";
							$result=$conn->execute($query);
							
							$SUSERID = $result->fields['USERID'];
							$SEMAIL = $result->fields['email'];
							$SVERIFIED = $result->fields['verified'];
							$SPP = $result->fields['profilepicture'];
							$SFNAME = $result->fields['fname'];
							$SLNAME = $result->fields['lname'];
							$_SESSION['USERID']=$SUSERID;
							$_SESSION['EMAIL']=$SEMAIL;
							$_SESSION['VERIFIED']=$SVERIFIED;
							$_SESSION['PP']=$SPP;
							$_SESSION['FNAME']=$SFNAME;
							$_SESSION['LNAME']=$SLNAME;
							$_SESSION['FB']="1";	
							
							//add pics
							if(intval($fbpid) > 0)
							{
								$fp1 = $fbpicurl;
								$fp2 = $fbpicurl2;
								$tfpp = $userid.".jpg";
								$fimage=$config['mdir']."/o/".$tfpp;
								if(!download_photo($fp2, $fimage))
								{
									if(file_exists($fimage))
									{
										unlink($fimage);
									}
								}
								else
								{
									$fi2=$config['mdir']."/".$tfpp;
									do_resize_image($fimage, "192", "192", false, $fi2);
									$fi3=$config['mdir']."/thumbs/".$tfpp;
									do_resize_image($fimage, "50", "50", false, $fi3);	
									if(file_exists($config['mdir']."/o/".$tfpp))
									{
										$query = "UPDATE members SET profilepicture='$tfpp' WHERE USERID='".mysql_real_escape_string($userid)."'";
										$conn->execute($query);
										$_SESSION['PP']=$tfpp;
									}
								}
							}
							//add pics			
							header("Location:$config[baseurl]/connect.php");exit;
						}
					}
				}
			}
		}
		if($_SESSION['USERNAME'] == "" && $_SESSION['FB'] == "1")
		{	
			$url = getCurrentPageUrl();
			$myurl = $config['baseurl']."/connect.php";
			if($url != $myurl)
			{
				header("Location:$config[baseurl]/connect.php");exit;
			}
		}
	}
}
?>