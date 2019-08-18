<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Library</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

	<style>
		/* Remove the navbar's default margin-bottom and rounded borders */ 
		.navbar {
			margin-bottom: 0;
			border-radius: 0;
		}

		/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
		.row.content {height: 450px}

		/* Set gray background color and 100% height */
		.sidenav {
			padding-top: 20px;
			background-color: #f1f1f1;
			height: 100%;
		}

		/* Set black background color, white text and some padding */
		footer {
			background-color: #555;
			color: white;
			padding: 15px;
			position: fixed;
			bottom: 0;
			width: 100%;
		}

		/* On small screens, set height to 'auto' for sidenav and grid */
		@media screen and (max-width: 767px) {
			.sidenav {
				height: auto;
				padding: 15px;
			}
			.row.content {height:auto;} 
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
					<li><a href="index.html">Home</a></li>
					<li class="active"><a href="bookList.php">Book List</a></li>
					<li><a href="#">Happenings</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Contact Us</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" data-toggle="modal" data-target="#modalForm"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<!-- Modal -->
					<div class="modal fade" id="modalForm" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<!-- Modal Header -->
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">
										<span aria-hidden="true">&times;</span>
										<span class="sr-only">Close</span>
									</button>
									<h4 class="modal-title" id="loginLabel">Login</h4>
								</div>

								<!-- Modal Body -->
								<div class="modal-body">
									<div class="alert alert-warning" id=formErrors hidden>
									</div>
									<form role="form">
										<div class="form-group">
											<label for="username">Username</label>
											<input type="text" class="form-control" id="username" placeholder="Enter your username" required="required"/>
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" class="form-control" id="password" placeholder="Enter your password" required="required"/>
										</div>
									</form>
								</div>

								<!-- Modal Footer -->
								<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="button" class="btn btn-primary submitBtn" onclick="submitLogin()">Login</button>
								</div>
							</div>
						</div>
					</div>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid text-center">    
		<div class="row content">
			<div class="col-sm-2 sidenav">
			</br> </br></br></br></br>
			<div id=genre>
				<script type='text/javascript'>fetchGenre();</script>
			</div>
		</div>
		<div class="col-sm-8 text-left"> 
			<h1>Book List</h1>
		</br>
		<div id=display>
			<script type='text/javascript'>fetchBooks();</script>
		</div>
	</div>
<!-- 			<div class="col-sm-2 sidenav">
				<div class="well">
					<p>ADS</p>
				</div>
				<div class="well">
					<p>ADS</p>
				</div>
			</div> -->
		</div>
	</div>

	 <!-- Sticky Footer -->
               <footer class="sticky-footer">
                <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2019</span>
                  </div>
                </div>
              </footer>
</div>
</body>

</body>
</html>