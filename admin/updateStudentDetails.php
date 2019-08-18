<?php
// include Database connection file
include("config.php");
 
// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $student_name = $_POST['student_name'];
    $Class = $_POST['Class'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
 
    // Updaste student details
    $query = "UPDATE students SET Student_Name = '$student_name', Class = '$Class', E_mail = '$email', Mobile= '$mobile' WHERE id = '$id'";    

    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
}
mysqli_close($link);
?>