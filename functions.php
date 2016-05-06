<?php

function connectDatabase()
{
 try
 {
  return new PDO(DSN,USER,PASSWORD);
 }
 catch(PDOException $e)
 {
  echo $e->getMessage();
  exit;
 }

}