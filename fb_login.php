<?php

/* This php contains users login details in php */

$helper = $fb->getRedirectLoginHelper();
$permissions = ['public_profile', 'publish_actions']; // optional
$loginUrl = $helper->getLoginUrl('http://52.32.229.201/facebook_app/login_callback.php', $permissions);
?>
