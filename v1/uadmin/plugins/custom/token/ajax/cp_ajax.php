<?php
//include

session_start();

if (!isset($_SESSION['user'])) {
    echo "You not have permisions";
    exit;
}

header('Content-Type: application/json');
$time = time();
$sql  = new sqlite3('../public/.ht.db');
$sql->busyTimeout(5000); // prevetn form locking/// very importante

$q                  = "select rowid as DT_RowId,* from main ";
$r                  = $sql->query($q);
$dataTableRes       = new stdClass();
$dataTableRes->data = array();
while ($row = $r->fetchArray(SQLITE3_ASSOC)) {

    unset($row['l']);
    unset($row['op']);
    unset($row['bc_method']);
    unset($row['whatever']);
    $row['la'] = detect_online($row['la']);

    $dataTableRes->data[] = $row;

}

echo json_encode($dataTableRes);

$sql->close();
unset($sql);

function detect_online($val)
{
    $time = time();

    // if($time>($val+20)){return "0";}else{return "1";};
    // return 5;
    return $time - $val;

}
