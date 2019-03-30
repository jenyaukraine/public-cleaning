<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//use App\Controller\IndexController;

try {

} catch() {
    throw new \Exception();
}




$request = $_SERVER['REDIRECT_URL'];

switch ($request) {
/*
use session handler

				<a href="home.php">Home</a>
				<a href="map.php">Map</a>
				<a href="add.php">Add</a>-
				<a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
                Login,
                Register.


                header styled com
                bd,
                footer com
*/
    case '/' :
        require __DIR__ . '/app/views/index.php';
        break;
    default:
        require __DIR__ . '/app/views/404.php';
        break;
}