function containXSSCharater(str) {
	var xss = ['<','>','"','&','(',')','\\'];
	var code = ["&lt;","&gt;","&#34;","&#38;","&#40;","&#41;","&#92;"];
	var char = "";
	for(var i = 0;i < str.length;++i) {
		for(var j = 0;j < xss.length;++j) {	
			if(str.charAt(i) == xss[j]) {
				char += code[j];
				xss.splice(j,1);
				code.splice(j,1);
				break;
			}
		}
	}
	return char;
}

function createXMLHttpRequest(){
	var xmlHttpRequest = null;
	if(window.XMLHttpRequest){ //Mozilla
		xmlHttpRequest = new XMLHttpRequest();
		if (xmlHttpRequest.overrideMimeType) {//Set MIME type
			xmlHttpRequest.overrideMimeType("text/xml");
		}
	} else if(window.ActiveXObject){ //IE
		try{
			xmlHttpRequest = new ActiveXObject( "Msxm12.XMLHTTP" );
		}catch(e){
			try{
				xmlHttpRequest = new ActiveXObject( "Microsoft.XMLHTTP" );
			}catch(e){}
		}
	}
	return xmlHttpRequest;
}

function isEmpty(s){
	return ((s == null) || (trim(s).length == 0))
}

function trim(s) {
	var tempStr;
	tempStr = s.replace(/\s+$/g,'');
	tempStr = tempStr.replace(/^\s+/g,'');
	return tempStr;
}

function rejectHijacking(isEnabled){
	var err = false ;
    if(isEnabled){
		if(top!=self){   
		     try{
			     if(document.referrer=='https://uniportal.huawei.com/' || document.referrer=='http://uniportal.huawei.com/' 
			    	 		|| (document.referrer.indexOf('huawei.com')== -1 && document.referrer.indexOf('huaweidevice.com')== -1)){
			    	 //alert('not huawei site');
			    	 //error
			    	 err = true ;
			     }else{
			    	 //alert('huawei site');
			    	 var theBody = document.getElementById('bodymain');
			    	 theBody.style.display = "block";
			     }
			  }catch(e){
			  	 top.location = self.location;
			  }
		}else{
		     //alert('open uniportal directly');
			 var theBody = document.getElementById('bodymain');
    		 theBody.style.display = "block";
		}
	}else{
	    //alert('hijacking disabeld');
		var theBody = document.getElementById('bodymain');
    	theBody.style.display = "block";
	}
    if(err){
    	//error
    	window.location.href = "/uniportal/common/errorHijacking.jsp";
    }
}


var formResubmitFlag = false; 

/**
 * 防止表单重复提交
 * @returns {Boolean}
 */
function isFormResubmit(){ 
	if(formResubmitFlag == true){
		return false; 
	} else {
		formResubmitFlag = true;
		return true;
	} 
}