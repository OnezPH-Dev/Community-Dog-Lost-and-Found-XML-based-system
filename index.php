<?php
  session_start();
  if (isset($_SESSION['logged'])) {
      header('Location: dashboard.php');
      exit;
  }
  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Load the XML file
    $xml = new DOMDocument();
    $xml->load('users.xml');
    $xpath = new DOMXPath($xml);

    // Find the user
    $users = $xpath->query("/users/user[email='$email']");

    if ($users->length > 0) {
        $storedPassword = $users->item(0)->getElementsByTagName('password')->item(0)->nodeValue;

        // Verify the password
        if (password_verify($password, $storedPassword)) {
            $_SESSION['logged'] = true;
            ?>
              <script>
                  alert("<?php echo "Login successful!" ?>");
                  window.location.replace('dashboard.php');
              </script>
            <?php
        } else {
            ?>
              <script>
                  alert("<?php echo "Invalid password." ?>");
                  window.location.replace('index.php');
              </script>
            <?php
        }
    } else {
        ?>
          <script>
            alert("<?php echo "User not found." ?>");
            window.location.replace('index.php');
          </script>
        <?php
    }
  }

  if(isset($_POST['register'])){
    $name = $_POST['rname'];
    $email = $_POST['remail'];
    $password = $_POST['rpass'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Load the XML file
    $xml = new DOMDocument();
    $xml->load('users.xml');

    // Create new user element
    $newUser = $xml->createElement("user");
    $newUsername = $xml->createElement("name", $name);
    $newUseremail = $xml->createElement("email", $email);
    $newPassword = $xml->createElement("password", $hashedPassword);

    // Append elements to new user
    $newUser->appendChild($newUsername);
    $newUser->appendChild($newUseremail);
    $newUser->appendChild($newPassword);

    // Append new user to the root element
    $xml->getElementsByTagName('users')->item(0)->appendChild($newUser);

    // Save the XML file
    if($xml->save('users.xml')){
      ?>
        <script>
            alert("<?php echo "Register Successfully!" ?>");
            window.location.replace('index.php');
        </script>
      <?php
    }else{
      ?>
        <script>
          alert("<?php echo "Register Failed!" ?>");
          window.location.replace('index.php');
        </script>
      <?php
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Community Dog Lost and Found</title>
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="assets/img1.jpg" alt="IMG">
      </div>
      <div class="back">
        <img class="backImg" src="assets/img1.jpg" alt="">
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Welcome back!</div>
          <form method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="login" value="Log in">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Welcome</div>
          <div class="text">Let's help you find your pet</div>
        <form method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="rname" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="remail" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="rpass" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="register" value="Register">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
