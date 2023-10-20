<?php
session_start();
// error_reporting(0);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$con =mysqli_connect("localhost", "root", "", "phpform");

if(!empty($_POST['email'])){
    $email = $_POST['email'];
    $verify_token = sha1(rand());

    
    
    // $error='Invalid Credentials,Try again..!';

    
    if($con->connect_error){
        die("failed to connect : ".$con->connect_error);
    }else{
    $query = "select * from alumni_signup where email='$email' ";
    $result = mysqli_query($con,$query);
    
    if(mysqli_num_rows($result) == 1){
        echo '<script type="text/javascript">';
        echo 'alert("Email Already Exist \n We have already sent you a confirmation mail, Please check your Inbox");';
        echo 'window.location.href="signup.php"';
        echo '</script>';
    }else{
        

        function sendemail_verify($email,$verify_token){
            $mail = new PHPMailer(true);
            $mail->isSMTP();  
            $mail->SMTPAuth   = true; 
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->Username   = 'krishnavenkat153@gmail.com';                    //SMTP username
            $mail->Password   = 'fctlzwzqblicskpx';
            $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
            $mail->Port       = 587; 
            
            $mail->setFrom('krishnavenkat153@gmail.com');
            $mail->addAddress($email);
    
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email verification from IIITDM , kurnool';
    
            $email_template = "
                <p>Hi Dear,</p>
                <h2>You have Registered in IIITDM Kurnool Alumni Portal</h2>
                <h4>To Complete the Registration Process, Click on the below link</h4>
                <br />
                <a href='http://localhost/alumni%20iiitdm/registration.php?token=$verify_token'>http://localhost/alumni%20iiitdm/registration.php?token=$verify_token</a> 
                <br />
                <p><b>Note:</b>By clicking the above link , you will be redirected to Registration page, Overthere you need to fill all your details and then your account will be <b>Approved</b> by the Admin within 24 hours , After approval you can able to login with your credentials</p>
                <br />
                <p>Thanks and Regards,</p>
                <h4>Indian Institute of Information Technology<br />Design and Manufacturing, Kurnool</h4>
            ";
    
            $mail->Body  = $email_template;
            $mail->send();
            // echo 'Message has been sent';

            $con =mysqli_connect("localhost", "root", "", "phpform");
            $query1 = "insert into alumni_signup(email,verify_token) values('$email','$verify_token')";
        mysqli_query($con, $query1);
    
        }
        sendemail_verify("$email","$verify_token");
        echo "<script>";
        echo 'alert("Please check your email \n To complete your Registration process");';
        echo "window.location.href='signup.php' ";
        echo "</script>";

    }

    
}
}      
?>