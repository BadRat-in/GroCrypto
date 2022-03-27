let name = document.getElementById('name');
let email = document.getElementById('email');
let message = document.getElementById('message');
let mobile = document.getElementById('mobile');
let form = document.getElementById('contact-form');

let checkData = () => {

    if (ValidateName(name) && ValidateEmail(email) && ValidateMessage(message) && ValidateMobile(mobile)) {
        form.submit();
    }

}

let ValidateName = (name) => {
    let pattern = /^[A-Za-z]{5,30}$/;
    if (pattern.test(name.value)) {
        name.style.border = '1px solid var(--blue)';
        name.style = "text-transform: capitalize";
        return true;
    } else {
        name.style.border = '1px solid red';
        name.style = "text-transform: capitalize";
        return false;
    }
}

let ValidateEmail = (email) => {
    let pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,6})$/;
    if (pattern.test(email.value) && email.value.length > 14) {
        email.style.border = '1px solid var(--blue)';
        return true;
    } else {
        email.style.border = '1px solid red';
        return false;
    }
}

let ValidateMessage = (message) => {
    if (message.value.length < 15 || message.value.length > 500 || message.value == '') {
        message.style.border = '1px solid red';
        return false;
    } else {
        message.style.border = '1px solid var(--blue)';
        return true;
    }
}

let ValidateMobile = (mobile) => {
    let pattern = /^[0-9]{10}$/;
    if (pattern.test(mobile.value)) {
        mobile.style.border = '1px solid var(--blue)';
        return true;
    } else {
        mobile.style.border = '1px solid red';
        return false;
    }
}

let removeBorder = (ele) => {
    if (ele.style.borderColor != 'red') {
        ele.style.border = '1px solid transparent';
    }
}