<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style-extra.css">
    <title>1600cal</title>
  </head>
  <body>

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
          $ok = 1;
          if (isset($_SESSION['pro']) && $_SESSION['pro'] != '') {
              $profile = $_SESSION['pro'];
          }
      }

      $cal = "cal1600";

      $day1q = mysqli_query($conn, "SELECT * FROM ".$cal."");
      $arrayd1 = array();
      while($row = mysqli_fetch_assoc($day1q)) {
        $arrayd1[] = $row;
      }
      $day2q = mysqli_query($conn, "SELECT * FROM ".$cal."D2");
      $arrayd2 = array();
      while($row = mysqli_fetch_assoc($day2q)) {
        $arrayd2[] = $row;
      }
      $day3q = mysqli_query($conn, "SELECT * FROM ".$cal."D3");
      $arrayd3 = array();
      while($row = mysqli_fetch_assoc($day3q)) {
        $arrayd3[] = $row;
      }
      $day4q = mysqli_query($conn, "SELECT * FROM ".$cal."D4");
      $arrayd4 = array();
      while($row = mysqli_fetch_assoc($day4q)) {
        $arrayd4[] = $row;
      }
      $day6q = mysqli_query($conn, "SELECT * FROM ".$cal."D5");
      $arrayd6 = array();
      while($row = mysqli_fetch_assoc($day6q)) {
        $arrayd6[] = $row;
      }
      $day7q = mysqli_query($conn, "SELECT * FROM ".$cal."D6");
      $arrayd7 = array();
      while($row = mysqli_fetch_assoc($day7q)) {
        $arrayd7[] = $row;
      }

      if (isset($_POST['choose'])) {
        if ($ok == 0) {
          // echo 'alert("a")';
          exit(header("Location:http://localhost/Y9/Login-Signup.php"));
        }
        else if ($ok == 1){
          $sqlU = mysqli_query($conn, "UPDATE userstable SET Nut='1600cal' WHERE username='".$user."'");
          $planAdded = 1;
          // echo '<h3 style="color:red; margin-left: 43%;" id="alert">Plan succesfully added</h3>';
        }
      }
      if (isset($_POST['table'])) {
        if ($profile == 1) {
          $profile = 0;
          $_SESSION['pro'] = $profile;
          exit(header("Location:http://localhost/Y9/Profile.php"));
        }
        else if ($profile == 0){
          exit(header("Location:http://localhost/Y9/Nutrition.php"));
        }
      }
    ?>

    <div id="div-img-btn">
      <form method="post">
        <a id="div-btn"><button id="hideChoose" name="table">Return</button></a>
      </form>
      <form method="post">
        <a id="btn-choose"><button id="hideChoose" name="choose">Choose</button></a>
      </form>
      <div id="div-img">
        <div id="day1">
          <table id="table-nut">
            <thead>
              <tr id="main-head">
                <th>Day(1)</th>
                <th></th>
                <th>Cal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $arrayd1[0]['Day'];?></td>
                <td><?php echo $arrayd1[0]['total_calories'];?></td>
                <td><?php echo $arrayd1[0]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd1[1]['Day'];?></td>
                <td><?php echo $arrayd1[1]['total_calories'];?></td>
                <td><?php echo $arrayd1[1]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd1[2]['Day'];?></td>
                <td><?php echo $arrayd1[2]['total_calories'];?></td>
                <td><?php echo $arrayd1[2]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd1[3]['Day'];?></td>
                <td><?php echo $arrayd1[3]['total_calories'];?></td>
                <td><?php echo $arrayd1[3]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd1[4]['Day'];?></td>
                <td><?php echo $arrayd1[4]['total_calories'];?></td>
                <td><?php echo $arrayd1[4]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd1[5]['Day'];?></td>
                <td><?php echo $arrayd1[5]['total_calories'];?></td>
                <td><?php echo $arrayd1[5]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd1[6]['Day'];?></td>
                <td><?php echo $arrayd1[6]['total_calories'];?></td>
                <td><?php echo $arrayd1[6]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd1[7]['Day'];?></td>
                <td><?php echo $arrayd1[7]['total_calories'];?></td>
                <td><?php echo $arrayd1[7]['Cal'];?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="day2">
          <table id="table-nut">
            <thead>
              <tr id="main-head">
                <th>Day(2)</th>
                <th></th>
                <th>Cal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $arrayd2[0]['Day'];?></td>
                <td><?php echo $arrayd2[0]['total_calories'];?></td>
                <td><?php echo $arrayd2[0]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd2[1]['Day'];?></td>
                <td><?php echo $arrayd2[1]['total_calories'];?></td>
                <td><?php echo $arrayd2[1]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd2[2]['Day'];?></td>
                <td><?php echo $arrayd2[2]['total_calories'];?></td>
                <td><?php echo $arrayd2[2]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd2[3]['Day'];?></td>
                <td><?php echo $arrayd2[3]['total_calories'];?></td>
                <td><?php echo $arrayd2[3]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd2[4]['Day'];?></td>
                <td><?php echo $arrayd2[4]['total_calories'];?></td>
                <td><?php echo $arrayd2[4]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd2[5]['Day'];?></td>
                <td><?php echo $arrayd2[5]['total_calories'];?></td>
                <td><?php echo $arrayd2[5]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd2[6]['Day'];?></td>
                <td><?php echo $arrayd2[6]['total_calories'];?></td>
                <td><?php echo $arrayd2[6]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd2[7]['Day'];?></td>
                <td><?php echo $arrayd2[7]['total_calories'];?></td>
                <td><?php echo $arrayd2[7]['Cal'];?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="day3">
          <table id="table-nut">
            <thead>
              <tr id="main-head">
                <th>Day(3)</th>
                <th></th>
                <th>Cal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $arrayd3[0]['Day'];?></td>
                <td><?php echo $arrayd3[0]['total_calories'];?></td>
                <td><?php echo $arrayd3[0]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd3[1]['Day'];?></td>
                <td><?php echo $arrayd3[1]['total_calories'];?></td>
                <td><?php echo $arrayd3[1]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd3[2]['Day'];?></td>
                <td><?php echo $arrayd3[2]['total_calories'];?></td>
                <td><?php echo $arrayd3[2]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd3[3]['Day'];?></td>
                <td><?php echo $arrayd3[3]['total_calories'];?></td>
                <td><?php echo $arrayd3[3]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd3[4]['Day'];?></td>
                <td><?php echo $arrayd3[4]['total_calories'];?></td>
                <td><?php echo $arrayd3[4]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd3[5]['Day'];?></td>
                <td><?php echo $arrayd3[5]['total_calories'];?></td>
                <td><?php echo $arrayd3[5]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd3[6]['Day'];?></td>
                <td><?php echo $arrayd3[6]['total_calories'];?></td>
                <td><?php echo $arrayd3[6]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd3[7]['Day'];?></td>
                <td><?php echo $arrayd3[7]['total_calories'];?></td>
                <td><?php echo $arrayd3[7]['Cal'];?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="day4">
          <table id="table-nut">
            <thead>
              <tr id="main-head">
                <th>Day(4)</th>
                <th></th>
                <th>Cal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $arrayd4[0]['Day'];?></td>
                <td><?php echo $arrayd4[0]['total_calories'];?></td>
                <td><?php echo $arrayd4[0]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd4[1]['Day'];?></td>
                <td><?php echo $arrayd4[1]['total_calories'];?></td>
                <td><?php echo $arrayd4[1]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd4[2]['Day'];?></td>
                <td><?php echo $arrayd4[2]['total_calories'];?></td>
                <td><?php echo $arrayd4[2]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd4[3]['Day'];?></td>
                <td><?php echo $arrayd4[3]['total_calories'];?></td>
                <td><?php echo $arrayd4[3]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd4[4]['Day'];?></td>
                <td><?php echo $arrayd4[4]['total_calories'];?></td>
                <td><?php echo $arrayd4[4]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd4[5]['Day'];?></td>
                <td><?php echo $arrayd4[5]['total_calories'];?></td>
                <td><?php echo $arrayd4[5]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd4[6]['Day'];?></td>
                <td><?php echo $arrayd4[6]['total_calories'];?></td>
                <td><?php echo $arrayd4[6]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd4[7]['Day'];?></td>
                <td><?php echo $arrayd4[7]['total_calories'];?></td>
                <td><?php echo $arrayd4[7]['Cal'];?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="day6">
          <table id="table-nut">
            <thead>
              <tr id="main-head">
                <th>Day(5 & 7)</th>
                <th></th>
                <th>Cal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $arrayd6[0]['Day'];?></td>
                <td><?php echo $arrayd6[0]['total_calories'];?></td>
                <td><?php echo $arrayd6[0]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd6[1]['Day'];?></td>
                <td><?php echo $arrayd6[1]['total_calories'];?></td>
                <td><?php echo $arrayd6[1]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd6[2]['Day'];?></td>
                <td><?php echo $arrayd6[2]['total_calories'];?></td>
                <td><?php echo $arrayd6[2]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd6[3]['Day'];?></td>
                <td><?php echo $arrayd6[3]['total_calories'];?></td>
                <td><?php echo $arrayd6[3]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd6[4]['Day'];?></td>
                <td><?php echo $arrayd6[4]['total_calories'];?></td>
                <td><?php echo $arrayd6[4]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd6[5]['Day'];?></td>
                <td><?php echo $arrayd6[5]['total_calories'];?></td>
                <td><?php echo $arrayd6[5]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd6[6]['Day'];?></td>
                <td><?php echo $arrayd6[6]['total_calories'];?></td>
                <td><?php echo $arrayd6[6]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd6[7]['Day'];?></td>
                <td><?php echo $arrayd6[7]['total_calories'];?></td>
                <td><?php echo $arrayd6[7]['Cal'];?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="day7">
          <table id="table-nut">
            <thead>
              <tr id="main-head">
                <th>Day(6)</th>
                <th></th>
                <th>Cal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $arrayd7[0]['Day'];?></td>
                <td><?php echo $arrayd7[0]['total_calories'];?></td>
                <td><?php echo $arrayd7[0]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd7[1]['Day'];?></td>
                <td><?php echo $arrayd7[1]['total_calories'];?></td>
                <td><?php echo $arrayd7[1]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd7[2]['Day'];?></td>
                <td><?php echo $arrayd7[2]['total_calories'];?></td>
                <td><?php echo $arrayd7[2]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd7[3]['Day'];?></td>
                <td><?php echo $arrayd7[3]['total_calories'];?></td>
                <td><?php echo $arrayd7[3]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd7[4]['Day'];?></td>
                <td><?php echo $arrayd7[4]['total_calories'];?></td>
                <td><?php echo $arrayd7[4]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd7[5]['Day'];?></td>
                <td><?php echo $arrayd7[5]['total_calories'];?></td>
                <td><?php echo $arrayd7[5]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd7[6]['Day'];?></td>
                <td><?php echo $arrayd7[6]['total_calories'];?></td>
                <td><?php echo $arrayd7[6]['Cal'];?></td>
              </tr>
              <tr>
                <td><?php echo $arrayd7[7]['Day'];?></td>
                <td><?php echo $arrayd7[7]['total_calories'];?></td>
                <td><?php echo $arrayd7[7]['Cal'];?></td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>

  </body>
</html>
