function fetchGenres(){
  $.ajax({
   type: "POST",
   url: "fetchGenres.php",
   data: {
   },
   success: function(html) {
     $("#GenreList").html(html).show();
   }
 });
}
function fetchBooks(){
 $.ajax({
   type: "POST",
   url: "fetchBooks.php",
   data: {
   },
   success: function(html) {
     $("#bookList").html(html).show();
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
         $("#bookList").html(html).show();
       }
     });
   }
 });
});
$(document).ready(function() {
$('.ids').on('change',function(){ //on checkboxes check
  var hi=$('.ids:checked').serialize();
  if(hi){
    $.ajax({
      type: "POST",
      cache: false,
      url: "filter.php",
      data:{brandss:hi},
      success: function(html){
        $("#bookList").html(html).show();
      }
    });
  }
  else
  {  
  }
});
});