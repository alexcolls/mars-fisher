function login(){

	show_loader__()
	if($('login-form').val()!='' && $('#pass')!=''){
		$.ajax({
			url:"?login",
			dataType:"json",
			data:{
				user:$('#user').val().trim(),
				pass:$('#pass').val().trim()
			},
			success: function(res) {
                hide_loader__()
                notify(res.res);
                window.location.reload();

            },
            error: function(err) {
                hide_loader__()
                error(err.responseText)
            }
		})
	}

}