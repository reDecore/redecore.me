<?php
require_once('../include/config.php');
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
  $_SESSION['oauth_status'] = 'oldtoken';
  header('Location: ./clearsessions.php');
}
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
$_SESSION['access_token'] = $access_token;
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);
if (200 == $connection->http_code) {
  $_SESSION['status'] = 'verified';
  header('Location: '.$config['baseurl']."/twitter_connect.php");
} else {
  header('Location: ./clearsessions.php');
}
