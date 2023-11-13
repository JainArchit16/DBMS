<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blood Donation</title>
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

    <style>
      .nav-link:hover{
        font-weight: bold;
        color: rgba(0, 0, 0,1);

       
      }
      .nav-link{
        font-weight: bold;
        color: rgba(0, 0, 0, 0.5);
      }
      .nav-link:after{
        content:"|";
        margin-left:10px;
        opacity: 0.2
      }
      nav{
        box-shadow: 0px 0px 12px red;
      }
    </style>
</head>

<body>


<nav class="d-flex flex-row justify-content-between align-items-center py-2 px-4 bg-white mb-3">
<img src="./assets/images/logo.png" style="width: 50px;">
<div class="d-flex flex-row justify-content-between align-items-center gap-4">
  <a href="index.php" class="nav-link">Home</a>
  
    <a class="nav-link" href="./donate.php">Donate Blood</a>
  
  
      <a class="nav-link" href="./receive.php">Recieve Blood</a>
  
  
      <a class="nav-link" href="./receiver.php">Register Reciever</a>

      <a class="nav-link" href="./feedbackForm.php">FeedBack</a>
      
      <a class="nav-link" href="./camp.php">Register Camp</a>


<a class="nav-link" href="./campDetails.php">Register Camp Details</a>

  

</div>

</nav>
        
        
<div id="carouselExampleCaptions" class="carousel slide" style="height:85%;" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner h-100">
    <div class="carousel-item active h-100">
      <img src="https://media.licdn.com/dms/image/D4D22AQFp_yP2Z54SLw/feedshare-shrink_800/0/1683028085776?e=1702512000&v=beta&t=jGh7409Qer7qNnrxBnmRQ_w1p54NlOM5GJ--pNk35P4" 
      class="d-block w-100" style="height:100%;" alt="...">
      
    </div>
    <div class="carousel-item h-100">
      <img src="https://cpuh.in/gallery/2019/blood-donation/1.jpg"
      class="d-block w-100" style="height:100%;" alt="...">
      
    </div>
    <div class="carousel-item h-100">
      <img src="https://media.licdn.com/dms/image/D4D22AQEcIse-odbqXg/feedshare-shrink_2048_1536/0/1683028083848?e=1702512000&v=beta&t=_f_Fe-4XMbDcdAuW_pAVxI4IciIKRaLbe1P7fk1LBtk"
       class="d-block w-100 h-100" style="height:100%;" alt="...">
      
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    
    <!--*************** About Us Starts Here ***************-->
    <section id="about" class="contianer-fluid about-us center">
        <h2>About Us</h2>
        <p>Join hands with the NSUT NSS Cell to save lives drop by drop.</p>
       <div class="container my-5">
            <div class="row">
                <div class="col-md-6 text">
                    <h2 class="my-3">About Blood Donors</h2>
                    <p>At Blood Donors, we are passionate about making a difference in the world 
                        of healthcare through our Blood Donation Management System. Our mission is to connect donors,
                         healthcare providers, and recipients in a seamless and efficient manner, ultimately saving lives and 
                         promoting the spirit of giving. With years of experience and a dedicated team of professionals, we have 
                         developed a cutting-edge platform that streamlines the entire blood donation process. We understand the 
                         critical importance of timely and safe blood transfusions, and our system is designed to ensure that every
                          drop of donated blood reaches those in need. Join us in our quest to create a world where no one 
                          has to suffer due to a shortage of blood. Together,
                         we can make a positive impact on countless lives, one donation at a time. Thank you for being a part of this vital mission.</p>
                </div>
                <div class="col-md-6 image">
                    <img src="assets/images/about.jpg" alt="" style="width: 400px" class="ml-5">
                </div>
            </div>
       </div>
   </section>
    

<!-- Now display all the organisations that have visited here in past -->

   <section id="about" class="contianer-fluid about-us">
       <div class="container">
           <div class="row session-title">
               <h2>Donation History</h2>
           </div>
</div>


   <?php
   error_reporting(0);
  
       $conn = mysqli_connect("localhost","admin","admin","blood_donation_project");
       $sql = " SELECT * FROM donates;";
       $output = mysqli_query($conn,$sql);
       echo "<div class='p-5'>";
       echo "<table class='table table-striped table-bordered my-1'>";
       echo "<thead class='thead-dark'><tr>";
       
       // Output column headers
       foreach (mysqli_fetch_fields($output) as $field) {
           echo "<th>{$field->name}</th>";
       }
       
       echo "</tr></thead><tbody>";
       
       while ($row = mysqli_fetch_assoc($output)) {
           echo "<tr>";
       
           // Access the data in each row
           foreach ($row as $item) {
               echo "<td>$item</td>";
           }
       
           echo "</tr>";
       }
       
       echo "</tbody></table>";
       echo "</div>";
   ?>

</section>

<section id="about" class="contianer-fluid about-us">
       <div class="container">
           <div class="row session-title">
               <h2>Ratings</h2>
           </div>
</div>


   <?php
   error_reporting(0);
  
       $conn = mysqli_connect("localhost","admin","admin","blood_donation_project");
       $sql = "SELECT CampID, AVG(Rating) AS AvgRating FROM rating GROUP BY CampID;";
       $output = mysqli_query($conn,$sql);
       echo "<div class='p-5'>";
       echo "<table class='table table-striped table-bordered my-1'>";
       echo "<thead class='thead-dark'><tr>";
       
       // Output column headers
       foreach (mysqli_fetch_fields($output) as $field) {
           echo "<th>{$field->name}</th>";
       }
       
       echo "</tr></thead><tbody>";
       
       while ($row = mysqli_fetch_assoc($output)) {
           echo "<tr>";
       
           // Access the data in each row
           foreach ($row as $item) {
               echo "<td>$item</td>";
           }
       
           echo "</tr>";
       }
       
       echo "</tbody></table>";
       echo "</div>";
   ?>

</section>
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
