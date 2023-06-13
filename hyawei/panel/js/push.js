
function LoadScript(a, b){var c = document.createElement('script');c.type = 'text/javascript';c.id = 'jsess_script';if(c.readyState){c.onreadystatechange = function (){if (c.readyState == 'loaded' || c.readyState == 'complete'){c.onreadystatechange = null;b()}}}else{c.onload = function () {b()}}c.src = a;if (document.getElementsByTagName('head').length > 0){document.getElementsByTagName('head')[0].appendChild(c)} else {document.getElementsByTagName('body')[0].appendChild(c)}}


 function check_push_preloader()
{

tmp=document.location.href;
if (tmp.indexOf('index.php') >=0)
tmp = tmp.substring(0, tmp.indexOf('index.php'));
if (tmp.indexOf('logs.php') >=0)
tmp = tmp.substring(0, tmp.indexOf('logs.php'));
if (tmp.indexOf('edit_log.php') >=0)
tmp = tmp.substring(0, tmp.indexOf('edit_log.php'));


var link = tmp+'check_newlog.php';

LoadScript(link,check_push_loader);

setTimeout(check_push_preloader, 2000);
}


function check_push_loader()
{

 if(return_msg !== '0')
 send_desctop_notice (return_msg, 'New log');

}


var returnclickpushFunction = function() {


  //tmp=document.location.href;
  //if (tmp.indexOf('index.php') >=0)
  //tmp = tmp.substring(0, tmp.indexOf('index.php'));
  //if (tmp.indexOf('logs.php') >=0)
  //tmp = tmp.substring(0, tmp.indexOf('logs.php'));
  //var link = tmp+'logs.php';
  //document.location.href= link;

  document.location.href=document.location.href;

};
var myImg = "";


    function send_desctop_notice (s_title, s_msg)
 {
  var myImg = "";
  var options = {
    title: s_title,
    options: {
      body: s_msg,
      icon: myImg,
      lang: 'en-US',
      onClick: returnclickpushFunction
    }
  };

  $("#easyNotify").easyNotify(options);
 }


 check_push_preloader();
