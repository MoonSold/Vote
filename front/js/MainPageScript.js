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

let token = $.cookie('username');

if (typeof token === 'undefined'){
    $("#register").css("display", "block"); // Для скрытия
    $("#auth").css("display", "block"); // Для скрытия
    $("#exit").css("display", "none"); // Для показа
    $(".go-vote").attr('disabled', true);

}
else {
    $("#register").css("display", "none"); // Для скрытия
    $("#auth").css("display", "none"); // Для скрытия
    $("#exit").css("display", "block"); // Для показа
    $(".go-vote").attr('disabled', false);
}