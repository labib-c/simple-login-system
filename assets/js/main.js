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

	$.ajax({
		type: 'POST',
		url: 'ajax/register.php',
		data: data,
		dataType: 'json',
		asyn: true,
	})
	.done(function ajaxDone(data){
		console.log(data);
		if (data.redirect !== undefined){
			alert('youre good');
			// window.location = data.redirect;
		}else if (data.error !== undefined){
			error.text(data.error).show();
		}

	})
	.fail(function ajaxFailed(e){
		console.log(e);

	})
	.always(function ajaxAlways(data){
		console.log(data);

	})
	return false;
})

//login
.on("submit", "form.js-login", function(event){
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

	$.ajax({
		type: 'POST',
		url: 'ajax/login.php',
		data: data,
		dataType: 'json',
		asyn: true,
	})
	.done(function ajaxDone(data){
		console.log(data);
		if (data.redirect !== undefined){
			alert('logged in');
			// window.location = data.redirect;
		}else if (data.error !== undefined){
			error.html(data.error).show();
		}

	})
	.fail(function ajaxFailed(e){
		console.log(e);

	})
	.always(function ajaxAlways(data){
		console.log(data);

	})
	return false;
})