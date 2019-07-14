<?php 
include "config.php";
$perPage = 10;
$sqlQuery = "SELECT * FROM books";
$result = mysqli_query($link, $sqlQuery);
$totalRecords = mysqli_num_rows($result);
$totalPages = ceil($totalRecords/$perPage);
echo "<input type='hidden' id='totalPages' class='totalPages' value='" . $totalPages . "'/>";
?>