<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>



<?php

    $CompanyName=$_POST['txtCName'];
    $Email=$_POST['txtEmail'];
    $Mobile=$_POST['txtMobile'];
    $Password=$_POST['txtPassword'];
    $Question=$_POST['cmbQue'];
    $Answer=$_POST['txtAnswer'];
    $Status="Pending";
    $UserType="Employer";

    // Establish Connection with MYSQL
    $conn = new mysqli("localhost","root","","chakri");
 // Check connection
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$sql = "SELECT * FROM employer_reg WHERE Email='$Email'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    echo '<script type="text/javascript">alert("Email Already Exists!!!");window.location=\'registration.php\';</script>';
    
}else{

    // Specify the query to Insert Record
    $sql = "insert into employer_reg(CompanyName,Email,Mobile,Password,Question,Answer,Status) values(
    '".$CompanyName."','".$Email."',".$Mobile.",'".$Password."','".$Question."','".$Answer."','".$Status."')";
    
   //Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'chakrieu@gmail.com ';                     //SMTP username
    $mail->Password   = 'chakri1234';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('chakrieu@gmail.com', 'Chakri Chai');
    $mail->addAddress('chakrisecondary@gmail.com', 'Admin');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email From Chakri Chai';
    $mail->Body    =  $_POST['txtCName']." has registered to Chakri chai. Please check the registration";

    $mail->send();
    //echo '<b>Message has been sent</b>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
if ($conn->query($sql) === TRUE) {  
    echo '<script type="text/javascript">alert("Registration Succesfully and we will confirm you about of your login");window.location=\'index.php\';</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} 
    
    // execute query
    
    mysqli_query ($con,$sql);
    // Close The Connection
    mysqli_close ($con);

   

?>
</body>
</html>