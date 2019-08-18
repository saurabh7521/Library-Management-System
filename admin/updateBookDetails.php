<?php
// include Database connection file
include("config.php");
 
// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $reference_number = $_POST['reference_number'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $shelf = $_POST['shelf'];
    $rack = $_POST['rack'];
 
    // Updaste User details
    $query = "UPDATE books SET Reference_number = '$reference_number', Author = '$author', Title = '$title', Genre= '$genre', Shelf= '$shelf', Rack= '$rack'  WHERE id = '$id'";    

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
}
mysqli_close($link);
?>