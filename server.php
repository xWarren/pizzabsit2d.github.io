<?php
  session_start();
  
  $firstname = "";
  $lastname = "";
  $email = ""; 
  $password_1 = "";
  $password_2 = "";
  $errors = array();

   // connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'mydb');

  // if the register button is clicked
  if(isset($_POST['register'])) {
    $firstname = mysqli_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_escape_string($db, $_POST['lastname']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $password_1 = mysqli_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_escape_string($db, $_POST['password_2']);

   // ensure that form fields are filled properly
    if (empty($firstname)) {
       array_push($errors, "First Name is required");
    }
    if (empty($lastname)) {
       array_push($errors, "Last Name is required");
    }
    if (empty($email)) {
       array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
       array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
       array_push($errors, "The two passwords do not match");
    }

       // if there are no errors, save user to database
    if (count($errors) == 0) {
       $password = ($password_1); 
       $sql = "INSERT INTO mytable (firstname, lastname, email,  password) VALUES ('$firstname', '$lastname', '$email', '$password')";
          $_SESSION['email'] = $email;
         $_SESSION['success'] = "You are now logged in";
         header('location: login.php'); //redirect to home page
           $result = mysqli_query($db, $sql);
        $sql_select = "SELECT * FROM mytable WHERE email='$email' and password ='$password'";
        $sql_select_result = mysqli_query($db, $sql_select);
        $sql_resultCheck = mysqli_num_rows($sql_select_result);
        $column = mysqli_fetch_assoc($sql_select_result);

          if ($sql_resultCheck > 0) {
            $_SESSION['firstname'] = $column['firstname'];
            $_SESSION['lastname'] = $column['lastname'];
            $_SESSION['email'] = $column['email'];

       }
    }

 }
    // log user in from login page
      if (isset($_POST['login'])) {
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = mysqli_escape_string($db, $_POST['password']);
    if (empty($email)) {
       array_push($errors, "Email is required");
    } 
    if (empty($password)) {
       array_push($errors, "Password is required");
    }      
    if (count($errors) == 0 ) {
      $password = ($password);
      $query = "SELECT * FROM mytable WHERE email ='$email' AND password ='$password'";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) == 1){
           //log user in
       $_SESSION['email'] = $email;
         $_SESSION['success'] = "You are now logged in";
         header('location: index.php'); //redirect to home page
        }else{
          array_push($errors, "Invalid email/password");
        }
     }
  }
      //logout
      if (isset($_GET['logout'])) {
          session_destroy();
          unset($_SESSION['email']);
          header('location: register.php');
      }

 ?>