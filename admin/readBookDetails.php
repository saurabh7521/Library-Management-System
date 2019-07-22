<?php
// include Database connection file
include "config.php";

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "") {
	$book_id = $_POST['id'];

	$query = "SELECT id, Reference_number, Title, Author, Genre, Shelf, Rack FROM books WHERE id = '$book_id'";
	if (!$result = mysqli_query($con, $query)) {
		exit(mysqli_error($con));
	}
	$response = array();
	if(mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$response = $row;
		}
	} else {
		$response['status'] = 200;
		$response['message'] = "Data not found!";
	}
    // display JSON data
	echo json_encode($response);
} else {
	$response['status'] = 200;
	$response['message'] = "Invalid Request!";
}
mysqli_close($con);
?>