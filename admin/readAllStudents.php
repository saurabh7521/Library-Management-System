<?php
                    // Include config file
include "config.php";

                    // Attempt select query execution
$sql = "SELECT Student Name, Class, E_mail, Mobile, FROM students";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['Student Name'] . "</td>";
            echo "<td>" . $row['Class'] . "</td>";
            echo "<td>" . $row['E_mail'] . "</td>";
            echo "<td>" . $row['Mobile'] . "</td>";
     /*       echo "<td><button onclick='Update('".$row['id']."')'' class='btn btn-warning'>Update</button><button onclick='DeleteUser('".$row['id']."')' class='btn btn-danger'>Delete</button></td>";*/
            echo "</tr>";
        }
                            // Free result set
        mysqli_free_result($result);
    } else{
    }
} else{
}
                    // Close connection
mysqli_close($link);
?>