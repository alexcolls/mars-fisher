function popupPageFeatures() {
	var popupWidth = 760;
	var popupHeight = 600;
	
	var left = parseInt((screen.availWidth - popupWidth) / 2);
	var top = parseInt((screen.availHeight - popupHeight) / 2);
	return "left=" + left + "px,top=" + top +"px,width=" + popupWidth + "px,height=" + popupHeight + "px";
}

function tencentLogin(redirect){
	if(redirect) {
		location.href = '/uniportal/oauth2/tencent?client=mobile';
	} else {
		window.open('/uniportal/oauth2/tencent','QQ',popupPageFeatures());
	}
}

function linkedinLogin(redirect){
	if(redirect) {
		location.href = "/uniportal/oauth2/linkedin?client=mobile";
	} else {
		window.open('/uniportal/oauth2/linkedin','Linkedin',popupPageFeatures());
	}
}

function wechatLogin(redirect){
	if(redirect) {
		location.href = '/uniportal/oauth2/wechat?client=mobile';
	} else {
		window.open('/uniportal/oauth2/wechat','wechat',popupPageFeatures());
	}
}

function vmallLogin(redirect){
	if(redirect) {
		location.href = '/uniportal/oauth2/vmall?client=mobile';
	} else {
		window.open('/uniportal/oauth2/vmall','vmall',vmallPopupPageFeatures());
	}
}

function googleLogin(redirect){
	if(redirect) {
		location.href = '/uniportal/oauth2/google?client=mobile';
	} else {
		window.open('/uniportal/oauth2/google','Google',popupPageFeatures());
	}
}

function facebookLogin(redirect){
	if(redirect) {
		location.href = '/uniportal/oauth2/facebook?client=mobile';
	} else {
		window.open('/uniportal/oauth2/facebook','facebook',popupPageFeatures());
	}
}


function vmallPopupPageFeatures() {
	var popupWidth = 1200;
	var popupHeight = 800;
	
	var left = parseInt((screen.availWidth - popupWidth) / 2);
	var top = parseInt((screen.availHeight - popupHeight) / 2);
	return "left=" + left + "px,top=" + top +"px,width=" + popupWidth + "px,height=" + popupHeight + "px";
}