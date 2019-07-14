function fetchGenres(){
  $.ajax({
   type: "POST",
   url: "fetchGenres.php",
   data: {
   },
   success: function(html) {
     $("#genreList").html(html).show();
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
     $('table').dataTable();
   }
 });  
}
/*function totalBooks(){
 $.ajax({
   type: "POST",
   url: "totalBooks.php",
   data: {
   },
   success: function(html) {
     $("#totalBooks").html(html).show();
   }
 });  
}*/
// $(document).ready(function() {
//   $("#search").keyup(function() {
//    var name = $('#search').val();
//    /*var hi=$('.ids:checked').serialize();*/
//      $.ajax({
//        type: "POST",
//        url: "ajax.php",
//        data: {
//          search: name/*,
//          brandss:hi*/
//        },
//        success: function(html) {
//          $("#bookList").html(html).show();
//        }
//      });
//  });
// });
$(document).ready(function() {
$('#genreList').on('change','.ids',function(){ //on checkboxes check
  /*var name = $('#search').val();*/
  var hi=$('.ids:checked').serialize();
  if(hi /*|| name !=""*/){
    $.ajax({
      type: "POST",
      cache: false,
      url: "filter.php",
      data: {
         /*search: name,*/
         brandss:hi
       },
      success: function(html){
        $("#bookList").html(html).show();
        $('table').dataTable();
      }
    });
  }
  else
  {  
    fetchBooks();
  }
});
});