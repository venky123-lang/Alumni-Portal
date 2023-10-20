<?php
session_start();
require_once("header.php");
$page_title="Compelete Registration";
// error_reporting(0);

// $error= $_SESSION['error'];

// function randomize(){
//   $max = 10;
//   $key = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
//   $len = strlen($key);
//   $random = '';
//   for($i=0;$i<$max;$i++)
//   $random.=$key[rand(0,$len)];
//   return $random;
// }
// echo randomize();
if(isset($_GET['token'])){
    $token = $_GET['token'];
    
    $_SESSION['token'] = $token;
}
?>


<div class="login-main">
        <div class="login-container-reg-form">  
                <div class="brand-title">
                    <b>Registration</b>
                </div>
                    <div class="inputs">
                        <form action="registration-logic.php" method="POST" class="form" id="form" enctype="multipart/form-data">
                           <div class="reg-form-flex">
                                <div class="left-container form-control">
                                    <label class="login-label">Full Name</label>
                                    <input type="text" name="fname" id="fname" value="" placeholder="Enter your name" class="login-input"  />
                                    <i class="fa fa-check-circle"></i>
                                    <i class="fa fa-exclamation-circle"></i>
                                    <small>Error message</small>
                                </div>
                                <div class="left-container form-control">
                                    <label class="login-label">Gender</label>
                                    <select name="gender" id="gender" class="gender login-input">
                                        <option value="">--select--</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="not_mentioned">Prefer not to say</option>
                                    </select>
                                    <i class="fa fa-check-circle"></i>
                                    <i class="fa fa-exclamation-circle"></i>
                                    <small>Error message</small>
                                </div>
                           </div>
                            <div class="reg-form-flex">
                                <div class="left-container form-control">
                                    <label class="login-label">Alternative E-mail</label>
                                    <input type="email" name="alternative_email" id="alternative_email" placeholder="Enter your email" class="login-input"  />
                                    <i class="fa fa-check-circle"></i>
                                    <i class="fa fa-exclamation-circle"></i>
                                    <small>Error message</small>
                                </div>
                                <div class="right-container form-control">
                                    <label class="login-label">Mobile Number</label>
                                    <input type="number" name="mobile_number" id="mobile_number" value="" placeholder="Enter your mobile_number" class="login-input"  />
                                    <i class="fa fa-check-circle"></i>
                                    <i class="fa fa-exclamation-circle"></i>
                                    <small>Error message</small>
                                </div>
                        </div>
                        <div class="reg-form-flex">
                            <div class="left-container form-control">
                                <label class="login-label">Create Password</label>
                                <input type="password" name="create_password" id="create_password" value="" placeholder="create your password" class="login-input"  />
                                <i class="fa fa-eye eye-icon"></i>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                            <div class="right-container form-control">
                                <label class="login-label">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" value="" placeholder="Re-Enter password" class="login-input"  />
                                <i class="fa fa-eye eye-icon"></i>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                        </div>
                        <div class="reg-form-flex">
                            <div class="left-container form-control">
                                <label class="login-label">Program</label>
                                <select name="program" id="program" class="program"  onchange=changeDropdownValue(this.value)>
                                    <option value="" disabled selected>--select--</option>
                                    <option value="BTech">B.Tech</option>
                                    <option value="MTech">M.Tech</option>
                                    <option value="PHD">Phd</option>
                                </select>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                            <div class="right-container form-control">
                                <label class="login-label">Department</label>
                                <select name="dept" id="dept" class="program" >
                                    <option value="" disabled selected>--select--</option>
                                </select>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                        </div>

                        <div class="reg-form-flex">
                            <div class="right-container form-control">
                                <label class="login-label">Year of Pass</label>
                                <select name="YOP" id="YOP" class="gender login-input" >
                                    <option value="">--select--</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                </select>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                            <div class="left-container form-control">
                                <label class="login-label" for="student_image">Profile Photo</label>
                                <input type="file" name="student_image" id="student_image" class="login-input" />
                                
                            </div>
                            
                        </div>

                           <button type="submit" name="submit" class="login-btn">Complete Registration</button>
                        </form>
                    </div>
        </div>
    </div>
    <script>
        var commonValues ={
            BTech : ["CSE","ECE","CIVIL","MECH","EEE"],
            MTech :["CIVIL","CSE","CHEMICAL","VLSI","ELECTRICAL"],
            PHD : ["Physics","Chemistry","Mathematics","Bio-Sciences","Economics"]
        }
        
        function changeDropdownValue(value){
            if(value.length == 0){
                document.getElementById("dept").innerHTML = "<option></option>";
            }else{
                var commonOptions = "";
                commonOptions +=" <option value=''>--select--</option>"
                for(categoryID in commonValues[value]){
                    commonOptions +=" <option> " + commonValues[value][categoryID] + "</option>"
                }
                document.getElementById("dept").innerHTML = commonOptions
            }
        }
        </script>
        <script src="js/form-validation.js"></script>
<?php 
require_once("footer.php");
?>