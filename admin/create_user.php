<?php include('../functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL - Create user</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="container-fluid pb-5">
		<div class="header w-25">
			<h2>Admin - create user</h2>
		</div>
		
		<form method="post" action="create_user.php">
			<?php echo display_error(); ?>
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" value="<?php echo $username; ?>">
			</div>
			<div class="input-group">
				<label>Email</label>
				<input type="email" name="email" value="<?php echo $email; ?>">
			</div>
			<div class="input-group">
				<label>User type</label>
				<select name="user_type" id="user_type" >
					<option value=""></option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
				</select>
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
			</div>
			<div class="input-group">
				<label>Confirm password</label>
				<input type="password" name="password_2">
			</div>
			<div class="input-group">
				<label>First Name</label>
				<input type="text" name="first_name" value="">
			</div>
			<div class="input-group">
				<label>Last Name</label>
				<input type="text" name="last_name" value="">
			</div>
			<div class="input-group">
				<label>Address</label>
				<input type="text" name="address" value="">
			</div>
			<div class="input-group">
				<label>Post NR</label>
				<input type="text" name="post_nr" value="">
			</div>
			<div class="input-group">
				<label>Country</label>
				<input type="text" name="country" value="">
			</div>
			<div class="input-group">
				<label>Phone</label>
				<input type="text" name="phone" value="">
			</div>
			<div class="input-group">
				<label>Work Title</label>
				<input type="text" name="work_title" value="">
			</div>
			<div class="input-group">
				<label>profile Pic</label>
				<input type="file" name="profile_pic" value="">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="register_btn"> + Create user</button>
			</div>
		</form>
	</div>
</body>
</html>