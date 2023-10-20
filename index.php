<?php 
require_once("header.php");
$page_title="Home";
 ?>
<style>
    .like_icon:hover{
        cursor: pointer;
    }
</style>

<!--social buttons start-->
<div class="sticky-social-icons">
      <a href="https://www.facebook.com/" target="_blank">Facebook <i class="fab fa-facebook"></i></a>
      <a href="https://www.youtube.com/" target="_blank">Youtube <i class="fab fa-youtube"></i></a>
      <a href="https://www.instagram.com/" target="_blank">Instagram <i class="fab fa-instagram"></i></a>
      <a href="https://www.twitter.com/" target="_blank">Twitter <i class="fab fa-twitter"></i></a>
    </div>
    <!--social buttons end-->    
<div class="wrapper">
		<div style="background-image:url(img/iiitdm1.jpeg)"></div>
      <div style="background-image:url(img/iiitdm2.jpg)"></div>
      <div style="background-image:url(img/iiitdm6.jpg)"></div>
      <div style="background-image:url(img/iiitdm4.jpg)"></div>
      <div style="background-image:url(img/iiitdm5.png)"></div>
	</div>
    <div class="main-body-div">
        <p>&nbsp;</p>

        <main class="main1">
            <header>
                <h1>Alumni Updates</h1>
                <p>
                    <!-- <span>view_all</span> -->
                </p>
            </header>
            <section class="side-scroll-section">


            <?php
                    // Retrieve and display the stored data in the table rows
                    $con =mysqli_connect("localhost", "root", "", "phpform");
                    $query = "SELECT * FROM alumni_updates_events where category_type='updates' ";
                    $result = mysqli_query($con, $query);

                    if(mysqli_num_rows($result) > 0){

                    while ($row = mysqli_fetch_assoc($result)) {
                        $ref_img = $row['ref_img'];
                    echo "<div class='product'>
                    <picture>
                        <img src='data:image;base64,".base64_encode($ref_img)."' alt='ref_img' width='100%' height='100%' />
                    </picture>
                    <div class='detail'>
                        <p>
                            <small><i class='fa fa-calendar'></i> &nbsp;".$row['date']."</small><br />
                            <b>".$row['caption']." || ".$row['date']."</b><br>
                        </p>
                    </div>
                    <div class='button'>
                        <a href='".$row['url']."' class='read-more' target='_blank'>Read More -&#155;</a>
                        <samp onclick='like1()' id='like1'><i  class='fa fa-thumbs-o-up like_icon'></i></samp>
                    </div>
                </div>
                                ";
                    }
                    mysqli_close($con);
                    }else{
                    ?>
                    <p align="center">No More updates as of now... Stay tuned</p>
                    <?php
                    }
                    ?>
