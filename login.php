<?php include('server.php'); ?>
<html>
<head>
	<title>Pizza Shop</title>
	<link rel="stylesheet" href="ui.css" type="text/css">
   <style>
   .error {
  
  margin: 0px auto;
  padding: 5px;
  border: 2px solid #a94442;
  color: #a94442;
  background: #f2dede;
  border-radius: 5px;
  text-align: left;
}
</style>
</head>
<body>
<div class="custom-shape-divider-top-1642413157">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
</div>
  <div class="loginbox">
  	<h1>Login</h1>
      <form method="post" action="login.php">
         <!-- display validation errors here -->
        <?php include('errors.php'); ?>
       <input type="text" name="email" placeholder="Email">
       <input type="password" name="password" placeholder="Password">
       <input type="submit" name="login" value="Login">
       <p>Don't have an account? <a href="register.php">Register</a> </p>
      </form>

  </div>
  <div class="custom-shape-divider-bottom-1642412638">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
</div>
</body>
</html>