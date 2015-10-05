<?php
$img_dest = imagecreatefrompng('test_cover1.png');
$img_src_or = imagecreatefromjpeg('test_profile_picture1.jpg');
/* Transformamos el PNG para que sea más pequeño */
if(imagesx($img_src_or)<500){
    $width = 250;
    $height = (imagesy($img_src_or)*500)/imagesx($img_src_or);
}elseif(imagesy($img_src_or)<500){
    $height = 500;
    $width = (imagesx($img_src_or)*500)/imagesy($img_src_or);
}
$width=500;
$height=250;
$img_src_resize = imagecreatetruecolor( $width, $height );
imagealphablending( $img_src_resize, false );
imagesavealpha( $img_src_resize, true );
imagecopyresampled( $img_src_resize, $img_src_or, //dst_image, src_image
                    300, 0, //Coordenada x del punto de destino, Coordenada y del punto de destino
                    0, 0, //Coordenada x del punto de origen, Coordenada y del punto de origen
                    $width, $height, //Ancho del destino, Alto del destino
                    imagesx($img_src_or), imagesy($img_src_or) ); //Ancho original, Alto original
/**/
imagealphablending($img_dest, false);
imagesavealpha($img_dest, true);
imagecopymerge($img_src_resize,$img_dest,  //dst_image, src_image
                    0, 0, //Coordenada x del punto de destino, Coordenada y del punto de destino
                    0, 0, //Coordenada x del punto de origen, Coordenada y del punto de origen
                    $width, $height, //Ancho del original, Alto del original
                    0); //opacity
header('Content-Type: image/png');
imagejpeg($img_src_resize);
imagedestroy($img_src_or);
imagedestroy($img_dest);
?>