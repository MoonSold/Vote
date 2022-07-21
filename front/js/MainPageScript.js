$('.open-popup-register').click(function (){
    $('#register-form').fadeIn(600);
});

$('.close-popup-register').click(function (){
    $('#register-form').fadeOut(600);
});

$('.open-popup-auth').click(function (){
    $('#auth-form').fadeIn(600);

});

$('.close-popup-auth').click(function (){
    $('#auth-form').fadeOut(600);
});

if (!(document.cookie('token')=='not auth')){
    document.getElementById('auth').className = "hide";
    document.getElementById('register').className = "hide";
}