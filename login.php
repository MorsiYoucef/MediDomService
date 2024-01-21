<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="index.css">
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

    <div class="container">
    
        
        <div class="parent">
        
        <div class="all">
        <h1>Login</h1><br>
        <br>
        <br>
        <form action="login.php" method="post">
        <div class="form-group input-field">
            <h7>Email:</h7> 
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group input-field">
        <h5>Password:</h5>
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" >
        </div>
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        </form>
        <div><p>Not registered yet <a href="index.php">Register Here</a></p></div>

        </div>
      
        
        <div class="another-container"></div>
        
        </div>
        </div>
    
</body>
</html>