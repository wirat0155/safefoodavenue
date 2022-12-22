<?php 
  echo "<pre>";
  print_r($_FILES);
  echo "</pre>";

  // if(count($_FILES) > 0){

    $endpoint = 'https://prepro.informatics.buu.ac.th/formalinapp_api/upload';
    
    $file_data = $_FILES["fileUpload"]["name"];
    $file_data = basename("../../assets/img/theme/angular.jpg");

    echo "<pre>";
    print_r($file_data);
    echo "</pre>";
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $endpoint,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('files[]'=> new CURLFILE($file_data)),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    echo "<pre>";
    print_r($response);
    echo "</pre>";

  // }

?>