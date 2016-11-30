
//console.log("ajax form loaded");
var messageDelay = 3000;  // How long to display status messages (in milliseconds)


// Init the form once the document is ready
$( init );


// Initialize the form

function init() {

  // Hide the form initially.
  // Make submitForm() the form's submit handler.
  // Position the form so it sits in the centre of the browser window.
  $('#contactForm').submit( submitForm );

}

// Submit the form via Ajax

function submitForm() {
  var contactForm = $(this);

  // Are all the fields filled in?
	/*
	var validationEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/;
  if (!$('#senderName').val() || !validationEmail.test($('#senderEmail').val()) || !$('#message').val()) {

    // No; display a warning message and return to the form
//console.log("Валидация почты: " + validationEmail.test($('#senderEmail').val()));
	  $('#incompleteMessage').fadeIn().delay(messageDelay).fadeOut();


  } else {

    // Yes; submit the form to the PHP script via Ajax

    $('#sendingMessage').fadeIn();

    
  } */
	$.ajax({
      url: contactForm.attr( 'action' ) + "?ajax=true",
      type: contactForm.attr( 'method' ),
      data: contactForm.serialize(),
      success: submitFinished,
	  error: function(){
		   alert('Возникла ошибка, нет связи с сервером. Попробуйте еще раз.');
	  console.log('error!');
		  
	  }
    });
  // Prevent the default form submission occurring
  return false;
};


// Handle the Ajax response

function submitFinished( response ) {
  response = $.trim( response );
  $('#sendingMessage').fadeOut();

  if ( response == "success" ) {

	console.log('SUCCES');
	$('#senderName').val( "" );
	$('#senderPhone').val( "" );
	$('#senderEmail').val( "" );
	$('#messageText').val( "" );
	  alert('Сообщение успешно отправленно!');

  } else {
	  alert('Возникла ошибка, нет ответа от сервера. Попробуйте еще раз.');
	  console.log('error');
	  
    
  }
}