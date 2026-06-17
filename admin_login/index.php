<?php
session_start();
include "db.php";

if(isset($_POST['login']))
    {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) > 0)
    {
    $_SESSION['email'] = $email; 

       
    if(isset($_POST['remember']))
          {
           setcookie("email", $email, time() + (86400 * 7), "/"); 
        
          header("Location: ../admin_dashboard/index.html");
         exit();
       }
        header("Location: ../admin_dashboard/index.html");
    } 
    else 
        {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BookWorm Library Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #f5a957; 
    }

    /* ===== Header ===== */
    header {
      width: 100%;
      background-color: #3c1518;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 50px;
      flex-wrap: wrap;
      color: white;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    .header-left {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .header-left img {
      height: 65px;
      border-radius: 6px;
    }

    .header-left h1 {
      color: #f73e10;
      font-size: 28px;
      letter-spacing: 1px;
    }

    nav ul {
      list-style: none;
      display: flex;
      flex-wrap: wrap;
      gap: 25px;
      margin: 0;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      font-weight: 500;
      transition: color 0.3s;
    }

    nav a:hover, nav a.active {
      color: #f79c72;
    }

    /* ===== Login Container ===== */
    .container {
      width: 35%;
      margin-top: 60px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px 0;
    }

    .login-content {
      width: 70%;
      text-align: center;
    }

    .login-content h1 {
      margin-bottom: 10px;
      color: #3c1518;
    }

    .login-content p {
      color: #555;
      margin-bottom: 20px;
    }

    form {
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
      background-color: #ff4500;
      color: #fff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background-color: #cc3700;
    }

    /* ===== Responsive ===== */
    @media (max-width: 768px) {
      header {
        flex-direction: column;
        text-align: center;
        padding: 15px;
      }

      .header-left {
        flex-direction: column;
      }

      nav ul {
        flex-direction: column;
        gap: 10px;
        padding: 10px 0;
      }

      .container {
        width: 80%;
      }
    }
  </style>
</head>
<body>

  <!-- ===== Header Start ===== -->
  <header>
    <div class="header-left">
      <img src="../image\logo.jpg" alt="Library Logo">
      <h1>📚 BookWorm</h1>
    </div>

    <nav>
      <ul>
        <li><a href="../index.html">HOME</a></li>
        <li><a href="../user_login/index.php">USER LOGIN</a></li>
        <li><a class="active">ADMIN LOGIN</a></li>
      </ul>
    </nav>
  </header>
  <!-- ===== Header End ===== -->

  <!-- ===== Login Form ===== -->
  <div class="container">
    <div class="login-content">
      <h1>Admin Login</h1>
      <p>Please enter your credentials to log in</p>

      <form method="POST" action="">
        <input type="email" placeholder="Email" name="email" value=" <?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>" required />
        <input type="password" placeholder="Password" name="password"  required />
        <button type="submit" name="login">SIGN IN</button>
        <label>
       <input type="checkbox" name="remember"> Remember Me
       </label>
      </form>
    </div>
  </div>

</body>
</html>
