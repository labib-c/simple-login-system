$(document)
.on("submit", "form.js-register", function(event){
	event.preventDefault();
	var form = $(this);
	var error = $(".js-error", form);
	var data = {
		email: $("input[type='email']", form).val(), 
		password: $("input[type='password']", form).val()
	}
	if(data.email.length < 6){
		error.text("Enter a valid email address").show();
		return false;
	} else if (data.password.length < 11){
		error.text("Password must be at least 11 characters").show();
		return false;
	}
	
	error.hide();

	return false;
})