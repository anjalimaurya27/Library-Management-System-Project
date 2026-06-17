<?php
include "db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users(first_name,last_name,email,password) 
              VALUES('$first_name','$last_name','$email','$password')";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        echo "<script>alert('Registration Successful'); window.location='index.php';</script>";
    }
    else
    {
        echo "<script>alert('Database Error: ".mysqli_error($conn)."');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<style>
/* Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  background-color: #f5a957;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

/* Header */
header {
  width: 100%;
  background-color: #3c1518;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 12px 60px;
  color: white;
}

.left-box {
  display: flex;
  align-items: center;
  gap: 12px;
}

header img {
  height: 65px;
  border-radius: 8px;
}

header h1 {
  color: #f73e10;
  font-size: 28px;
}

/* Navigation */
nav ul {
  list-style: none;
  display: flex;
  flex-wrap: wrap;
}

nav li {
  margin-left: 25px;
}

nav a {
  color: white;
  text-decoration: none;
  font-size: 18px;
  transition: 0.3s;
}

nav a:hover,
nav a.active {
  color: #f79c72;
}

/* Signup Box */
.signup-container {
  background-color: #ffffff;
  padding: 35px 28px;
  border-radius: 12px;
  width: 370px;
  margin: 60px auto;
  box-shadow: 0px 10px 18px rgba(0, 0, 0, 0.25);
}

.signup-form h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #3c1518;
  font-size: 26px;
}

/* Inputs */
.signup-form input {
  width: 100%;
  padding: 12px 14px;
  margin: 10px 0;
  border-radius: 6px;
  border: 2px solid #dcdcdc;
  font-size: 15px;
  transition: 0.3s;
}

.signup-form input:focus {
  border-color: #f5a957;
}

/* Two input side-by-side */
.input-group {
  display: flex;
  gap: 10px;
}

.input-group input {
  width: 50%;
}

/* Error message */
.error {
  color: red;
  font-size: 14px;
  margin-top: -8px;
  margin-bottom: 5px;
}

/* Button */
.btn {
  width: 100%;
  background-color: #3c1518;
  border: none;
  padding: 12px;
  border-radius: 6px;
  color: white;
  font-weight: 600;
  font-size: 17px;
  cursor: pointer;
  margin-top: 10px;
  transition: 0.3s;
}

.btn:hover {
  background-color: #5b1b21;
}

</style>
</head>
<body>

<header>
  <div class="left-box">
    <img src="../image/logo.jpg" alt="Library Logo">
    <h1>📚 BookWorm</h1>
  </div>
  <nav>
    <ul>
      <li><a href="../index.html">HOME</a></li>
      <li><a class="active">USER LOGIN / SIGN UP</a></li>
      <li><a href="../admin_login/index.php">ADMIN LOGIN</a></li>
    </ul>
  </nav>
</header>

<div class="signup-container">
  <form class="signup-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form">
    <h2>Sign Up</h2>

    <input type="hidden" name="register" value="1">

    <div class="input-group">
      <input type="text" placeholder="First Name" name="first_name" id="first_name" required>
      <input type="text" placeholder="Last Name" name="last_name" id="last_name" required>
      <div id="nameError" class="error"></div>
    </div>

    <input type="email" placeholder="Email" name="email" id="email" required>
    <div id="emailError" class="error"></div>

    <input type="password" placeholder="Password" name="password" id="password" required>
    <div id="passwordError" class="error"></div>

    <input type="password" placeholder="Confirm Password" id="confirmPassword" required>
    <div id="confirmError" class="error"></div>

    <button type="submit" class="btn">Sign Up</button>
  </form>
</div>

<script>
document.getElementById("form").addEventListener("submit", function(e){
    e.preventDefault();

    document.getElementById("nameError").textContent='';
    document.getElementById("emailError").textContent='';
    document.getElementById("passwordError").textContent='';
    document.getElementById("confirmError").textContent='';

    const firstName = document.getElementById("first_name").value.trim();
    const lastName = document.getElementById("last_name").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    let isValid = true;
    const namePattern = /^[A-Za-z]{2,}$/;

    if(!namePattern.test(firstName) || !namePattern.test(lastName)){
        document.getElementById('nameError').textContent = 'Only letters allowed!';
        isValid=false;
    }
    const emailPattern=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailPattern.test(email)){
        document.getElementById('emailError').textContent='Invalid Email!';
        isValid = false;
    }
    if(password.length < 6){
        document.getElementById('passwordError').textContent="Min 6 characters";
        isValid = false;
    }
    if(password !== confirmPassword){
        document.getElementById('confirmError').textContent='Password mismatch!';
        isValid= false;
    }
    if(isValid){
        this.submit();
    }
});
</script>

</body>
</html>
