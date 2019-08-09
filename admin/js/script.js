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
    $.post("readBookDetails.php", {
        id: id
    },
    function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_reference_number").val(user.first_name);    /* confused what to write here */
            $("#update_author").val(user.last_name);
            $("#update_title").val(user.last_name);
            $("#update_genre").val(user.email);
            $("#update_shelf").val(user.email);
            $("#update_rack").val(user.email);

        }
        );
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
    $.post("updateBookDetails.php", {
        id: id,
        reference_number: reference_number,
        author: author,
        title: title,
        genre: genre,
        shelf: shelf,
        rack: rack,
    },
    function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            fetchBooks();
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