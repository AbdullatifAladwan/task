$(function() {

	if ( $('.owl-2').length > 0 ) {
        $('.owl-2').owlCarousel({
            center: false,
            items: 1,
            loop: true,
            stagePadding: 0,
            margin: 20,
            smartSpeed: 1000,
            autoplay: true,
            nav: true,
            dots: true,
            pauseOnHover: false,
            responsive:{
                600:{
                    margin: 20,
                    nav: true,
                  items: 2
                },
                1000:{
                    margin: 20,
                    stagePadding: 0,
                    nav: true,
                  items: 3
                }
            }
        });            
    }

})
$(".deleteProduct").click(function(){
  var id = $(this).data("id")
  var token = $(this).data("token");
  alert("Product are deleted ");
 
  $.ajax(
  {
      url: "product/"+id,
      type: 'delete',
      dataType: "JSON",
      data: {
          "id": id ,
          "_token": token,
      },
      success: function (response)
      {
          console.log(response); // see the reponse sent
          window.location.reload();
      },
      error: function(xhr) {
       console.log(xhr.responseText); // this line will save you tons of hours while debugging
      // do something here because of error
     }
  });
});