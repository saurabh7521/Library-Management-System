<?php
// include Database connection file
include("config.php");
 
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get student ID
    $stu_id = $_POST['id'];
 
    // Get student Details
    $query = "SELECT id, Student_Name, Class, E_mail, Mobile FROM students WHERE id = '$stu_id'";
    if (!$result = mysqli_query($link, $query)) {
        exit(mysqli_error($link));
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
mysqli_close($link);
?>