<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style-extra.css">
    <title>About</title>
  </head>
  <body>
    <img class = "logo" id="logo" src="logo-wb.png">

    <div class="top-menu" id="top-menu">
      <div class="menu" id="top-menu-div-1">
        <form method="post">
          <button name="schedule" id="invisible2"><li><p>Schedule</p></li> </a></button>
          <button name="nutrition" id="invisible2"><li><p>Nutrition</p></li> </a></button>
          <button name="fitness" id="invisible2"><li><p>Fitness</p></li> </a></button>
          <button name="study" id="invisible2"><li><p>Study</p></li> </a></button>
        </form>
      </div>
      <div class="menu" id="top-menu-div-2">
        <form method="post">
          <a href=""> <li><button name="profile" id="invisible"><img src="profilePicLogo.jpg" class="menu-pic"></button></li> </a>
        </form>
      </div>
    </div>
    <?php
    $ok = 0;
    session_start();
    if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
        $user = $_SESSION['username'];
        $ok = 1;
    }

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
    if (isset($_POST['schedule'])) {
      if ($user == "") {
        exit(header("Location:http://localhost/Y9/Schedule.php"));
      }
      else {
        $_SESSION['username'] = $user;
        exit(header("Location:http://localhost/Y9/Schedule.php"));
      }
    }

    ?>

    <div class="about-div">
      <div id="top-left">
        <h3 style="margin-top: 5%;">According to national statistics, approximately 88% of college students want to improve their time management abilities,
            and also believe that this will help them to achieve better grades<br>
            <span style="font-size: 0.85vw;">(Link to the study: <span style="color: #0076FF;">https://www.reliableplant.com/Read/3429/college-students-struggle-with-organizational-skills</span>)</span></h3><br>
      </div>
      <div id="poster">
        <img src="Y9Poster.png" id="poster-img">
      </div>
      <div id="left">
        <h3>This huge problem led us to create <span style="color: #009879;">PlanSmarter</span><br><br>
            Being university students ourselves, we made it our mission to improve the well-being of
            students whilst having their best interests at heart.<br><br>
            Taking extreme care in tailoring our time management services, this platform aims to remove the stress and
            hours of procrastination resulting in structured and effective daily schedules, as well as good health care and physical training
            with our nutrition and fitness plans</h3>
      </div>
      <div id="right">
        <h3> <span style="color: #009879;">Study page</span> - add and modify tasks that you wish to do throughout the week <br><br>
             <span style="color: #009879;">Fitness page</span> - see our recommendation on fitness exercises that will help you stay fit <br><br>
             <span style="color: #009879;">Nutrition page</span> - choose our recommendation of diet plans depending on your height and weight <br>
             <span style="font-size: 0.75vw;">(nutrition plans are based on data from: <span style="color: #0076FF;">www.removemyweight.com</span>)</span><br><br>
             <span style="color: #009879;">Schedule page</span> - monitor how well you are completing your tasks for the week <br><br>

        </h3>
      </div>
    </div>

    <?php
    $dbServername = "localhost"; //will need to be changed when using online database
    $dbUsername = "root"; //will need to be changed when using online database
    $dbPassword = ""; //will need to be changed when using online database
    $dbName = "plansmarter";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    ?>




  </body>
</html>
