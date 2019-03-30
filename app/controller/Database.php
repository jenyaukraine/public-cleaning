<?php
namespace App\Controller\Database;

class Database {
    private $db = [
        'hostname' => '',
        'username' => '',
        'password' => '',
        'database' => ''
    ];

    public function __construct(){

    }

    public function connect(){
        $con = mysqli_connect($this->db['hostname'], $this->db['username'], $this->db['password'], $this->db['database']);
        if (mysqli_connect_errno()) {
            die ('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
        return $con;
    }

    public function close(){

    }

    
}

//vaidation
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	die ('Please complete the registration form!');
}
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	die ('Please complete the registration form');
}

// queryin
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		echo 'Username exists, please choose another!';
	} else {
if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
	$stmt->execute();
	echo 'You have successfully registered, you can now login!';
} else {
	echo 'Could not prepare statement!';
}
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
$con->close();
?>