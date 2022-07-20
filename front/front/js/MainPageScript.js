
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

function sendAuthJSONA() {
    let name = document.querySelector('#auth-login');
    let password = document.querySelector('#auth-passwordd');
    let result = document.querySelector('.result');
    let xhr = new XMLHttpRequest();
    let url = "";
    // открываем соединение
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            result.innerHTML = this.responseText;
        }
    };
    var data = JSON.stringify({"name": name.value, "password": password.value });
    xhr.send(data);
}

function sendRegisterJSONA() {
    let name = document.querySelector('#register-login');
    let username = document.querySelector('#register-username');
    let password = document.querySelector('#register-password');
    let xhr = new XMLHttpRequest();
    let url = "";
    // открываем соединение
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            $('.write').text(this.response);
        }
    };
    var data = JSON.stringify({ "username":username.value, "name": name.value, "password": password.value});
    alert(username.value);
    xhr.send(data);
}

// $('.write').text(document.cookie);