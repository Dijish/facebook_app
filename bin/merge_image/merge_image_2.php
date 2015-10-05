<?php
$img_dest = imagecreatefrompng('test_cover1.png');
$img_src_or = imagecreatefromjpeg('test_profile_picture1.jpg');

/* Below width and height is the total width and height of merged image */
$width=500;
$height=250;

/* Make a resize image of specified width and height */
$img_src_resize = imagecreatetruecolor( $width, $height );

/* Copy the profile picture on the right end of reaized image */
imagecopyresampled( $img_src_resize, $img_src_or, //dst_image, src_image
                    300, 0, //Co-ordiante to position image on resized image
                    0, 0, //Co-ordiante of resize image to show
                    imagesx($img_src_resize), imagesy($img_src_resize), //Width and height of resize
                    imagesx($img_src_or), imagesy($img_src_or) ); //Width and height of src image

/* Copy the cover photo in the left end of resized image containing the profile picture */
imagecopyresampled( $img_src_resize,$img_dest, //dst_image, src_image
                    0, 0, //Co-ordinate of resize where dest image to be placed
                    0, 0, //Co-ordinate of resize to be shown
                    imagesx($img_src_resize), imagesy($img_src_resize),//Width and height of resize
                    imagesx($img_dest), imagesy($img_dest)); //Width and height of dest image

/* Display the image */
header('Content-Type: image/png');
imagepng($img_src_resize);

/* Destroy the image from memory */
imagedestroy($img_src_or);
imagedestroy($img_dest);
imagedestroy($img_src_resize);
?>