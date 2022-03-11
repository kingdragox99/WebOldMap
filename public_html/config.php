<?php
$config=array(
'DB_HOST'=>'localhost',
'DB_USERNAME'=>'root',
'DB_PASSWORD'=>'',
'DB_DATABASE'=>'rankme'
);

$con = mysqli_connect($host=$config['DB_HOST'], $config['DB_USERNAME'], $config['DB_PASSWORD'], $config['DB_DATABASE']);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
