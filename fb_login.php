<?php

/* This php contains users login details in php */

$helper = $fb->getRedirectLoginHelper();
$permissions = ['public_profile', 'publish_actions']; // optional
$loginUrl = $helper->getLoginUrl('http://54.69.143.54/gecw_election/facebook_app/login_callback.php', $permissions);
?>
