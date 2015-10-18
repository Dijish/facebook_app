<?php
/* This php initialise facebook app details like app id and secret id */

// Loading application configuration into Facbook\Facebook service.
$fb = new Facebook\Facebook([
      'app_id' => '',
      'app_secret' => '',
      'default_graph_version' => 'v2.4',
]);
?>
