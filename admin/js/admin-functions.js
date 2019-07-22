function getBookDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_book_id").val(id);
    $.ajax({
     type: "POST",
     url: "readBookDetails.php",
     data: {
        id: id
    },
    success: function(data, status) {
     // PARSE json data
     var book = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_reference_number").val(book.Reference_number);
            $("#update_title").val(book.Title);
            $("#update_author").val(book.Author);
            $("#update_genre").val(book.Genre);
            $("#update_shelf").val(book.Shelf);
            $("#update_rack").val(book.Rack);
            $("#updateBookModal").modal("show");
        }
    });
}

function updateBookDetails() {
    // get values
    var reference_number = $("#update_reference_number").val();
    var title = $("#update_title").val();
    var author = $("#update_author").val();
    var genre = $("#update_genre").val();
    var shelf = $("#update_shelf").val();
    var rack = $("#update_rack").val();
    // get hidden field value
    var id = $("#hidden_update_book_id").val();

    $.ajax({
       type: "POST",
       url: "updateBookDetails.php",
       data: {
         id: id,
         reference_number: reference_number,
         title: title,
         author: author,
         genre: genre,
         shelf: shelf,
         rack: rack
     },
     success: function(status) {
     // hide modal popup
     alert(status);
     $("#update_book_modal").modal("hide");
            // reload Users by using readRecords();
            readBooks();
        }
    });
}

function addBookDetails() {
    // get values
    var reference_number = $("#add_reference_number").val();
    var title = $("#add_title").val();
    var author = $("#add_author").val();
    var genre = $("#add_genre").val();
    var shelf = $("#add_shelf").val();
    var rack = $("#add_rack").val();

    $.ajax({
       type: "POST",
       url: "addBookDetails.php",
       data: {
         reference_number: reference_number,
         title: title,
         author: author,
         genre: genre,
         shelf: shelf,
         rack: rack
     },
     success: function(status) {
     // close the popup
     $("#addBookModal").modal("hide");
        // read records again
        readBooks();
        // clear fields from the popup
        $("#add_reference_number").val("");
        $("#add_title").val("");
        $("#add_author").val("");
        $("#add_genre").val("");
        $("#add_shelf").val("");
        $("#add_rack").val("");
    }
});
}
function deleteBook(id) {
    $.ajax({
       type: "POST",
       url: "deleteBook.php",
       data: {
         id: id
     },
     success: function(status) {
     // close the popup
     $("#addBookModal").modal("hide");
        // read records again
        // readBooks();
        $('#dataTable').DataTable().ajax.reload();

    }
});
}
function readBooks(){
    $.ajax({
     type: "POST",
     url: "readBooks.php",
     data: {
     },
     success: function(html) {
       $("#tbody").html(html).show();
       $('#dataTable').DataTable();
   }
}); 
}