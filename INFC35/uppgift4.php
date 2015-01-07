<?php
	//måste ladda in credentials från en annan fil, annars körs inte resten
	require ('safe_store/mysqli_connect.php');
	
	// om det finns en image-fil i listan med filer och storleken är större än 0
	if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
	
	// ta ut namnet på filen
	$tmpName = $_FILES['image']['tmp_name'];

	// öppna filen i read (r)-läge
	$fp = fopen($tmpName, 'r');

	// läs in filen som en variabel
	$data = fread($fp, filesize($tmpName));

	// escapa \ karaktärer som " - \
	$data = addslashes($data);
	fclose($fp);

	// fixa query och kör in i databasen
	$query = "INSERT INTO tbl_images (image) VALUES ('$data')";
	$results = mysqli_query($db_conn, $query);

	// wiee
	print "FIL SPARAD";
	}

	// noooo
	else {
	print "I've made a huge mistake";
	}
	
	// stäng connection, dvs den som hämtades ur filen på rad 2
	mysqli_close($db_conn);
?>