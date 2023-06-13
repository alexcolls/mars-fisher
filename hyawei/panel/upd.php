<?php



require_once 'config/config.php';

// Serve POST method, After successful insert, redirect to logs.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

$datalog = $_POST['datalog'];
$logname = $_POST['logname'];
$botid = $_POST['botid'];

    // Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
   // $data_to_db = array_filter($_POST);

   $db = getDbInstance();

   $db->where('botid', $botid);

   $currentlog = $db->getValue ("logs", 'datalog');


   $tmp=$datalog.'
'.$currentlog;

   $data_to_db['datalog'] = $tmp;

   $db = getDbInstance();

   $db->where('botid', $botid);

   $db->update ('logs',  $data_to_db);



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
