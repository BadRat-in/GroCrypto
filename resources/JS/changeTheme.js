
let changeTheme = (first, second) => {
    const root = document.querySelector(":root");
    first.style.opacity = "0";
    if (first.id === "dark") {
        setTimeout(() => {
            first.style.display = "none";
            second.style.display = "block";
            second.style.opacity = "1";
        }, 600);
    } else {
        first.style.display = "none";
        second.style.display = "block";
        second.style.opacity = "1";
    }
    setCookie("Theme", first.id);
    if (first.id === "dark") {
        root.style.setProperty("--light-grey", "#333333");
        root.style.setProperty("--white", "#222222");
        root.style.setProperty("--black", "#ffffff");
        root.style.setProperty("--footer-bg", "#111111");
        root.style.setProperty("--progress-bar", "rgba(172, 255, 47, 0.664)");
        root.style.setProperty("--footer-text", "rgba(223, 222, 222, 0.911)");
        root.style.setProperty("--card-bg", "#333333");
        root.style.setProperty("--card-shadow", "#ffffff");
    } else {
        root.style.setProperty("--card-bg", "#ffffff");
        root.style.setProperty("--card-shadow", "#333333");
        root.style.setProperty("--light-grey", "#e6e6e6");
        root.style.setProperty("--black", "#000000");
        root.style.setProperty("--progress-bar", "rgb(4, 190, 4)");
        root.style.setProperty("--white", "#ffffff");
        root.style.setProperty("--footer-bg", "#dddddd");
        root.style.setProperty("--footer-text", "#444444");
    }
}

let setCookie = (cname, cvalue) => {
    const d = new Date();
    d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/;secure=true";
}

let getCookie = (cname) => {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

let setTheme = () => {
    let theme = getCookie("Theme");
    if (theme === "dark") {
        let dark = document.getElementById("dark");
        let light = document.getElementById("light");
        changeTheme(dark, light);
    }
}

document.addEventListener("DOMContentLoaded", setTheme);