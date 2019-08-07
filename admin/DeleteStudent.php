<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("config.php");
 
    // get user id
    $stu_id = $_POST['id'];
 
    // delete User
    $query = "DELETE FROM students WHERE id = '$stu_id'";
    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
}
?>