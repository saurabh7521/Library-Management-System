
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
    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
}
?>