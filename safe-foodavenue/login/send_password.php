<?php
require_once '../php/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



    $email = $_POST["txtEmail"];
    $username = $_POST["txtUsername"];
    $sql = "SELECT * FROM sfa_user WHERE us_username = '".trim($_POST['txtUsername'])."'";
	$query =  mysqli_query($con,$sql);

	if(mysqli_num_rows($query) > 0){
		$token = rand(999999, 111111);
		$update_token = "UPDATE sfa_user SET us_password = '$token' WHERE us_username = '".trim($_POST['txtUsername'])."'";
        $query =  mysqli_query($con,$update_token);
		require ('../PHPMailer-master/src/PHPMailer.php');
		require ('../PHPMailer-master/src/Exception.php');
		require ('../PHPMailer-master/src/SMTP.php');
        //$mail = new PHPMailer(true);
		$mail = new PHPMailer;
		try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;            
            $mail->Username   = '62160096@go.buu.ac.th';
            $mail->Password   = 'zlatadarwpobsote';                    
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
			$mail->SMTPSecure = 'tls'; 
            $mail->Port       = 587;                           

            $mail->setFrom('62160096@go.buu.ac.th','Safe-FoodAvenue System');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset link from Safe-FoodAvenue System';
            $mail->Body    = "we got a request form you to reset Password! <br>Click the link bellow: <br>
            <a href='http://localhost/login/reset_password.php?email=$email&token=$token'>reset password</a>";

            $mail->send();
            echo "<script>
        alert('Send Reset Password Link to $email');
        window.location.href='../login/login.php';
      </script> "
        ;
                return true;
        } catch (Exception $e) {
                return false;
        }
		
	}else{
		echo "
        <script>
          alert('Username not exist!');
          window.history.back();
        </script>
      ";

		//echo "Username not exist!";
	}
 
	// $subject = "Password Reset Code";
    // $message = "Your password reset code is 12345";
    // $sender = "From: famedragon97@gmail.com";
	// mail($email, $subject, $message, $sender);
    //echo $email;
//     $strTo = "62160096@go.buu.ac.th";
// $strSubject = "Test Send Email";
// $strHeader = "From: webmaster@thaicreate.com";
// $strMessage = "My Body & My Description";
// $flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);  


    //print_r($objResult);
	// if(!$objResult)
	// {
	// 		echo "Not Found Username or Email!";
	// }
	// else
	// {
	// 		echo "Your password send successful.<br>Send to mail : ".$email;		

	//  		$strTo = $email;
	//  		$strSubject = "Your Account information username and password.";
	// 		$strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
	// 		$strHeader .= "From: webmaster@thaicreate.com\nReply-To: webmaster@thaicreate.com";
	// 		$strMessage = "";
	// 		$strMessage .= "Welcome : ".$objResult["us_fname"]."<br>";
	// 		$strMessage .= "Username : ".$objResult["us_username"]."<br>";
	// 		$strMessage .= "Password : ".$objResult["us_password"]."<br>";
	// // 		$strMessage .= "=================================<br>";
	// // 		$strMessage .= "ThaiCreate.Com<br>";
	//  		$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 

	// }
?>