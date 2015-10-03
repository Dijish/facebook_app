<?php
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook-sdk-v5/');
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

session_start();

require 'fb_config.php';

require 'fb_login.php';

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

/*
// Sets the default fallback access token so we don't have to pass it to each request*/

//$fb->setDefaultAccessToken('{access-token}');
try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  var_dump($_GET);
  echo '\n\n\n';
  var_dump($_SESSION);
  exit;
}
/*
if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']

  try {
  $response = $fb->get('/me');
  $userNode = $response->getGraphUser();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }

  echo 'Logged in as ' . $userNode->getName();
}*/
?>
