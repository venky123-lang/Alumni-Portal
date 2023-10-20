<?php
session_start();
// error_reporting(0);

// function randomize(){
//     $max = 10;
//     $key = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
//     $len = strlen($key);
//     $random = '';
//     for($i=0;$i<$max;$i++)
//     $random.=$key[rand(0,$len)];
//     return $random;
// }
// echo randomize();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$randomString = "Wkv10fjkq9";
$con =mysqli_connect("localhost", "root", "", "phpform");

if(isset($_POST['submit'])){
    if($con->connect_error){
        die("failed to connect : ".$con->connect_error);
    }else{

if(!empty($_POST['fname']) && !empty($_POST['gender']) && !empty($_POST['alternative_email']) && !empty($_POST['mobile_number']) && !empty($_POST['create_password']) && !empty($_POST['confirm_password']) && !empty($_POST['program']) && !empty($_POST['dept']) && !empty($_POST['YOP'])){
    $fname = $_POST['fname'];
    $gender = $_POST['gender'];
    $alternative_email = $_POST['alternative_email'];
    $mobile_number = $_POST['mobile_number'];
    $create_password = sha1($_POST['create_password']).$randomString;
    $confirm_password = sha1($_POST['confirm_password']).$randomString;
    $program=$_POST['program'];
    $dept=$_POST['dept'];
    $YOP=$_POST['YOP'];
    $student_image = addslashes(file_get_contents($_FILES['student_image']['tmp_name']));

    $token = $_SESSION['token'];
    $verify_query = "select * from alumni_signup where verify_token='$token' ";
    $verify_query_run = mysqli_query($con,$verify_query);
    if(mysqli_num_rows($verify_query_run) > 0){
            $row = mysqli_fetch_array($verify_query_run);
            $email = $row['email'];
        }else{
            echo '<script type="text/javascript">';
            echo 'alert("Invalid Mail");';
            echo 'window.location.href="login.php"';
            echo '</script>';
        }
    

    function sendemail_verify($fname,$email){
        $mail = new PHPMailer(true);
        $mail->isSMTP();  
        $mail->SMTPAuth   = true; 
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->Username   = 'krishnavenkat153@gmail.com';                    //SMTP username
        $mail->Password   = 'fctlzwzqblicskpx';
        
        $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
        $mail->Port       = 587; 
        
        $mail->setFrom('krishnavenkat153@gmail.com', $fname);
        $mail->addAddress($email);

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Confirmation of Registration from IIITDM , kurnool';

        $email_template = "
            <p>Hi $fname ,</p>
            <h2>You have successfully completed your Registration by filling all your details in IIITDM Kurnool Alumni Portal</h2>
            <p>We have received your request to register in Alumni portal, <br />Please be patience, your request is now under <b>Pending</b> for Approval, your profile will be Verified  and Approved by us within 24 hours.</p>
            <p><b>Note*:</b>You will Receive a confirmation mail when your account has been Approved by us, Stay Up To Date</p>
            <br />
            <p>Thanks and Regards,</p>
            <h4>Indian Institute of Information Technology<br />Design and Manufacturing, Kurnool</h4>
        ";

        $mail->Body  = $email_template;
        $mail->send();
        // echo 'Message has been sent';

    }
        // sendemail_verify("$fname","$email");
        // echo "fine";
    
    // $error='Invalid Credentials,Try again..!';
        
                if($row['status']=="pending"){
                    $clicked_token = $row['verify_token'];
                    $insert_query = "update alumni_signup set student_image='$student_image',fname='$fname',gender='$gender',alternative_email='$alternative_email',mobile_number='$mobile_number',create_password='$create_password',confirm_password='$confirm_password',program='$program',dept='$dept', YOP='$YOP' where verify_token ='$clicked_token'  ";
                    $insert_query_run = mysqli_query($con,$insert_query); 
                    sendemail_verify("$fname","$email");
        
                    if($insert_query_run){
        
                        echo '<script type="text/javascript">';
                        echo 'alert("You have successfully Completed your Registration \n Your Profile will be Approved by us within 24 hours \n Please check you mail");';
                        echo 'window.location.href="login.php"';
                        echo '</script>';
                    }else{
                        echo '<script type="text/javascript">';
                        echo 'alert("You are not allowed to Register , Please contact Admin!");';
                        echo 'window.location.href="login.php"';
                        echo '</script>';
                    }
        
                }else{
                    echo '<script type="text/javascript">';
                    echo 'alert("You have already Completed your Registration \n Please login if your profile has been Approved by us");';
                    echo 'window.location.href="login.php"';
                    echo '</script>';
                }

        }else{
            echo '<script type="text/javascript">';
            echo 'alert("Invalid Token");';
            echo 'window.location.href="login.php"';
            echo '</script>';
        }
}
}   
?>