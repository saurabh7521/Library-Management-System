
<?php

// include Database connection file
include("config.php");
 
// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $ref = $_POST['Ref'];
    $author = $_POST['Author'];
    $title = $_POST['Title'];
    $shelf = $_POST['Shelf'];
    $rack = $_POST['Rack'];
    $genre = $_POST['Genre'];
 
    // Updaste User details
    $query = "INSERT INTO books(Reference_number, Author, Title, Shelf, Rack, Genre) VALUES('$ref', '$author', '$title', '$shelf', '$rack', '$genre') where id = '$id'";
    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
}