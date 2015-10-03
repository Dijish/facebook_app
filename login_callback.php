<?php

/* This is php give me a token so that i can access facebook details of user from other pages also */

define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook-sdk-v5/');
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

session_start();

require 'fb_config.php';

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: (accessing token) : ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error:(accessing token) ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
  
  $fb->setDefaultAccessToken($accessToken);
  
  try {
  $response = $fb->get('/me');
  $userNode = $response->getGraphUser();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: (using graph) : ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: (using graph) : ' . $e->getMessage();
    exit;
  }

  echo 'Logged in as ' . $userNode->getName();
}

?>