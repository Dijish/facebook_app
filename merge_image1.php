<?php
$png = imagecreatefrompng('test_cover1.png');
$jpeg = imagecreatefromjpeg('test_profile_picture1.jpg');

list($width, $height) = getimagesize('test_profile_picture1.jpg');
list($newwidth, $newheight) = getimagesize('test_cover1.png.png');
$out = imagecreatetruecolor($newwidth, $newheight);
imagealphablending( $out, false );
imagesavealpha( $out, true );
imagecopyresampled($out, $jpeg, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagealphablending( $out, false );
imagesavealpha( $out, true );
imagecopyresampled($out, $png, 0, 0, 0, 0, $newwidth, $newheight, $newwidth, $newheight);
header('Content-Type: image/png');
imagejpeg($out, 'out.jpg', 100);
imagedestroy($png);
imagedestroy($jpeg);
?>