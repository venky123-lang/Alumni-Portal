<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php if(!empty($page_title)){ echo $page_title.' - '; } ?> Alumni-IIITDM, Kurnool</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="img/logomin.png" type="image/x-icon">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <header class="top-header">
        <div>
        <a href="index.php"><img src="img/alumni_logo.png" alt="" width="600px" height="100px" class="logo-img" /></a>
        </div>
        <div class="top-header-right-div">
        <a href="login.php" class="button-30">SignUp / SignIn</a>
        </div>

    </header>
    <header class="main-header">
        <div class="container">
            <input type="checkbox" name="" id="check">
            
            <div class="logo-container">
                <h3 class="logo">Alumni IIITDM,  knl</h3>
                <h3 class="login_signup_btn"><a href="signup.php" class="login_signup_anchor">SignUp::SignIn</a></h3>
            </div>

            <div class="nav-btn">
                <div class="nav-links">
                    <ul>
                        <li class="nav-link" style="--i: .6s">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="nav-link" style="--i: 0.8s">
                            <a href="./about-alumni-relations.php">About</a>
                        </li>
                        <li class="nav-link" style="--i: 1.0s">
                            <a href="./scholarships.php">Scholarships</a>
                        </li>
                        <li class="nav-link" style="--i: 1.2s">
                            <a href="./photo-gallery.php">Gallery</a>
                        </li>
                        <li class="nav-link" style="--i: 1.4s">
                            <a href="./team.php">AlumniTeam</a>
                        </li>
                        <li class="nav-link" style="--i: 1.6s">
                            <a href="services.php">Services</i></a>
                        </li>
                    </ul>
                </div>

                <div class="log-sign" style="--i: 1.8s">
                    <a href="#" class="btn transparent">Log in</a>
                    <a href="#" class="btn solid">Sign up</a>
                </div>
            </div>

            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
    </header>