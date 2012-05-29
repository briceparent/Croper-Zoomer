<?php
$width = $_GET['width'] * 2 * 1.2;
$left = ((int) $_GET['marginLeft']) * 2 * 1.2;
$top = ((int) $_GET['marginTop']) * 2 * 1.2;
$destWidth = 1280 * 1.2;
$destHeight = 720 * 1.2;
$file = basename($_GET['file']);

$fileParts = explode('.',$file);
$ext = array_pop($fileParts);
if(in_array(strtolower($ext),array('jpg','jpeg'))){
	$image = imagecreatefromjpeg($_GET['file']);
}else{
	$image = imagecreatefrompng($_GET['file']);
}

$height = $width / imagesx($image) * imagesy($image);
$newImage = imagecreatetruecolor($width, $height);
imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image)); 

//echo  imagesx($image).'x'.imagesy($image).' -> '.$width.'x'.$height.'<br />';

$destImage = imagecreatetruecolor($destWidth, $destHeight);
imagecopy($destImage, $newImage, $left, $top, 0, 0,  imagesx($newImage), imagesy($newImage));
header('Content-Type: image/png'); 
header('Content-Disposition: attachment; filename="'.implode('.',$fileParts).'.png"');
imagepng($destImage);