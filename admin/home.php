<?php
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
	<div class="header w-25">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content w-50">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success">
				<h3>
					<?php
					echo $_SESSION['success'];
					unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info d-flex justify-content-center">
			<img src="../images/admin_profile.png">
			<div>
				<?php if (isset($_SESSION['user'])) : ?>
					<strong class="text-uppercase"><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
						<br>
						<a href="home.php?logout='1'" class="btn btn-danger">Logout</a>
						&nbsp; <a href="create_user.php" class="btn btn-primary"> <i class="fa fa-plus"></i> Add user</a>
						&nbsp; <a href="ProfileTable/index.php" class="btn btn-primary"> <i class="fa fa-plus"></i> Profile</a>
						&nbsp; <a href="ImageTable/index.php" class="btn btn-primary"> <i class="fa fa-plus"></i> Image</a>
						&nbsp; <a href="ReportTable/index.php" class="btn btn-primary"> <i class="fa fa-plus"></i> Report</a>
					</small>
				<?php endif ?>
			</div>
		</div>
	</div>
</body>

</html>