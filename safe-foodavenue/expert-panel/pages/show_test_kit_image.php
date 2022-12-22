<?php
require ('../../php/config.php');

$menu_id = $_GET['menu_id'];
$fcl_id = $_GET['fcl_id'];

// echo $menu_id;
// echo $fcl_id;

function get_formalin($con, $menu_id, $fcl_id) {
    $sql = " SELECT * FROM sfa_formalin WHERE menu_id='$menu_id' AND fcl_id='$fcl_id' ";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    return $row;
}


$forData = get_formalin($con, $menu_id, $fcl_id);
// echo ">>>$forData<<<";
// print_r($forData);
//print_r($forData);
//$imgPath = $forData['for_img_path'];
// echo $imgPath;


// if (exif_imagetype($imgPath) == IMAGETYPE_JPEG){

//     $image = imagecreatefromjpeg('https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/assets/img/uploads/'.$imgPath);

//     // choose a color for the ellipse
//     $ellipseColor = imagecolorallocate($image, 0, 255, 0);

//     // draw the green ellipse
//     imageellipse($image, $forData['x_center_1'], $forData['y_center_1'], $forData['for_radius_1'], $forData['for_radius_1'], $ellipseColor);
//     imageellipse($image, $forData['x_center_2'], $forData['y_center_2'], $forData['for_radius_2'], $forData['for_radius_2'], $ellipseColor);

//     // Output the image
//     header("Content-type: image/jpeg");
//     imagejpeg($image);

// } elseif (exif_imagetype($imgPath) == IMAGETYPE_PNG){
    //echo '/home/web/manpower/public_html/safe-foodavenue/assets/img/uploads/'.$imgPath; 
    
    //$image = imagecreatefrompng('../../assets/img/uploads/'.$imgPath);
    //print_r($image);
    //echo '../../assets/img/uploads/'.$imgPath;
    
    // choose a color for the ellipse
    //$ellipseColor = imagecolorallocate($image, 0, 255, 0);
    
    // draw the green ellipse
    // imageellipse($image, $forData['x_center_1'], $forData['y_center_1'], $forData['for_radius_1'], $forData['for_radius_1'], $ellipseColor);
    // imageellipse($image, $forData['x_center_2'], $forData['y_center_2'], $forData['for_radius_2'], $forData['for_radius_2'], $ellipseColor);
    //imageellipse($image, 100,100,50,50, $ellipseColor);
    
    //$image_info = getimagesize($image);
    //print_r($image_info);
    
    // Output the image
    //header("Content-type: image/png");
    //imagepng($image); 
    
// }
$x1 = $forData['x_center_1']; 
$x2 = $forData['x_center_2']; 
$y1 = $forData['y_center_1']; 
$y2 = $forData['y_center_2'];
$r1 = $forData['for_radius_1']; 
$r2 = $forData['for_radius_2'];
$fn = $forData['for_img_path'];
header("location:circle_img.php?x1=$x1&y1=$y1&r1=$r1&x2=$x2&y2=$y2&r2=$r2&fn=$fn"); 
?> 
