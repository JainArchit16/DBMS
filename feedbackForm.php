
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
        .rating {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 2em;
            padding: 5px;
            cursor: pointer;
        }

        .rating label:hover,
        .rating label:hover ~ label {
            color: #FFD700;
        }

        .rating input:checked ~ label {
            color: #FFD700;
        }
    </style>

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


        
            <h1>FeedBack Form</h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <!-- <label for="recipient_id">Recipient ID:</label>
                <input type="text" id="recipient_id" name="recipient_id" required> -->

                <label for="student_id">Enrollment Number:</label>
                <input type="text" id="student_id" name="student_id" required>

                <label for="camp_id">Camp ID:</label>
                <input type="text" id="camp_id" name="camp_id" required>
        
                
                <label for="rating" class="my-2">Rating:</label>
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2"><i class="fas fa-star"></i></label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1"><i class="fas fa-star"></i></label>
                </div>

                <input type="submit" value="Submit" class="btn my-2" name="submit">
            </form>

            </div>

            <?php
              error_reporting(0);
              if (isset($_POST['submit'])) {
                  // Retrieve the form data
                  $function_to_call = "addRating"; 
                  $arguments = [$_POST['student_id'],$_POST['camp_id'],$_POST['rating']];
                  

                  $command = "python connector.py $function_to_call " . implode(" ", $arguments);
                //echo $command;
                  
                  // Run the Python script with the specified function and arguments and capture its output
                  $output = shell_exec($command);
                  
                  
                  
                  // Output the result
                  // echo $output;
                  echo '<script>alert("Thank You for Rating!");</script>';
                  echo '<script>window.location.href = "./index.php"</script>';

              }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>