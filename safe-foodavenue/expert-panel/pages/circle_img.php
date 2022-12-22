<?php
$imgPath = '../../assets/img/uploads/'.$_GET['fn'];
$name = $_GET['fn'];
$file_extension = substr($name , strripos($name, "."));

if ($file_extension == ".jpg" || $file_extension == ".jpeg" || $file_extension == ".JPG" || $file_extension == ".JPEG" ){

// if (exif_imagetype($imgPath) == IMAGETYPE_JPEG){
    
    $image = imagecreatefromjpeg($imgPath);

    // choose a color for the ellipse
    $ellipseColor = imagecolorallocate($image, 0, 255, 0);
    imagesetthickness($image, 30);

    // draw the green ellipse
    imageellipse($image, $_GET['x1'], $_GET['y1'], $_GET['r1']*2, $_GET['r1']*2, $ellipseColor);
    imageellipse($image, $_GET['x2'], $_GET['y2'], $_GET['r2']*2, $_GET['r2']*2, $ellipseColor);

    // Output the image
    header("Content-type: image/jpeg");
    imagejpeg($image);
}
 elseif ($file_extension == ".png" || $file_extension == ".PNG" ){
    
    $image = imagecreatefrompng($imgPath);
    
    // choose a color for the ellipse
    $ellipseColor = imagecolorallocate($image, 0, 255, 0);
    imagesetthickness($image, 30);
    
    // draw the green ellipse
    imageellipse($image, $_GET['x1'], $_GET['y1'], $_GET['r1']*2, $_GET['r1']*2, $ellipseColor);
    imageellipse($image, $_GET['x2'], $_GET['y2'], $_GET['r2']*2, $_GET['r2']*2, $ellipseColor);

    
    // Output the image
    header("Content-type: image/png");
    imagepng($image); 
    
}
?>