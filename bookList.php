<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <title> home page </title>
<head>
<!-- Including jQuery is required. -->
     

   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

   <!-- Including our scripting file. -->

   <script type="text/javascript" src="script.js"></script>
<style>
   body {
    background-repeat: no-repeat;
    background-size: 100% 800px;
    }

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  border: 1px solid #e7e7e7;
  background-color: #f3f3f3;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: #666;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: #ddd;
  text-decoration: none;
  color: grey;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}
li a.active {
  color: white;
  background-color: #4CAF50;
}

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="#">About Us</a></li>
  <li><a class="active" href="#">Books List</a></li>
  <li><a href="#">Happenings</a></li>
  <li><a href="#">Contact Us</a></li>
  <li class="dropdown">
    <a href="#" class="dropbtn">Login</a>
    <div class="dropdown-content">
      <a href="admin login.html">Admin</a>
      <a href="librarian login.html">Librarian</a>
    </div>
  </li>
</ul>
 <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Book Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Employee</a>
                    </div>
                    <p>search here</p><input type=text align=center id="search" placeholder="Enter Book or Title"> <div id=display></div>
<script type='text/javascript'>fetchBooks();</script>
					                </div>
            </div>        
        </div>
    </div>
	 <!-- live check-box functionality -->
	  <script type="text/javascript" src="jquery.js"></script> 
<script>
$(document).ready(function(){
$('.ids').on('change',function(){ //on checkboxes check
//sending checkbox value into serialize form
var hi=$('.ids:checked').serialize();
 if(hi){
$.ajax({
type: "POST",
cache: false,
url: "filter.php",
data:{brandss:hi},
success: function(response){
document.getElementById('getdata').style.display = "block";
document.getElementById("getdata").innerHTML = response;
$('#result').hide();
}
});
}
else
{
document.getElementById('getdata').style.display = "none";
$('#result').show();
}
});
});
</script>
<style>
#frm
{
width:150px;
float:left;
}
#result
{
border:2px dotted #ededed;
height:auto;
width:350px;
}
h3
{
border-bottom:2px solid;
}
</style>

  <div id="frm" >
<form method="POST">
 <ul class="filter">
 <h4>Filter By Genre</h4>

 <?php
 $connection = mysql_connect('localhost', 'root','');
 
$db = mysql_select_db('library', $connection);
  $sql = mysql_query("SELECT distinct genre FROM `books`");
  while($rows=mysql_fetch_array($sql))
  {
  ?> 
 <div id="check-box">
 <?php echo $rows['genre'];?>
 <input type="checkbox" name="ids[]" value="<?php echo $rows['genre'];?>"/><br></div>
 <?php }
 ?>
  
   </ul>

</form>
</div>
  
	 
</body>
</html>