<?php
session_start();

if(isset($_SESSION['username'])){
    header("Location: html.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }
    .register {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .register h1 {
      text-align: center;
    }
    .register form {
      margin-top: 20px;
    }
    .register label {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      color: #888;
    }
    .register label i {
      margin-right: 10px;
    }
    .register input[type="text"],
    .register input[type="password"],
    .register input[type="email"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .register input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .register input[type="submit"]:hover {
      background-color: #45a049;
    }
    .reg {
      text-align: center;
      margin-top: 20px;
    }
    .reg a {
      color: #4caf50;
      text-decoration: none;
    }
    .reg a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="register">
    <h1>Register</h1>
    <form action="register.php" method="post" autocomplete="off">
      <label for="username">
        <i class="fas fa-user"></i>
      </label>
      <input type="text" name="username" placeholder="Username" id="username" required>
      <label for="password">
        <i class="fas fa-lock"></i>
      </label>
      <input type="password" name="password" placeholder="Password" id="password" required>
      <label for="email">
        <i class="fas fa-envelope"></i>
      </label>
      <input type="email" name="email" placeholder="Email" id="email" required>
      <input type="submit" value="Register">
    </form>
    <div class="reg">
      <h3>Already Registered?</h3>
      <h3><a href="index.html">Login Here</a></h3>
    </div>
  </div>
</body>
</html>
