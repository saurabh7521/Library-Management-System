<?php
// include Database connection file
include("config.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $reference_number = $_POST['reference_number'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $shelf = $_POST['shelf'];
    $rack = $_POST['rack'];

    // Updaste User details
    $query = "UPDATE books SET Reference_number = '$reference_number', Title = '$title', Author = '$author', Genre = '$genre', Shelf = '$shelf', Rack = '$rack' WHERE id = '$id'";
    if ($con->query($query) === TRUE) {
        echo "success";
    }
    else{
        echo "Failed";
    }
    mysqli_close($con);
}