<?php
/* This php initialise facebook app details like app id and secret id */

// Loading application configuration into Facbook\Facebook service.
$fb = new Facebook\Facebook([
      'app_id' => '1712133062349873',
      'app_secret' => '1ab488e6a270df785b19ad2883ec46ec',
      'default_graph_version' => 'v2.4',
]);
?>