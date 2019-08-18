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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Including jQuery is required. -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

  <script src="js/script.js"></script>
  <!-- Datepicker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">St. Francis Library</a>

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
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

</nav>

<div id="wrapper">

  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
    <li class="nav-item ">
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
        <a class="nav-link" href="students.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Students</span></a>
        </li>
        <li class="nav-item active">
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
              <a class="nav-link" href="non-returned.php">
                <i class="fas fa-fw fa-thumbs-down"></i>
                <span>Non Returned</span></a>
              </li>
            </ul>

            <div id="content-wrapper">

              <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Issued Books</li>
                </ol>
              </div>
              <!-- /.container-fluid -->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-plane"></i>
                  All Issued Books 
                  <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Issue a Book</button>
                </div>

                <!-- Bootstrap Modal - To Add New Record -->
                <!-- Modal -->
                <div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Issue Book</h4>
                      </div>
                      <div class="modal-body">

                        <div class="form-group">

                          <div class="form-group">
                            <label for="issue_book">Select Book</label><!-- Suggestions will be displayed in below div. --><div id="display"></div>
                            <input type="text" id="issue_book" placeholder="Select Book" class="form-control" />
                          </div>

                          <div class="form-group">
                            <label for="issue_student">Select Student </label><button class="btn btn-success" onclick="location.href='students.php'">Add Student</button><div id="display1"></div>
                            <input type="text" id="issue_student" placeholder="Select Student" class="form-control" />
                          </div>

                          <label for="return_date">Return Date</label><i class="fa fa-calendar"></i>
                          <input type="text" id="return_date" placeholder="MM/DD/YYYY" class="form-control" />
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="issueBook()">Issue</button>
                      </div>
                    </div>
                  </div>
                </div> <!-- modal end for add new record -->

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id='dataTable' width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Book ID</th>
                          <th>Student ID</th>
                          <th>Issue Date</th>
                          <th>Return Date</th>
                          <th>Fine</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                         <th>Book ID</th>
                         <th>Student ID</th>
                         <th>Issue Date</th>
                         <th>Return Date</th>
                         <th>Fine</th>
                         <th>Actions</th>
                       </tr>
                     </tfoot>
                     <tbody id='tbody'>
                      <script type='text/javascript'>fetchIssuedBooks();</script>
                    </tbody>
                  </table>
                </div>
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

      </body>

      </html>