<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'multi_login_db');

// variable declaration
$username 	= "";
$email    	= "";
$user_type  = "";
$first_name = "";
$last_name 	= "";
$address 	= "";
$post_nr 	= "";
$country 	= "";
$phone 		= "";
$salary 	= "";
$work_title = "";
$errors   	= array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $user_type, $first_name, $last_name, $address, $post_nr, $country, $phone, $salary, $work_title, $profile_pic;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username	= e($_POST['username']);
	$email		= e($_POST['email']);
	$user_type	= e($_POST['user_type']);
	$password_1	= e($_POST['password_1']);
	$password_2	= e($_POST['password_2']);
	$first_name	= e($_POST['first_name']);
	$last_name  = e($_POST['last_name']);
	$address	= e($_POST['address']);
	$post_nr	= e($_POST['post_nr']);
	$country	= e($_POST['country']);
	$phone		= e($_POST['phone']);
	$salary		= e($_POST['salary']);
	$work_title	= e($_POST['work_title']);
	$profile_pic = e($_POST['profile_pic']);
	
	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($user_type)) { 
		array_push($errors, "User type is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	if (empty($first_name)) { 
		array_push($errors, "First name is required"); 
	}
	if (empty($last_name)) { 
		array_push($errors, "Last name is required"); 
	}
	if (empty($address)) { 
		array_push($errors, "Address is required"); 
	}
	if (empty($post_nr)) { 
		array_push($errors, "Post NR is required"); 
	}
	if (empty($country)) { 
		array_push($errors, "Country is required"); 
	}
	if (empty($phone)) { 
		array_push($errors, "Phone is required"); 
	}
	if (empty($salary)) { 
		array_push($errors, "Salary is required"); 
	}
	if (empty($work_title)) { 
		array_push($errors, "Work title is required"); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password, first_name, last_name, address, post_nr, country, phone, salary, work_title, profile_pic) 
					  VALUES('$username', '$email', '$user_type', '$password', '$first_name', '$last_name', '$address', '$post_nr', '$country', '$phone', '$salary', '$work_title', '$profile_pic')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, email, user_type, password, first_name, last_name, address, post_nr, country, phone, salary, work_title, profile_pic) 
					  VALUES('$username', '$email', '$user_type', '$password', '$first_name', '$last_name', '$address', '$post_nr', '$country', '$phone', '$salary', '$work_title', '$profile_pic')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}