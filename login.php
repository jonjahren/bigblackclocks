<html>

<body>

<?php 

$login = mysql_connect('localhost', $_POST['name'], $_POST['psw']);

if(!$login) {
	echo "Feil brukernavn eller passord.\n";
	echo "Har du ikke bruker kan du opprette en her: ";
}


else if($login) {
	echo "Velkommen "; echo $_POST["name"];
}

?>


	

