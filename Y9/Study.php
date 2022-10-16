<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style-extra.css">
    <title>Study</title>
  </head>
  <?php
    $dbServername = "localhost"; //will need to be changed when using online database
    $dbUsername = "root"; //will need to be changed when using online database
    $dbPassword = ""; //will need to be changed when using online database
    $dbName = "plansmarter";
    $user = "";
    $pwd = "";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

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
          <button name="fitness" id="invisible2"><li><p>Fitness</p></li> </a></button>
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
    if (isset($_POST['fitness'])) {
      if ($user == "") {
        exit(header("Location:http://localhost/Y9/Fitness.php"));
      }
      else {
        $_SESSION['username'] = $user;
        exit(header("Location:http://localhost/Y9/Fitness.php"));
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

    <div class="st-main">
      <form method="post">
        <div class="st-subdiv">
          <input type="text" id="task" name="task" class="st-subdiv-input" autocomplete="off" placeholder=" ">
          <label for="task" class="st-subdiv-label">Task</label>
        </div>

        <div class="dropdown">
          <select name="time" class="time">
            <!-- <option value="8:00 – 9:00">8:00 – 9:00</option> -->
            <option value="9:00 – 10:00">9:00 – 10:00</option>
            <option value="10:00 – 11:00">10:00 – 11:00</option>
            <option value="11:00 – 12:00">11:00 – 12:00</option>
            <option value="12:00 – 13:00">12:00 – 13:00</option>
            <!-- <option value="13:00 – 14:00">13:00 – 14:00</option> -->
            <option value="14:00 – 15:00">14:00 – 15:00</option>
            <option value="15:00 – 16:00">15:00 – 16:00</option>
            <option value="16:00 – 17:00">16:00 – 17:00</option>
            <option value="17:00 – 18:00">17:00 – 18:00</option>
            <!-- <option value="18:00 – 19:00">18:00 – 19:00</option> -->
            <option value="19:00 – 20:00">19:00 – 20:00</option>
          </select>
          <select name="day" class="day">
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
          </select>
        </div>

        <button name="sbt" id="st-btn"><p>Add Task</p></button>
      </form>
      <form method="post">
        <div class="dropdown2">
          <select name="time" class="time">
            <!-- <option value="8:00 – 9:00">8:00 – 9:00</option> -->
            <option value="9:00 – 10:00">9:00 – 10:00</option>
            <option value="10:00 – 11:00">10:00 – 11:00</option>
            <option value="11:00 – 12:00">11:00 – 12:00</option>
            <option value="12:00 – 13:00">12:00 – 13:00</option>
            <!-- <option value="13:00 – 14:00">13:00 – 14:00</option> -->
            <option value="14:00 – 15:00">14:00 – 15:00</option>
            <option value="15:00 – 16:00">15:00 – 16:00</option>
            <option value="16:00 – 17:00">16:00 – 17:00</option>
            <option value="17:00 – 18:00">17:00 – 18:00</option>
            <!-- <option value="18:00 – 19:00">18:00 – 19:00</option> -->
            <option value="19:00 – 20:00">19:00 – 20:00</option>
          </select>
          <select name="day" class="day">
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
          </select>
        </div>
        <div id="buttons">
          <button name="sbt2" id="st-btn-2"><p>Delete</p></button>
          <button name="sbt3" id="st-btn-3"><p>Done</p></button>
          <button name="sbt4" id="st-btn-4"><p>In progress</p></button>
          <button name="sbt5" id="st-btn-5"><p>Urgent</p></button>
          <button name="sbt6" id="st-btn-6"><p>Undo</p></button>
          <button name="sbt7" id="st-btn-6" style="
            position: absolute;
            margin-left: 8%;
            width: 6vw;
            margin-top: 0.9%;"><p>Delete All</p></button>
        </div>
      </form>
    </div>

    <?php
      // echo $user;


      if (isset($_POST['sbt']) && $user != "") {
        $time = $_POST['time'];
        $day = $_POST['day'];
        $task = $_POST['task'];
        // echo $time;
        // echo $day;
        // echo $task;

        $sql = "SELECT ".$day." FROM ".$user." WHERE time1='".$time."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        // echo $row[$day];

        if ($row[$day] == '' || $row[$day] == ' ') {
          if ($task != "") {
            $sqlT = "UPDATE ".$user." SET ".$day."='".$task."' WHERE time1='".$time."'";
            mysqli_query($conn, $sqlT );
              echo '<h3 style="color:red; margin-left: 45%; margin-top: -18%;">Task succesfully added</h3>';
          }
        }
        else {
          echo '<h3 style="color:red; margin-left: 43%; margin-top: -18%;">You already have a task at that time</h3>';
        }
      }
      if (isset($_POST['sbt2']) && $user != "") {
        $time = $_POST['time'];
        $day = $_POST['day'];
        $query = mysqli_query($conn, "SELECT ".$day." FROM ".$user." WHERE time1='$time'");
        // UPDATE user3 SET Thursday=' ' WHERE time1='10:00 – 11:00'
        if (mysqli_num_rows($query) == 1) {
            $sqlU = mysqli_query($conn, "UPDATE ".$user." SET ".$day."='' WHERE time1='".$time."'");
            // $sqlD = mysqli_query($conn, "DELETE FROM ".$user." WHERE ".$day."='d' ;");
            if ($time == '9:00 – 10:00') {$time = '2';}
            else if ($time == '10:00 – 11:00') {$time = '3';}
            else if ($time == '11:00 – 12:00') {$time = '4';}
            else if ($time == '12:00 – 13:00') {$time = '5';}
            else if ($time == '14:00 – 15:00') {$time = '7';}
            else if ($time == '15:00 – 16:00') {$time = '8';}
            else if ($time == '16:00 – 17:00') {$time = '9';}
            else if ($time == '17:00 – 18:00') {$time = '10';}
            else if ($time == '19:00 – 20:00') {$time = '12';}
            $sqlU2 = mysqli_query($conn, "UPDATE ".$user." SET ".$day."='' WHERE time1='".$time."'");
            echo '<h3 style="color:red; margin-left: 44.5%;" id="alert">Task succesfully removed</h3>';
        }
        else {
            echo '<h3 style="color:red; margin-left: 43%;" id="alert">No tasks at that time</h3>';
        }
      }
      if (isset($_POST['sbt3']) && $user != "") {
        $time = $_POST['time'];
        $day = $_POST['day'];
        $query = mysqli_query($conn, "SELECT ".$day." FROM ".$user." WHERE time1='$time'");

        if ($time == '9:00 – 10:00') {$time = '2';}
        else if ($time == '10:00 – 11:00') {$time = '3';}
        else if ($time == '11:00 – 12:00') {$time = '4';}
        else if ($time == '12:00 – 13:00') {$time = '5';}
        else if ($time == '14:00 – 15:00') {$time = '7';}
        else if ($time == '15:00 – 16:00') {$time = '8';}
        else if ($time == '16:00 – 17:00') {$time = '9';}
        else if ($time == '17:00 – 18:00') {$time = '10';}
        else if ($time == '19:00 – 20:00') {$time = '12';}

        if (mysqli_num_rows($query) == 1) {
            $sqlU = mysqli_query($conn, "UPDATE ".$user." SET ".$day."='1' WHERE time1='".$time."'");
            echo '<h3 style="color:red; margin-left: 48.5%;" id="alert">Updated</h3>';
        }
        else {
            echo '<h3 style="color:red; margin-left: 46%;" id="alert">No tasks at that time</h3>';
        }
      }
      if (isset($_POST['sbt4']) && $user != "") {
        $time = $_POST['time'];
        $day = $_POST['day'];
        $query = mysqli_query($conn, "SELECT ".$day." FROM ".$user." WHERE time1='$time'");

        if ($time == '9:00 – 10:00') {$time = '2';}
        else if ($time == '10:00 – 11:00') {$time = '3';}
        else if ($time == '11:00 – 12:00') {$time = '4';}
        else if ($time == '12:00 – 13:00') {$time = '5';}
        else if ($time == '14:00 – 15:00') {$time = '7';}
        else if ($time == '15:00 – 16:00') {$time = '8';}
        else if ($time == '16:00 – 17:00') {$time = '9';}
        else if ($time == '17:00 – 18:00') {$time = '10';}
        else if ($time == '19:00 – 20:00') {$time = '12';}

        if (mysqli_num_rows($query) == 1) {
            $sqlU = mysqli_query($conn, "UPDATE ".$user." SET ".$day."='2' WHERE time1='".$time."'");
            echo '<h3 style="color:red; margin-left: 48.5%;" id="alert">Updated</h3>';
        }
        else {
            echo '<h3 style="color:red; margin-left: 46%;" id="alert">No tasks at that time</h3>';
        }
      }
      if (isset($_POST['sbt5']) && $user != ""  ) {
        $time = $_POST['time'];
        $day = $_POST['day'];
        $query = mysqli_query($conn, "SELECT ".$day." FROM ".$user." WHERE time1='$time'");

        if ($time == '9:00 – 10:00') {$time = '2';}
        else if ($time == '10:00 – 11:00') {$time = '3';}
        else if ($time == '11:00 – 12:00') {$time = '4';}
        else if ($time == '12:00 – 13:00') {$time = '5';}
        else if ($time == '14:00 – 15:00') {$time = '7';}
        else if ($time == '15:00 – 16:00') {$time = '8';}
        else if ($time == '16:00 – 17:00') {$time = '9';}
        else if ($time == '17:00 – 18:00') {$time = '10';}
        else if ($time == '19:00 – 20:00') {$time = '12';}

        if (mysqli_num_rows($query) == 1) {
            $sqlU = mysqli_query($conn, "UPDATE ".$user." SET ".$day."='3' WHERE time1='".$time."'");
            echo '<h3 style="color:red; margin-left: 48.5%;" id="alert">Updated</h3>';
        }
        else {
            echo '<h3 style="color:red; margin-left: 46%;" id="alert">No tasks at that time</h3>';
        }
      }
      if (isset($_POST['sbt6']) && $user != "") {
        $time = $_POST['time'];
        $day = $_POST['day'];
        $query = mysqli_query($conn, "SELECT ".$day." FROM ".$user." WHERE time1='$time'");

        if ($time == '9:00 – 10:00') {$time = '2';}
        else if ($time == '10:00 – 11:00') {$time = '3';}
        else if ($time == '11:00 – 12:00') {$time = '4';}
        else if ($time == '12:00 – 13:00') {$time = '5';}
        else if ($time == '14:00 – 15:00') {$time = '7';}
        else if ($time == '15:00 – 16:00') {$time = '8';}
        else if ($time == '16:00 – 17:00') {$time = '9';}
        else if ($time == '17:00 – 18:00') {$time = '10';}
        else if ($time == '19:00 – 20:00') {$time = '12';}

        if (mysqli_num_rows($query) == 1) {
            $sqlU = mysqli_query($conn, "UPDATE ".$user." SET ".$day."='0' WHERE time1='".$time."'");
            echo '<h3 style="color:red; margin-left: 48.5%;" id="alert">Updated</h3>';
        }
        else {
            echo '<h3 style="color:red; margin-left: 46%;" id="alert">No tasks at that time</h3>';
        }
      }

      if (isset($_POST['sbt7']) && $user != "") {
        $day = $_POST['day'];
        $query = mysqli_query($conn, "SELECT ".$day." FROM ".$user."");
        // UPDATE user3 SET Thursday=' ' WHERE time1='10:00 – 11:00'
        $sqlU = mysqli_query($conn, "UPDATE ".$user." SET ".$day."='' ");
        echo '<h3 style="color:red; margin-left: 44.5%;" id="alert">Tasks succesfully removed</h3>';
      }

  ?>

  </body>
</html>
