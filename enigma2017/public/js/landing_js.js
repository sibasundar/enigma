$(document).ready(function () {

			$("#sign_up_form").validate({
			rules: {
			fname: {
					required: true,
					minlength: 2
				},
			email: {
					required: true,
					email: true
				},
				lname:{
					required: true,
					minlength: 2
				},
				mobile: {
					required: true,
					minlength: 10,
					maxlength: 10,
					digits: true
				},
				password: {
					required: true,
					minlength: 8
				},
             },
			messages: {
			fname: {
					required: "Please provide us your first name.",
					minlength: "The name must contain atleast 2 characters"
				},
					lname: {
					required: "Please provide us your last name.",
					minlength: "The name must contain atleast 2 characters"
				},
				email: {
					required: "Please provide us your email Id",
					email: "Please enter a valid email address.",
				},
				email_alternate: {
					required: "It is mandatory to provide your group's email Id",
					email: "Please enter a valid email address.",
					notEqual: 'Please specify a different Email ID, not same as the above'
				},
				password: {
					required: "Please input your account's password.",
					minlength: "The password must contain atleast 8 characters"
				},
				mobile: {
					required: "Please provide us with your contact number",
					minlength: "The number must be 10 digits in length",
					maxlength: "The number must be 10 digits in length",
					digits: "Please enter digits only"
				},
			},
			submitHandler: function(form) {
				$('.modal_error').html('');
				 $('#sign_up_form').ajaxSubmit({
	success: function (data) {
	  $('.error').html(data);
	 $('.error_trigger').click();}
	});
				$('#sign_up_form').resetForm();
			}

			});
			
$('.submit_si').click(function () {
 $('#login_form').ajaxSubmit({
	success: function (data) {
	 $('.error').html(data);
	 $('.error_trigger').click();}
	});
$('#login_form').resetForm();
return false;
});
});