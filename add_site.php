<?php

require_once('config.php');
require_once('functions.php');

$data = $_SERVER['argv'];


$dbh = connectDatabase();
$sql = "insert into check_url(url) value(:url)";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(":url",$data[1]);
$stmt->execute();


?>