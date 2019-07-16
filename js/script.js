//Getting value from "ajax.php".

function fill(Value) {

   //Assigning value to "search" div in "search.php" file.

   $('#search').val(Value);

   var hi=$('.ids:checked').serialize();
   
   //Hiding "display" div in "search.php" file.

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
     $("table").dataTable();
   }
 });
}
function fetchGenre(){
  $.ajax({

               //AJAX type is "Post".

               type: "POST",

               //Data will be sent to "fetchGenre.php".

               url: "fetchGenre.php",

               //Data, that will be sent to "fetchGenre.php".

               data: {

               },

               //If result found, this function will be called.

               success: function(html) {

                   //Assigning result to "display" div in "booklist.php" file.

                   $("#genre").html(html).show();

                 }

               });
}
// $(document).ready(function() {

//    //On pressing a key on "Search box" in "search.php" file. This function will be called.
   
   

//    $("#search").keyup(function() {
//        //Assigning search box value to javascript variable named as "name".

//        var name = $('#search').val();




//        //Validating, if "name" is empty.

//        if (name == "") {

//            //Assigning empty value to "display" div in "search.php" file.

//            fetchBooks();

//          }

//        //If name is not empty.


//        else {

//            //AJAX is called.

//            $.ajax({


//                //AJAX type is "Post".

//                type: "POST",

//                //Data will be sent to "ajax.php".

//                url: "ajax.php",

//                cache: false,

//                //Data, that will be sent to "ajax.php".


//                data: {



//                    //Assigning value of "name" into "search" variable.

//                    search: name

//                  },

//                //If result found, this funtion will be called.

//                success: function(html) {

//                    //Assigning result to "display" div in "search.php" file.

//                    $("#display").html(html).show();

//                  }

//                });

//          }

//        });

//  });
$(document).ready(function(){
	$('#genre').on('change','.ids',function(){ //on checkboxes check
	//sending checkbox value into serialize form
	var hi=$('.ids:checked').serialize();
	if(hi){
		$.ajax({
      type: "POST",
      cache: false,
      url: "filter.php",
      data:{brandss:hi},
      success: function(html){
       $("#display").html(html).show();
     }
   });
	}
	else{
		
		fetchBooks();
		
  }
});
});