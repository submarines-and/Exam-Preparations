<?php 

//databasanslutning
$dbc = mysqli_connect('servername', 'username', 'password', 'databasename') 
OR die ('No DB-connection via MySQLi');

	//eftersom method var "post", hämtar vi ut variabler ur  $POST_[namn];

	//kolla så att ingen (krävd) variabel är null
	if(isset($_POST["name"])){

		//skapa en variabel name och hämta ut namnet ur post-requesten
		$name = $_POST["name"];
		$email = $_POST["email"];

		//fixa en query
		$q = "insert into tenta values('$name', '$email');";

		//kör in querien i databasen
		mysqli_query($dbc, $q);
	}

	//felhantering, returnera användaren till startsidan med ett felmedelande
	else{
        header('Location: index.html?errorMessage=fieldsNotComplete');
	}


 ?>
