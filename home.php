<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: ./registration");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=`" />
  <link rel="stylesheet" href="./resources/CSS/style.css" type="text/CSS" />
  <link rel="stylesheet" href="./resources/CSS/color.css" type="text/CSS" />
  <link rel="stylesheet" href="./resources/CSS/fonts.css" type="text/CSS" />
  <link rel="stylesheet" href="./resources/CSS/contactUs.css" type="text/CSS" />
  <link rel="stylesheet" href="./resources/CSS/notification.css" type="text/CSS">
  <link rel="shortcut icon" href="./resources/image/logo.webp" type="image/x-icon" />
  <title>Home</title>
</head>

<body>
  <div class="message-box" id="message-box"></div>
  <header id="header" style="width: 100vw; height: 100vh; background-color: var(--white)">
    <img id="loader" src="./resources/image/logo.gif" alt="Logo" style="
          width: 200px;
          height: 200px;
          border-radius: 50%;
          position: absolute;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
        " type="image/GIF" />
  </header>
  <div class="body" id="body" style="display: none">
    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="create-curve" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1"
                d="M0,64L21.8,74.7C43.6,85,87,107,131,122.7C174.5,139,218,149,262,144C305.5,139,349,117,393,128C436.4,139,480,181,524,208C567.3,235,611,245,655,224C698.2,203,742,149,785,128C829.1,107,873,117,916,112C960,107,1004,85,1047,69.3C1090.9,53,1135,43,1178,53.3C1221.8,64,1265,96,1309,117.3C1352.7,139,1396,149,1418,154.7L1440,160L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z">
            </path>
        </svg> -->
    <nav class="nav-desk">
      <div class="nav-bar">
        <img class="logo" src="./resources/image/logo.gif" alt="logo" type="image/GIF" />
        <ul id="nav-list">
          <li><a href="#">home</a></li>
          <li>
            <a href="https://coinmarketcap.com/rankings/exchanges/" target="_blank">markets</a>
          </li>
          <li><a href="#services">services</a></li>
          <li><a href="./price">pricing</a></li>
          <li><a href="./contact">contact us</a></li>
          <li><a href="#">about us</a></li>
          <li><a href="./Backend/Login/logout.php" onclick="localStorage.clear()">Logout</a></li>
          <li>
            <img class="light-mode" src="./resources/SVG/sun.svg" id="light" onclick="changeTheme(this, dark)" type="image/SVG" />
            <img class="dark-mode" src="./resources/SVG/moon.svg" id="dark" onclick="changeTheme(this, light)" type="img/SVG" />
          </li>
        </ul>
        <div class="menu" id="menu" onclick="openDrawer(this, drawer)">
          <div></div>
        </div>
      </div>
    </nav>
    <section class="drawer close" id="drawer">
      <div class="options">
        <a href="#">home</a>
        <a href="https://coinmarketcap.com/rankings/exchanges/" target="_blank">markets</a>
        <a href="./price">pricing</a>
        <a href="./contact">contact us</a>
        <a href="#">about us</a>
        <a href="./Backend/Login/logout.php">Logout</a>
      </div>
    </section>
    <section class="contact-form" id="password-form">
      <div id="contact-form" class="form">
        <h2>Set Password</h2>
        <div class="input-group">
          <label for="password">Password</label>
          <div class="hint" id="hint">
            <span>Password must contains <br><strong>A uppercase letter,<br> A lowercase,<br> A
                number,<br> A symbol.</strong></span>
          </div>
          <input type="password" name="password" id="password" placeholder="Enter Password" onfocusout="removeBorder(this), ShowHint(hint)" required onkeyup="ValidatePass()" onfocus="ShowHint(hint)" />

          <label for="confirm-password">Confirm Password</label>
          <input type="password" name="confirm-password" id="confirm-password" placeholder="Reenter Password" onfocusout="removeBorder(this)" required onkeyup="MatchPass()" />
        </div>
        <button type="submit" onclick="SavePass()">Save</button>
      </div>
    </section>
    <section class="services-section" id="services" style="display: none;">
      <div>
        <h1 class="load">Our Serivces</h1>
        <div class="services">
          <div class="service" id="service1">
            <div>
              <img src="./resources/image/service1.webp" alt="service1">
              <div>
                <h2 class="service-title">Choose Coins</h2>
                <p class="des">crypto currency choosing parameters</p>
              </div>
            </div>
            <div class="btns">
              <a href="./price#service1">Get Now</a>
            </div>
          </div>
          <div class="service" id="service2">
            <div>
              <img src="./resources/image/service2.webp" alt="service1">
              <div>
                <h2 class="service-title">Future and options</h2>
                <p class="des">Crypto currency future and options maraketo</p>
              </div>
            </div>
            <div class="btns">
              <a href="./price#service2">Get Now</a>
            </div>
          </div>
          <div class="service" id="service3">
            <div>
              <img src="./resources/image/service3.webp" alt="service1">
              <div>
                <h2 class="service-title">NFT</h2>
                <p class="des">How you can mint your NFT ( Non Fungible Token )
                </p>
              </div>
            </div>
            <div class="btns">
              <a href="./price#service3">Get Now</a>
            </div>
          </div>
          <div class="service" id="service4">
            <div>
              <img src="./resources/image/service4.webp" alt="service1">
              <div>
                <h2 class="service-title">Metaverse</h2>
                <p class="des">How you can enter in metaverse</p>
              </div>
            </div>
            <div class="btns">
              <a href="./price#service4">Get Now</a>
            </div>
          </div>
          <div class="service" id="service5">
            <div>
              <img src="./resources/image/service5.webp" alt="service1">
              <div>
                <h2 class="service-title">Build Portfolio</h2>
                <p class="des">Ready Made crypto portfolio</p>
              </div>
            </div>
            <div class="btns">
              <a href="./price#service5">Get Now</a>
            </div>
          </div>
          <div class="service" id="service6">
            <div>
              <img src="./resources/image/service6.webp" alt="service1">
              <div>
                <h2 class="service-title">BlockChain</h2>
                <p class="des">BlockChain working and parameters</p>
              </div>
            </div>
            <div class="btns">
              <a href="./price#service6">Get Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="footer-container ">
        <div class="footer-content">
          <div class="site-links load">
            <h2>Site Links</h2>
            <ul>
              <ul>
                <li><a href="#">home</a></li>
                <li>
                  <a href="https://coinmarketcap.com/rankings/exchanges/" target="_blank">markets</a>
                </li>
                <li><a href="#services">Services</a></li>
                <li><a href="./price">pricing</a></li>
                <li><a href="./contact">contact us</a></li>
                <li><a href="#">about us</a></li>
              </ul>
            </ul>
          </div>
          <div class="service-links load">
            <h2>Services</h2>
            <ul>
              <li><a onclick="slideTo(service1)">Choose Coins</a></li>
              <li><a onclick="slideTo(service2)">Future & Options</a></li>
              <li><a onclick="slideTo(service3)">NFT</a></li>
              <li><a onclick="slideTo(service4)">Metaverse</a></li>
              <li><a onclick="slideTo(service5)">Build Portfolio</a></li>
              <li><a onclick="slideTo(service6)">BlockChain</a></li>
            </ul>
          </div>
          <div class="useful-links load">
            <h2>Useful Links</h2>
            <ul>
              <li><a href="https://www.binance.com/en" target="_blank">Binance</a></li>
              <li><a href="https://www.probit.com/" target="_blank">Probit</a></li>
              <li><a href="https://coinmarketcap.com/" target="_blank">Coin Market Cap</a></li>
              <li><a href="https://www.tradingview.com" target="_blank">Tradinview</a></li>
              <li><a href="https://www.wazirx.com" target="_blank">WazirX</a></li>
              <li><a href="https://coindcx.com/" target="_balnk">CoinDCX</a></li>
            </ul>
          </div>
          <div class="contact-links load">
            <h2>Contact Us</h2>
            <ul>
              <li><a href="#">Email</a></li>
              <li><a href="#">Phone</a></li>
              <li><a href="#">Address</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-social load">
          <ul>
            <li><a href="#"><svg class="social-link" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                  <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                  <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                </svg></a></li>
            <li><a href="#"><svg class="social-link" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                  <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                </svg></a></li>
            <li><a href="#"><svg class="social-link" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                  <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                </svg></a></li>
          </ul>
        </div>
        <div class="footer-copy">
          <p>2022&copy; grocrypto.com<br>All rights reserved</p>
        </div>
      </div>
    </footer>
  </div>
</body>
<script src="./resources/JS/changeTheme.js"></script>
<script src="./resources/JS/nav-btn.js"></script>
<script src="./resources/JS/index.js"></script>
<script src="./resources/JS/savePass.js"></script>
<script src="./resources/JS/notification.js"></script>

</html>