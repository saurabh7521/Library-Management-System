<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<title> home page </title>
<head>
  <!-- Including jQuery is required. -->

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"/>

  <!-- Including our scripting file. -->

  <script type="text/javascript" src="script.js"/>
<
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"/>
<link rel="stylesheet" href="style.css">

<script type="text/javascript">
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });
</script>
</head>
<body>

 <ul>
  <li>
   <a href="index.html">Home</a>
 </li>
 <li>
   <a href="#">About Us</a>
 </li>
 <li>
   <a class="active" href="#">Books List</a>
 </li>
 <li>
   <a href="#">Happenings</a>
 </li>
 <li>
   <a href="#">Contact Us</a>
 </li>
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
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
   <input type=text align=center id="search" placeholder="Enter Title or Author to Search" class="form-control">
 </div>
</div>
<div class="row">
 <div class="col-md-4">
  <form method="POST">
   <ul>
    <h4>Genre</h4>
    <?php
    $connection = mysql_connect('localhost', 'root','');
    $db = mysql_select_db('library', $connection);
    $sql = mysql_query("SELECT distinct genre FROM `books`");
    while($rows=mysql_fetch_array($sql))
    {
      ?>
      <label>
       <?php echo $rows['genre'];?>
     </label>
     <input type="checkbox" name="ids[]" value="<?php echo $rows['genre'];?>" class="ids"/>
     <br>
     <?php 
   }
   ?>
 </ul>
</form>
</div>
<div class="col-md-8">
 <div id=display/>
 <script type="text/javascript">fetchBooks();</script>
</div>
</div>
</div>
</body>
</html>
