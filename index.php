<?php
include("database.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h2>Registration:</h2>
    First Name:<br>
    <input type="text" name="firstname"><br>
    Last Name:<br>
    <input type="text" name="lastname"><br>
    Number of social Security:<br>
    <input type="text" name="nbrSocialSec"><br>
    date of birth:<br>
    <input type="date" name="dateBirth"><br>
    adress:<br>
    <input type="text" name="adress"><br>
    Phone number<br>
    <input type="text" name="phoneNbr"><br>
    E-mail adress:<br>
    <input type="email" name="email"><br>
    Password:<br>
    <input type="password" name="password"><br>
    chronic pathologies:<br>
    <input type="radio" name="chronicPath">
    <label for="html">HTML</label><br>
    <input type="radio" id="css" name="fav_language" value="CSS">
    <label for="css">CSS</label><br>
    <input type="radio" id="javascript" name="fav_language" value="JavaScript">
    <label for="javascript">JavaScript</label><br>
    <input type="submit" name="submit" value="register">

  </form>
</body>
</html>
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
        if (empty($firstname)){
            echo "Please enter a firstname";
        }
        elseif(empty($password)){
          echo "Please enter a password";
        }
        else{
          $hash = password_hash($password,PASSWORD_DEFAULT);
          $sql = "INSERT INTO users (firstname,password) VALUES ('$firstname','$hash')";
          mysqli_query($conn, $sql);
          echo "You are now registered";
        }
   
}
  mysqli_close($conn);
?>
