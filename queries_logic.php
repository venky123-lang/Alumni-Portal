<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $query = $_POST['query'];

    $con = mysqli_connect("localhost","root","","phpform");
    $insert_query = "insert into alumni_queries (name,email,mobile_number,query) values ('$name','$email','$mobile_number','$query')";
    $insert_query_run = mysqli_query($con,$insert_query);

    if($insert_query_run){
        echo "<script>";
        echo 'alert("Your Query sent successfully \n We will respond to your query within 24hrs");';
        echo "window.location='index.php'";
        echo "</script>";
    }



}



?>