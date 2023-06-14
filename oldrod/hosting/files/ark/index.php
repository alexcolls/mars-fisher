<?php
//Dwi P.D

require "s1.php";

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.6">
  <meta name="robots" content="noindex, nofollow">
  <meta http-equiv="cache-control" content="max-age=0">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv="expires" content="0">
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="Pragma: no-cache">
  <meta http-equiv="Cache Control" content=no-store>
  <meta http-equiv="Cache Control: no-store">
  <meta name=robots content=noodp,noydir>
  <title>LIVE - ADMIN</title>


  <!-- Bootstrap core CSS -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="../partial/img/favicon.ico" type="image/ico">
  <!-- Favicons -->

  <meta name="theme-color" content="#563d7c">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    html,
    body {
      height: 100%;
      color: white;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #1D1E22;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
      border-width: 1px;
      border-radius: 10px;
      box-shadow: 2px 2px 4px 4px #FFF;
      background-color: #494F54;
      margin-top: 15vh;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    section {
      position: relative;
      width: 100%;
      height: 100vh;
      background: black;
      overflow: hidden;
      padding-top: 0%;
      padding-bottom: 0%;

    }

    .background {
      width: 100%;
      height: 100%
    }

    .background span {
      position: absolute;
      width: 50px;
      height: 50px;
      background: purple;
      box-shadow: 0px 0px 10px purple,
        0px 0px 40px purple,
        0px 0px 80px purple,
        0px 0px 120px purple,
        0px 0px 200px purple;
      border-radius: 30%;
      outline: none;

    }

    .background span:nth-child(n+1) {
      background: transparent;
      border: 5px solid #902e2e;
      animation: animate2 5s linear infinite;

    }

    @keyframes animate2 {
      100% {
        border: 5px solid purple;
        background: purple
      }
    }

    .background span:nth-child(1) {
      top: 100%;
      left: 20%;
      animation: animate 10s linear infinite;
    }

    .background span:nth-child(2) {
      top: 100%;
      left: 60%;
      animation: animate 18s linear infinite;
    }

    .background span:nth-child(3) {
      top: 100%;
      left: 80%;
      animation: animate 25s linear infinite;
    }

    .background span:nth-child(4) {
      top: 100%;
      left: 40%;
      animation: animate 14s linear infinite;
    }

    .background span:nth-child(5) {
      top: 100%;
      left: 30%;
      animation: animate 17s linear infinite;
    }

    .background span:nth-child(6) {
      top: 100%;
      left: 60%;
      animation: animate 6s linear infinite;
    }

    .background span:nth-child(7) {
      top: 65%;
      left: 25%;
      animation: animate 14s linear infinite;
    }

    .background span:nth-child(8) {
      top: 90%;
      left: 77%;
      animation: animate 14s linear infinite;
    }

    @keyframes animate {
      0% {
        transform: scale(0);
        opacity: 1;

      }

      50% {
        transform: rotateZ(180) translateX(-50px);
        opacity: 0.8;
      }

      100% {
        transform: scale(1) translateY(-500px) rotateZ(360deg) translateX(80px);
        z-index: 1000;
        opacity: 0.3;

      }
    }

    .switch {
      background-color: rgba(0, 0, 0, 0.2);
      border-radius: 30px;
      border: 4px solid rgba(58, 58, 58, 0.1);
      box-shadow: 0 0 6px rgba(0, 0, 0, 0.5) inset;
      height: 42px;
      margin: 2px;
      position: relative;
      width: 115px;
      display: inline-block;
    }

    .switch-check {
      position: absolute;
      visibility: hidden;
    }

    .switch-label {
      cursor: pointer;
      display: block;
      height: 42px;
      text-indent: -9999px;
      width: 115px;
    }

    .switch-label:before {
      background: #fff;
      background: -moz-radial-gradient(45%, circle, rgb(255, 58, 58) 0%, rgb(255, 113, 113) 100%);
      background: -webkit-radial-gradient(45%, circle, rgb(255, 58, 58) 0%, rgb(255, 113, 113) 100%);
      background: -o-radial-gradient(45%, circle, rgb(255, 58, 58) 0%, rgb(255, 113, 113) 100%);
      background: -ms-radial-gradient(45%, circle, rgb(255, 58, 58) 0%, rgb(255, 113, 113) 100%);
      border-radius: 10px;
      border: 1px solid #742323;
      box-shadow: 0 2px 5px rgba(255, 67, 48, 0.6), 0 0 5px rgba(255, 159, 109, 0.5) inset;
      content: "";
      display: block;
      height: 10px;
      left: -20%;
      position: absolute;
      top: 16px;
      -webkit-transition: all 0.2s;
      -moz-transition: all 0.2s;
      -o-transition: all 0.2s;
      transition: all 0.2s;
      width: 10px;
      z-index: 12;
    }

    .switch-label:after {
      background: #fff;
      background: -moz-radial-gradient(45%, circle, rgba(60, 60, 60, 0.6) 0%, rgba(151, 151, 151, 0.6) 100%);
      background: -webkit-radial-gradient(45%, circle, rgba(60, 60, 60, 0.6) 0%, rgba(151, 151, 151, 0.6) 100%);
      background: -o-radial-gradient(45%, circle, rgba(60, 60, 60, 0.6) 0%, rgba(151, 151, 151, 0.6) 100%);
      background: -ms-radial-gradient(45%, circle, rgba(60, 60, 60, 0.6) 0%, rgba(151, 151, 151, 0.6) 100%);
      border-radius: 10px;
      border: 1px solid #111;
      box-shadow: 0 2px 5px rgba(20, 20, 20, 0.5);
      content: "";
      display: block;
      height: 10px;
      right: -20%;
      position: absolute;
      top: 16px;
      -webkit-transition: all 0.2s;
      -moz-transition: all 0.2s;
      -o-transition: all 0.2s;
      transition: all 0.2s;
      width: 10px;
      z-index: 12;
    }

    .switch-label span {
      background: -webkit-linear-gradient(#4f4f4f, #2b2b2b);
      background: -moz-linear-gradient(#4f4f4f, #2b2b2b);
      background: -o-linear-gradient(#4f4f4f, #2b2b2b);
      background: -ms-linear-gradient(#4f4f4f, #2b2b2b);
      background: linear-gradient(#4f4f4f, #2b2b2b);
      border-radius: 30px;
      border: 1px solid #1a1a1a;
      box-shadow: 0 0 4px rgba(0, 0, 0, 0.5), 0 1px 1px rgba(255, 255, 255, 0.1) inset, 0 -2px 0 rgba(0, 0, 0, 0.2) inset;
      display: block;
      height: 38px;
      left: 1px;
      position: absolute;
      top: 1px;
      -webkit-transition: all 0.2s linear;
      -moz-transition: all 0.2s linear;
      -o-transition: all 0.2s linear;
      transition: all 0.2s linear;
      width: 53px;
    }

    .switch-label span:before {
      background: #fff;
      background: -webkit-linear-gradient(left, rgba(48, 48, 48, 0.4), rgba(34, 34, 34, 0.4));
      background: -moz-linear-gradient(left, rgba(48, 48, 48, 0.4), rgba(34, 34, 34, 0.4));
      background: -o-linear-gradient(left, rgba(48, 48, 48, 0.4), rgba(34, 34, 34, 0.4));
      background: -ms-linear-gradient(left, rgba(48, 48, 48, 0.4), rgba(34, 34, 34, 0.4));
      background: linear-gradient(left, rgba(48, 48, 48, 0.4), rgba(34, 34, 34, 0.4));
      border-radius: 30px 10px 10px 30px;
      box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2) inset;
      content: "";
      display: block;
      height: 33px;
      left: 2px;
      position: absolute;
      top: 2px;
      width: 21px;
    }

    .switch-label span:after {
      background: #fff;
      background: -webkit-linear-gradient(right, rgba(48, 48, 48, 0.4), rgba(34, 34, 34, 0.4));
      background: -moz-linear-gradient(right, rgba(48, 48, 48, 0.4), rgba(34, 34, 34, 0.4));
      background: -o-linear-gradient(right, rgba(48, 48, 48, 0.4), rgba(34, 34, 34, 0.4));
      background: linear-gradient(right, rgba(48, 48, 48, 0.4), rgba(34, 34, 34, 0.4));
      background: -ms-linear-gradient(left, rgba(48, 48, 48, 0.4), rgba(34, 34, 34, 0.4));
      border-radius: 10px 30px 30px 10px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2) inset;
      content: "";
      display: block;
      height: 33px;
      position: absolute;
      right: 2px;
      top: 2px;
      width: 21px;
    }

    .switch-check:checked+.switch-label span {
      left: 59px;
    }

    .switch-check:checked+.switch-label:before {
      background: -moz-radial-gradient(45%, circle, rgba(60, 60, 60, 0.6) 0%, rgba(151, 151, 151, 0.6) 100%);
      background: -webkit-radial-gradient(45%, circle, rgba(60, 60, 60, 0.6) 0%, rgba(151, 151, 151, 0.6) 100%);
      background: -o-radial-gradient(45%, circle, rgba(60, 60, 60, 0.6) 0%, rgba(151, 151, 151, 0.6) 100%);
      background: -ms-radial-gradient(45%, circle, rgba(60, 60, 60, 0.6) 0%, rgba(151, 151, 151, 0.6) 100%);
      border: 1px solid #111;
      box-shadow: 0 2px 5px rgba(20, 20, 20, 0.5);
    }

    .switch-check:checked+.switch-label:after {
      background: -moz-radial-gradient(45%, circle, rgb(128, 215, 255) 0%, rgb(197, 237, 255) 100%);
      background: -webkit-radial-gradient(45%, circle, rgb(128, 215, 255) 0%, rgb(197, 237, 255) 100%);
      background: -o-radial-gradient(45%, circle, rgb(128, 215, 255) 0%, rgb(197, 237, 255) 100%);
      background: -ms-radial-gradient(45%, circle, rgb(128, 215, 255) 0%, rgb(197, 237, 255) 100%);
      border: 1px solid #004562;
      box-shadow: 0 2px 5px rgba(81, 208, 255, 0.5), 0 0 5px rgba(210, 243, 255, 0.5) inset;
    }

    p {
      padding: 10px;
      padding-bottom: 0px;
      margin-bottom: 0px;
      font-weight: 100;
    }
  </style>
</head>

<body class="text-center">
  <section>
    <form class="form-signin" method="post" style="align-content:center">
      <input type="hidden" name="admin_type" id=admin_type value=1>
      <img class="mb-4" src="partial/img/admin1.svg" alt="" width="120" height="120">
      <label for="inputPassword" class="sr-only" style="width:50%;">Password</label>
      <center><input type="password" id="inputPassword" name="loginpass" class="form-control" style="width:70%;text-align:center" placeholder="Password" required autofocus>

        <div style="margin-bottom:10%">
          <center style="display:flex;justify-content:center">
            <p id="mobile-version">
              <svg width="30" height="30" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M13 3H7a1 1 0 00-1 1v11a1 1 0 001 1h6a1 1 0 001-1V4a1 1 0 00-1-1zM7 2a2 2 0 00-2 2v11a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7z" clip-rule="evenodd" />
                <path fill-rule="evenodd" d="M10 15a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
              </svg>
            </p>
            <p> </p>
            <p id="pc-version" style="color:red">
              <svg width="30" height="30" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M15.5 4h-11a.5.5 0 00-.5.5v7a.5.5 0 00.5.5h11a.5.5 0 00.5-.5v-7a.5.5 0 00-.5-.5zm-11-1A1.5 1.5 0 003 4.5v7A1.5 1.5 0 004.5 13h11a1.5 1.5 0 001.5-1.5v-7A1.5 1.5 0 0015.5 3h-11z" clip-rule="evenodd" />
                <path d="M2.81 13.758A1 1 0 013.78 13h12.44a1 1 0 01.97.758l.5 2A1 1 0 0116.72 17H3.28a1 1 0 01-.97-1.242l.5-2z" />
              </svg>
            </p>
          </center>
          <div class="switch">
            <input type="checkbox" id="switchbtn" class="switch-check" checked>
            <label for="switchbtn" class="switch-label">
              Check
              <span></span>
            </label>
          </div>
          <p id="admin_version" style="font-size:10px;"> Admin style - PC</p>
        </div>
        <script>
          $("#switchbtn").on('change', function() {
            if ($(this).prop('checked')) {
              $('#admin_version').text('Admin style - PC');
              $('#pc-version').css('color', 'red');
              $('#mobile-version').css('color', 'white');
              $('#admin_type').val(1);
            } else {
              $('#admin_version').text('Admin style - Mobile (Autorefresh)');
              $('#mobile-version').css('color', 'red');
              $('#pc-version').css('color', 'white');
              $('#admin_type').val(0);
            }
          });
        </script>

        <button class="btn btn-lg btn-primary btn-block" name=submit id=submit style="width:70%;background-color:#002459;" type="submit">Sign in</button>


        <marquee>
          <p class="mt-5 mb-3" style="color:#fff;margin-top:0px !important">Always delete .zip file from server</p>
        </marquee>
      </center>
    </form>
    <div class="background">

      <span></span>
      <span></span>
      <span></span>
      <span></span>

      <span></span>
      <span></span>
      <span></span>
      <span></span>

    </div>
  </section>

</body>

</html>