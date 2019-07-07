<h3 style="border-bottom:2px solid;">Search Results</h3>
<?php
$connection = mysql_connect('localhost', 'root','');
$db = mysql_select_db('library', $connection);

if($_POST['brandss']){

//unserialize to jquery serialize variable value
$brandis=array();

parse_str($_POST['brandss'],$brandis); //changing string into array 

//split 1st array elements
foreach($brandis as $ids)
{
$ids;
}
$brandii=implode("','",$ids); //change into comma separated value to sub array
echo "<br>";
$sql = mysql_query("SELECT * FROM product WHERE brand IN ('$brandii')");
while($rows=mysql_fetch_array($sql)){
?>
  <?php echo $rows['name']."<br>";  ?>
<?php
  }
  }
  ?>