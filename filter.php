<?php
include "config.php";
if($_POST['brandss']){
	$brandis=array();
	parse_str($_POST['brandss'],$brandis); //changing string into array 
	foreach($brandis as $ids)
	{
		$ids;
	}
	$brandii=implode("','",$ids); //change into comma separated value to sub array
	$sql = "SELECT Reference_number, Title, Author, Genre, Shelf, Rack FROM books where genre in ('$brandii')";
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<table class='table table-bordered table-striped'>";

			echo "<thead>";
			echo "<tr>";

			echo "</tr>";
			echo "<tr>";
			echo "<th>Reference Number</th>";
			echo "<th>Title</th>";
			echo "<th>Author</th>";
			echo "<th>Genre</th>";
			echo "<th>Shelf</th>";
			echo "<th>Rack</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>" . $row['Reference_number'] . "</td>";
				echo "<td>" . $row['Title'] . "</td>";
				echo "<td>" . $row['Author'] . "</td>";
				echo "<td>" . $row['Genre'] . "</td>";
				echo "<td>" . $row['Shelf'] . "</td>";
				echo "<td>" . $row['Rack'] . "</td>";
				echo "</tr>";
			}
			echo "</tbody>";                            
			echo "</table>";
			mysqli_free_result($result);
		} else{
			echo "<p class='lead'><em>No records were found.</em></p>";
		}
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
	mysqli_close($link);
}
?>
