<?php include('../functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL - Create user</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
				<label>User Type</label>
				<select name="user_type" id="user_type" style="width: 93%;">
					<option value="user">User</option>
					<option value="admin">Admin</option>
				</select>
			</div>
			<div class="input-group">
				<label>Password</label>
				<input type="password" name="password_1">
			</div>
			<div class="input-group">
				<label>Confirm Password</label>
				<input type="password" name="password_2">
			</div>
			<div class="input-group">
				<label>First Name</label>
				<input type="text" name="first_name" value="<?php echo $first_name; ?>">
			</div>
			<div class="input-group">
				<label>Last Name</label>
				<input type="text" name="last_name" value="<?php echo $last_name; ?>">
			</div>
			<div class="input-group">
				<label>Address</label>
				<input type="text" name="address" value="<?php echo $address; ?>">
			</div>
			<div class="input-group">
				<label>Post NR</label>
				<input type="text" name="post_nr" value="<?php echo $post_nr; ?>">
			</div>
			<div class="input-group">
				<label>Country</label>
				<input type="text" name="country" value="<?php echo $country; ?>">
			</div>
			<div class="input-group">
				<label>Phone</label>
				<input type="text" name="phone" value="<?php echo $phone; ?>">
			</div>
			<div class="input-group">
				<label>Salary</label>
				<input type="number" name="salary" value="<?php echo $salary; ?>">
			</div>
			<div class="input-group">
				<label>Work Title</label>
				<input type="text" name="work_title" value="<?php echo $work_title; ?>">
			</div>
			<div class="input-group">
				<label>Profile Pic</label>
				<input type="file" name="profile_pic" style="font-size: 11px;" class="pb-4">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="register_btn"><i class="fa fa-plus"></i> Create User</button>
			</div>
		</form>
	</div>
</body>
</html>