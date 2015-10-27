<html>
<body>

<?php

$connection = mysqli_connect('localhost', 'apache', 'apache2pass');
mysqli_select_db($connection, "users");

if(!$connection) {
	echo "Tilkobling feilet, sjekk database";
}

$first_name = mysqli_real_escape_string($connection, $_POST['firstname']);
$last_name = mysqli_real_escape_string($connection, $_POST['lastname']);
$username = mysqli_real_escape_string($connection, $_POST['name']);
$emailaddress = mysqli_real_escape_string($connection, $_POST['email']);
$passwordhash = md5($_POST['psw']);

$sql = "INSERT INTO user(firstname, lastname, email, username, password) VALUES ('$first_name', '$last_name', '$emailaddress', '$username', '$passwordhash')";


if(mysqli_query($connection, $sql)) {
	echo "Gratulerer! Du er nå registrert.";
	}

	else {
		echo "Sorry.";
	}
?>
</body>
</html>
