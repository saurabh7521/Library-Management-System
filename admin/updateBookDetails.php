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
    $query = "UPDATE books SET first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE id = '$id'";    /*confused here too*/
    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
}