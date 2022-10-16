<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style-extra.css">
    <title>Advanced</title>
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

    <div id="AB-div">
      <div id="day1-3">
        <h2>Day 1 & 3: Lower Body</h2>
        <div id="AB11">
            <h3 id="fit-con-h3">Box Squat: 3 sets of 10-20 repetitions</h3>
            <div class="DivPic"><img src="FitnessPic/Picture25.jpg" class="Pic1"></div>
        </div>
        <div id="AB12">
            <h3 id="fit-con-h3">Dumbbell lunges: 3 rounds of 10-20 repetitions, each side</h3>
            <div class="DivPic"><img src="FitnessPic/Picture22.jpg" class="Pic1"></div>
        </div>
        <div id="AB13">
            <h3 id="fit-con-h3">Leg Raise: 3 rounds of 10-20 repetitions</h3>
            <div class="DivPic"><img src="FitnessPic/Picture20.png" class="Pic1"></div>
        </div>
        <div id="AB14">
            <h3 id="fit-con-h3">Glute Bridge with leg lift: 3 rounds of 10-20 repetitions</h3>
            <div class="DivPic"><img src="FitnessPic/Picture18.png" class="Pic1"></div>
        </div>
      </div>
      <div id="day2-4">
        <h2>Day 2 & 4: Upper Body</h2>
        <div id="AB21">
            <h3 id="fit-con-h3">Push ups: 3 rounds of 30 seconds, 10 seconds rest between each round</h3>
            <div class="DivPic"><img src="FitnessPic/Picture16.jpg" class="PicH"></div>
        </div>
        <div id="AB22">
            <h3 id="fit-con-h3">Triceps extension: 3 rounds of 30 seconds, 10 seconds rest between each round</h3>
            <div class="DivPic"><img src="FitnessPic/Picture14.png" class="PicH"></div>
        </div>
        <div id="AB23">
            <h3 id="fit-con-h3">Shoulder press : 3 rounds of 30 seconds, 10 seconds rest between each round</h3>
            <div class="DivPic"><img src="FitnessPic/Picture12.png" class="PicH"></div>
        </div>
        <div id="AB24">
            <h3 id="fit-con-h3">Lateral raises: 3 rounds of 30 seconds, 10 seconds rest between each round</h3>
            <div class="DivPic"><img src="FitnessPic/Picture10.png" class="PicH"></div>
        </div>
      </div>
      <div id="day5">
        <h2>Day 5: Cardio Full Body</h2>
        <div id="AB31">
            <h3 id="fit-con-h3">Jumping Jacks: 3 rounds of 40 seconds, 10 seconds rest between each round</h3>
            <div class="DivPic"><img src="FitnessPic/Picture8.png" class="PicH"></div>
        </div>
        <div id="AB32">
            <h3 id="fit-con-h3">High knee run: 3 rounds of 40 seconds each</h3><br><br>
            <div class="DivPic"><img src="FitnessPic/Picture6.png" class="PicH"></div>
        </div>
        <div id="AB33">
            <h3 id="fit-con-h3">Jump Squats: 4 rounds of 20 seconds each, 10 seconds rest between rounds</h3>
            <div class="DivPic"><img src="FitnessPic/Picture2.png" class="Pic1"></div>
        </div>
        <div id="AB34">
            <h3 id="fit-con-h3">Raised Arm circles: 3 rounds of 15 seconds each, 5 seconds rest between rounds</h3>
            <div class="DivPic"><img src="FitnessPic/Picture4.png" class="PicH"></div>
        </div>
      </div>
    </div>


  </body>
</html>
