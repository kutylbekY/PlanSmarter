<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style-extra.css">
    <title>Fitness</title>
  </head>
  <?php
    session_start();
    if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
        $user = $_SESSION['username'];
    }
  ?>
  <body>
    <img class = "logo" src="logo-wb.png">

    <div class="top-menu">
      <div class="menu" id="top-menu-div-1">
        <form method="post">
          <button name="schedule" id="invisible2"><li><p>Schedule</p></li> </a></button>
          <button name="study" id="invisible2"><li><p>Study</p></li> </a></button>
          <button name="nutrition" id="invisible2"><li><p>Nutrition</p></li> </a></button>
          <button name="about" id="invisible2"><li><p>About</p></li> </a></button>
        </form>
      </div>
      <div class="menu" id="top-menu-div-2">
        <form method="post">
          <a href=""> <li><button name="profile" id="invisible"><img src="profilePicLogo.jpg" class="menu-pic"></button></li> </a>
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

    <div class="fit-main" style="margin-top: 2%;">
      <div id="fit-text">
        <h2>Disclaimer:</h2>
        <h3>The owners of this site reject any responsibility for any health complications
          or injury whether mental, psychological or physical that occurs as a result of commitment to the
          program. In using our app, the use agrees to acknowledge that he/she is free of disabilities that
          may further be worsened by carrying out the plans or advice contained within the app. <br>
          <span style="font-size: 0.75vw;">(fitness plans are based on data from: <span style="color: #0076FF;">https://darebee.com/workouts.html</span>,
          <span style="color: #0076FF;">https://workoutlabs.com/</span>,
          <span style="color: #0076FF;">https://www.istockphoto.com/search/2/image?phrase=fitness</span>,
          <span style="color: #0076FF;">https://origympersonaltrainercourses.co.uk/blog/box-squats</span>,
          <span style="color: #0076FF;">https://www.istockphoto.com/search/2/image?phrase=fitness</span>,
          <span style="color: #0076FF;">https://www.planetfitness.com/community/articles/beginner-lower-body-workout-youve-been-looking</span>)</span><br><br>
        </h3>
      </div>

      <!-- <div id="fit-con-1">
        <a href="http://localhost/Y9/Schedule.php" target="_blank"><div class="day1-3">
          <h3 id="fit-con-h3">Day 1</h3>
          <div class="DivPic"><img src="day1.png" class="Pic"></div>
        </div> </a>
        <a href="http://localhost/Y9/Nutrition.php" target="_blank"><div class="day1-3">
          <h3 id="fit-con-h3">Day 2</h3>
          <div class="DivPic"><img src="day2.png" class="Pic"></div>
        </div></a>
        <a href="http://localhost/Y9/Fitness.php" target="_blank"><div class="day1-3">
          <h3 id="fit-con-h3">Day 3</h3>
          <div class="DivPic"><img src="day3.png" class="Pic"></div>
        </div></a>
      </div> -->

      <div id="fit-con-2" style="margin-top: 4%;">
        <a href="http://localhost/Y9/Beginner.php" target="_blank"><div class="day4">
          <h3 id="fit-con-h3">Beginner</h3>
          <div class="DivPic"><img src="day1.png" class="Pic"></div>
        </div></a>
        <a href="http://localhost/Y9/Advanced.php" target="_blank"><div class="day5">
          <h3 id="fit-con-h3">Advanced</h3>
          <div class="DivPic"><img src="day2.png" class="Pic"></div>
        </div></a>
      </div>
    </div>




  </body>
</html>
