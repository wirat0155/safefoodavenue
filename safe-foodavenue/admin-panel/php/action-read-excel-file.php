<meta charset="UTF-8">
<?php 
    // //session_start(); 
    // require_once 'Classes/PHPExcel.php';
    // /** PHPExcel_IOFactory - Reader */
    // include 'Classes/PHPExcel/IOFactory.php';
    // require '../../php/config.php';
    
    
    // /*function is_owner_duplicated($con, $fname, $lname){
    //     $sql = "SELECT * FROM sfa_entreprenuer WHERE ent_firstname"
    // }*/
    // function insert_block($con, $data){
    //     $sql = "INSERT INTO sfa_block(`block_title`) VALUES ('$data')"; 
    //     $query = mysqli_query($con, $sql); 
    //     if($query){
    //         echo "Success!"; 
    //         return true; 
    //     }
    //     else{
    //         echo "Error! ". $sql . "<br>";  
    //         return false;
    //     }
    // }
    // function insert_catagory($con, $data){
    //     $sql = "INSERT INTO sfa_res_category(`res_cat_title`) VALUES ('$data')"; 
    //     $query = mysqli_query($con, $sql); 
    //     if($query){
    //         echo "Success!"; 
    //         return true; 
    //     }
    //     else{
    //         echo "Error! ". $sql . "<br>";  
    //         return false;
    //     }
    // }
  
    // function insert_people($con, $data){
    //     foreach ($data as $result) { 
    //         $fname = $result["ชื่อ"];
    //         $lname = $result["นามสกุล"];  
    //         $title =  $result["คำนำหน้า"]; 
    //         $tel = $result["เบอร์โทร"];
            
    //         $sql = "  INSERT INTO `sfa_entrepreneur`(`ent_title`, `ent_firstname`, `ent_lastname`, `ent_tel`) VALUES ('$title', '$fname', '$lname', '$tel')"; 
    //         $query = mysqli_query($con, $sql); 
    //     } 
    // }
    // function get_ent_id($con, $fname, $lname){
    //     $sql = "SELECT * FROM sfa_entrepreneur WHERE ent_firstname = '$fname' AND ent_lastname = '$lname'"; 
    //     $query = mysqli_query($con, $sql); 
    //    // echo $sql."<br>";
    //     $id = mysqli_fetch_array($query); 
    //     return $id["ent_id"];  
    // }
    // function get_cat_id($con, $cat){
    //     $sql = "SELECT * FROM sfa_res_category WHERE res_cat_title = '$cat'"; 
    //     //echo $sql. "<br>";
    //     $query = mysqli_query($con, $sql); 
    //     $id = mysqli_fetch_array($query); 
    //     return $id["res_cat_id"];  
    // }
    // function get_block_id($con, $block){
    //     $sql = "SELECT * FROM sfa_block WHERE block_title = '$block'"; 
    //     $query = mysqli_query($con, $sql); 
    //     $id = mysqli_fetch_array($query); 
    //     return $id["block_id"];  
    // }

    //    /* $stdFile = $_FILES["stdFile"];
    //     //echo $stdFile["name"]."<br>"; 
    //     if(move_uploaded_file($stdFile["tmp_name"],"./temp/".$stdFile["name"]))
    //     {*/
    //         //echo "Copy/Upload Complete"." ".$stdFile["name"];
    //         //$inputFileName = "./temp/".$stdFile["name"];  
    //         $inputFileName = "./uploads/Book002.xlsx";  
    //         $inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
    //         $objReader = PHPExcel_IOFactory::createReader($inputFileType);  
    //         $objReader->setReadDataOnly(true);  
    //         $objPHPExcel = $objReader->load($inputFileName);  
            
    //         $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
    //         $highestRow = $objWorksheet->getHighestRow();
    //         $highestColumn = $objWorksheet->getHighestColumn();
            
    //         $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
    //         $headingsArray = $headingsArray[1];
            
    //         $r = -1;
    //         $namedDataArray = array();
    //         //$highestRow = 20;
    //         for ($row = 2; $row <= $highestRow; ++$row) {
    //             $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    //             if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
    //                 ++$r;
    //                 foreach($headingsArray as $columnKey => $columnHeading) {
    //                     $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
    //                     //echo $dataRow[$row][$columnKey]." ";
    //                     //insert_catagory($con, $dataRow[$row][$columnKey]); 
    //                 }
                  
    //             }
    //         }
    //        // insert_people($con,$namedDataArray);
        
    //         foreach ($namedDataArray as $result) {
              
    //             $fname = $result["ชื่อ"];
    //             $lname = $result["นามสกุล"];  
    //             $title =  $result["คำนำหน้า"]; 
              
    //             $rest = $result["ชื่อร้าน"]; 
    //             $block = $result["สถานที่จำหน่ายสินค้า"]; 
    //             $type = $result["กลุ่มประเภท"]; 
    //             $food = $result["ประเภทสินค้า"]; 
               
    //             $tel = $result["เบอร์โทร"]; 
    //             $address = $result["ที่อยู่"]; 
               
    //             $assistant = $result["ชื่อไม่มีนามสกุล(ผู้ช่วย)"]; 
               
    //             $permit = $result["เลขที่ใบอนุญาต"];
               
    //             $permit_date = $result["วันที่ต่อใบอนุญาต"]; 
              
           
    //             $pid = get_ent_id($con, $fname, $lname); 
               
    //             $bid = get_block_id($con, $block);
              
    //             $cid = get_cat_id($con,  $type);  
            
               
                
    //             $sql = "INSERT INTO `sfa_restaurant`(`res_title`, `res_description`, `res_address`, `res_status`, `res_cat_id`, `res_block_id`, `res_permit`, `res_permit_date`, `ent_id`, `res_assistant`) VALUES ('$rest', '$food', '$address', '1', $cid, $bid, '$permit', '$permit_date', $pid, '$assistant')";  
    //             echo $sql ."<br><br>";
    //             $query = mysqli_query($con, $sql); 
    //             //echo $fname. " " . $lname. "<br>"; 
    //         }
?>
    