
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Donate Blood</title>
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" href="styles/donate.css">
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


        <div class="form-container">


        
            <h1>Donation Information Form</h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <!-- <label for="recipient_id">Recipient ID:</label>
                <input type="text" id="recipient_id" name="recipient_id" required> -->


                <label for="camp_id">Camp ID:</label>
                <input type="text" id="camp_id" name="camp_id" required>



                <label for="student_id">Enrollment Number:</label>
                <input type="text" id="student_id" name="student_id" required>
        

                <label for="amount">Donation Amount:</label>
                <input type="number" id="amount" name="amount" required>

        
                <label for="blood-type">Blood Type:</label>
                    <select id="blood-type" name="blood-type" required>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B+">B-</option>
                        <option value="B+">O+</option>
                        <option value="B+">O-</option>
                        <option value="B+">AB-</option>
                    </select>
        
                <input type="submit" value="Submit" class="btn my-2" name="submit">
            </form>

            </div>

            <?php
              error_reporting(0);
              if (isset($_POST['submit'])) {
                  // Retrieve the form data
                  $function_to_call = "addDonor"; 
                  $arguments = [$_POST['student_id'],$_POST['camp_id'],$_POST['blood-type'],$_POST['amount']];
                  $command = "python connector.py $function_to_call " . implode(" ", $arguments);
                //echo $command;
                  
                  
                  $output = shell_exec($command);

                  $function_to_call = "updateBloodBank"; 
                  $arguments = [$_POST['camp_id'],$_POST['blood-type'],$_POST['amount']];
                  $command = "python connector.py $function_to_call " . implode(" ", $arguments);
                  $output = shell_exec($command);
                  //echo $command;
                            
                  
                  
                  // Output the result
                  // echo $output;
                  echo '<script>alert("Donation registered successfully!");</script>';
                  

              }
    ?>




</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>