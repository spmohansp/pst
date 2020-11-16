$(document).ready(function(){
	$("#otp").hide();
	$("#login_form").submit(function(e){
		e.preventDefault();
		phone_no = document.getElementById('ph_no').value;  
		$.ajax({
			type : "POST",
			url : "../controller/login_controller.php",
			data : {phone_no : phone_no},
			success: function(data){
				console.log(data);
				if(data == "error"){
					document.getElementById('response').innerHTML = '<div class="alert alert-danger"><strong>Sorry!</strong>Contact Administrator!</div>' ;
					console.log("error");
				}else{
					window.location = "../view/";
				}
			}
		});
	});	
});

function get_user_details(phone_no){
	$.ajax({
		type : "POST",
		url : "../controller/validate_login_details.php",
		data : {phone_no : phone_no},
		success: function(data){
			console.log(data);
			if(data == "error"){
				document.getElementById('footer_response').innerHTML = '<div class="alert alert-danger"><strong>Sorry!</strong> Signup your Account </div>' ;
			}else{
				window.location = "../view/";
			}
		}
	});
}
