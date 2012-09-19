<?php
include("config.php");

class CaptchaSecurityImages {

	var $font = 'fonts/monofont.ttf';

	function generateCode($characters) {
		$possible = '23456789bcdfghjkmnpqrstvwxyz';
		$code = '';
		$i = 0;
		while ($i < $characters) { 
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
	}

	function CaptchaSecurityImages($width='50',$height='28',$characters='4') {
		$code = $this->generateCode($characters);
		$font_size = $height * 0.75;
		$image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');
		$background_color = imagecolorallocate($image, 238, 238, 238);
		$text_color = imagecolorallocate($image, 102, 102, 102);
		$noise_color = imagecolorallocate($image, 166, 165, 165);
		for( $i=0; $i<3; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}
		for( $i=0; $i<5; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}
		$textbox = imagettfbbox($font_size, 0, $this->font, $code) or die('Error in imagettfbbox function');
		$x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $this->font , $code) or die('Error in imagettftext function');
		header('Content-Type: image/jpeg');
		imagejpeg($image);
		imagedestroy($image);
		$_SESSION['imagecode'] = $code;
	}

}

$width = isset($_GET['width']) ? $_GET['width'] : '50';
$height = isset($_GET['height']) ? $_GET['height'] : '28';
$characters = isset($_GET['characters']) && $_GET['characters'] > 1 ? $_GET['characters'] : '4';

$captcha = new CaptchaSecurityImages($width,$height,$characters);

?>