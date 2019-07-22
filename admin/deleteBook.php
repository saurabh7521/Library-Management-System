<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
	include("config.php");

    // get user id
	$book_id = $_POST['id'];

    // delete User
	$query = "DELETE FROM books WHERE id = '$book_id'";
	if ($con->query($query) === TRUE) {
		echo "success";
	}
	else{
		echo $con->error;
	}
	mysqli_close($con);
}
?>