<?php 
  session_start();
  ob_start();
  require("../php/config.php"); 
  
  $sql = "
    SELECT * 
    FROM sfa_user
    WHERE us_username	= '".trim($_POST["txtUsername"])."'
    AND us_password	= '".trim($_POST["txtPassword"])."'

  ";
  $result = mysqli_query($con, $sql);

  
  if(mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_array($result);


    $_SESSION["id_user"] = $row["us_id"];
    $_SESSION["name"] = $row["us_fname"] . " " . $row["us_lname"];
    $_SESSION["username"] = $row["us_username"];
    $_SESSION["password"] = $row["us_password"];
    $_SESSION["role"] = $row["us_role_id"];
    
    // echo $_SESSION["username"];
    // echo $_SESSION["role"];
    if($_SESSION["role"] ==1){
      //หน้าจอของผู้ดูแลระบบ
      echo("<script>location.href = '../admin-panel/';</script>");
      // header("location: ../admin-panel/");
    } else if($_SESSION["role"] == 2){
       //หน้าจอของผู้เชี่ยวชาญ
      header("location: ../expert-panel/");
    } else if($_SESSION["role"] == 4){
      // หน้าจอของผู้ประกอบการ
    }elseif ($_SESSION["role"] == 5){
      // หน้าจอของเทศบาล
      header("location: ../local-gov/");
    } 
    else {
      //กรณีไม่ใช่ role หลักที่มีส่วนสำคัญในระบบ (ผู้ดูแลระบบ ผู้เชี่ยวชาญ เทศบาล(อยู่ในระหว่างการพัฒนา) ผู้ประกอบการ(ถ้ามี อยู่ในระหว่างการพัฒนา)) จะถูกส่งไปหน้านักท่องเที่ยวทั้งหมด
      header("location: ../tourist/?content=disp-block-map");
    }

    // if(isset($_POST["login"])) {
    //   $_SESSION["is_login"] = $_POST["login"];
    // }

  } else {
    $api_url = 'https://prepro.informatics.buu.ac.th/team2/Tourist/Auth/Login_tourist/login_tourist_api/'.trim($_POST["txtUsername"]).'/'.trim($_POST["txtPassword"]);

    $json_data = file_get_contents($api_url);

    $response_data = json_decode($json_data);
    if($response_data){
      $_SESSION["id_tourist"] = $response_data->tus_id;
      $_SESSION["username"] = $response_data->tus_firstname. " " . $response_data->tus_lastname;
    

      if(isset($_POST["login"])) {
        $_SESSION["is_login"] = $_POST["login"];
      }
    }else{
      echo "
        <script>
          alert('เข้าสู่ระบบไม่สำเร็จ');
          window.history.back();
        </script>
      ";

      return;
    }

    header("location: ../tourist/?content=list-restaurant");
  }

  

?>