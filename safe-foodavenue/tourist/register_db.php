<?php
     //session_start();
     require("../php/config.php");
      $gender=$_POST["gender"];
      $birthdate=$_POST["birthdate"];
      $id_card=$_POST["id_card"];
      $tel=$_POST["tel"];
      // $username=$_POST["username"];
      // $password=$_POST["password"];
      // $prefix=$_POST["prefix"];
      $prefix = $_POST["us_pre_id"];
      $fname = $_POST["us_fname"];
      $lname = $_POST["us_lname"];
      // $role = $_POST["role_id"]; 
      $username = $_POST["us_username"]; 
      $password = $_POST["us_password"];
      
      $sql = "INSERT INTO `sfa_user`(`us_fname`, `us_lname`, `us_username`, `us_password`, `us_role_id`, `us_pre_id`) 
             VALUES ('$fname' ,'$lname','$username','$password',3,'$prefix');
             INSERT INTO `sfa_tourist` (`tour_idcard`, `tour_gender`, `tour_birthday`, `tour_tel`)
         VALUES ('$id_card','$gender','$birthdate','$tel')"; 
      $query = mysqli_multi_query($con, $sql); 
      // $sql2 = 
      //   "INSERT INTO `sfa_tourist` (`tour_id_card`,`tour_gender`,`tour_birthday`,`tour_tel`)
      //    VALUES ('$id_card','$gender','$birthdate','$tel')";
      // $query2 = mysqli_query($con, $sql2);
     if($query){
          echo "
          <script>
            alert('Register Success');
          </script>
        ";
     }else{
          echo "
          <script>
            alert('Register Fail');
            window.history.back();
          </script>
        ";
        return;
     }
      
      header("location: https://prepro.informatics.buu.ac.th/~manpower/safe-foodavenue/");
     
 ?>