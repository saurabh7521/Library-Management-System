<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Library</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <style>
  /* Remove the navbar's default margin-bottom and rounded borders */ 
  .navbar {
    margin-bottom: 0;
    border-radius: 0;
  }

  /* Add a gray background color and some padding to the footer */
  footer {
    background-color: #f2f2f2;
    padding: 25px;
  }

  .carousel-inner img {
    width: 100%; /* Set width to 100% */
    margin: auto;
    min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
</style>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">St. Francis Library</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="bookList.php">Book Lists</a></li>
          <li><a href="#">Happenings</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid text-center">    
    <div class="row content">
      <div class="col-sm-2 sidenav">
          <form method="POST">
            </br></br></br></br></br>
            <p><h4>Genre</h4></p>
            <?php
            $connection = mysql_connect('localhost', 'root','');
            $db = mysql_select_db('library', $connection);
            $sql = mysql_query("SELECT distinct genre FROM `books`");
            while($rows=mysql_fetch_array($sql))
            {
              ?>
              <div class="checkbox" align="left">
                <label><input type="checkbox" name="ids[]" value="<?php echo $rows['genre'];?>" class="ids"><?php echo $rows['genre'];?></label>
              </div>
              <?php 
            }
            ?>
          </form>
      </div>
      <div class="col-sm-8 text-left"> 
        <h1>List of Books</h1>
       <hr>
       <input class="form-control m-4 pb-5" type="text" id="search" placeholder="Enter Title or Author to Search" aria-label="Search">
       </br>
       <div id=display>
         <script type="text/javascript">fetchBooks();</script>
       </div>
     </div>
    <!-- <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div> -->
  </div>
</div>
<footer class="container-fluid text-center">
  <p>@copyright</p>
</footer>
</body>
</html>
