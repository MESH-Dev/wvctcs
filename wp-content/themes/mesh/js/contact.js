jQuery(document).ready(function($) {
	
	function centerContent(){
		  var container = $('#main');
		  var content = $('.ctc_form');
		  var _header = $('header');
		  var _window = $(window);
		  content.css("left", ((container.width()-content.width())/2) + _header.width());
		  content.css("top", (_window.height()-content.height())/2);

		  if(_window.width() <= 1024){
		    content.css("left", ((container.width()-content.width())/2));
		  }
	}

	function contact_ajax(){
        var fname = $('#fname').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var location = $('#location').val();
		var howto = $('.ctc_select:checked').val();
		//var message = $('#message').val();
		var data = {
		  		action: 'contact_ajax',
		  		security : MyAjax.security,
		  		fname: fname,
		  		email: email,
		  		phone: phone,
		  		location: location,
		  		howto: howto
		 };
		 //console.log(data);
		 
		 $.post(MyAjax.ajaxurl, data, function(response) {
				var parsed_json = jQuery.parseJSON(response);
				$('#contact_ajax').hide();
				$("#contact_ajax_response").html(parsed_json);

				
		});
		return false;
		
	}
	
	$('#contact').submit( function(){
		$('#contact_ajax').show();
		$(this).prepend($("#contact_ajax_response").html(''));
		//centerContent();
		var form_height = $('.ctc_form').height();
		console.log(form_height);
		contact_ajax();
		return false;
	});


});