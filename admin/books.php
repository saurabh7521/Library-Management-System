<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: ../index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Your Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script src="js/admin-functions.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">St. Fransis Library</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <!-- <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
         <!--  <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div> -->
          <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="books.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Books</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="issued.php">
            <i class="fas fa-fw fa-plane"></i>
            <span>Issued</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="returned.php">
              <i class="fas fa-fw fa-thumbs-up"></i>
              <span>Returned</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="not-returned.php">
                <i class="fas fa-fw fa-thumbs-down"></i>
                <span>Not Returned</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="students.php">
                  <i class="fas fa-fw fa-users"></i>
                  <span>Students</span></a>
                </li>
              </ul>

              <div id="content-wrapper">

                <div class="container-fluid">

                  <!-- Breadcrumbs-->
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Books</li>
                  </ol>

                  <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-table"></i>
                      List of Books
                      <button type="submit" id="addNew" name="addNew" data-toggle="modal" data-target="#addBookModal" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</button>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Reference Number</th>
                              <th>Title</th>
                              <th>Author</th>
                              <th>Genre</th>
                              <th>Shelf</th>
                              <th>Rack</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>Reference Number</th>
                              <th>Title</th>
                              <th>Author</th>
                              <th>Genre</th>
                              <th>Shelf</th>
                              <th>Rack</th>
                              <th>Action</th>
                            </tr>
                          </tfoot>
                          <tbody id='tbody'>
                            <script type="text/javascript">readBooks();</script>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.container-fluid -->

                <!-- Sticky Footer -->
                <footer class="sticky-footer">
                  <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                      <span>Copyright © Your Website 2019</span>
                    </div>
                  </div>
                </footer>

              </div>
              <!-- /.content-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
              <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Update Books Modal-->
            <div class="modal fade" id="updateBookModal" tabindex="-1" role="dialog" aria-labelledby="updateBookModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="updateBookModalLabel">Update Book</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="update_reference_number">Reference Number</label>
                      <input type="text" id="update_reference_number" placeholder="Reference Number" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="update_title">Title</label>
                      <input type="text" id="update_title" placeholder="title" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="update_author">Author</label>
                      <input type="text" id="update_author" placeholder="Author" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="update_genre">Genre</label>
                      <input type="text" id="update_genre" placeholder="Genre" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="update_shelf">Shelf</label>
                      <input type="text" id="update_shelf" placeholder="Shelf" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="update_rack">Rack</label>
                      <input type="text" id="update_rack" placeholder="Rack" class="form-control"/>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="updateBookDetails()">Update</button>
                    <input type="hidden" id="hidden_update_book_id">
                  </div>
                </div>
              </div>
            </div>

            <!-- Add Books Modal-->
            <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="addBookModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="add_reference_number">Reference Number</label>
                      <input type="text" id="add_reference_number" placeholder="Reference Number" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="add_title">Title</label>
                      <input type="text" id="add_title" placeholder="title" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="add_author">Author</label>
                      <input type="text" id="add_author" placeholder="Author" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="add_genre">Genre</label>
                      <input type="text" id="add_genre" placeholder="Genre" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="add_shelf">Shelf</label>
                      <input type="text" id="add_shelf" placeholder="Shelf" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="add_rack">Rack</label>
                      <input type="text" id="add_rack" placeholder="Rack" class="form-control"/>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" onclick="addBookDetails()">Add</button>
                  </div>
                </div>
              </div>
            </div>

          </body>

          </html>
