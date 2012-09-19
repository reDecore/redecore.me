<?php
header('Content-type: text/css');
include("../../include/config.php");
$iurl = $config['adminurl']."/images";
?>
  .db-menu ul li a{     background:transparent url(<?php echo $iurl;?>/db-menu-bg-up.gif) repeat-x 0px 3px; height:26px}  .db-menu ul li a:hover,.db-menu ul li a.hover{    background:transparent url(<?php echo $iurl;?>/db-menu-bg-hov.gif) repeat-x 0px 3px} .graph-block{height:auto} .db-menu{width:947px}
