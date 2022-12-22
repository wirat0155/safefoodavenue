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
     mysqli_close($con); 
     $image = imagecreatefrompng('../../assets/img/uploads/1659456825formalin400.png'); 


     header("Content-type: image/png");
     imagepng($image); 
     
?> 