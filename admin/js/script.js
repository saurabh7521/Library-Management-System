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


        // clear fields from the popup
        $("#ref").val("");
        $("#author").val("");
        $("#title").val("");
        $("#genre").val("");
        $("#shelf").val("");
        $("#rack").val("");

        fetchBooks();

    }

});
}

/* READ readRecords
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });*/

    function UpdateBookDetails() {
    // get values
    var Ref = $("#ref").val();
    var Author = $("#author").val();
    var Title = $("#title").val();
    var Genre = $("#genre").val();
    var Shelf = $("#shelf").val();
    var Rack = $("#rack").val();
    
    // get hidden field value
    var id = $("#hidden_user_id").val();
    
    // Update the details by requesting to the server using ajax
    $.post("ajax/updateBookDetails.php", {
        id: id,
        Ref: Ref,
        Author: Author,
        Title: Title,
        Genre: Genre,
        Shelf: Shelf,
        Rack: Rack
    },
    function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            /*      readRecords();*/
        }
        );
}


function DeleteBook(id) {
    var conf = confirm("Are you sure, do you really want to delete this bookk?");
    if (conf == true) {
        $.post("deleteBook.php", {
            id: id
        },
    /*       function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }*/
            );
    }
}
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
    var s_name = $("#s-name").val();
    var s_class = $("#s-class").val();
    var s_mail = $("#s-mail").val();
    var s_mob = $("#s-mob").val();

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

function DeleteStudent(id) {
    var conf = confirm("Are you sure, do you really want to delete this student?");
    if (conf == true) {
        $.post("DeleteStudent.php", {
            id: id
        },
    /*       function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }*/
            );
    }
}