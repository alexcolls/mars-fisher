$(document).ready(function() {

	$("#jq_topmenu li").hover(function() {
		$(this).addClass("hover").find("div.jq_hidebox").show();
		//添加相关页面悬浮提示框,防止切换语言时没有隐藏掉悬浮提示框
		//modifyPwd.jsp
		if ($("#pwd_tips")){
			$("#pwd_tips").hide(); 
		}
		if ($("#pwd_mobile_tips")){
			$("#pwd_mobile_tips").hide(); 
		}
		if($("#pwd_massage_tips")){
			$("#pwd_massage_tips").hide(); 
		}
		if ($("#pwd_massage_mobile_tips")){
			$("#pwd_massage_mobile_tips").hide(); 
		}
		//setNewPwd.jsp
		if ($("#pwd_reset_tips")){
			$("#pwd_reset_tips").hide(); 
		}
		if ($("#pwd_massage_reset_tips")){
			$("#pwd_massage_reset_tips").hide(); 
		}
		//modifyPwdByFp.jsp
		if ($("#pwd_tips_fp")){
			$("#pwd_tips_fp").hide(); 
		}
	}, function() {
		$(this).removeClass("hover").find("div.jq_hidebox").hide();
		hideTips();
	});

});