<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Include your meta tags, title, and CSS links here -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>

    <!-- font awasome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header class="reg-header">
      <div class="container">
        <header class="header">
<!-- logo  -->
          <a href="#" class="logo"
            ><img src="./imgs/logo.png" alt=""></i> SHIV
            <span>Diagnostic Center</span></a
          >
<!-- navbar  -->
          <nav class="navbar">
            <a href="./index.html">home</a>
            <a href="./index.html">about</a>
            <a href="./index.html">services</a>
            <a href="./index.html">doctors</a>
            <a href="./index.html">gallery</a>
            <a href="./index.html">reviews</a>
            <a href="./index.html">book</a>
          </nav>

          <div id="menu-btn" class="fas fa-bar"></div>
        </header>
      </div>

      <main>
        <section class="user-container ">
          <!-- ***************************************** -->

          <div class="reg">
            <div class="grid-two--column">
              <div class="form-text">
                <h2>Welcome back!</h2>
                <p>
                  To keep connected with us please login with your personal
                  information.
                </p>
                <p style="color:#f1f1f1; margin-bottom: .5rem; margin-top: 4rem; font-size: 1.3rem;">Already have an account?</p>
                <button class="login-btn">Login Here</button>
              </div>

                    <?php
                    include("config.php");
                    if (isset($_POST['submit'])) {
                      $username = $_POST['username'];
                      $email = $_POST['email'];
                      $password = $_POST['password'];

                      //verifying the uniq email
                      $varify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
                      if (mysqli_num_rows($varify_query) != 0) {
                        echo '<script>alert("this email is used, try another one please");</script>';
                        echo '<script>window.location.href = "reg.php";</script>';
                      } 
                      else 
                      {
                        mysqli_query($con, "INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')") or die("error occured!");
                        echo "<div class='message'>
                        <p>registration successfully</p>
                        </div><br>";
                        echo '<script>alert("registration successfully please login!!");</script>';
                        echo '<script>window.location.href = "reg.php";</script>';
                    
                      }
                    } else {
                      ?>
              <div class="reg-form">
                <h2>Create Account</h2>

                <div class="social-icons">
                  <a href="https://g.co/kgs/DeZWzd" target="_blank"
                    ><i class="fa-brands fa-whatsapp"></i
                  ></a>
                  <a href="https://g.co/kgs/DeZWzd" target="_blank"
                    ><i class="fa-brands fa-twitter"></i
                  ></a>
                  <a href="https://g.co/kgs/DeZWzd" target="_blank"
                    ><i class="fa-brands fa-linkedin-in"></i
                  ></a>
                  <a href="https://g.co/kgs/DeZWzd" target="_blank"
                    ><i class="fa-brands fa-instagram"></i
                  ></a>
                  <a href="https://g.co/kgs/DeZWzd" target="_blank"
                    ><i class="fa-brands fa-discord"></i
                  ></a>
                </div>

                <p>or use your emails for registration</p>
                <form action="" method="post">
                  <div class="input-field">
                    <label for="username">
                      <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Name"
                        required
                      />
                    </label>
                  </div>

                  <div class="input-field">
                    <label for="email">
                      <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Email"
                        required
                      />
                    </label>
                  </div>

                  <div class="input-field">
                    <label for="password">
                      <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password"
                        required
                      />
                    </label>
                  </div>

                  <div class="input-field">
                    <input type="submit" name="submit" value="register" />
                  </div>
                </form>
              </div>
            </div>
          </div>

          <?php } ?>
          <!-- *********************************************************** -->

          <?php
          // session_start();
          include("config.php");

          if (isset($_POST['submit1'])) {
            $email1 = mysqli_real_escape_string($con, $_POST['email1']);
            $password1 = mysqli_real_escape_string($con, $_POST['password1']);

            $result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email1' AND Password='$password1'") or die("select error");
            $row = mysqli_fetch_assoc($result);

            if (is_array($row) && !empty($row)) {
              $_SESSION['valid'] = $row['Email'];
              $_SESSION['username'] = $row['Username'];
              $_SESSION['id'] = $row['Id'];

              if($email1=="sdcenter24@gmail.com" && $password1=="2024")
              {
                echo'<script>window.location.href = "admin_login.html";</script>';
              }
              else{
              echo '<script>window.location.href = "index1.php";</script>';
              }

              exit; // Add exit to prevent further execution
            } else {
              echo '<script>alert("wrong username and password ");</script>';
              echo '<script>window.location.href = "reg.php";</script>';
            }
          } else {
            ?>

            <div class="login">
              <div class="grid-two--column">
                <div class="form-text">
                  <h2>Hello, Friends!</h2>
                  <p>Enter your personal details and start the journey with us</p>
                  <p style="color:#f1f1f1; margin-bottom: .5rem; margin-top: 4rem; font-size: 1.3rem;">Don't have an account?</p>
                  <button class="reg-btn">Register Here</button>
                </div>
          
                <div class="login-form">
                  <h2>Log in</h2>
          
                  <div class="social-icons">
                    <!-- Your social icons here -->
                  </div>
          
                  <p>or use your account</p>
                  <form action="" method="post">
                    <div class="input-field">
                      <label for="email1">
                        <input type="email" name="email1" id="email1" placeholder="email" required />
                      </label>
                    </div>
          
                    <div class="input-field">
                      <label for="password1">
                        <input type="password" name="password1" id="password1" placeholder="Password" required />
                      </label>
                    </div>
          
                    <div class="input-field">
                      <input type="submit" name="submit1" value="Login" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>

        </section>
      </main>
    </header>

    <!-- Include your script and other script tags here -->
    <!-- js files  -->
    <script
      src="https://kit.fontawesome.com/db13c8341f.js"
      crossorigin="anonymous"
    ></script>

    <script src="./Registration.js"></script>
    <script src="./script.js"></script>
  </body>
</html>
