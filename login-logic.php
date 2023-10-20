<?php
session_start();
// error_reporting(0);

$randomString = "Wkv10fjkq9";

if(!empty($_POST['email']) && !empty($_POST['password'])){
    $email = $_POST['email'];
    $password=sha1($_POST['password']).$randomString;

    $con =mysqli_connect("localhost", "root", "", "phpform");
    if($con->connect_error){
        die("failed to connect : ".$con->connect_error);
    }else{
    $query_approved = "select * from alumni_signup where email='$email' && confirm_password='$password' && status='Approved'  ";
    $data_approved = mysqli_query($con,$query_approved);
    $approved = mysqli_num_rows($data_approved);

    $query_rejected = "select * from alumni_signup where email='$email' && confirm_password='$password' && status='Rejected'  ";
    $data_rejected = mysqli_query($con,$query_rejected);
    $rejected = mysqli_num_rows($data_rejected);

    $query_pending = "select * from alumni_signup where email='$email' && confirm_password='$password' && status='pending'  ";
    $data_pending = mysqli_query($con,$query_pending);
    $pending = mysqli_num_rows($data_pending);

    if($approved == 1){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("location: student_panel/index.php");
    }elseif($rejected == 1){
        echo '<script type="text/javascript">';
        echo 'alert("Your Profile was Rejected \n Try to contact Admin!");';
        echo 'window.location.href="login.php"';
        echo '</script>';  
    }elseif($pending == 1){
        echo '<script type="text/javascript">';
        echo 'alert("Your profile is still in pending \n wait for a while!");';
        echo 'window.location.href="login.php"';
        echo '</script>';  
    }else{
        echo '<script type="text/javascript">';
        echo 'alert("Invalid Email/Password");';
        echo 'window.location.href="login.php"';
        echo '</script>';  
        exit();
        // echo "incorrect username/password";
    }
}
}      
?>