<script type="text/javascript">

	mdl_dialog('.dialog-button-save');
	mdl_dialog('.dialog-icon-save');

	$('form input, form select, form textarea').on('input', function() {
	    $('.save-actions').show();
	});

	$('.mdl-select-input, .mdl-file-input, .mdl-radio__button').change(function(event) {
		$('.save-actions').show();
	});

	$(".mdl-dialog.ajax-dialog button[type='submit']").click(function(event) {
		var formData = $('#edit_profile_form').serializeArray();
		var fadeSpeed = 150;
	    $.ajax({
			url: '/profile/{{$user->name}}/updateAjax',
			type: "post",
			dataType: 'json',
			data: {'username':'{{ $user->name }}', formData},
			success: function(request, status, data){
				dialog.close();
				$('#ajax_message_title').text(request.title);
				$('#ajax_message_message').text(request.message);
				$('#ajax_message_icon').text('check');
				$('.message.ajax-message').addClass('success')
				$('.message.ajax-message').fadeIn(fadeSpeed, function() {
					$(this).css({
						opacity: 1,
						left: 0
					});
				});;
				$('#user_theme_link').attr('href', '/css/mdl-themes/'+ request.themeLink);
				$('.save-actions').hide();
			},
			error: function (request, status, error) {
				console.log(error);
				console.log(request);
				console.log(status);
				dialog.close();
				$('#ajax_error_message').text(request.responseText);
				$('.ajax-error.message').fadeIn(fadeSpeed, function() {
					$(this).css({
						opacity: 1,
						left: 0
					});
				});;
			}
	    });
	});

	$.ajaxSetup({
	   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});

</script>