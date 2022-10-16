<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style-extra.css">
    <title>Nutrition</title>
  </head>
  <body>
    <img class = "logo" id="logo" src="logo-wb.png">

    <div class="top-menu" id="top-menu">
      <div class="menu" id="top-menu-div-1">
        <form method="post">
          <button name="schedule" id="invisible2"><li><p>Schedule</p></li> </a></button>
          <button name="study" id="invisible2"><li><p>Study</p></li> </a></button>
          <button name="fitness" id="invisible2"><li><p>Fitness</p></li> </a></button>
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
    $dbServername = "localhost"; //will need to be changed when using online database
    $dbUsername = "root"; //will need to be changed when using online database
    $dbPassword = ""; //will need to be changed when using online database
    $dbName = "plansmarter";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

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
    if (isset($_POST['schedule'])) {
      if ($user == "") {
        exit(header("Location:http://localhost/Y9/Schedule.php"));
      }
      else {
        $_SESSION['username'] = $user;
        exit(header("Location:http://localhost/Y9/Schedule.php"));
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

    // print_r($array);
    ?>

    <script type="text/javascript">
      <?php
        if ($planAdded == 1){
            echo 'alert("Plan succesfully added");';
        }
      ?>
    </script>

    <div class="main-nut" id="main-nut">
      <table class="main-table" id="main-table">
        <thead>
          <tr class="main-head">
            <th>Height</th>
            <th>Weight</th>
            <th>Calories</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td rowspan="3" class="h">140 – 155</td>
            <td>45 – 60</td>
            <td><a href="http://localhost/Y9/cal1200.php">1200</a></td>
            <!-- <td><form action="#" method="post"><button name="C1200" href="#" onclick="showImg()"></button></form></td> -->
          </tr>
          <tr>
            <td>61 – 75</td>
            <td><a href="http://localhost/Y9/cal1400.php">1400</a></td>
          </tr>
          <tr>
            <td>76 – 90</td>
            <td><a href="http://localhost/Y9/cal1600.php">1600</a></td>
          </tr>
          <tr>
            <td rowspan="3" class="h">171 – 185</td>
            <td>45 – 60</td>
            <td><a href="http://localhost/Y9/cal1400.php">1400</a></td>
          </tr>
          <tr>
            <td>61 – 75</td>
            <td><a href="http://localhost/Y9/cal1600.php">1600</a></td>
          </tr>
          <tr>
            <td>76 – 90</td>
            <td><a href="http://localhost/Y9/cal1700.php">1700</a></td>
          </tr>
          <tr>
            <td rowspan="3" class="h">171 – 185</td>
            <td>45 – 60</td>
            <td><a href="http://localhost/Y9/cal1600.php">1600</a></td>
          </tr>
          <tr>
            <td>61 – 75</td>
            <td><a href="http://localhost/Y9/cal1700.php">1700</a></td>
          </tr>
          <tr>
            <td>76 – 90</td>
            <td><a href="http://localhost/Y9/cal1800.php">1800</a></td>
          </tr>
        </tbody>
      </table>
    </div>

  </body>
</html>
