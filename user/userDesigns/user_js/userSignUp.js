$(document).on('submit','#signupform',function(e){
        e.preventDefault();
       	
       	// var fullname = $('fullname').val(),
       	// 	username = $('username').val(),
       	// 	contactNumber = $('contactNumber').val(),
       	// 	address = $('address').val(),
       	// 	birthday = $('birthday').val(),
       	// 	email = $('email').val(),
       	// 	password = $('password').val()

        $.ajax({
        method:"POST",
        url: "userModules/userInsertdata.php",
        data:$(this).serialize(),
        success: function(data){
        // $('#msg').html(data);
        // $('#userForm').find('input').val('')
    }});
});


$(document).on('login','#userLoginform',function(e){
	e.preventDefault();

	var email = $('email').val(),
       	password = $('password').val();

	$.ajax({
        method:"POST",
        url: "userModules/Login.php",
        // data:$(this).serialize(),
        data:{
        	email:email,
        	password:password
        },
        success: function(data){
        // $('#msg').html(data);
        // $('#userForm').find('input').val('')
        alert("o");
        
    }});
});


// $(document).ready(function(){
// 	$('#btnlogin').click(function(){
// 		var email = $('#email').val(),
// 			password = $('#password').val();

// 			if(email == "" || password == ""){
// 				alert("Please fill all fields...!!!!!!");
// 			}else{
// 				$.post("Login.php",{email:email, password:password},
// 					function(data){
// 						if (data) {
//                             validation_message.hide();// window.location.href = 'dashboard.php?username=' + data;
//                         } else {
//                             validation_message.addClass('warning');
//                             alidation_message.html('The username and password you entered isn’t connected to an account. Please try again.');
//                         }
// 					});
// 			}

// 	});

// });

