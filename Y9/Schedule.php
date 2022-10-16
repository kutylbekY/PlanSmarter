<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style-extra.css">
    <title>Schedule</title>
  </head>
  <body>
    <img class = "logo" id="logo" src="logo-wb.png">

    <div class="top-menu" id="top-menu">
      <div class="menu" id="top-menu-div-1">
        <form method="post">
          <button name="study" id="invisible2"><li><p>Study</p></li> </a></button>
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

    <?php
    $dbServername = "localhost"; //will need to be changed when using online database
    $dbUsername = "root"; //will need to be changed when using online database
    $dbPassword = ""; //will need to be changed when using online database
    $dbName = "plansmarter";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if ($ok == 1) {
      $query = mysqli_query($conn, "SELECT * FROM ".$user."");
      $array = array();
      while($row = mysqli_fetch_assoc($query)) {
        $array[] = $row;
      }
    }
    else {
      $query = mysqli_query($conn, "SELECT * FROM userB");
      $array = array();
      while($row = mysqli_fetch_assoc($query)) {
        $array[] = $row;
      }
    }

    // print_r($array); // show all array data
    // echo $array[0]['Monday'];
    ?>

    <div id="main-sch">
      <table id="main-table-sch">
        <thead>
          <tr id="main-head">
            <th>time</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>8:00 – 9:00</td>
            <td><?php echo $array[0]['Monday'];?></td>
            <td><?php echo $array[0]['Tuesday'];?></td>
            <td><?php echo $array[0]['Wednesday'];?></td>
            <td><?php echo $array[0]['Thursday'];?></td>
            <td><?php echo $array[0]['Friday'];?></td>
            <td><?php echo $array[0]['Saturday'];?></td>
            <td><?php echo $array[0]['Sunday'];?></td>
          </tr>
          <tr>
            <td>9:00 – 10:00</td>
            <td id="M1"><?php if ($ok == 1 && $array[12]['Monday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("M1").style.backgroundColor = "green";document.getElementById("M1").style.color = "white";</script>';}
                              else if ($ok == 1 && $array[12]['Monday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("M1").style.backgroundColor = "#FF7B00";document.getElementById("M1").style.color = "white";</script>';}
                              else if ($ok == 1 && $array[12]['Monday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("M1").style.backgroundColor = "red";document.getElementById("M1").style.color = "white";</script>';}
                              else if ($ok == 1 && $array[12]['Monday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("M1").style.backgroundColor = "none";document.getElementById("M1").style.color = "black";</script>';}
                        echo $array[1]['Monday'];?></td>
            <td id="T1"><?php if ($ok == 1 && $array[12]['Tuesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("T1").style.backgroundColor = "green";document.getElementById("T1").style.color = "white";</script>';}
                              else if ($ok == 1 && $array[12]['Tuesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("T1").style.backgroundColor = "#FF7B00";document.getElementById("T1").style.color = "white";</script>';}
                              else if ($ok == 1 && $array[12]['Tuesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("T1").style.backgroundColor = "red";document.getElementById("T1").style.color = "white";</script>';}
                              else if ($ok == 1 && $array[12]['Tuesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("T1").style.backgroundColor = "none";document.getElementById("T1").style.color = "black";</script>';}
                        echo $array[1]['Tuesday'];?></td>
            <td id="W1"><?php if ($ok == 1 && $array[12]['Wednesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("W1").style.backgroundColor = "green";document.getElementById("W1").style.color = "white";</script>';}
                              else if ($ok == 1 && $array[12]['Wednesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("W1").style.backgroundColor = "#FF7B00";document.getElementById("W1").style.color = "white";</script>';}
                              else if ($ok == 1 && $array[12]['Wednesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("W1").style.backgroundColor = "red";document.getElementById("W1").style.color = "white";</script>';}
                              else if ($ok == 1 && $array[12]['Wednesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("W1").style.backgroundColor = "none";document.getElementById("W1").style.color = "black";</script>';}
                        echo $array[1]['Wednesday'];?></td>
            <td id="TH1"><?php if ($ok == 1 && $array[12]['Thursday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("TH1").style.backgroundColor = "green";document.getElementById("TH1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Thursday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("TH1").style.backgroundColor = "#FF7B00";document.getElementById("TH1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Thursday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("TH1").style.backgroundColor = "red";document.getElementById("TH1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Thursday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("TH1").style.backgroundColor = "none";document.getElementById("TH1").style.color = "black";</script>';}
                        echo $array[1]['Thursday'];?></td>
            <td id="F1"><?php if ($ok == 1 && $array[12]['Friday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("F1").style.backgroundColor = "green";document.getElementById("F1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Friday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("F1").style.backgroundColor = "#FF7B00";document.getElementById("F1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Friday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("F1").style.backgroundColor = "red";document.getElementById("F1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Friday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("F1").style.backgroundColor = "none";document.getElementById("F1").style.color = "black";</script>';}
                        echo $array[1]['Friday'];?></td>
            <td id="S1"><?php if ($ok == 1 && $array[12]['Saturday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("S1").style.backgroundColor = "green";document.getElementById("S1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Saturday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("S1").style.backgroundColor = "#FF7B00";document.getElementById("S1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Saturday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("S1").style.backgroundColor = "red";document.getElementById("S1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Saturday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("S1").style.backgroundColor = "none";document.getElementById("S1").style.color = "black";</script>';}
                        echo $array[1]['Saturday'];?></td>
            <td id="SU1"><?php if ($ok == 1 && $array[12]['Sunday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("SU1").style.backgroundColor = "green";document.getElementById("SU1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Sunday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("SU1").style.backgroundColor = "#FF7B00";document.getElementById("SU1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Sunday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("SU1").style.backgroundColor = "red";document.getElementById("SU1").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[12]['Sunday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("SU1").style.backgroundColor = "none";document.getElementById("SU1").style.color = "black";</script>';}
                        echo $array[1]['Sunday'];?></td>
          </tr>
          <tr>
            <td>10:00 – 11:00</td>
            <td id="M2"><?php if ($ok == 1 && $array[13]['Monday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("M2").style.backgroundColor = "green";document.getElementById("M2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Monday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("M2").style.backgroundColor = "#FF7B00";document.getElementById("M2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Monday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("M2").style.backgroundColor = "red";document.getElementById("M2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Monday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("M2").style.backgroundColor = "none";document.getElementById("M2").style.color = "black";</script>';}
                        echo $array[2]['Monday'];?></td>
            <td id="T2"><?php if ($ok == 1 && $array[13]['Tuesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("T2").style.backgroundColor = "green";document.getElementById("T2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Tuesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("T2").style.backgroundColor = "#FF7B00";document.getElementById("T2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Tuesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("T2").style.backgroundColor = "red";document.getElementById("T2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Tuesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("T2").style.backgroundColor = "none";document.getElementById("T2").style.color = "black";</script>';}
                        echo $array[2]['Tuesday'];?></td>
            <td id="W2"><?php if ($ok == 1 && $array[13]['Wednesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("W2").style.backgroundColor = "green";document.getElementById("W2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Wednesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("W2").style.backgroundColor = "#FF7B00";document.getElementById("W2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Wednesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("W2").style.backgroundColor = "red";document.getElementById("W2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Wednesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("W2").style.backgroundColor = "none";document.getElementById("W2").style.color = "black";</script>';}
                        echo $array[2]['Wednesday'];?></td>
            <td id="TH2"><?php if ($ok == 1 && $array[13]['Thursday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("TH2").style.backgroundColor = "green";document.getElementById("TH2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Thursday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("TH2").style.backgroundColor = "#FF7B00";document.getElementById("TH2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Thursday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("TH2").style.backgroundColor = "red";document.getElementById("TH2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Thursday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("TH2").style.backgroundColor = "none";document.getElementById("TH2").style.color = "black";</script>';}
                        echo $array[2]['Thursday'];?></td>
            <td id="F2"><?php if ($ok == 1 && $array[13]['Friday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("F2").style.backgroundColor = "green";document.getElementById("F2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Friday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("F2").style.backgroundColor = "#FF7B00";document.getElementById("F2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Friday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("F2").style.backgroundColor = "red";document.getElementById("F2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Friday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("F2").style.backgroundColor = "none";document.getElementById("F2").style.color = "black";</script>';}
                        echo $array[2]['Friday'];?></td>
            <td id="S2"><?php if ($ok == 1 && $array[13]['Saturday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("S2").style.backgroundColor = "green";document.getElementById("S2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Saturday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("S2").style.backgroundColor = "#FF7B00";document.getElementById("S2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Saturday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("S2").style.backgroundColor = "red";document.getElementById("S2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Saturday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("S2").style.backgroundColor = "none";document.getElementById("S2").style.color = "black";</script>';}
                        echo $array[2]['Saturday'];?></td>
            <td id="SU2"><?php if ($ok == 1 && $array[13]['Sunday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("SU2").style.backgroundColor = "green";document.getElementById("SU2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Sunday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("SU2").style.backgroundColor = "#FF7B00";document.getElementById("SU2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Sunday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("SU2").style.backgroundColor = "red";document.getElementById("SU2").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[13]['Sunday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("SU2").style.backgroundColor = "none";document.getElementById("SU2").style.color = "black";</script>';}
                        echo $array[2]['Sunday'];?></td>
          </tr>
          <tr>
            <td>11:00 – 12:00</td>
            <td id="M3"><?php if ($ok == 1 && $array[14]['Monday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("M3").style.backgroundColor = "green";document.getElementById("M3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Monday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("M3").style.backgroundColor = "#FF7B00";document.getElementById("M3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Monday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("M3").style.backgroundColor = "red";document.getElementById("M3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Monday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("M3").style.backgroundColor = "none";document.getElementById("M3").style.color = "black";</script>';}
                        echo $array[3]['Monday'];?></td>
            <td id="T3"><?php if ($ok == 1 && $array[14]['Tuesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("T3").style.backgroundColor = "green";document.getElementById("T3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Tuesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("T3").style.backgroundColor = "#FF7B00";document.getElementById("T3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Tuesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("T3").style.backgroundColor = "red";document.getElementById("T3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Tuesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("T3").style.backgroundColor = "none";document.getElementById("T3").style.color = "black";</script>';}
                        echo $array[3]['Tuesday'];?></td>
            <td id="W3"><?php if ($ok == 1 && $array[14]['Wednesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("W3").style.backgroundColor = "green";document.getElementById("W3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Wednesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("W3").style.backgroundColor = "#FF7B00";document.getElementById("W3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Wednesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("W3").style.backgroundColor = "red";document.getElementById("W3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Wednesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("W3").style.backgroundColor = "none";document.getElementById("W3").style.color = "black";</script>';}
                        echo $array[3]['Wednesday'];?></td>
            <td id="TH3"><?php if ($ok == 1 && $array[14]['Thursday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("TH3").style.backgroundColor = "green";document.getElementById("TH3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Thursday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("TH3").style.backgroundColor = "#FF7B00";document.getElementById("TH3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Thursday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("TH3").style.backgroundColor = "red";document.getElementById("TH3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Thursday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("TH3").style.backgroundColor = "none";document.getElementById("TH3").style.color = "black";</script>';}
                        echo $array[3]['Thursday'];?></td>
            <td id="F3"><?php if ($ok == 1 && $array[14]['Friday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("F3").style.backgroundColor = "green";document.getElementById("F3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Friday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("F3").style.backgroundColor = "#FF7B00";document.getElementById("F3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Friday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("F3").style.backgroundColor = "red";document.getElementById("F3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Friday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("F3").style.backgroundColor = "none";document.getElementById("F3").style.color = "black";</script>';}
                        echo $array[3]['Friday'];?></td>
            <td id="S3"><?php if ($ok == 1 && $array[14]['Saturday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("S3").style.backgroundColor = "green";document.getElementById("S3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Saturday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("S3").style.backgroundColor = "#FF7B00";document.getElementById("S3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Saturday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("S3").style.backgroundColor = "red";document.getElementById("S3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Saturday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("S3").style.backgroundColor = "none";document.getElementById("S3").style.color = "black";</script>';}
                        echo $array[3]['Saturday'];?></td>
            <td id="SU3"><?php if ($ok == 1 && $array[14]['Sunday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("SU3").style.backgroundColor = "green";document.getElementById("SU3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Sunday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("SU3").style.backgroundColor = "#FF7B00";document.getElementById("SU3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Sunday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("SU3").style.backgroundColor = "red";document.getElementById("SU3").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[14]['Sunday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("SU3").style.backgroundColor = "none";document.getElementById("SU3").style.color = "black";</script>';}
                        echo $array[3]['Sunday'];?></td>
          </tr>
          <tr>
            <td>12:00 – 13:00</td>
            <td id="M4"><?php if ($ok == 1 && $array[15]['Monday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("M4").style.backgroundColor = "green";document.getElementById("M4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Monday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("M4").style.backgroundColor = "#FF7B00";document.getElementById("M4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Monday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("M4").style.backgroundColor = "red";document.getElementById("M4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Monday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("M4").style.backgroundColor = "none";document.getElementById("M4").style.color = "black";</script>';}
                        echo $array[4]['Monday'];?></td>
            <td id="T4"><?php if ($ok == 1 && $array[15]['Tuesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("T4").style.backgroundColor = "green";document.getElementById("T4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Tuesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("T4").style.backgroundColor = "#FF7B00";document.getElementById("T4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Tuesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("T4").style.backgroundColor = "red";document.getElementById("T4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Tuesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("T4").style.backgroundColor = "none";document.getElementById("T4").style.color = "black";</script>';}
                        echo $array[4]['Tuesday'];?></td>
            <td id="W4"><?php if ($ok == 1 && $array[15]['Wednesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("W4").style.backgroundColor = "green";document.getElementById("W4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Wednesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("W4").style.backgroundColor = "#FF7B00";document.getElementById("W4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Wednesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("W4").style.backgroundColor = "red";document.getElementById("W4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Wednesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("W4").style.backgroundColor = "none";document.getElementById("W4").style.color = "black";</script>';}
                        echo $array[4]['Wednesday'];?></td>
            <td id="TH4"><?php if ($ok == 1 && $array[15]['Thursday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("TH4").style.backgroundColor = "green";document.getElementById("TH4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Thursday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("TH4").style.backgroundColor = "#FF7B00";document.getElementById("TH4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Thursday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("TH4").style.backgroundColor = "red";document.getElementById("TH4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Thursday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("TH4").style.backgroundColor = "none";document.getElementById("TH4").style.color = "black";</script>';}
                        echo $array[4]['Thursday'];?></td>
            <td id="F4"><?php if ($ok == 1 && $array[15]['Friday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("F4").style.backgroundColor = "green";document.getElementById("F4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Friday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("F4").style.backgroundColor = "#FF7B00";document.getElementById("F4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Friday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("F4").style.backgroundColor = "red";document.getElementById("F4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Friday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("F4").style.backgroundColor = "none";document.getElementById("F4").style.color = "black";</script>';}
                        echo $array[4]['Friday'];?></td>
            <td id="S4"><?php if ($ok == 1 && $array[15]['Saturday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("S4").style.backgroundColor = "green";document.getElementById("S4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Saturday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("S4").style.backgroundColor = "#FF7B00";document.getElementById("S4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Saturday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("S4").style.backgroundColor = "red";document.getElementById("S4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Saturday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("S4").style.backgroundColor = "none";document.getElementById("S4").style.color = "black";</script>';}
                        echo $array[4]['Saturday'];?></td>
            <td id="SU4"><?php if ($ok == 1 && $array[15]['Sunday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("SU4").style.backgroundColor = "green";document.getElementById("SU4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Sunday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("SU4").style.backgroundColor = "#FF7B00";document.getElementById("SU4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Sunday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("SU4").style.backgroundColor = "red";document.getElementById("SU4").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[15]['Sunday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("SU4").style.backgroundColor = "none";document.getElementById("SU4").style.color = "black";</script>';}
                        echo $array[4]['Sunday'];?></td>
          </tr>
          <tr>
            <td>13:00 – 14:00</td>
            <td><?php echo $array[5]['Monday'];?></td>
            <td><?php echo $array[5]['Tuesday'];?></td>
            <td><?php echo $array[5]['Wednesday'];?></td>
            <td><?php echo $array[5]['Thursday'];?></td>
            <td><?php echo $array[5]['Friday'];?></td>
            <td><?php echo $array[5]['Saturday'];?></td>
            <td><?php echo $array[5]['Sunday'];?></td>
          </tr>
          <tr>
            <td>14:00 – 15:00</td>
            <td id="M6"><?php if ($ok == 1 && $array[16]['Monday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("M6").style.backgroundColor = "green";document.getElementById("M6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Monday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("M6").style.backgroundColor = "#FF7B00";document.getElementById("M6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Monday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("M6").style.backgroundColor = "red";document.getElementById("M6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Monday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("M6").style.backgroundColor = "none";document.getElementById("M6").style.color = "black";</script>';}
                        echo $array[6]['Monday'];?></td>
            <td id="T6"><?php if ($ok == 1 && $array[16]['Tuesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("T6").style.backgroundColor = "green";document.getElementById("T6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Tuesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("T6").style.backgroundColor = "#FF7B00";document.getElementById("T6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Tuesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("T6").style.backgroundColor = "red";document.getElementById("T6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Tuesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("T6").style.backgroundColor = "none";document.getElementById("T6").style.color = "black";</script>';}
                        echo $array[6]['Tuesday'];?></td>
            <td id="W6"><?php if ($ok == 1 && $array[16]['Wednesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("W6").style.backgroundColor = "green";document.getElementById("W6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Wednesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("W6").style.backgroundColor = "#FF7B00";document.getElementById("W6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Wednesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("W6").style.backgroundColor = "red";document.getElementById("W6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Wednesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("W6").style.backgroundColor = "none";document.getElementById("W6").style.color = "black";</script>';}
                        echo $array[6]['Wednesday'];?></td>
            <td id="TH6"><?php if ($ok == 1 && $array[16]['Thursday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("TH6").style.backgroundColor = "green";document.getElementById("TH6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Thursday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("TH6").style.backgroundColor = "#FF7B00";document.getElementById("TH6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Thursday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("TH6").style.backgroundColor = "red";document.getElementById("TH6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Thursday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("TH6").style.backgroundColor = "none";document.getElementById("TH6").style.color = "black";</script>';}
                        echo $array[6]['Thursday'];?></td>
            <td id="F6"><?php if ($ok == 1 && $array[16]['Friday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("F6").style.backgroundColor = "green";document.getElementById("F6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Friday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("F6").style.backgroundColor = "#FF7B00";document.getElementById("F6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Friday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("F6").style.backgroundColor = "red";document.getElementById("F6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Friday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("F6").style.backgroundColor = "none";document.getElementById("F6").style.color = "black";</script>';}
                        echo $array[6]['Friday'];?></td>
            <td id="S6"><?php if ($ok == 1 && $array[16]['Saturday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("S6").style.backgroundColor = "green";document.getElementById("S6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Saturday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("S6").style.backgroundColor = "#FF7B00";document.getElementById("S6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Saturday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("S6").style.backgroundColor = "red";document.getElementById("S6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Saturday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("S6").style.backgroundColor = "none";document.getElementById("S6").style.color = "black";</script>';}
                        echo $array[6]['Saturday'];?></td>
            <td id="SU6"><?php if ($ok == 1 && $array[16]['Sunday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("SU6").style.backgroundColor = "green";document.getElementById("SU6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Sunday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("SU6").style.backgroundColor = "#FF7B00";document.getElementById("SU6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Sunday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("SU6").style.backgroundColor = "red";document.getElementById("SU6").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[16]['Sunday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("SU6").style.backgroundColor = "none";document.getElementById("SU6").style.color = "black";</script>';}
                        echo $array[6]['Sunday'];?></td>
          </tr>
          <tr>
            <td>15:00 – 16:00</td>
            <td id="M7"><?php if ($ok == 1 && $array[17]['Monday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("M7").style.backgroundColor = "green";document.getElementById("M7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Monday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("M7").style.backgroundColor = "#FF7B00";document.getElementById("M7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Monday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("M7").style.backgroundColor = "red";document.getElementById("M7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Monday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("M7").style.backgroundColor = "none";document.getElementById("M7").style.color = "black";</script>';}
                        echo $array[7]['Monday'];?></td>
            <td id="T7"><?php if ($ok == 1 && $array[17]['Tuesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("T7").style.backgroundColor = "green";document.getElementById("T7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Tuesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("T7").style.backgroundColor = "#FF7B00";document.getElementById("T7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Tuesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("T7").style.backgroundColor = "red";document.getElementById("T7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Tuesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("T7").style.backgroundColor = "none";document.getElementById("T7").style.color = "black";</script>';}
                        echo $array[7]['Tuesday'];?></td>
            <td id="W7"><?php if ($ok == 1 && $array[17]['Wednesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("W7").style.backgroundColor = "green";document.getElementById("W7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Wednesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("W7").style.backgroundColor = "#FF7B00";document.getElementById("W7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Wednesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("W7").style.backgroundColor = "red";document.getElementById("W7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Wednesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("W7").style.backgroundColor = "none";document.getElementById("W7").style.color = "black";</script>';}
                        echo $array[7]['Wednesday'];?></td>
            <td id="TH7"><?php if ($ok == 1 && $array[17]['Thursday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("TH7").style.backgroundColor = "green";document.getElementById("TH7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Thursday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("TH7").style.backgroundColor = "#FF7B00";document.getElementById("TH7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Thursday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("TH7").style.backgroundColor = "red";document.getElementById("TH7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Thursday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("TH7").style.backgroundColor = "none";document.getElementById("TH7").style.color = "black";</script>';}
                        echo $array[7]['Thursday'];?></td>
            <td id="F7"><?php if ($ok == 1 && $array[17]['Friday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("F7").style.backgroundColor = "green";document.getElementById("F7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Friday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("F7").style.backgroundColor = "#FF7B00";document.getElementById("F7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Friday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("F7").style.backgroundColor = "red";document.getElementById("F7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Friday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("F7").style.backgroundColor = "none";document.getElementById("F7").style.color = "black";</script>';}
                        echo $array[7]['Friday'];?></td>
            <td id="S7"><?php if ($ok == 1 && $array[17]['Saturday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("S7").style.backgroundColor = "green";document.getElementById("S7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Saturday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("S7").style.backgroundColor = "#FF7B00";document.getElementById("S7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Saturday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("S7").style.backgroundColor = "red";document.getElementById("S7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Saturday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("S7").style.backgroundColor = "none";document.getElementById("S7").style.color = "black";</script>';}
                        echo $array[7]['Saturday'];?></td>
            <td id="SU7"><?php if ($ok == 1 && $array[17]['Sunday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("SU7").style.backgroundColor = "green";document.getElementById("SU7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Sunday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("SU7").style.backgroundColor = "#FF7B00";document.getElementById("SU7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Sunday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("SU7").style.backgroundColor = "red";document.getElementById("SU7").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[17]['Sunday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("SU7").style.backgroundColor = "none";document.getElementById("SU7").style.color = "black";</script>';}
                        echo $array[7]['Sunday'];?></td>
          </tr>
          <tr>
            <td>16:00 – 17:00</td>
            <td id="M8"><?php if ($ok == 1 && $array[18]['Monday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("M8").style.backgroundColor = "green";document.getElementById("M8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Monday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("M8").style.backgroundColor = "#FF7B00";document.getElementById("M8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Monday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("M8").style.backgroundColor = "red";document.getElementById("M8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Monday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("M8").style.backgroundColor = "none";document.getElementById("M8").style.color = "black";</script>';}
                        echo $array[8]['Monday'];?></td>
            <td id="T8"><?php if ($ok == 1 && $array[18]['Tuesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("T8").style.backgroundColor = "green";document.getElementById("T8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Tuesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("T8").style.backgroundColor = "#FF7B00";document.getElementById("T8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Tuesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("T8").style.backgroundColor = "red";document.getElementById("T8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Tuesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("T8").style.backgroundColor = "none";document.getElementById("T8").style.color = "black";</script>';}
                        echo $array[8]['Tuesday'];?></td>
            <td id="W8"><?php if ($ok == 1 && $array[18]['Wednesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("W8").style.backgroundColor = "green";document.getElementById("W8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Wednesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("W8").style.backgroundColor = "#FF7B00";document.getElementById("W8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Wednesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("W8").style.backgroundColor = "red";document.getElementById("W8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Wednesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("W8").style.backgroundColor = "none";document.getElementById("W8").style.color = "black";</script>';}
                        echo $array[8]['Wednesday'];?></td>
            <td id="TH8"><?php if ($ok == 1 && $array[18]['Thursday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("TH8").style.backgroundColor = "green";document.getElementById("TH8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Thursday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("TH8").style.backgroundColor = "#FF7B00";document.getElementById("TH8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Thursday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("TH8").style.backgroundColor = "red";document.getElementById("TH8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Thursday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("TH8").style.backgroundColor = "none";document.getElementById("TH8").style.color = "black";</script>';}
                        echo $array[8]['Thursday'];?></td>
            <td id="F8"><?php if ($ok == 1 && $array[18]['Friday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("F8").style.backgroundColor = "green";document.getElementById("F8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Friday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("F8").style.backgroundColor = "#FF7B00";document.getElementById("F8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Friday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("F8").style.backgroundColor = "red";document.getElementById("F8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Friday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("F8").style.backgroundColor = "none";document.getElementById("F8").style.color = "black";</script>';}
                        echo $array[8]['Friday'];?></td>
            <td id="S8"><?php if ($ok == 1 && $array[18]['Saturday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("S8").style.backgroundColor = "green";document.getElementById("S8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Saturday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("S8").style.backgroundColor = "#FF7B00";document.getElementById("S8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Saturday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("S8").style.backgroundColor = "red";document.getElementById("S8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Saturday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("S8").style.backgroundColor = "none";document.getElementById("S8").style.color = "black";</script>';}
                        echo $array[8]['Saturday'];?></td>
            <td id="SU8"><?php if ($ok == 1 && $array[18]['Sunday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("SU8").style.backgroundColor = "green";document.getElementById("SU8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Sunday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("SU8").style.backgroundColor = "#FF7B00";document.getElementById("SU8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Sunday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("SU8").style.backgroundColor = "red";document.getElementById("SU8").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[18]['Sunday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("SU8").style.backgroundColor = "none";document.getElementById("SU8").style.color = "black";</script>';}
                        echo $array[8]['Sunday'];?></td>
          </tr>
          <tr>
            <td>17:00 – 18:00</td>
            <td id="M9"><?php if ($ok == 1 && $array[19]['Monday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("M9").style.backgroundColor = "green";document.getElementById("M9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Monday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("M9").style.backgroundColor = "#FF7B00";document.getElementById("M9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Monday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("M9").style.backgroundColor = "red";document.getElementById("M9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Monday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("M9").style.backgroundColor = "none";document.getElementById("M9").style.color = "black";</script>';}
                        echo $array[9]['Monday'];?></td>
            <td id="T9"><?php if ($ok == 1 && $array[19]['Tuesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("T9").style.backgroundColor = "green";document.getElementById("T9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Tuesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("T9").style.backgroundColor = "#FF7B00";document.getElementById("T9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Tuesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("T9").style.backgroundColor = "red";document.getElementById("T9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Tuesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("T9").style.backgroundColor = "none";document.getElementById("T9").style.color = "black";</script>';}
                        echo $array[9]['Tuesday'];?></td>
            <td id="W9"><?php if ($ok == 1 && $array[19]['Wednesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("W9").style.backgroundColor = "green";document.getElementById("W9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Wednesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("W9").style.backgroundColor = "#FF7B00";document.getElementById("W9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Wednesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("W9").style.backgroundColor = "red";document.getElementById("W9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Wednesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("W9").style.backgroundColor = "none";document.getElementById("W9").style.color = "black";</script>';}
                        echo $array[9]['Wednesday'];?></td>
            <td id="TH9"><?php if ($ok == 1 && $array[19]['Thursday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("TH9").style.backgroundColor = "green";document.getElementById("TH9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Thursday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("TH9").style.backgroundColor = "#FF7B00";document.getElementById("TH9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Thursday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("TH9").style.backgroundColor = "red";document.getElementById("TH9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Thursday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("TH9").style.backgroundColor = "none";document.getElementById("TH9").style.color = "black";</script>';}
                        echo $array[9]['Thursday'];?></td>
            <td id="F9"><?php if ($ok == 1 && $array[19]['Friday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("F9").style.backgroundColor = "green";document.getElementById("F9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Friday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("F9").style.backgroundColor = "#FF7B00";document.getElementById("F9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Friday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("F9").style.backgroundColor = "red";document.getElementById("F9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Friday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("F9").style.backgroundColor = "none";document.getElementById("F9").style.color = "black";</script>';}
                        echo $array[9]['Friday'];?></td>
            <td id="S9"><?php if ($ok == 1 && $array[19]['Saturday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("S9").style.backgroundColor = "green";document.getElementById("S9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Saturday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("S9").style.backgroundColor = "#FF7B00";document.getElementById("S9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Saturday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("S9").style.backgroundColor = "red";document.getElementById("S9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Saturday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("S9").style.backgroundColor = "none";document.getElementById("S9").style.color = "black";</script>';}
                        echo $array[9]['Saturday'];?></td>
            <td id="SU9"><?php if ($ok == 1 && $array[19]['Sunday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("SU9").style.backgroundColor = "green";document.getElementById("SU9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Sunday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("SU9").style.backgroundColor = "#FF7B00";document.getElementById("SU9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Sunday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("SU9").style.backgroundColor = "red";document.getElementById("SU9").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[19]['Sunday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("SU9").style.backgroundColor = "none";document.getElementById("SU9").style.color = "black";</script>';}
                        echo $array[9]['Sunday'];?></td>
          </tr>
          <tr>
            <td>18:00 – 19:00</td>
            <td><?php echo $array[10]['Monday'];?></td>
            <td><?php echo $array[10]['Tuesday'];?></td>
            <td><?php echo $array[10]['Wednesday'];?></td>
            <td><?php echo $array[10]['Thursday'];?></td>
            <td><?php echo $array[10]['Friday'];?></td>
            <td><?php echo $array[10]['Saturday'];?></td>
            <td><?php echo $array[10]['Sunday'];?></td>
          </tr>
          <tr>
            <td>19:00 – 20:00</td>
            <td id="M11"><?php if ($ok == 1 && $array[20]['Monday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("M11").style.backgroundColor = "green";document.getElementById("M11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Monday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("M11").style.backgroundColor = "#FF7B00";document.getElementById("M11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Monday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("M11").style.backgroundColor = "red";document.getElementById("M11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Monday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("M11").style.backgroundColor = "none";document.getElementById("M11").style.color = "black";</script>';}
                        echo $array[11]['Monday'];?></td>
            <td id="T11"><?php if ($ok == 1 && $array[20]['Tuesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("T11").style.backgroundColor = "green";document.getElementById("T11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Tuesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("T11").style.backgroundColor = "#FF7B00";document.getElementById("T11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Tuesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("T11").style.backgroundColor = "red";document.getElementById("T11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Tuesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("T11").style.backgroundColor = "none";document.getElementById("T11").style.color = "black";</script>';}
                        echo $array[11]['Tuesday'];?></td>
            <td id="W11"><?php if ($ok == 1 && $array[20]['Wednesday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("W11").style.backgroundColor = "green";document.getElementById("W11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Wednesday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("W11").style.backgroundColor = "#FF7B00";document.getElementById("W11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Wednesday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("W11").style.backgroundColor = "red";document.getElementById("W11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Wednesday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("W11").style.backgroundColor = "none";document.getElementById("W11").style.color = "black";</script>';}
                        echo $array[11]['Wednesday'];?></td>
            <td id="TH11"><?php if ($ok == 1 && $array[20]['Thursday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("TH11").style.backgroundColor = "green";document.getElementById("TH11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Thursday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("TH11").style.backgroundColor = "#FF7B00";document.getElementById("TH11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Thursday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("TH11").style.backgroundColor = "red";document.getElementById("TH11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Thursday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("TH11").style.backgroundColor = "none";document.getElementById("TH11").style.color = "black";</script>';}
                        echo $array[11]['Thursday'];?></td>
            <td id="F11"><?php if ($ok == 1 && $array[20]['Friday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("F11").style.backgroundColor = "green";document.getElementById("F11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Friday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("F11").style.backgroundColor = "#FF7B00";document.getElementById("F11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Friday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("F11").style.backgroundColor = "red";document.getElementById("F11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Friday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("F11").style.backgroundColor = "none";document.getElementById("F11").style.color = "black";</script>';}
                        echo $array[11]['Friday'];?></td>
            <td id="S11"><?php if ($ok == 1 && $array[20]['Saturday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("S11").style.backgroundColor = "green";document.getElementById("S11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Saturday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("S11").style.backgroundColor = "#FF7B00";document.getElementById("S11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Saturday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("S11").style.backgroundColor = "red";document.getElementById("S11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Saturday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("S11").style.backgroundColor = "none";document.getElementById("S11").style.color = "black";</script>';}
                        echo $array[11]['Saturday'];?></td>
            <td id="SU11"><?php if ($ok == 1 && $array[20]['Sunday'] == '1') { echo '<script type="text/JavaScript">document.getElementById("SU11").style.backgroundColor = "green";document.getElementById("SU11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Sunday'] == '2') { echo '<script type="text/JavaScript">document.getElementById("SU11").style.backgroundColor = "#FF7B00";document.getElementById("SU11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Sunday'] == '3') { echo '<script type="text/JavaScript">document.getElementById("SU11").style.backgroundColor = "red";document.getElementById("SU11").style.color = "white";</script>';}
                        else if ($ok == 1 && $array[20]['Sunday'] == '0') { echo '<script type="text/JavaScript">document.getElementById("SU11").style.backgroundColor = "none";document.getElementById("SU11").style.color = "black";</script>';}
                        echo $array[11]['Sunday'];?></td>
          </tr>
        </tbody>
      </table>
    </div>



  </body>
</html>
