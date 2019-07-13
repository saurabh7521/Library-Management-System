<?php
           // Include config file
            include "config.php";
			$sql = "SELECT distinct genre FROM `books`";
			if($result = mysqli_query($link, $sql)){
				if(mysqli_num_rows($result) > 0){
				
				echo "<div id='frm'>";
				echo "<form method='POST'>";
				echo "<ul class='filter'>";
				echo "<h4>Genre</h4>";
				while($row = mysqli_fetch_array($result)){
					echo "<label>" . $row['genre'] . "</label><input type='checkbox' class='ids' name='ids[]' value='" . $row['genre'] . "'></br>";
				}
				echo "</ul>";
				echo "</form>";
				echo "</div>";
				mysqli_free_result($result);
               } else{
                       echo "<p class='lead'><em>No records were found.</em></p>";
                     }
            } else{
                   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
 
// Close connection
mysqli_close($link);
?>