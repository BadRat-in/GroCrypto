let form = document.querySelector("#form");
let btn = document.querySelector("#sbt-btn");
form.addEventListener("submit", (e) => {
    e.preventDefault();
    sendToNext();
})
let hashotp = "";
let sendToNext = async () => {
    let btn = document.querySelector("#sbt-btn");
    let first = document.querySelector(".first");
    let second = document.querySelector(".second");
    let third = document.querySelector(".third");
    let four = document.querySelector(".four");
    let five = document.querySelector(".five");
    let form = document.querySelector("#form");
    let progress_bar = document.querySelector("#progress-bar");
    let progress = document.querySelector("#progress");
    let message_box = document.querySelector("#message-box");
    if (btn.getAttribute("form-progress") === "0") {
        if (!ValidateEmail(form.email) || !ValidateMobile(form.number)) {
            return false
        } else {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let response = JSON.parse(this.responseText);
                    if (response["return"] == true) {
                        btn.setAttribute("form-progress", "25");
                        btn.innerText = "Verify";
                        progress_bar.style.width = "25%";
                        progress.innerText = "25%";
                        progress.style = "transform: translate(-10px, -15px);";
                        first.classList.remove("active-block");
                        second.classList.add("active-block");
                        ShowMessage("OTP sent to your mobile number", "success");
                    } else {
                        ShowMessage("Something went wrong", "error");
                    }
                }
            }
            let number = form.number.value;
            let otp = Math.floor(Math.random() * (999999 - 100000 + 1)) + 100000;
            hashotp = otp.toString();
            let message = `Your OTP is ${otp}. Please do not share this OTP with anyone.`;
            xmlhttp.open("GET", "https://www.fast2sms.com/dev/bulkV2?authorization=dKzVhPy46mvDXRbFfIW91kg0HUlQiBwOnNcSx8eA37M5tTLjYov3pe9FEqMBXKCO8QbSudZnfg0GiDsJ&route=v3&sender_id=Cghpet&message=" + message + "&language=english&flash=0&numbers=" + number, true);
            xmlhttp.send();
        }
        return false
    }
    if (btn.getAttribute("form-progress") === "25") {
        if (!ValidateOTP(form.otp)) {
            return false
        } else {
            if (form.otp.value === hashotp) {
                ShowMessage("OTP verified", "success");
                btn.setAttribute("form-progress", "50");
                progress_bar.style.width = "50%";
                progress.innerText = "50%";
                btn.innerText = "Next";
                second.classList.remove("active-block");
                third.classList.add("active-block");
            } else {
                ShowMessage("Invalid OTP", "warning");
            }
        }
        return false
    }
    if (btn.getAttribute("form-progress") === "50") {
        if (!ValidateName(form.name) || !ValidateDOB(form.dob) || !ValidateAadhar(form.aadhar)) {
            return false
        } else {
            btn.setAttribute("form-progress", "75");
            progress_bar.style.width = "75%";
            btn.innerText = "Submit";
            progress.innerText = "75%";
            third.classList.remove("active-block");
            four.classList.add("active-block");
        }
        return false
    }
    if (btn.getAttribute("form-progress") === "75") {
        if (!ValidatePAN(form.pan) || !ValidateCity(form.city) || !ValidateCityCode(form.zip_code)) {
            return false
        } else {
            let xmlhttp = new XMLHttpRequest();
            let form = document.querySelector("#form");
            let data = new FormData(form);
            let registerForm = document.querySelector("#register-form");
            registerForm.style.display = "flex";
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let response = JSON.parse(this.responseText);
                    console.log(response);
                    if (response["status"] === "success") {
                        btn.style.display = "none";
                        progress_bar.style.width = "100%";
                        progress.innerText = "";
                        four.classList.remove("active-block");
                        five.style.display = "flex";
                        five.classList.add("active-block");
                        setTimeout(() => {
                            registerForm.style.display = "none";
                            setTimeout(() => {
                                window.location.assign("./home");
                            }, 2000);
                        }, 2000);
                    } else {
                        ShowMessage(response["message"], response["status"]);
                        registerForm.style.display = "none";
                        btn.setAttribute("form-progress", "0");
                        btn.innerText = "Next";
                        progress_bar.style.width = "0%";
                        progress.innerText = "0%";
                        progress.style = "transform: translateY(-15px);";
                        four.classList.remove("active-block");
                        first.classList.add("active-block");
                    }
                    return false
                }
            }
            xmlhttp.open("POST", "./Backend/Registration/register.php", true);
            xmlhttp.send(data);
        }
        return false
    }

    return false;
}

let SubmitForm = () => Boolean; {

}

let ValidateName = (name) => {
    if (name.value.length > 4 && name.value.length < 50) {
        name.style.border = '1px solid var(--blue)';
        name.style = "text-transform: capitalize";
        return true;
    } else {
        name.style = "text-transform: capitalize; border-color: red";
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

let ValidateOTP = (otp) => {
    let pattern = /^[0-9]{6}$/;
    if (pattern.test(otp.value)) {
        otp.style.border = '1px solid var(--blue)';
        return true;
    } else {
        otp.style.border = '1px solid red';
        return false;
    }
}

let ValidateDOB = (date) => {
    let pattern = /^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/;
    if (pattern.test(date.value)) {
        date.style.border = '1px solid var(--blue)';
        return true;
    } else {
        date.style.border = '1px solid red';
        return false;
    }
}

let ValidateAadhar = (aadhar) => {
    let pattern = /^[0-9]{12}$/;
    if (pattern.test(aadhar.value)) {
        aadhar.style.border = '1px solid var(--blue)';
        return true;
    } else {
        aadhar.style.border = '1px solid red';
        return false;
    }
}

let ValidatePAN = (pan) => {
    let pattern = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
    pan.value = pan.value.toUpperCase();
    if (pattern.test(pan.value)) {
        pan.style.border = '1px solid var(--blue)';
        return true;
    } else {
        pan.style.border = '1px solid red';
        return false;
    }
}

let ValidateCity = (city) => {
    let pattern = /^[A-Za-z]{4,50}$/;
    city.value = city.value.toUpperCase();
    if (pattern.test(city.value)) {
        city.style.border = '1px solid var(--blue)';
        return true;
    } else {
        city.style.border = '1px solid red';
        return false;
    }
}

let ValidateCityCode = (cityCode) => {
    let pattern = /^[0-9]{6}$/;
    if (pattern.test(cityCode.value)) {
        cityCode.style.border = '1px solid var(--blue)';
        return true;
    } else {
        cityCode.style.border = '1px solid red';
        return false;
    }
}

let ShowMessage = (message, type) => {
    let message_box = document.querySelector("#message-box");
    message_box.innerText = message;
    message_box.classList.add("active");
    message_box.classList.add(type);
    setTimeout(() => {
        message_box.classList.remove("active");
        message_box.classList.add("inactive");
        setTimeout(() => {
            message_box.classList.remove(type);
            message_box.classList.remove("inactive");
        }, 750);
    }, 3000);
}

let ChangeForm = () => {
    let register = document.querySelector("#form");
    let login = document.querySelector("#form2");
    let lable_text = document.querySelector("#qlg-text");
    if (register.style.display == "none") {
        register.style.display = "block";
        login.style.display = "none";
        lable_text.innerHTML = "Already have an account? <strong onclick='ChangeForm()'>Login</strong>";
    }else{
        lable_text.innerHTML = "Don't have an account? <strong onclick='ChangeForm()'>Sign Up</strong>";
        register.style.display = "none";
        login.style.display = "flex";
    }
}