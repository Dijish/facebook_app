<!DOCTYPE html>
<html>
    <head>
        <title>Your Red Viper</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/login_callback.css" />
        
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
        
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        
        <script src="js/bootstrap.min.css"></script>
        <script src="js/jumbotron.css"></script>
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
            
            try {
          $response = $fb->get('/me');
          $userNode = $response->getGraphUser();
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            //echo 'Graph returned an error: (using graph) : ' . $e->getMessage();
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            //echo 'Facebook SDK returned an error: (using graph) : ' . $e->getMessage();
            exit;
          }

          
          
          $merged_picture_path="img/temp/".$userNode->getName().".png";
          
          $data = [
            'message' => $message,
            'source' => $fb->fileToUpload($merged_picture_path),
          ];
          
          try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->post('/me/photos', $data, $accessToken);
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            //echo 'Graph returned an error: ' . $e->getMessage();
            exit;
             // include 'error.php';
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            //echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
             // include 'error.php';
          }

          $graphNode = $response->getGraphNode();
        }
        
       // session_destroy();
        
        
        /*
        header("Location: http://localhost/facebook_app/"); /* Redirect browser 
        exit();*/
        
?>
        
        <div class="jumbotron">
            <div class="container">
                 <h1>Thank You for Your Support</h1>
            </div>
        </div>

    </body>
</html>