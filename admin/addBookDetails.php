<?php
if(isset($_POST['reference_number']) && isset($_POST['title']) && isset($_POST['author']))
{
		// include Database connection file 
	include("config.php");

		// get values 
	$reference_number = $_POST['reference_number'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$genre = $_POST['genre'];
	$shelf = $_POST['shelf'];
	$rack = $_POST['rack'];

	$query = "INSERT INTO books(reference_number, title, author, genre, shelf, rack) VALUES ('$reference_number', '$title', '$author', '$genre', '$shelf', '$rack')";
	if ($con->query($query) === TRUE) {
		echo "success";
	}
	else{
		echo $con->error;
	}
	mysqli_close($con);
}
?>