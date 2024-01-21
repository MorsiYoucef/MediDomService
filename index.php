<?php
include("database.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="index.css" />
</head>
<body>

<div class="header">
  <img src="Design_sans_titre__2___1_-removebg-preview (1).png" alt="logo">
  <div class="colomn">
  <div class="left">  
  <div class="sous-header">
    <img src="mail.png" alt="mail" class="sous-logo"> 
    <h2>medidomservice@gmail.com   |</h2> 
  </div>
  <div class="sous-header">  
    <img src="telephone-call.png" alt="phone" class="sous-logo">
    <h2>021517638</h2>
  </div>
  </div>
  
  <div class="social">
    <img src="logo-facebook.svg" alt="facebook" class="sous-logo">
    <img src="instagram (1).svg" alt="instagram" class="sous-logo">
    <img src="whatsapp (1).svg" alt="whatsapp" class="sous-logo">
  </div>
  </div>
</div>
<div id="all">
<h2 style="color: #1F2283;">Registration:</h2>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    
    <div class="all-1">
    <div class="input-field">  
    First Name*:<br>
    <input type="text" name="firstname">
    </div>
    <br>
    <div class="input-field" >
    Last Name*:<br>
    <input type="text" name="lastname">
    </div>
    
    <br>
    <div class="input-field">
    date of birth*:<br>
    <input type="date" name="dateBirth">
    </div>
    <br>

    </div>
    <div class="all-1">
    <div class="input-field">
    adress*:<br>
    <input type="text" name="adress">
    </div>

    
    <br>
    <div class="input-field">
    Number of social Security*:<br>
    <input type="text" name="nbrSocialSec">
    </div>
    <br>
    <div class="input-field">
    Phone number*:<br>
    <input type="text" name="phoneNbr">
    </div>
    <br>

    </div>

    <div class="all-1">
    <div class="input-field">
    E-mail adress:<br>
    <input type="email" name="email">
    </div>
    <br>
    <div class="input-field">
    Password*:
    <br>
    <input type="password" name="password">
    </div>
    <br>
    <br>
    </div>
    <br>
    <fieldset>
  <legend>please select your chronic pathologies*:</legend>
  <div>
    <input type="checkbox" id="coding" name="interest" value="coding" />
    <label for="coding">ALS (Lou Gehrig's Disease).</label>
  </div>
  <div>
    <input type="checkbox" id="music" name="interest" value="music" />
    <label for="music">Alzheimer's Disease and other Dementias.</label>
  </div>
  <div>
    <input type="checkbox" id="coding" name="interest" value="coding" />
    <label for="coding">Asthma.</label>
  </div>
  <div>
    <input type="checkbox" id="coding" name="interest" value="coding" />
    <label for="coding">Diabetes.</label>
  </div>
  <div>
    <input type="checkbox" id="coding" name="interest" value="coding" />
    <label for="coding">Obesity.  </label>
  </div>
  <div>
    <input type="checkbox" id="coding" name="interest" value="coding" />
    <label for="coding">Tobacco Use and Related Conditions.</label>
  </div>
</fieldset>
<br>
    
    <input type="submit" name="submit" value="register">
    

    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = filter_input(INPUT_POST, "firstname" , FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, "lastname" , FILTER_SANITIZE_SPECIAL_CHARS);
        $nbrSocialSec = filter_input(INPUT_POST, "nbrSocialSec" , FILTER_SANITIZE_SPECIAL_CHARS);
        $dateBirth = filter_input(INPUT_POST, "dateBirth" , FILTER_SANITIZE_SPECIAL_CHARS);
        $adress = filter_input(INPUT_POST, "adress" , FILTER_SANITIZE_SPECIAL_CHARS);
        $phoneNbr = filter_input(INPUT_POST, "phoneNbr" , FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email" , FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password" , FILTER_SANITIZE_SPECIAL_CHARS);

        
        $i = 0;
        if (empty($firstname)){
            echo "Please enter a firstname";
        }
        if(empty($password)){
          echo "Please enter a password";
        }
        $sql = "SELECT *FROM users WHERE email = '$email' ";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount>0){
          echo "Email Already exist";
        }else{
          $hash = password_hash($password,PASSWORD_DEFAULT);
          $sql = "INSERT INTO users (firstname,lastname,nbrSocialSec,dateBirth,adress,phoneNbr,email,password) VALUES ( '$firstname',
                                                                                                                        '$lastname',
                                                                                                                        '$nbrSocialSec',
                                                                                                                        '$dateBirth',
                                                                                                                        '$adress',
                                                                                                                        '$phoneNbr',
                                                                                                                        '$email',
                                                                                                                        '$hash')";
          mysqli_query($conn, $sql);
          echo "You are now registered";
        }
   
}
  mysqli_close($conn);
?>
    

</div>
</body>
</html>

