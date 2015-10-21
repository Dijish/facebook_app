<!DOCTYPE html>
<html>
    <head>
        <title>Join Red Tomorrow</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/login_callback.css" />
        
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
        
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        
        <script src="js/bootstrap.min.css"></script>
        <script src="js/jumbotron.css"></script>
        <script src="js/grid.css"></script>
    </head>
    <body>

        <?php include 'header.php'; ?>

        <?php

        /* This is php give me a token so that i can access facebook details of user from other pages also */

        define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook-sdk-v5/');
        require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

        session_start();

        require 'fb_config.php';

        $helper = $fb->getRedirectLoginHelper();
        
        //echo $_SESSION['facebook_access_token'];
        if(!isset($_SESSION['facebook_access_token'])){
        try {
          $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          echo 'Graph returned an error: (accessing token) : ' . $e->getMessage();
         // $accessToken=$_SESSION['facebook_access_token'];
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'Facebook SDK returned an error:(accessing token) ' . $e->getMessage();
          exit;
        }
        }
        else{
            $accessToken=$_SESSION['facebook_access_token'];
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
            /*echo 'Graph returned an error: (using graph) : ' . $e->getMessage();
            exit;*/
            //include 'error.php';
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            //echo 'Facebook SDK returned an error: (using graph) : ' . $e->getMessage();
            //exit;
              //include 'error.php';
          }

          echo '<div class="row">'
        . '<div class="col-md-12">Join the Red Revolution NOW  ' . $userNode->getName().'<br />'
                  . '</div></div>';
          $profile_picture_url='http://graph.facebook.com/'.$userNode->getId().'/picture?type=large';
         //echo $userNode->getId();
          $profile_picture='<img src='.$profile_picture_url.' />';
          //echo '<br />'.$profile_picture;

          /* Merging Profile picture and cover photo */

          $img_src_or = imagecreatefromjpeg($profile_picture_url);

          /* Why save?
          // Saving profile picture
          file_put_contents("img/profile_picture/".$userNode->getName().".jpeg", file_get_contents($profile_picture_url));
          */

          $img_dest = imagecreatefrompng('img/test_cover1.png');

          /* Below width and height is the total width and height of merged image */
          $width=815;
          $height=315;

          /* Make a resize image of specified width and height */
          $img_src_resize = imagecreatetruecolor( $width, $height );
          

          /* Copy the profile picture on the right end of resized image */
          imagecopyresampled( $img_src_resize, $img_src_or, //dst_image, src_image
                            500,0, //Co-ordiante to position image on resized image
                            0, 0, //Co-ordiante of resize image to show
                            315, 315, //Width and height of resize
                            200, 200 ); //Width and height of src image

          /* Copy the cover photo in the left end of resized image containing the profile picture */
          imagecopyresampled( $img_src_resize,$img_dest, //dst_image, src_image
                            0, 0, //Co-ordinate of resize where dest image to be placed
                            0, 0, //Co-ordinate of resize to be shown
                            imagesx($img_src_resize), imagesy($img_src_resize),//Width and height of resize
                            imagesx($img_dest), imagesy($img_dest)); //Width and height of dest image

          // Saving merged image
          $merged_picture_path="img/temp/".$userNode->getName().".png";
          imagepng($img_src_resize,$merged_picture_path);

          $data = [
            'message' => $userNode->getName(). ' Joined the RED REVOLUTION what are you waiting for Join NOW',
            'source' => $fb->fileToUpload($merged_picture_path),
          ];

          try {
            // Returns a `Facebook\FacebookResponse` object
            //$response = $fb->post('/me/photos', $data, $accessToken);
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            //echo 'Graph returned an error: ' . $e->getMessage();
            //exit;
              //include 'error.php';
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            //echo 'Facebook SDK returned an error: ' . $e->getMessage();
            //exit;
             // include 'error.php';
          }

          $graphNode = $response->getGraphNode();

          //echo 'Photo ID: ' . $graphNode['id'];

          // Display Image
          echo '<div class="row">'
        . '<div class="col-md-10"><div class="image"><img src="img/temp/'.$userNode->getName().'.png" alt="img/test_cover1.png" /></div></div>'
                  . '</div>';

          /* Destroy the image from memory */
          imagedestroy($img_src_or);
          imagedestroy($img_dest);
          imagedestroy($img_src_resize);

          /* Delete saved cover photo to save memory */

        }

        ?>
        
       
        
        <div class="row">
             <div class="col-md-4">
                 Enter the Message
                 <div class="post">
                     <form action="postImage.php" method="GET">
                         <div class="form-group">
                              <input type="text" class="form-control" name="msg" id="usr" value="Iam part of the RED REVOLUTION what are you waiting for Join NOW click here  http://54.69.143.54/facebook/facebook_app/">
                          </div>
                     Show Your Support. Post this Image in your Facebook Timeline<br />
                     <input class="fb" type="submit" value="Post Now" />
                     </form>
                 </div>
             </div>
        </div>

        
    </body>
</html>