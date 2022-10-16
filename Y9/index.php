<?php
  $dbServername = "localhost"; //will need to be changed when using online database
  $dbUsername = "root"; //will need to be changed when using online database
  $dbPassword = ""; //will need to be changed when using online database
  $dbName = "comptable";

  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  session_start();
  if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
      $user = $_SESSION['username'];
  }
  //echo "Connected successfully";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style1.css">
    <title>Plan Smarter</title>
  </head>
  <body>
    <img class = "logo" src="logo-wb.png">

    <div class="top-menu">
      <div class="menu" id="top-menu-div-1">
        <!-- <a href="#study"> <li><p>Study</p></li> </a>
        <a href="#fitness"> <li><p>Fitness</p></li> </a>
        <a href="#nutrition"> <li><p>Nutrition</p></li> </a>
        <a href="#schedule"> <li><p>Schedule</p></li> </a> -->
        <a href="#home"> <li><p>Home</p></li> </a>
        <a href="http://localhost/Y9/About.php" target="_blank"> <li><p>About</p></li> </a>
      </div>
      <div class="menu" id="top-menu-div-2">
        <form method="post">
          <a href=""> <li><button name="profile" id="invisible"><img src="profilePicLogo.jpg" class="menu-pic"></button></li> </a>
          <!-- <a href=""> <li><input type="submit" name="profile" class="menu-pic" /></li> </a> -->
            <!-- <a href="http://localhost/Y9/Login-Signup.php" target="_blank"> <li><img src="profilePicLogo.jpg" class="menu-pic"></li> </a> -->
        </form>
      </div>
    </div>

    <?php

      if (isset($_POST['profile'])) {
        if ($user == "") {
          // echo 'alert("a")';
          exit(header("Location:http://localhost/Y9/Login-Signup.php"));
        }
        else {
          $_SESSION['username'] = $user;
          // echo 'alert("b")';
          exit(header("Location:http://localhost/Y9/Profile.php"));
        }
      }
      if (isset($_POST['schedule'])) {
        if ($user == "") {
          exit(header("Location:http://localhost/Y9/Schedule.php"));
        }
        else {
          $_SESSION['username'] = $user;
          exit(header("Location:http://localhost/Y9/Schedule.php"));
        }
      }
      if (isset($_POST['nutrition'])) {
        if ($user == "") {
          exit(header("Location:http://localhost/Y9/Nutrition.php"));
        }
        else {
          $_SESSION['username'] = $user;
          exit(header("Location:http://localhost/Y9/Nutrition.php"));
        }
      }
      if (isset($_POST['fitness'])) {
        if ($user == "") {
          exit(header("Location:http://localhost/Y9/Fitness.php"));
        }
        else {
          $_SESSION['username'] = $user;
          exit(header("Location:http://localhost/Y9/Fitness.php"));
        }
      }
      if (isset($_POST['study'])) {
        if ($user == "") {
          exit(header("Location:http://localhost/Y9/Study.php"));
        }
        else {
          $_SESSION['username'] = $user;
          exit(header("Location:http://localhost/Y9/Study.php"));
        }
      }
      if (isset($_POST['about'])) {
        if ($user == "") {
          exit(header("Location:http://localhost/Y9/About.php"));
        }
        else {
          $_SESSION['username'] = $user;
          exit(header("Location:http://localhost/Y9/About.php"));
        }
      }

    ?>

    <div class="main">
    <!-- <a href="http://localhost/Y9/Schedule.php" target="_blank"> -->
      <form method="post">
        <button name="schedule" class="Schedule">
          <h3>Schedule</h3>
          <div class="DivPic"><img src="Schedule.png" class="Pic"></div>
        </button>
        <button name="nutrition" class="Nutrition">
          <h3>Nutrition</h3>
          <div class="DivPic"><img src="Nutrition.png" class="Pic"></div>
        </button>
        <button name="fitness" class="Fitness">
          <h3>Fitness</h3>
          <div class="DivPic"><img src="Fitness.png" class="Pic"></div>
        </button>
        <button name="study" class="Study">
          <h3>Study</h3>
          <div class="DivPic"><img src="Study.png" class="Pic"></div>
        </button>
      </form>
    </div>

    <footer>
      <div class="footer-div">
        <h3>Plan Smarter</h3>
        <p>Your all in one app for building better habits, getting to-dos done and boosting productivity. Plan ahead. Plan Smarter.</p>
          <ul class="socials">
            <li><a href="#"><img src="logos/inst2.png" id="social"></a></li>
            <li><a href="#"><img src="logos/twit2.png" id="social"></a></li>
            <li><a href="#"><img src="logos/face4.png" id="social"></a></li>
          </ul>
      </div>
      <div class="footer-btm">
        <p>copyright &copy;2022 PlanSmarter. designed by <span>Y9</span></p>
      </div>
    </footer>

  </body>
</html>
