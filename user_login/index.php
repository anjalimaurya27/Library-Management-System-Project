<?php
session_start();
include "db.php";

if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result); // <-- Fetch row from DB

        $_SESSION['email'] = $row['email'];
        $_SESSION['fname'] = $row['first_name'];
        $_SESSION['lname'] = $row['last_name'];

        if(isset($_POST['remember'])) {
            setcookie("email", $email, time() + (86400 * 7), "/");
            setcookie("password", $password, time() + (86400 * 7), "/");
        }

        header("Location: ../user_dashboard/index.html");
        exit();
    } 
    else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>User Login</title>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  min-height: 100vh;
  background: #f5a957;
  display: flex;
  flex-direction: column;
}

/* ===== HEADER ===== */
header {
  width: 100%;
  background-color: #3c1518;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 60px;
  color: white;
  flex-wrap: wrap;
}

header .left {
  display: flex;
  align-items: center;
  gap: 15px;
}

header img {
  height: 65px;
  border-radius: 8px;
}

header h1 {
  font-size: 28px;
  font-weight: 600;
  color: #f73e10;
}

nav ul {
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  gap: 25px;
}

nav a {
  color: white;
  text-decoration: none;
  font-size: 18px;
  transition: 0.3s;
  cursor: pointer;
  font-weight: 500;
}

nav a:hover,
nav a.active {
  color: #f79c72;
}

/* ===== MAIN CONTAINER ===== */
.container {
  width: 80%;
  max-width: 1000px;
  margin: 40px auto;
  height: 70vh;
  display: flex;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0,0,0,0.3);
}

/* Left Side (Login) */
.login-section {
  width: 50%;
  background: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
}

.login-content {
  width: 70%;
  text-align: center;
}

.login-content h1 {
  margin-bottom: 10px;
}

.login-content p {
  color: #555;
  margin-bottom: 20px;
}

.login-content form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

input {
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 15px;
  outline: none;
}

button {
  padding: 12px;
  background: #ff4500;
  color: #fff;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: 0.3s;
}

button:hover {
  background: #cc3700;
}

/* .forgot {
  font-size: 13px;
  color: #333;
  text-align: right;
  text-decoration: none;
}
.forgot:hover {
  text-decoration: underline;
} */

/* Right Side (Signup) */
.signup-section {
  width: 50%;
  background: #863e39;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
}

.signup-content {
  text-align: center;
}

.signup-content h1 {
  font-size: 2rem;
  font-weight: 600;
}

.signup-content span {
  font-size: 1.2rem;
  color: #aaa;
  letter-spacing: 2px;
}

.signup-content p {
  margin-top: 20px;
  color: #bbb;
  font-size: 14px;
}

.signup-btn {
  margin-top: 20px;
  background: transparent;
  border: 1px solid #fff;
  padding: 10px 20px;
  border-radius: 6px;
  cursor: pointer;
  transition: 0.3s;
}

.signup-btn:hover {
  background: #fff;
  color: #000;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 900px) {
  header {
    flex-direction: column;
    align-items: flex-start;
    padding: 15px 30px;
  }

  nav ul {
    justify-content: center;
    gap: 15px;
    width: 100%;
    margin-top: 10px;
  }

  .container {
    flex-direction: column;
    height: auto;
    margin: 20px;
  }

  .login-section, .signup-section {
    width: 100%;
    padding: 30px 20px;
  }

  .login-content {
    width: 100%;
  }
}
</style>
</head>
<body>
<header>
  <div class="left">
      <img src="../image/logo.jpg" alt="Library Logo">
      <h1>📚 BookWorm</h1>
  </div>
  <nav>
      <ul>
          <li><a href="../index.html">HOME</a></li>
          <li><a class="active">USER LOGIN</a></li>
          <li><a href="../admin_login/index.php">ADMIN LOGIN</a></li>
      </ul>
  </nav>
</header>

<div class="container">
  <!-- Login Form -->
  <div class="login-section">
    <div class="login-content">
      <h1>Welcome Back !!</h1>
      <p>Please enter your credentials to log in</p>
      <form method="POST" action="">
        <input type="email" placeholder="Email" name="email" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>" required />
        <input type="password" placeholder="Password" name="password" required />
        <!-- <a href="#" class="forgot">Forgot Password?</a> -->
        <button type="submit" name="login">SIGN IN</button>
        <label>
       <input type="checkbox" name="remember"> Remember Me
       </label>
      </form>
    </div>
  </div>

  <!-- Signup Info -->
  <div class="signup-section">
    <div class="signup-content">
      <h1>BookWorm <br><span>LIBRARY</span></h1>
      <p>New to our platform? Sign Up now.</p>
      <button class="signup-btn" onclick="window.location.href='user_signup.php'">SIGN UP</button>
    </div>
  </div>
</div>
</body>
</html>
