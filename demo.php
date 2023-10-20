<?php
session_start();
$con =mysqli_connect("localhost", "root", "", "phpform");
 if($con->connect_error){
    die("failed to connect : ".$con->connect_error);
}else{
    $token = $_SESSION['token'];
    // if(isset($_GET['token'])){
    //     $token = $_GET['token'];
        echo $token;
        // $verify_query = "select verify_token from alumni_signup where verify_token='$token' ";
        // $con =mysqli_connect("localhost", "root", "", "phpform");
        // $verify_query_run = mysqli_query($con,$verify_query);
    // }
}
?>