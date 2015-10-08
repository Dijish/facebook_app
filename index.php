<?php
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook-sdk-v5/');
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

session_start();

require 'fb_config.php';

require 'fb_login.php';

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>
