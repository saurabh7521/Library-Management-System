 // Toggle the side navigation
  $("#sidebarToggle").on('click', function(e) {
    e.preventDefault();
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
  });
 function fetchBooks(){
  $.ajax({
    type: "POST",
    url: "readAllBooks.php",
    data: {
    },
    success: function(html) {
        $("#tbody").html(html).show();
        $("#dataTable").dataTable();
    }
});
}
// Add Record 
function addBook() {
    // get values
    var Ref = $("#ref").val();
    var Author = $("#author").val();
    var Title = $("#title").val();
    var Genre = $("#genre").val();
    var Shelf = $("#shelf").val();
    var Rack = $("#rack").val();
    $.ajax ({
    // Add record
    type: "post",
    url:"addBooks.php",
    cache: false,
    data: {
        Ref: Ref,
        Author: Author,
        Title: Title,
        Genre: Genre,
        Shelf: Shelf,
        Rack: Rack
    },
    success: function (data, status) {

        // close the popup
        $("#add_new_record_modal").modal("hide");

        fetchBooks();

        // clear fields from the popup
        $("#ref").val("");
        $("#author").val("");
        $("#title").val("");
        $("#genre").val("");
        $("#shelf").val("");
        $("#rack").val("");
    }

});

}

/* READ readRecords
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });*/

    function GetBookDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.ajax({
        type: "POST",
        url: "readBookDetails.php",
        data: {
            id: id,
        },
        success: function (data, status) {
            // PARSE json data
            var book = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_reference_number").val(book.Reference_number);
            $("#update_author").val(book.Author);
            $("#update_title").val(book.Title);
            $("#update_genre").val(book.Genre);
            $("#update_shelf").val(book.Shelf);
            $("#update_rack").val(book.Rack);

        }
    });
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateBookDetails() {
    // get values
    var reference_number = $("#update_reference_number").val();
    var author = $("#update_author").val();
    var title = $("#update_title").val();
    var genre = $("#update_genre").val();
    var shelf = $("#update_shelf").val();
    var rack = $("#update_rack").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.ajax({
        type: "POST",
        url: "updateBookDetails.php", 
        data : {
            id: id,
            reference_number: reference_number,
            author: author,
            title: title,
            genre: genre,
            shelf: shelf,
            rack: rack,
        },
        success: function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload books by using fetchbooks();
            fetchBooks();
        }
    });
}

function DeleteBook(id) {
    var conf = confirm("Are you sure, do you really want to delete this book?");
    if (conf == true) {
        $.post("deleteBook.php", {
            id: id
        },
        function (data, status) {
                // reload Users by using readRecords();
                fetchBooks();
            }
            );
    }
}
$(document).ready(function(){
    $("#return_date").datepicker();
    });
/*now onwarads, students' code*/
function fetchStudents(){
  $.ajax({
    type: "POST",
    url: "readAllStudents.php",
    data: {
    },
    success: function(html) {
        $("#tbody").html(html).show();
        $("#dataTable").dataTable();
    }
});
}

function addStudent() {
    // get values
    var s_name = $("#s_name").val();
    var s_class = $("#s_class").val();
    var s_mail = $("#s_mail").val();
    var s_mob = $("#s_mob").val();

    $.ajax ({
    // Add record
    type: "post",
    url:"addStudents.php",
    cache: false,
    data: {
        s_name: s_name,
        s_class: s_class,
        s_mail: s_mail,
        s_mob: s_mob,
        
    },
    success: function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");
        // clear fields from the popup
        $("#s-name").val("");
        $("#s-class").val("");
        $("#s-mail").val("");
        $("#s-mob").val("");

        fetchStudents();

    }

});
}

function GetStudentDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.ajax({
        type: "POST",
        url: "readStudentDetails.php",
        data: {
            id: id,
        },
        success: function (data, status) {
            // PARSE json data
            var student = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_student_name").val(student.Student_Name);
            $("#update_class").val(student.Class);
            $("#update_email").val(student.E_mail);
            $("#update_mobile").val(student.Mobile);
    $("#update_student_modal").modal("show");

        }
    });
    // Open modal popup
}

function UpdateStudentDetails() {
    // get values
    var student_name = $("#update_student_name").val();
    var Class = $("#update_class").val();
    var email = $("#update_email").val();
    var mobile = $("#update_mobile").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.ajax({
        type: "POST",
        url: "updateStudentDetails.php", 
        data : {
            id: id,
            student_name: student_name,
            Class: Class,
            email: email,
            mobile: mobile,

        },
        success: function (data, status) {
            // hide modal popup
            $("#update_student_modal").modal("hide");
            // reload books by using fetchbooks();
            fetchStudents();
        }
    });
}

function DeleteStudent(id) {
    var conf = confirm("Are you sure, do you really want to delete this student?");
    if (conf == true) {
        $.post("DeleteStudent.php", {
            id: id
        },
        function (data, status) {
                // reload Users by using readRecords();
                fetchStudents();
            }
            );
    }
}
/* Now on Code for Issued Books (Issued.php)*/

fetchIssuedBooks() {
  $.ajax({
    type: "POST",
    url: "readAllIssuedBooks.php",
    data: {
    },
    success: function(html) {
        $("#tbody").html(html).show();
        $("#dataTable").dataTable();
    }
});
}

/*now onwards code for search suggestiopn for 'select book' and 'select student'*/
//Getting value from "ajax.php".
function fill(Value) {
   //Assigning value to "issue_book" div in "issued.php" file.
   $('#issue_book').val(Value);
   //Hiding "display" div in "issued.php" file.
   $('#display').hide();
}
$(document).ready(function() {
   //On pressing a key on "Select Book" in "issued.php" file. This function will be called.
   $("#issue_book").keyup(function() {
      //Assigning search box value to javascript variable named as "name".
       var name = $('#issue_book').val();
     //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("");
     }
      else {
           $.ajax({
               type: "POST",
               url: "select_book_ajax.php",
               data: {
                   //Assigning value of "name" into "issue_book" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(html).show();
               }
           });
       }
   });
});
/*now onwards code for search suggestiopn for 'select student' and 'select student'*/
//Getting value from "ajax.php".
function fill(Value) {
   //Assigning value to "issue_book" div in "issued.php" file.
   $('#issue_student').val(Value);
   //Hiding "display" div in "issued.php" file.
   $('#display1').hide();
}
$(document).ready(function() {
   //On pressing a key on "Select Book" in "issued.php" file. This function will be called.
   $("#issue_student").keyup(function() {
      //Assigning search box value to javascript variable named as "name".
       var name = $('#issue_student').val();
     //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display1" div in "issued.php" file.
           $("#display1").html("");
     }
      else {
           $.ajax({
               type: "POST",
               url: "select_student_ajax.php",
               data: {
                   //Assigning value of "name" into "issue_book" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(html) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display1").html(html).show();
               }
           });
       }
   });
});