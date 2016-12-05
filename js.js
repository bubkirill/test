$(document).ready(function() {

	$("#auth_panel").hide();
	var xhr = new XMLHttpRequest();





$( "#reg" ).click(function() {

//xhr.open('POST', 'session.php', false);
//xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
//xhr.send("fio="+$('#fio').val()+"&email="+$('#email').val()+"&password="+$('#password').val()+"&phone="+$('#phone').val()+"&dopinfo="+$('#dopinfo').val()+"&get_token=123");
//if (xhr.status == 400) {
//alert( xhr.status + ': Ошибка заполнения формы');
//}if (xhr.status == 201) {
//	alert("ok");
 if(!$('#email').val().match("^[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$")){
	alert("Заполните поле с Email");
	}else{
	$.ajax({
		url: "session.php",
		data: $("#form").serialize(),
		success: function (data){
			$('head').append(data);
			$.ajax({
				url: "auth.php", 
				success: function (data){
				$('#result').html(data);
	
			}
			});
		}
	});
	}
//}else if (xhr.status == 200){
//	alert( xhr.status + ': Такой пользователь уже существует');
//}else{
//	alert( xhr.status + ': Внутренняя ошибка сервера');
//}  

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