<?php 
session_start();
require_once("header.php");
$page_title="Login";
error_reporting(0);
// $error= $_SESSION['error'];
 ?>

   <div class="login-main">

    <div class="login-container">
           
        <div class="brand-logo"><img src="img/logomin.png" alt="" width="90px" height="90px" style="margin-top: 5px;"></div>

        <div class="brand-title"><b>Alumni SignIn</b></div>
        <div class="inputs">
            
		<form action="login-logic.php" method="POST"><p>
          <label class="login-label">E-mail</label>
          <input type="email" name="email" value="" placeholder="Enter your email" class="login-input" required />
          <label class="login-label">Password</label>
          <input type="password" name="password" value="" placeholder="Enter password" class="login-input" required />
          <button type="submit" name="submit" class="login-btn">SignIn</button>
          <p>&nbsp;</p>
          <p>Not Yet Registered? <a href="signup.php"><u>SignUp</u></a></p>
		  </form>
        </div>
      </div>
    </div>
    

    



<?php 
require_once("footer.php");
 ?>