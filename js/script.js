//Getting value from "ajax.php".

function fill(Value) {
   $('#search').val(Value);
   $('#display').hide();
 }
 function fetchBooks(){
               $.ajax({
                 type: "POST",
               url: "fetchBooks.php",
               data: {
               },
               success: function(html) {
                   $("#display").html(html).show();
                 }
               });  
             }
$(document).ready(function() {
   $("#search").keyup(function() {
       var name = $('#search').val();
       if (name == "") {
           fetchBooks();
         }
       else {
           $.ajax({
               type: "POST",
               url: "ajax.php",
               data: {
                   search: name
                 },
               success: function(html) {
                   $("#display").html(html).show();
                 }
               });
         }
       });
 });