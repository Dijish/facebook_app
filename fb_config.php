<?php
/* This php initialise facebook app details like app id and secret id */

// Loading application configuration into Facbook\Facebook service.
$fb = new Facebook\Facebook([
      'app_id' => '1712101509019695',
      'app_secret' => '38ecfe39ef76105b07724794ce7916de',
      'default_graph_version' => 'v2.4',
]);
?>
