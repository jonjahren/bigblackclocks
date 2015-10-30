<html>
<body>

<?php

/* Connection er nå en variabel som inneholder tilkoblingsinformasjon til
   databasen. Den forventer tre argumenter(host, bruker, passord */

$connection = mysqli_connect('student.cs.hioa.no', 's193924', '');

/* Her setter vi opp hvilken database på serveren vi skal bruke. 
   mysqli_select_db() trenger to argumenter, hva den skal koble til og hvilken
   database den skal bruke. I dette tilfellet "users" */

mysqli_select_db($connection, "s193924");

/* Dette er en enkel if som tester om tilkobling til basen virker. Legg merke
   til "!" foran $connection */

if(!$connection) {
	echo "Tilkobling feilet, sjekk database";
}


/* Dette konverterer input fra $_POST til mer håndterlige variabler. I tillegg
   så tar den seg av sanitering av input(Så lille Bobby Tables ikke kan
   ødelegge opplegget
*/

$first_name = mysqli_real_escape_string($connection, $_POST['firstname']);
$last_name = mysqli_real_escape_string($connection, $_POST['firstname']);
$username = mysqli_real_escape_string($connection, $_POST['name']);
$emailaddress = mysqli_real_escape_string($connection, $_POST['email']);

/* Dette lager en hash av passordet sånn at vi ikke lagrer passord i 
   klartekst. Sikkeretsforanstaltninger. */

$passwordhash = md5($_POST['psw']);

/* Dette er kommandoen for å sette inn informasjon fra en nettside i databasen vår. INSERT INTO og VALUES er rett og slett SQL-kommandoer. */

$sql = "INSERT INTO Personer(FirstName, LastName, email, username, password) VALUES ('$first_name', '$last_name', '$emailaddress', '$username', '$passwordhash')";

/* Denne printer tekst om foregående kommando fungerer som normalt. */
if(mysqli_query($connection, $sql)) {
	echo "Gratulerer! Du er nå registrert.";
	}
	 /* Dette skrives ut om man ikke får registrert seg */
	else {
		echo "Sorry.";
	}
?>
</body>
</html>
