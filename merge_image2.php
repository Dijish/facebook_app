<?php
$img_dest = imagecreatefrompng('test_cover1.png');
$img_src_or = imagecreatefromjpeg('test_profile_picture1.jpg');
$width=500;
$height=250;

imagecopyresampled( $img_src_or,$img_dest, //dst_image, src_image
                    0, 0, //Coordenada x del punto de destino, Coordenada y del punto de destino
                    0, 0, //Coordenada x del punto de origen, Coordenada y del punto de origen
                     //Ancho del destino, Alto del destino
                    imagesx($img_src_or), imagesy($img_src_or),
                    imagesx($img_dest), imagesy($img_dest)); //Ancho original, Alto original

header('Content-Type: image/png');
imagepng($img_src_or);
imagedestroy($img_src_or);
imagedestroy($img_dest);
?>