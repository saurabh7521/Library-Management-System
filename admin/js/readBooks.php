<?php
include("config.php");

$sql = "SELECT id, Reference_number, Title, Author, Genre, Shelf, Rack FROM books";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
         echo "<tr>";
         echo "<td>" . $row['Reference_number'] . "</td>";
         echo "<td>" . $row['Title'] . "</td>";
         echo "<td>" . $row['Author'] . "</td>";
         echo "<td>" . $row['Genre'] . "</td>";
         echo "<td>" . $row['Shelf'] . "</td>";
         echo "<td>" . $row['Rack'] . "</td>";
         echo "<td><button onclick='getBookDetails(\"" .$row['id']. "\")' class='btn-warning fa fa-edit'></button>       <span class='btn-separator'></span><button onclick='deleteBook(\"" .$row['id']. "\")' class='btn-danger fa fa-times'></button></td>";
         echo "</tr>";
     }
     mysqli_free_result($result);
 } else{
 }
} else{
}
mysqli_close($con);
?>
