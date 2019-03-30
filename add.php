<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1> Website Logo</h1>
				<a href="home.php">Home</a>
				<a href="map.php">Map</a>
				<a href="add.php">Add</a>
				<a href="profile.php">Profile</a>
				<a href="logout.php">Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Add</h2>
		</div>
	</body>
</html>