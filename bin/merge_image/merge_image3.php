<?php
$img_dest = imagecreatefrompng('test_cover1.png');
$img_src_or = imagecreatefromjpeg('test_profile_picture1.jpg');
$width=500;
$height=250;
$to_crop_array = array('x' =>300 , 'y' => 0, 'width' => 500, 'height'=> 250);
$thumb_im = imagecrop($im, $to_crop_array);
$img_src_resize = imagecreatetruecolor( $width, $height );
imagecopyresampled( $img_src_resize, $img_src_or, //dst_image, src_image
                    250, 0, //Coordenada x del punto de destino, Coordenada y del punto de destino
                    0, 0, //Coordenada x del punto de origen, Coordenada y del punto de origen
                    $width, $height, //Ancho del destino, Alto del destino
                    imagesx($img_src_or), imagesy($img_src_or) ); //Ancho original, Alto original
imagecopyresampled( $img_dest,$img_src_resize, //dst_image, src_image
                    0, 0, //Coordenada x del punto de destino, Coordenada y del punto de destino
                    0,0, //Coordenada x del punto de origen, Coordenada y del punto de origen
                     //Ancho del destino, Alto del destino
                    imagesx($img_dest), imagesy($img_dest),
					imagesx($img_src_resize), imagesy($img_src_resize)); //Ancho original, Alto original

header('Content-Type: image/png');
imagepng($img_src_resize);
imagedestroy($img_src_or);
imagedestroy($img_dest);
?>