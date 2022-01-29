let eye = document.getElementById('eye');
let password = document.getElementById('password')
let username = document.getElementById('username');
let warningUserName = document.getElementById('warningUserName');
let warningPassword = document.getElementById('warningPassword');

//Валидация имени пользователя
const valUserName = (event) =>{
    if(username.value === '' || username.value <= 2){
        username.classList.add('change_border')
        warningUserName.classList.add('d-block')
    }else{
        username.classList.remove('change_border')
        warningUserName.classList.remove('d-block')
    }
}

//Валидация пароля пользователя
const valPassword = (event) =>{
    if(username.value === '' || username.value <= 2){
        valUserName(event)
    }
    if(password.value === '' || username.value <= 5){
        password.classList.add('change_border')
        warningPassword.classList.add('d-block')
    }else{
        password.classList.remove('change_border')
        warningPassword.classList.remove('d-block')
    }
}
const showPass = (event) =>{
    password.setAttribute('type', 'text')
}
const hidePass = (event) =>{
    password.setAttribute('type', 'password')
}
//map
