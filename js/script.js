
$(document).ready(function(){



 $.ajaxSetup( {cache:false} );

/* Load DIV When Page Loads */
	$(window).load( function () {

		$(".se-pre-con").fadeOut("slow");
/*		$('#cir-intro').fadeIn('slow', function() {
			$(this).fadeTo("slow", 1);


		});*/
	});



	/* Load DIV After Scrollbar Is Moved 100px */


$(window).scroll( function() {
        if ( $(window).scrollTop() >500 ) {
          $('#cir-intro').fadeIn('slow', function() {
          $(this).fadeTo("slow", 1);
});
        }
});

$(window).scroll( function() {
        if ( $(window).scrollTop() > 1100 ) {
          $('.lightshake').fadeIn('slow', function() {
          $(this).fadeTo("slow", 1);
});
        }
});



$(window).scroll( function() {
        if ( $(window).scrollTop() > 1550 ) {
          $('.light1').fadeIn('slow', function() {
          $(this).fadeTo("slow", 1);
});
        }
});
/*
$(window).scroll( function() {
        if ( $(window).scrollTop() > 0 ) {
          $('.lightteam').fadeIn('slow', function() {
          $(this).fadeTo("slow", 1);
});
        }
});
*/

/*
	$("#step-one").on("click",function() {
	  $('.wrapper4' ).hide();
	  $('#basic1' ).show("slow");
	  $("#close").show("fast");

	});
	$("#step-two").on("click",function() {
	 $('.wrapper4' ).hide();
	  $('#psol1' ).show("slow");
	  $("#close").show("fast");
	});
	$("#step-three").on("click",function() {
	 $('.wrapper4' ).hide();
	  $('#oursol1' ).show("slow");
	  $("#close").show("fast");
	});
	$("#step-four").on("click",function() {
	 $('.wrapper4' ).hide();
	  $('#prot1' ).show("slow");
	  	  $("#close").show("fast");
	});


	  $('#close').on("click",function()
	 {
	 $(".deschide").hide();
	  $("#close").hide();
	   $("#options").show();

	 });
*/

	});
