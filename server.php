<?php
session_start();

// initializing variables
$username = "";
$errors = array(); 

// connect to the database

	//CONNECTION INFO
	$servername = "localhost";
	$username = "root";
	$password  = "";
	$dbname = "sv";
	
	//CONNECT
	$conn4 = mysqli_connect($servername, $username, $password, $dbname);

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
	  // receive all input values from the form
	  $username = mysqli_real_escape_string($conn4 , $_POST['username']);
	  $password_1 = mysqli_real_escape_string($conn4 , $_POST['password_1']);
	  $password_2 = mysqli_real_escape_string($conn4 , $_POST['password_2']);

	  // form validation: ensure that the form is correctly filled ...
	  // by adding (array_push()) corresponding error unto $errors array
	  if (empty($username)) { array_push($errors, "Username is required"); }
	  if (empty($password_1)) { array_push($errors, "Password is required"); }
	  if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	  }

	  // first check the database to make sure 
	  // a user does not already exist with the same username and/or email
	  $user_check_query = "SELECT * FROM kullanicilar WHERE username='$username' LIMIT 1";
	  $result = mysqli_query($conn4, $user_check_query);
	  $user = mysqli_fetch_assoc($result);
  
	  if ($user) { // if user exists
		if ($user['username'] === $username) {
		  array_push($errors, "Username already exists");
		}
	  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO kullanicilar (username, password) 
  			  VALUES('$username', '$password')";
  	mysqli_query($conn4, $query);
  	$_SESSION['username'] = $username;
  	header('location: myNewCV.php');
  }else{
	  //header('location: index.php');
  }
}

	// REGISTER ADMIN
	if (isset($_POST['reg_admin'])) {
	  // receive all input values from the form
	  $username = mysqli_real_escape_string($conn4 , $_POST['username']);
	  $password_1 = mysqli_real_escape_string($conn4 , $_POST['password_1']);
	  $password_2 = mysqli_real_escape_string($conn4 , $_POST['password_2']);

	  // form validation: ensure that the form is correctly filled ...
	  // by adding (array_push()) corresponding error unto $errors array
	  if (empty($username)) { array_push($errors, "Username is required"); }
	  if (empty($password_1)) { array_push($errors, "Password is required"); }
	  if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	  }

	  // first check the database to make sure 
	  // a user does not already exist with the same username and/or email
	  $user_check_query = "SELECT * FROM yoneticiler WHERE username='$username' LIMIT 1";
	  $result = mysqli_query($conn4, $user_check_query);
	  $user = mysqli_fetch_assoc($result);
  
	  if ($user) { // if user exists
		if ($user['username'] === $username) {
		  array_push($errors, "Username already exists");
		}
	  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO yoneticiler (username, password) 
  			  VALUES('$username', '$password')";
  	mysqli_query($conn4, $query);
  	$_SESSION['adminusername'] = $username;
  	header('location: index.php');
  }else{
	  
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn4, $_POST['username']);
  $password = mysqli_real_escape_string($conn4, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM kullanicilar WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($conn4, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  header('location: editMyCV.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

// LOGIN ADMIN
if (isset($_POST['login_admin'])) {
  $username = mysqli_real_escape_string($conn4, $_POST['username']);
  $password = mysqli_real_escape_string($conn4, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM yoneticiler WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($conn4, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['adminusername'] = $username;
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
// ...