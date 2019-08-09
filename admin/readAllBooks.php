<?php
                    // Include config file
include "config.php";

                    // Attempt select query execution
$sql = "SELECT Reference_number, Title, Author, Genre, Shelf, Rack FROM books";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['Reference_number'] . "</td>";
            echo "<td>" . $row['Title'] . "</td>";
            echo "<td>" . $row['Author'] . "</td>";
            echo "<td>" . $row['Genre'] . "</td>";
            echo "<td>" . $row['Shelf'] . "</td>";
            echo "<td>" . $row['Rack'] . "</td>";
            echo "<td><button onclick='GetBookDetails('".$row['id']."')'' class='btn btn-warning'>Update</button><button onclick='DeleteBook('".$row['id']."')' class='btn btn-danger'>Delete</button></td>";
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
