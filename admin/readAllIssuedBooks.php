<?php
                    // Include config file
include "config.php";

                    // Attempt select query execution
$sql = "SELECT issued_id, book_id, student_id, issued_date, next_return_date, fine FROM issued";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['book_id'] . "</td>";
            echo "<td>" . $row['student_id'] . "</td>";
            echo "<td>" . $row['issued_date'] . "</td>";
            echo "<td>" . $row['next_return_date'] . "</td>";
            echo "<td>" . $row['fine'] . "</td>";
            echo "<td><button onclick=\"Re_issueBook('".$row['id']."')\" class='btn btn-warning'>Re-issue</td>";
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
