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


        
    <h1>Donor Information Form</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="student_id">Enrollment Number:</label>
        <input type="text" id="student_id" name="student_id" required>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>


        <label for="sem">Semester:</label>
        <input type="number" id="sem" name="sem" required>

        <label for="branch">Branch:</label>
        <input type="text" id="branch" name="branch" required>

        <label for="contact_number">Contact Number:</label>
        <input type="number" id="contact_number" name="contact_number" required>


        <input type="submit" value="Submit" name = "submit" class="my-2">
    </form>
</div>


<!-- Donor id khud bnani h pass nhi krni -->
<?php
    error_reporting(0);
    if (isset($_POST['submit'])) {
        // Retrieve the form data
        $function_to_call = "addStudent"; 
        $arguments = [$_POST['student_id'],$_POST['name'],$_POST['sem'],$_POST['branch'],$_POST['contact_number']];
        

        $command = "python connector.py $function_to_call " . implode(" ", $arguments);
        // echo $command;
        
        // Run the Python script with the specified function and arguments and capture its output
        $output = shell_exec($command);
        
        
        
        // Output the result
        // echo $output;
        echo '<script>alert("Donor registered successfully!");</script>';
        echo '<script>window.location.href = "./index.php"</script>';

    }
    ?>

<?php
    // error_reporting(0);
    // if (isset($_POST['submit'])) {
    //     // Retrieve the form data
    //     $function_to_call = "addDonor"; 
    //     $arguments = [$_POST['student_id'],$_POST['name'],$_POST['sem'],$_POST['gender'],$_POST['contact_number']];
        

    //     $command = "python connector.py $function_to_call " . implode(" ", $arguments);
    //     // echo $command;
        
    //     // Run the Python script with the specified function and arguments and capture its output
    //     $output = shell_exec($command);
        
        
        
    //     // Output the result
    //     // echo $output;
    //     echo '<script>alert("Donor registered successfully!");</script>';
    //     echo '<script>window.location.href = "./index.php"</script>';

    // }
    ?>


    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </html>