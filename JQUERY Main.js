$(document).ready(function(){

    $("#signup_btn").click(function(event){
		event.preventDefault();
        $("#main").animate({left:"30%"},1000); 
		$("#loginform").animate({opacity:"0", zIndex:"-1"},50)
        $("#loginform").animate({left:"25%"},1000);
		$("#signupform").animate({opacity:"100", zIndex:"100"},0);
		$("#signupform").animate({left:"30%"},1000);
    }); 
    
    $("#login_btn").click(function(event){
		event.preventDefault();
        $("#main").animate({left:"70%"},1000);
		$("#signupform").animate({opacity:"0", zIndex:"-1"},50)
        $("#signupform").animate({left:"75%"},1000);
		$("#loginform").animate({opacity:"100", zIndex:"100"},0);
        $("#loginform").animate({left:"70%"},1000);
    });
});








