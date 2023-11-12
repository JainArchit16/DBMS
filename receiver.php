
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
    </style>
</head>



<body>
<nav class="d-flex flex-row justify-content-between align-items-center py-3 px-4">
<img src="./assets/images/logo.png" style="width: 50px;">
<div class="d-flex flex-row justify-content-between align-items-center gap-4">
  <a href="index.php" class="nav-link">Home</a>
  
    <a class="nav-link" href="./donate.php">Donate Blood</a>
  
  
      <a class="nav-link" href="./receive.php">Recieve Blood</a>
  
  
      <a class="nav-link" href="./receiver.php">Register Reciever</a>

      <a class="nav-link" href="./feedbackForm.php">FeedBack</a>
      
      <a class="nav-link" href="./camp.php">Register Camp Details</a>
  

</div>

</nav>

        <div class="form-container">


        
            <h1>Recipient Information Form</h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <!-- <label for="recipient_id">Recipient ID:</label>
                <input type="text" id="recipient_id" name="recipient_id" required> -->

                <label for="bank_id">Bank ID:</label>
        <input type="text" id="bank_id" name="bank_id" required>
        
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
        
    
        
                <label for="contact_number">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number"required>
        
                <label for="amount">Donation Amount Required:</label>
        <input type="number" id="amount" name="amount" required>

        
                <label for="blood-type">Blood Type Required:</label>
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
        $function_to_call = "addReceiver"; 
        $arguments = [$_POST['first_name'],$_POST['last_name'],$_POST['date_of_birth'],$_POST['gender'],$_POST['contact_number'],$_POST['email'],$_POST['city'],$_POST['blood-type']];
        $command = "python connector.py $function_to_call " . implode(" ", $arguments);
        $output = shell_exec($command);
        //echo $command;
        $function_to_call = "addBloodDonation"; 
        $arguments = [$_POST['donor_id'],$_POST['blood-type'],$_POST['amount'],$_POST['center']];
        $command = "python connector.py $function_to_call " . implode(" ", $arguments);
        // Run the Python script with the specified function and arguments and capture its output
        $output = shell_exec($command);
        echo '<script>alert("Receiver registered successfully!");</script>';
        echo '<script>window.location.href = "./index.php"</script>';
        
        
        // Output the result
       // echo $output;

    }
    ?>



    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </html>