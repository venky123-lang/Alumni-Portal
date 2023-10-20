<?php 
require_once("header.php");

error_reporting(0);
if(!empty($_POST['username']) && !empty($_POST['password'])){
    $adminusername = $_POST['username'];
    $adminpassword=$_POST['password'];
    $error='Invalid Credentials,Try again..!';

    if(isset($_POST['submit'])){
            if($adminusername=="admin"){
                if($adminpassword=="admin"){
                    $error='';
                    $success='welcome';
                    header("location: ./admin_panel/index.php");
                }
                else{
                    $error="Invalid password, Please try Again..!";
                    $success="";
                }
            }
            else{
                $error="Invalid username, Please try Again..!";
                $success="";
            }
        }
}


 ?>

   <div class="login-main">

    <div class="login-container">
           
        <div class="brand-logo"><img src="img/logomin.png" alt="" width="90px" height="90px" style="margin-top: 5px;"></div>

        <div class="brand-title"><b>Admin LogIn</b></div>
        <div class="inputs">
            
		<form action="./admin_login.php" method="POST"><?php echo "<div style='color: red;'>$error</div>"; ?><p>
          <label class="login-label">Username</label>
          <input type="text" name="username" value="" placeholder="Enter your username" class="login-input" required />
          <label class="login-label">Password</label>
          <input type="password" name="password" value="" placeholder="Enter password" class="login-input" required />
          <button type="submit" name="submit" class="login-btn">Enter</button>
		  </form>
        </div>
      </div>
    </div>
    

    



<?php 
require_once("footer.php");
 ?>