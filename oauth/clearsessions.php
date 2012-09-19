<?php
require_once('../include/config.php');
session_destroy();
 header('Location: '.$config['baseurl'].'/logout.php');
