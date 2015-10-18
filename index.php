<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to GECW Election Campaign</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/fbButton.css" />
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
        
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        
        <script src="js/bootstrap.min.css"></script>
        <script src="js/jumbotron.css"></script>
        <script src="js/grid.css"></script>
    </head>
    <body>
        
        <?php include 'header.php'; ?>
        
        <?php
        define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook-sdk-v5/');
        require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

        session_start();

        require 'fb_config.php';

        require 'fb_login.php';

        echo '<div class="row">'
        . '<div class="col-md-12">'
                . '<a class="fbButton" href="'.$loginUrl.'" class="button"><input class="fb" type="button" value="Login With Facebook" /></a>'
                . '</div>'
                . '</div>'
        ?>

    </body>
</html>
