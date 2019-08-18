
<?php
        // include Database connection file 
include("config.php");

        // get values 
$s_name = $_POST['s_name'];
$s_class = $_POST['s_class'];
$s_mail = $_POST['s_mail'];
$s_mob = $_POST['s_mob'];

$query = "INSERT INTO students(Student Name , Class, E_mail, Mobile) VALUES('$s_name', '$s_class', '$s_mail', '$s_mob')";
if (!$result = mysqli_query($link, $query)) {
    exit(mysqli_error($link));
}
echo "1 student Added!";
mysqli_close($link);
?>