<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style-profile3.css">
    <title>Profile</title>

    <script type="text/javascript">
      function change() {
        document.getElementById("dob").setAttribute("readonly", "false");
        document.getElementById("gender").setAttribute("readonly", "false");
      }
      function editBtn() {
        document.getElementById("edit-btn").style.display="none";
        document.getElementById("nutP-btn").style.display="none";
        document.getElementById("cancel-btn").style.display="block";
        document.getElementById("done-btn").style.display="block";
        document.getElementById('dob').removeAttribute('readonly');
        document.getElementById('gender').removeAttribute('readonly');
        document.getElementById("dob").value = "";
        document.getElementById("gender").value = "";
      }
      function cancelBtn() {
        document.getElementById("edit-btn").style.display="block";
        document.getElementById("nutP-btn").style.display="block";
        document.getElementById("cancel-btn").style.display="none";
        document.getElementById("done-btn").style.display="none";
        document.getElementById('dob').readOnly = true;
        document.getElementById('gender').readOnly = true;
      }
    </script>

  </head>
  <?php
    session_start();
    if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
        $user = $_SESSION['username'];
    }
  ?>
  <body>
    <div class="top-menu">
      <div class="menu" id="top-menu-div-logo">
        <img class = "logo" src="logo-wb.png">
      </div>
      <div class="menu" id="top-menu-div-1">
        <form method="post">
           <a href="#home"> <li><p><button id="logout" name="home">Home</button></p></li> </a>
        </form>
        <form method="post">
           <a href="#about"> <li><p><button id="logout" name="about">About</button></p></li> </a>
        </form>
        <!-- <a href="#about"> <li><p>About</p></li> </a> -->
        <form method="post">
          <li>
            <button id="logout" name="logout" >Logout</button>
          </li>
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

      if (isset($_POST['home'])) {
        $_SESSION['username'] = $user;
        exit(header("Location:http://localhost/Y9/index.php"));
      }
      if (isset($_POST['logout'])) {
        $_SESSION['username'] = "";
        exit(header("Location:http://localhost/Y9/index.php"));
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

      function getValue ($val, $conn, $user) {
        if ($val == 1) {
          $sqlA = mysqli_query($conn, "SELECT email FROM userstable WHERE username='$user'");
          $array = mysqli_fetch_all($sqlA, MYSQLI_ASSOC);
        }
        else if ($val == 2) {
          $sqlB = mysqli_query($conn, "SELECT dob FROM userstable WHERE username='$user'");
          $array = mysqli_fetch_all($sqlB, MYSQLI_ASSOC);
        }
        else if ($val == 3) {
          $sqlC = mysqli_query($conn, "SELECT gender FROM userstable WHERE username='$user'");
          $array = mysqli_fetch_all($sqlC, MYSQLI_ASSOC);
        }
        else if ($val == 4) {
          $sqlN = mysqli_query($conn, "SELECT Nut FROM userstable WHERE username='$user'");
          $array = mysqli_fetch_all($sqlN, MYSQLI_ASSOC);
        }
        foreach ($array as $key => $value) {
          $a = $value;
          // echo $value;
          foreach ($a as $key => $value) {
            $b = $value;
            // echo $value;
          }
        }

        return $b;
      }

      $email = getValue(1, $conn, $user);
      $dob = getValue(2, $conn, $user);
      $gender = getValue(3, $conn, $user);
      $nutP = getValue(4, $conn, $user);

      if (isset($_POST['done'])) {
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

        $query = mysqli_query($conn, "SELECT username FROM userstable WHERE username='$user' and email='$email'");

        if (mysqli_num_rows($query) > 0) {
          if ($dob != "" && $gender != "") {
            $sql1 = "UPDATE userstable SET dob = '$dob', gender = '$gender' WHERE username='$user';";
            mysqli_query($conn, $sql1);
          }
          else if ($dob != "" && $gender == "") {
            $sql2 = "UPDATE userstable SET dob = '$dob' WHERE username='$user';";
            mysqli_query($conn, $sql2);
          }
          else if ($dob == "" && $gender != "") {
            $sql3 = "UPDATE userstable SET gender = '$gender' WHERE username='$user';";
            mysqli_query($conn, $sql3);
          }
        }
        $email = getValue(1, $conn, $user);
        $dob = getValue(2, $conn, $user);
        $gender = getValue(3, $conn, $user);
      }
      if (isset($_POST['cancel'])) {
        $email = getValue(1, $conn, $user);
        $dob = getValue(2, $conn, $user);
        $gender = getValue(3, $conn, $user);
      }

    ?>

    <center>
      <div class="main-div">
        <form method="POST" class="main">
          <img class="main-pic" src="logo-wb.png">
          <input type="file" name="" id="file" accept="image/*">
          <label for="file">edit pic</label>
          <input type="text" style="color: white;" name="username" readonly value="<?php echo (isset($user)) ? $user: ''?>">
          <input type="email" style="color: white;" name="email" readonly value="<?php echo (isset($email)) ? $email: ''?>">
          <input type="text" style="color: white;" name="dob" id="dob" placeholder="Date of birth" readonly value="<?php echo (isset($dob)) ? $dob: ''?>">
          <input type="text" style="color: white;" name="gender" id="gender" placeholder="Gender" readonly value="<?php echo (isset($gender)) ? $gender: ''?>">
          <button type="button" id="edit-btn" style="margin-top: 5%;" onclick="editBtn()">Edit</button>
          <button id="cancel-btn" style="float: left;margin:5% 0 0 18.2%;" onclick="cancelBtn()" name="cancel">Cancel</button>
          <button id="done-btn" style="float: right;margin:5% 18.2% 0 0;" onclick="change()" name="done">Done</button>
          <button name="nutP" id="nutP-btn" style="margin-top: 5%;">Nutrition Plan</button>
        </from>
      </div>
    </center>

    <?php
    // echo $nutP;
      $profile = 1;
      if(isset($_POST['nutP'])){
        if ($nutP == "1600cal") {
          $_SESSION['pro'] = $profile;
          header("Location:http://localhost/Y9/cal1600.php");
          exit();
        }
        else if ($nutP == "1200cal") {
          $_SESSION['pro'] = $profile;
          header("Location:http://localhost/Y9/cal1200.php");
          exit();
        }
        else if ($nutP == "1400cal") {
          $_SESSION['pro'] = $profile;
          header("Location:http://localhost/Y9/cal1400.php");
          exit();
        }
        else if ($nutP == "1700cal") {
          $_SESSION['pro'] = $profile;
          header("Location:http://localhost/Y9/cal1700.php");
          exit();
        }
        else if ($nutP == "1800cal") {
          $_SESSION['pro'] = $profile;
          header("Location:http://localhost/Y9/cal1800.php");
          exit();
        }
        else {
          echo '<h3 style="color:red; margin-left: 41.5%; margin-top: -10%;">You have not chosen any Nutrition Plans</h3>';
        }
      }

     ?>

  </body>
</html>
