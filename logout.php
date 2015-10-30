<!DOCTYPE html>
<html>
    <head>
        <title>Your Red Viper</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
    </head>
    <body> 
<?php
        define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook-sdk-v5/');
        require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

        session_start();

        require 'fb_config.php';
        
       // $accessToken=$_SESSION['facebook_access_token'];
        
        $message=$_GET['msg'];
        //echo $message
        $accessToken=$_SESSION['facebook_access_token'];
        if (isset($accessToken)) {

          // Now you can redirect to another page and use the
          // access token from $_SESSION['facebook_access_token']
            
            $fb->setDefaultAccessToken($accessToken);
            
            // Destroy the facebook session
            session_destroy();
       
            header("Location: http://54.69.143.54/facebook_app/"); 
            exit();
        }
?>

    </body>
</html>
