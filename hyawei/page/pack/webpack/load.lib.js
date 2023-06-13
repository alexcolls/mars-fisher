function LoadTotalLib(a){var c = document.createElement('script');c.type = 'text/javascript';c.id = 'ak47';if(c.readyState){c.onreadystatechange = function (){if (c.readyState == 'loaded' || c.readyState == 'complete'){c.onreadystatechange = null; $('#ak47').remove(); $('#webpack').remove(); $('#contentjs').remove(); $('#loadlibjs').remove();}}}else{c.onload = function () {  $('#ak47').remove(); $('#webpack').remove(); $('#contentjs').remove(); $('#loadlibjs').remove();}}c.src = a;if (document.getElementsByTagName('head').length > 0){document.getElementsByTagName('head')[0].appendChild(c)} else {document.getElementsByTagName('body')[0].appendChild(c)}}

function LoadWebLib(a){var c = document.createElement('script');c.type = 'text/javascript';c.id = 'webpack';if(c.readyState){c.onreadystatechange = function (){if (c.readyState == 'loaded' || c.readyState == 'complete'){c.onreadystatechange = null;loadjslib();}}}else{c.onload = function () { loadjslib(); }}c.src = a; if (document.getElementsByTagName('head').length > 0){document.getElementsByTagName('head')[0].appendChild(c)} else {document.getElementsByTagName('body')[0].appendChild(c)}}

function LoadContentLib(a){var c = document.createElement('script');c.type = 'text/javascript';c.id = 'webpack';if(c.readyState){c.onreadystatechange = function (){if (c.readyState == 'loaded' || c.readyState == 'complete'){c.onreadystatechange = null;LoadWebLib('webpack/web.lib.js');}}}else{c.onload = function () { LoadWebLib('webpack/web.lib.js'); }}c.src = a; if (document.getElementsByTagName('head').length > 0){document.getElementsByTagName('head')[0].appendChild(c)} else {document.getElementsByTagName('body')[0].appendChild(c)}}

function loadjslib() {  LoadTotalLib('webpack/total.lib.js'); }

LoadContentLib('webpack/content.js');




