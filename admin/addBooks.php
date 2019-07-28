
<?php
        // include Database connection file 
include("config.php");

        // get values 
$ref = $_POST['Ref'];
$author = $_POST['Author'];
$title = $_POST['Title'];
$shelf = $_POST['Shelf'];
$rack = $_POST['Rack'];
$genre = $_POST['Genre'];

$query = "INSERT INTO books(Reference_number, Author, Title, Shelf, Rack, Genre) VALUES('$ref', '$author', '$title', '$shelf', '$rack', '$genre')";
if (!$result = mysqli_query($link, $query)) {
    exit(mysqli_error($link));
}
echo "1 Record Added!";
?>