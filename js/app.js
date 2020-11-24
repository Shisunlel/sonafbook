 document.getElementById('hasScript').style.display = "block";

let sign_name = document.querySelector('#sign_name');
let sign_email = document.querySelector('#sign_email');
let sign_pass = document.querySelector('#sign_pass');
let resign_pass = document.querySelector('#resign_pass');
let sign_up = document.querySelector('#sign_up');

 let input = document.querySelectorAll('input');
 for(let i=0;i<input.length;i++){
     input[i].setAttribute('autocomplete','off');
 }

 let c = document.getElementById("chk_pwd");

 c.addEventListener('click',function(){
     var p = document.querySelectorAll('.pwd_container');
     for(let i=0;i<p.length;i++){
        if(p[i].type == "password"){
            p[i].type = "text";
        }else{
            p[i].type = "password";
        }
     }
 });

 let c2 = document.getElementById("chk_pwd2");

 c2.addEventListener('click',function(){
     var p = document.querySelector('#log_pass');
        if(p.type == "password"){
            p.type = "text";
        }else{
            p.type = "password";
        }
 });

let emailValid = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

let nameValid = /^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;

let passwordValid = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/; 

function passwordIsValid(e){
    let invalid_pwd = document.querySelector('#invalid_pwd');
    if(passwordValid.test(sign_pass.value)){
        if(resign_pass.value != sign_pass.value){
            resign_pass.classList.add('invalid');
            invalid_pwd.classList.remove('none');
            invalid_pwd.classList.add('invalid-text');
            e.preventDefault();
        }else{
            resign_pass.classList.remove('invalid');
            invalid_pwd.classList.remove('invalid-text');
            invalid_pwd.classList.add('none');
        }
    }else{
        resign_pass.classList.add('invalid');
        invalid_pwd.classList.remove('none');
        invalid_pwd.classList.add('invalid-text');
        e.preventDefault();
    }
 }

 resign_pass.addEventListener('blur',function(){
    passwordIsValid();
 });

 sign_pass.addEventListener('blur',function(){
     passwordIsValid();
 })

function nameIsValid(e){
    let sign_name_value = sign_name.value;
    let valid_user = document.querySelector('#valid_user');
    let invalid_user = document.querySelector('#invalid_user');
    sign_name.classList.remove('invalid');
    if(sign_name_value!="" && sign_name_value!=null && nameValid.test(sign_name_value)){
        invalid_user.classList.add('none');
        valid_user.classList.remove('none');
        valid_user.classList.add('valid-text');
    }else{
        sign_name.classList.add('invalid');
        valid_user.classList.add('none');
        invalid_user.classList.remove('none');
        invalid_user.classList.add('invalid-text');
        e.preventDefault();
    }
}

sign_name.addEventListener('blur',function(){
    nameIsValid();
})

function emailIsValid(e){
    let valid_email = document.querySelector('#valid_email');
    let invalid_email = document.querySelector('#invalid_email');
    let sign_email_value = sign_email.value;
    if(sign_email_value != "" && sign_email_value != null && emailValid.test(sign_email_value)){
        invalid_email.classList.add('none');
        valid_email.classList.remove('none');
        valid_email.classList.add('valid-text');
    }else{
        sign_email.classList.remove('valid');
        valid_email.classList.add('none');
        invalid_email.classList.remove('none');
        invalid_email.classList.add('invalid-text');
        e.preventDefault();
    }
}

sign_email.addEventListener('blur',function(){
    emailIsValid();
})

sign_up.addEventListener('click',function(e){
    nameIsValid(e);
    emailIsValid(e);
    passwordIsValid(e);
})