<!-- 

                <div class="product">
                    <picture>
                        <img src="img/iiitdm7.jpeg" alt="" />
                    </picture>
                    <div class="detail">
                        <p>
                            <small><i class="fa fa-calendar"></i> &nbsp;May 07, 2023</small><br />
                            <b>IIITDM Kurnool Alumni meetup | may 08, 2023</b><br>
                        </p>
                    </div>
                    <div class="button">
                        <a href="#" class="read-more">Read More -&#155;</a>
                        <samp><i class="fa fa-thumbs-o-up"></i></samp>
                    </div>
                </div> -->
            </section>
        </main>
    
            <br />
            <!-- Second Division -->
        <main class="main2">
            <header class="div-2">
                <h1>Events</h1>
                <p>
                    <!-- <span>view_all</span> -->
                </p>
            </header>
            <section class="side-scroll-section">

            <?php
                    // Retrieve and display the stored data in the table rows
                    $con =mysqli_connect("localhost", "root", "", "phpform");
                    $query_events = "SELECT * FROM alumni_updates_events where category_type='events'";
                    $result_events = mysqli_query($con, $query_events);

                    if(mysqli_num_rows($result_events) > 0){

                    while ($row_events = mysqli_fetch_assoc($result_events)) {
                        $ref_img = $row_events['ref_img'];
                    echo "<div class='product'>
                    <picture>
                        <img src='data:image;base64,".base64_encode($ref_img)."' alt='ref_img' width='100%' height='100%' />
                    </picture>
                    <div class='detail'>
                        <p>
                            <small><i class='fa fa-calendar'></i> &nbsp;".$row_events['date']."</small><br />
                            <b>".$row_events['caption']." || ".$row_events['date']."</b><br>
                        </p>
                    </div>
                    <div class='button'>
                        <a href='".$row_events['url']."' class='read-more' target='_blank'>Read More -&#155;</a>
                        <samp><i class='fa fa-thumbs-o-up'></i></samp>
                    </div>
                </div>
                                ";
                    }
                    mysqli_close($con);
                    }else{
                    ?>
                    <p align="center">No More Events as of now... Stay tuned</p>
                    <?php
                    }
                    ?>

            </section>
        </main>
    
            <br />
            <br /><br /><br /><br /><br /><br /><br />

        
            <!-- Fifth Division -->
        <main class="main5">
            <header class="div-3">
                <h1>Career Opportunities</h1>
                <p>
                    <span>view_all</span>
                </p>
            </header>
            <section class="side-scroll-section">

            <?php
                    // Retrieve and display the stored data in the table rows
                    $con =mysqli_connect("localhost", "root", "", "phpform");
                    $query_events = "SELECT * FROM alumni_career_opportunities where status='Approved'";
                    $result_events = mysqli_query($con, $query_events);

                    if(mysqli_num_rows($result_events) > 0){

                    while ($row_careers = mysqli_fetch_assoc($result_events)) {
                    echo "
                    <div class='product2'><br />
                        <p align='center' class='profile-position1'><i class='fa fa-briefcase' aria-hidden='true' style='color: aquamarine;'></i></p><br />
                        <div class='detail'>
                            <p align='center' style='margin-left: auto;margin-right: auto;'>
                                <b>".$row_careers['job_role']."</b><br>
                                <small><i class='fa fa-university' aria-hidden='true'></i> Company : ".$row_careers['company']."</small><br />
                                <small><i class='fa fa-map-marker' aria-hidden='true'></i> Location : ".$row_careers['job_location']."</small><br /><br />
                                <small> Deadline : ".$row_careers['deadline']."</small><br />
                            </p>
                        </div><br />
                        <div class='button' style='margin-top: 20px;'>
                            <a href='".$row_careers['url']."' class='read-more' style='margin-left: auto;margin-right: auto;'>Explore -&#155;</a>
                        </div>
                    </div>
                                ";
                    }
                    mysqli_close($con);
                    }else{
                    ?>
                    <p align='center'>No More Events as of now... Stay tuned</p>
                    <?php
                    }
                    ?>


    
            </section>
        </main>


        <h1 align="center">Recent Registrations</h1><br />
        <div class="img-profiles-flex">

            <?php
            $con =mysqli_connect("localhost", "root", "", "phpform");
            $student_image_query = "select student_image,fname from alumni_signup where status='Approved' order by id DESC LIMIT 8";
            $student_image_query_run = mysqli_query($con,$student_image_query);

            if(mysqli_num_rows($student_image_query_run) > 0){
                foreach($student_image_query_run as $row){
                    ?>
                    
                    
                    <div class="tooltip" title="<?php echo $row["fname"]; ?>">
                    <a href="./login.php"><img src='data:image;base64,<?php echo base64_encode($row["student_image"]) ?>' alt='student_profile' class="flex-profile-images" /></a>
                    

                    </div>
                    
                    <?php
                }
            }else{
                ?>
                <h3 align="center">No Participants Registered Recently</h3>
                <?php
            }
            ?>
            <!-- <img src="profile_img/img1.jpeg" alt="" class="flex-profile-images" />
            <img src="profile_img/img10.jpeg" alt="" class="flex-profile-images" />
            <img src="profile_img/img2.png" alt="" class="flex-profile-images" />
            <img src="profile_img/img3.png" alt="" class="flex-profile-images" />
            <img src="profile_img/img4.jpeg" alt="" class="flex-profile-images" />
            <img src="profile_img/img5.png" alt="" class="flex-profile-images" />
            <img src="profile_img/img6.jpeg" alt="" class="flex-profile-images" />
            <img src="profile_img/img7.png" alt="" class="flex-profile-images" />
            <img src="profile_img/img8.png" alt="" class="flex-profile-images" />
            <img src="profile_img/img9.jpeg" alt="" class="flex-profile-images" />
            <img src="profile_img/img`.png" alt="" class="flex-profile-images" />
            <img src="profile_img/img1.jpeg" alt="" class="flex-profile-images" />
            <img src="profile_img/img10.jpeg" alt="" class="flex-profile-images" />
            <img src="profile_img/img2.png" alt="" class="flex-profile-images" /> -->

        </div><br />
        

        <div class="container-form">
            <h1 align="center">Reach out us!</h1>
            <form action="./queries_logic.php" method="post">
              <div class="row">
                <div class="col-25">
                  <label for="name">Name</label>
                </div>
                <div class="col-75">
                  <input type="text" id="name" name="name" placeholder="Your name.." required />
                </div>
              </div>
              
              <div class="row">
                <div class="col-25">
                  <label for="email">email</label>
                </div>
                <div class="col-75">
                  <input type="email" id="email" name="email" placeholder="Your email.." required />
                </div>
              </div>
              
              <div class="row">
                <div class="col-25">
                  <label for="mobilenumber">Mobile Number</label>
                </div>
                <div class="col-75">
                  <input type="number" id="mobilenumber" name="mobile_number" placeholder="Your mobile number.." required />
                </div>
              </div>
              
           
              <div class="row">
                <div class="col-25">
                  <label for="subject">Your Message</label>
                </div>
                <div class="col-75">
                  <textarea id="subject" name="query" value="" placeholder="Write your Query here..." style="height:200px"></textarea>
                </div>
              </div>
              <div class="row">
                <input type="submit" value="Submit" name="submit">
              </div>
            </form>
          </div>


<?php require_once("footer.php"); ?>