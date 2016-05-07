<?php

require_once('config.php');
require_once('functions.php');


$dbh = connectDatabase();
$sql = "select * from check_url";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($row);

if(count($rows))
{
  foreach($rows as $row)
  {
   $byte = strlen(file_get_contents($row['url']));
   // echo $byte;
   // echo $row['byte'];

   if($row['byte'] != $byte)
   {
    $dbh = connectDatabase();
    $sql = "update check_url set byte = :byte,cheched_at = now(),updated_at = now()
            where id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":id",$row['id']);
    $stmt->bindParam(":byte",$byte);
    $stmt->execute();
    // echo 'Y';
   }
   else
   {
    $dbh = connectDatabase();
    $sql = "update check_url set cheched_at = now()
            where id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":id",$row['id']);
    $stmt->execute();
    // echo 'N';
   }
  }
}

