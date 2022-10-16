<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style-login.css">
    <title>LogIn-SignUp</title>

    <script type="text/javascript">
      function Login() {
        window.open('file:///D:/Users/Desktop/Folders/Uni/Study/SEM_1/COMP10120/Group%20Project/Y9/Profile.html', '_blank');
      }
      function SignUp (){
        // var url = 'https://api.apispreadsheets.com/data/owvtZ8h6YU8o8q0q/';
        // var url = 'https://api.apispreadsheets.com/data/koeOcyeBNIPRRyxX/';
        var username = document.getElementById('su-username').value;
        var email = document.getElementById('su-email').value;
        var password = document.getElementById('su-password').value;
        var cpassword = document.getElementById('su-cpassword').value;
      }
      function change() {
        document.getElementById('li-username').value = '';
        document.getElementById('li-password').value = '';
        document.getElementById('su-username').value = '';
        document.getElementById('su-email').value = '';
        document.getElementById('su-password').value = '';
        document.getElementById('su-cpassword').value = '';
        var decider = document.getElementById('switch-checker');
        if(decider.checked){
          changeToSignUp();
        }
        else {
          changeToLogIn();
        }
      }
      // var form = document.getElementById("con-form");
      function changeToSignUp(){
        document.getElementById("form-login").style.display="none";
        document.getElementById("form-signup").style.display="block";
        // document.getElementById("changeToLogIn").style.display="block";
        // document.getElementById("changeToSignUp").style.display="none";
        document.getElementById("button-login").style.display="none";
        document.getElementById("button-signup").style.display="block";
        // window.alert("The select function is called.");
        document.getElementById("form-login").style.height="80%";
        document.getElementById("form-signup").style.height="80%";
      }
      function changeToLogIn(){
        document.getElementById("form-signup").style.display="none";
        document.getElementById("form-login").style.display="block";
        // document.getElementById("changeToSignUp").style.display="block";
        // document.getElementById("changeToLogIn").style.display="none";
        document.getElementById("button-login").style.display="block";
        document.getElementById("button-signup").style.display="none";
        document.getElementById("form-login").style.height="60%";
        document.getElementById("form-signup").style.height="60%";
        // window.alert("The select function is called.");
      }
    </script>
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
      //echo "Connected successfully";
      if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pwd = $_POST['password'];

        if ($user != "" && $pwd != "") {
          $sqlP = "SELECT username, password FROM login WHERE username = '$user'";
          $pdo = new pdo('mysql:host=localhost;dbname=plansmarter', 'root', '');
          $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

          $stmt = $pdo->prepare($sqlP);
          $stmt->execute(['username' => $user]);
          $stmt->setFetchMode(PDO::FETCH_ASSOC);

          while($row = $stmt->fetch()) {
            if (password_verify($pwd, $row['password'])) {
              $_SESSION['username'] = $user;
              exit(header("Location:http://localhost:80/Y9/Profile.php"));
            }
            else {
              echo '<h4 style="color:red; margin-left: 41%; position:absolute; margin-top: 40%;" id="Errorh3">Incorrect username or password, try again</h4>';
            }
          }
          // $query = mysqli_query($conn, "SELECT username FROM login WHERE username='$user' and password='$pwd'");
          //
          // if (mysqli_num_rows($query) == 1) {
          //   $ifExist = mysqli_query($conn, "SELECT username FROM userstable WHERE username='$user'");
          //
          //   if (mysqli_num_rows($ifExist) == 1) {
          //     $_SESSION['username'] = $user;
          //     exit(header("Location:http://localhost:80/Y9/Profile.php"));
          //     // header("location:http://localhost/Y9/Profile.html");
          //   }
          //   // else {
          //   //   $sql = "INSERT INTO usersTable (user, table_name, isset) values ('$user', '', 0);";
          //   //   mysqli_query($conn, $sql);
          //   //   $_SESSION['username'] = $user;
          //   //   header("location:http://localhost:80/NEA/create.php");
          //   // }
          // }
          // else {
          //     echo '<h4 style="color:red; margin-left: 41%; position:absolute; margin-top: 40%;" id="Errorh3">Incorrect username or password, try again</h4>';
          // }
        }
        else {
          echo "<h4 style='color:red; margin-left: 41%; position:absolute; margin-top: 40%;' id='Errorh3'>Both username and password are required</h4>";
        }
      }
    ?>
  </head>
  <body>
    <img class = "logo" src="logo-wb.png">
    <a href="http://localhost/Y9/index.php">
      <button type="button" name="button" class="home">Home</button>
    </a>

    <div id="con-form">
      <!-- <button type="button" name="button" id="changeToSignUp" onclick = "changeToSignUp()">SignUp</button> -->
      <!-- <button type="button" name="button" id="changeToLogIn" onclick = "changeToLogIn()">LogIn</button> -->
      <div class="signUp-logIn">
        <div class="floater">
          <p id="signUp">Log In</p> <p id="logIn">Sign Up</p>
        </div>
      </div>
      <div class="switchDiv">
        <label class="switch">
          <input type="checkbox" id="switch-checker" onclick="change()">
          <span class="slider round"></span>
        </label>
      </div>
      <!-- <div class="forms"> -->
      <div class="form-signup-div">
        <form method="POST" id="form-login">
          <input type="text" id="li-username" class = "username" name="username" placeholder="Username">
          <br>
          <input type="password" id="li-password" name="password" placeholder="Password">
          <br>
          <button class="button_form" id="button-login" onclick="Login()" name = "login">Log in</button>
          <!-- <p> Not a member yet? Sign Up <a href="file:///D:/Users/Desktop/Folders/Uni/Study/SEM_1/COMP10120/Group%20Project/Y9/SignUp.html">here</a></p> -->
        </form>
        <form method="POST" id="form-signup">
          <input type="text" id="su-username" class = "su-username" name="username" placeholder="Username">
          <br>
          <input type="text" id="su-email" name="email" placeholder="Emial">
          <br>
          <input type="password" id="su-password" name="password" placeholder="Password">
          <br>
          <input type="password" id="su-cpassword" name="c-password" placeholder="Confirm Password">
          <br>
          <button class="button_form" id="button-signup" onclick="SignUp()" name="signup">Sign Up</button>
          <!-- <p> Already a member? Log in <a href="file:///D:/Users/Desktop/Folders/Uni/Study/SEM_1/COMP10120/Group%20Project/Y9/Login.html">here</a></p> -->
        </form>
        <!-- <button class="button_form" id="button-signup" onclick="SignUp()" name="signup">Sign Up</button> -->
      </div>
      <div class="ErrorMsg">
        <?php
          if (isset($_POST['signup'])) {
            $user = $_POST['username'];
            $email = $_POST['email'];
            $userCheck = strtolower($user);
            $pwd = $_POST['password'];
            $cpwd = $_POST['c-password'];

            if ($user != "" && $pwd != "" && $email != "" && $cpwd != "") {
              $queryU = mysqli_query($conn, "SELECT username FROM login WHERE username='$user'");
              $queryE = mysqli_query($conn, "SELECT email FROM login WHERE email='$email'");

              if (mysqli_num_rows($queryU) > 0) {
                echo "<h4 style='color:red;' id='Errorh3'>Such username already exists, try again</h4>";
              }
              else if (mysqli_num_rows($queryE) > 0) {
                echo "<h4 style='color:red;' id='Errorh3'>Such email is already registered, try again</h4>";
              }
              else if ($pwd != $cpwd) {
                  echo "<h4 style='color:red;' id='Errorh3'>Passwords do not match, try again</h4>";
              }
              else {
                $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                $cpwd = password_hash($cpwd, PASSWORD_DEFAULT);
                $sqlL = "INSERT INTO login (username, email, password) values ('$user', '$email','$pwd');";
                mysqli_query($conn, $sqlL);
                $sqlU = "INSERT INTO userstable (username, email, dob, gender) values ('$user', '$email', '', '');";
                mysqli_query($conn, $sqlU);
                $sqlS = "CREATE TABLE ".$user." (
                            time1 VARCHAR(250) NOT NULL,
                            Monday VARCHAR(250) NOT NULL,
                            Tuesday VARCHAR(250) NOT NULL,
                            Wednesday VARCHAR(250) NOT NULL,
                            Thursday VARCHAR(250) NOT NULL,
                            Friday VARCHAR(250) NOT NULL,
                            Saturday VARCHAR(250) NOT NULL,
                            Sunday VARCHAR(250) NOT NULL
                          )";
                mysqli_query($conn, $sqlS);
                $sqlT = "INSERT INTO ".$user." (time1) values ('8:00 – 9:00'), ('9:00 – 10:00'), ('10:00 – 11:00'), ('11:00 – 12:00'),
                                                              ('12:00 – 13:00'), ('13:00 – 14:00'), ('14:00 – 15:00'),
                                                              ('15:00 – 16:00'), ('16:00 – 17:00'), ('17:00 – 18:00'),
                                                              ('18:00 – 19:00'), ('19:00 – 20:00'), ('2'), ('3'), ('4'), ('5'),
                                                              ('7'), ('8'), ('9'), ('10'), ('12');";
                mysqli_query($conn, $sqlT );
                // $sqlB = "INSERT INTO ".$user." (time1) values ('8:00 – 9:00'), ('9:00 – 10:00'), ('10:00 – 11:00'), ('11:00 – 12:00'),
                //                                               ('12:00 – 13:00'), ('13:00 – 14:00'), ('14:00 – 15:00'),
                //                                               ('15:00 – 16:00'), ('16:00 – 17:00'), ('17:00 – 18:00'),
                //                                               ('18:00 – 19:00'), ('19:00 – 20:00'), ('2'), ('3'), ('4'), ('5'),
                //                                               ('7'), ('8'), ('9'), ('10'), ('12');";
                // mysqli_query($conn, $sqlB );
                // $user = $_POST['username'];
                // session_start();
                // $_SESSION['username'] = $user;
                // header("location:http://localhost:80/NEA/create.php");
              }
            }
            else {
              echo "<h4 style='color:red;' id='Errorh3'>All entries are required, try again</h4>";
            }
          }
        ?>
      </div>
      <!-- </div> -->
    </div>


  </body>
</html>
