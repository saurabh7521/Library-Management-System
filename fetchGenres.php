<?php
include "config.php";
$sql = "SELECT distinct genre FROM books";
if($result = mysqli_query($link, $sql)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      {
        echo "<div class='checkbox' align='left'><label><input type='checkbox' name='ids[]' value='" . $row['genre'] . "' class='ids'/>" . $row['genre'] . "</label></div>";
      }
    }
  }
}