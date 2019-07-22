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
function submitLogin(){
  var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var username = $('#username').val();
  var password = $('#password').val();
  var login = "";
  if(username.trim() == '' ){
    $('#formErrors').html('Please enter your username.').show();
    $('#username').focus();
    return false;
  }else if(password.trim() == '' ){
    $('#formErrors').html('Please enter your password.').show();
    $('#password').focus();
    return false;
  }else{
    $('#formErrors').hide();
    $.ajax({
      type:'POST',
      url:'login.php',
      data:'username='+username+'&password='+password,
      beforeSend: function () {
        $('.submitBtn').attr("disabled","disabled");
        $('.modal-body').css('opacity', '.5');
      },
      success:function(msg){
        $('.submitBtn').removeAttr("disabled");
        $('.modal-body').css('opacity', '');
        if (msg=='ok'){
          window.location.href = "admin/index.php";
        } else {
          $('#formErrors').html(msg).show();
        }
      }
    });
  }
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