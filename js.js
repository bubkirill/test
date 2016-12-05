$(document).ready(function() {

	$("#auth_panel").hide();

$( "#reg" ).click(function() {
	if(!$('#email').val().match("^[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$")){
		alert("Заполните поле с Email");
	}else{
	$.ajax({
		url: "session.php",
		type: "POST",
		data: $("#form").serialize(),
		success: function (data){
			console.log(data);
			$.ajax({
				url: "auth.php", 
				success: function (data){
				$('#result').html(data);
	
  			}
			});
		}
	});
	alert('Вы успешно зарегистрировались');
	function redirect() {
	    $('#reg_panel').slideUp();
		$('#auth_panel').slideDown();
		$('#back').slideDown();
	}
	setTimeout(redirect(),1500);
}
});

	$.ajax({
	url: "auth.php", 
	success: function (data){
	$('#result').html(data);

  }
});


	$( "#back" ).click(function() {
	$('#reg_panel').slideDown();
	$('#auth_panel').slideUp();
	$( "#back" ).slideUp();
});


});