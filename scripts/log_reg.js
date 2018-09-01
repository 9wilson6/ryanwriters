$(document).ready(function(){

$("#register_form").hide();

$("form").submit(function(event){//prevent form from default behavior
//handle event after clicking the register button

$("#register").click(
function(){
$("#form-message").html("");
	$("#login_form").hide();//hide the log in form
$("#register_form").show();//show the register form

});//end register event

$("#Login").click(//handle log in event
function(){
$("#form-message").html("");	
$("#register_form").hide();//hide register form
$("#login_form").show();//show log in form

});//and login click event
event.preventDefault();//prevent document from submiting form content



});

//handle login event
$("#log_in_form").submit(function(){
	var submit =$("#submit").val();
	var name = $("#username").val();
	var password = $("#password").val();
	
$("#form-message").load("login.php", {

	name: name,
	password: password,
	submit: submit
});


});
});