$(document).ready(function(){
$('.submit_contact').click(function(){

  $( "div.form-group" ).removeClass( "has-error" );
  $('#error_msg').html(' ');
  $('#confirmed').html(' ');
  var name= $('#name').val();
  var email= $('#email').val();
  var where=$('#where').val();
  var position=$('#position').val();
  var note=$('#comment').val();
  var flag = 0;


//validate the fields
if( (!isName(name)) ) {
  $('#error_msg').append("<i id='alert' class='fa fa-exclamation-circle'></i> Make sure you enter your name right. <br >");
         $( "div.name" ).addClass( "has-error" );
flag = 1;
}

 if( !isEmail( email ) )
{  $('#error_msg').append("<i id='alert' class='fa fa-exclamation-circle'></i> Make sure you enter a valid email address. <br >");
       $( "div.mail" ).addClass( "has-error" );
flag = 1;
}

  if ((email == "") || (note=="") || (name == ""))
  {  $('#error_msg').html("<i id='alert' class='fa fa-exclamation-circle'></i> Make sure you enter your name, email and a note for us. <br >");
      $( "div.email" ).addClass( "has-error" );
      $( "div.note" ).addClass( "has-error" );
      $( "div.name" ).addClass( "has-error" );
flag = 1;
 }

//if no errors send the msg

if (!flag)
{

  $.ajax({
		type: 'POST',
   	url: 'msg.php',
		data: {fullname: name  ,  mail :email  ,  place: where  ,  pos :position  ,  comment : note},
		success: function(response)
    {
      if ( response == 1)
      {  $('#confirmed').html('<i class="fa fa-check-circle" id="iconfirm"></i> We got your message. We will get back to you very soon.');	}

       else  { $('#error_msg').html("<i id='alert' class='fa fa-exclamation-circle'></i> Oops! Something went wrong, please submit again. ");} // $('#response').html(response);
	  }
	});

}



}); // if click
}); // end of doc.ready

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}



function isName(name){

  var regname= /^[a-z ,.'-]+$/i;
   return regname.test(name);
}
