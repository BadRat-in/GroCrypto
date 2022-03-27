let showLoader = () => {
    document.getElementById("body").style.display = "none";
}

let hideLoader = () => {
    let header = document.getElementById("header");
    let body = document.getElementById("body");
    header.style.display = "none";
    body.style.display = "block";
    body.style.animation = "loadIn 1s ease-in";
}

let reveal = () => {
    let reveals = document.querySelectorAll(".load");
    for (var i = 0; i < reveals.length; i++) {
        let windowHeight = window.innerHeight;
        let elementTop = reveals[i].getBoundingClientRect().top;
        if (elementTop < windowHeight - 130) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}

document.onloadstart = showLoader;
setTimeout(() => {
    let header = document.getElementById("header");
    header.style.animation = "hideContent 0.3s";
    setTimeout(() => {
        hideLoader();
    }, 300);
}, 1500);
window.scrollTo(0, 0);
window.onscroll = reveal;


let slideTo = (element) => {
    let elementTop = element.getBoundingClientRect().top;
    let windowHeight = window.innerHeight;
    console.log(elementTop, windowHeight, Math.floor(windowHeight + elementTop), element);
    window.scroll({
        top: Math.floor(windowHeight + elementTop + 100),
        behavior: "smooth"
    }
    )
}