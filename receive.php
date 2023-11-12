<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recieve Blood</title>
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" href="styles/recieve.css">

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
    
<nav class="d-flex flex-row justify-content-between align-items-center py-2 px-4 bg-white mb-5">
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
        
        <div class="search-container">
            <h1>Search for Blood</h1>
            <form id="search-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div>
                    <label for="camp_id">Camp ID:</label>
                    <input type="text" id="camp_id" name="camp_id" placeholder="Enter Camp ID">

                </div>
                <div>
                    <label for="blood-type">Blood Type:</label>
                    <select id="blood-type" name="blood-type">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB-">AB-</option>
                    </select>

                </div>

                <input type="submit" class="btn" value="Search" name="submit"></button>
            </form>

                <div id="search-results">
                    <!-- Search results will be displayed here -->
                </div>
        </div>

        <?php
    //error_reporting(0);
    if (isset($_POST['submit'])) {
        //$function_to_call = "findDonorForRecipient"; 
        //$arguments = [$_POST['city'],$_POST['blood-type']];
        $blood_type = $_POST['blood-type'];
        $camp_id = $_POST['camp_id'];
        $conn = mysqli_connect("localhost","admin","admin","blood_donation_project");
        //error_reporting(E_ERROR | E_PARSE);
        $sql = " SELECT * FROM donates WHERE BloodType = '$blood_type' ORDER BY CASE WHEN CampID = '$camp_id' THEN 0 ELSE 1 END, CampID;";
        //$sql = " SELECT * FROM donates WHERE BloodType = '$blood_type';";
        $output = mysqli_query($conn,$sql);
        echo "<div class='p-5'>";
        echo "<table class='table table-striped table-bordered my-5'>";
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
        
        

        //$command = "python connector.py $function_to_call " . implode(" ", $arguments);
        //$output = shell_exec($command);
        
        
        
        // Output the result
    //echo $output;

    }
    ?>


    




    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </html>